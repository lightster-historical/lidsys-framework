<?php



class Lidsys_Model_Nascar_Accessor_Writer_SeasonTest
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
		$this->_mapper	= new Lidsys_Model_Nascar_Mapper_Season($this->_group);
		$this->_cache	= new Lidsys_Model_Nascar_Cache_Season();
		
		$this->_istream	= new Lidsys_Model_Nascar_Stream_Reader_Season($this->_conn, $this->_table_set);
		$this->_ostream	= new Lidsys_Model_Nascar_Stream_Writer_Season($this->_conn, $this->_table_set);
		
		$this->_reader		= new Lidsys_Model_Nascar_Accessor_Reader_Season(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_istream
		);
		$this->_writer	= new Lidsys_Model_Nascar_Accessor_Writer_Season(
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
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		
		$this->assertEquals('2007 Cup', $entity->getTitle());
		
		$entity->setTitle('2017 Cup');
		$this->_writer->write($entity);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		$iter->rewind();
		$read	= $iter->current();
		
		$this->assertEquals('2017 Cup', $read['relationTitle']);
	}
	
	
	
	public function testEntityCanBeCreated()
	{
		$entity	= new Lidsys_Model_Nascar_Entity_Season();
		$entity->setSeries($this->_group->getSeries(new Mephex_Model_Criteria_Array(array('id' => 1))));
		$entity->setTitle('2024 Cup');
		$entity->setYear(2024);
		$entity->setMaxPickCount(53);
		$this->_writer->write($entity);
		
		$this->assertNotNull($entity->getId());
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => $entity->getId())));
		$iter->rewind();
		$read	= $iter->current();
		
		$this->assertEquals('2024 Cup', $read['relationTitle']);
	}
}