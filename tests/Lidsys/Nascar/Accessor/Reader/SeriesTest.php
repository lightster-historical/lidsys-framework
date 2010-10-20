<?php



class Lidsys_Nascar_Accessor_Reader_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_group;
	protected $_mapper;
	protected $_cache;
	protected $_stream;
	
	protected $_reader;
	
	
	
	public function setUp()
	{
		$conn		= $this->getDbConnection('testing');
		$table_set	= new Mephex_Db_TableSet('nascar');
		
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Nascar', 'stream');
		
		$this->_group	= new Lidsys_Nascar_Accessor_Group($conn, $table_set);
		$this->_mapper	= new Lidsys_Nascar_Mapper_Series($this->_group);
		$this->_cache	= new Lidsys_Nascar_Cache_Series();
		$this->_stream	= new Lidsys_Nascar_Stream_Reader_Series($conn, $table_set);
		
		$this->_reader		= new Lidsys_Nascar_Accessor_Reader_Series(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_stream
		);
	}
	
	
	
	public function testReaderAccessorCanBeInitialized()
	{
	}
	

	
	public function testSeriesCanBeReadById()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		
		$this->assertEquals('1',					$entity->getId());
		$this->assertEquals('cup',					$entity->getKeyName());
		$this->assertEquals('Sprint Cup',			$entity->getTitle());
		$this->assertEquals('Cup',					$entity->getShortTitle());
//		$this->assertEquals('nascar_cup',			$series['feedName']);
	}
	

	
	public function testSeriesCanBeReadByKeyName()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('keyName' => 'national')));
		
		$this->assertEquals('2',					$entity->getId());
		$this->assertEquals('national',				$entity->getKeyName());
		$this->assertEquals('Nationwide',			$entity->getTitle());
		$this->assertEquals('Nationwide',			$entity->getShortTitle());
//		$this->assertEquals('nascar_cup',			$series['feedName']);
	}
}