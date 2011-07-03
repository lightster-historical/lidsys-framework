<?php



class Lidsys_Model_Nascar_Accessor_Writer_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_conn;
	protected $_table_set;
	
	protected $_group;
	protected $_mapper;
	protected $_cache;
	protected $_istream;
	protected $_ostream;
	
	protected $_reader;
	protected $_writer;
	
	
	
	public function setUp()
	{
		$this->_conn		= $this->getDbConnection('testing');
		$this->_table_set	= new Mephex_Db_TableSet('nascar');
		
		$this->loadXmlDataSetIntoDb($this->_conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_group	= new Lidsys_Model_Nascar_Accessor_Group($this->_conn, $this->_table_set);
		$this->_mapper	= new Lidsys_Model_Nascar_Mapper_Series($this->_group);
		$this->_cache	= new Lidsys_Model_Nascar_Cache_Series();
		
		$this->_istream	= new Lidsys_Model_Nascar_Stream_Reader_Series($this->_conn, $this->_table_set);
		$this->_ostream	= new Lidsys_Model_Nascar_Stream_Writer_Series($this->_conn, $this->_table_set);
		
		$this->_reader		= new Lidsys_Model_Nascar_Accessor_Reader_Series(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_istream
		);
		$this->_writer	= new Lidsys_Model_Nascar_Accessor_Writer_Series(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_ostream
		);		
	}
	
	
	
	public function testAccessorCanBeInitialized()
	{
	}
	
	
	
	public function testEntityCanBeUpdated()
	{
		$series	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		
		$this->assertEquals('Sprint Cup', $series->getTitle());
		
		$series->setTitle('Nextel Cup');
		$this->_writer->write($series);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		$iter->rewind();
		$rawSeries	= $iter->current();
		
		$this->assertEquals('Nextel Cup', $rawSeries['name']);
	}
	
	
	
	public function testEntityCanBeCreated()
	{
		$series	= new Lidsys_Model_Nascar_Entity_Series();
		$series->setKeyname('lower');
		$series->setTitle('Lower Division Series');
		$series->setShortTitle('lower');
		$this->_writer->write($series);
		
		$this->assertNotNull($series->getId());
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => $series->getId())));
		$iter->rewind();
		$rawSeries	= $iter->current();
		
		$this->assertEquals('Lower Division Series', $rawSeries['name']);
	}
}