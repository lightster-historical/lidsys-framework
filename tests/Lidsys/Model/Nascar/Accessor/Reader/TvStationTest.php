<?php



class Lidsys_Model_Nascar_Accessor_Reader_TvStationTest
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
		
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_group	= new Lidsys_Model_Nascar_Accessor_Group($conn, $table_set);
		$this->_mapper	= new Lidsys_Model_Nascar_Mapper_TvStation($this->_group);
		$this->_cache	= new Lidsys_Model_Nascar_Cache_TvStation();
		$this->_stream	= new Lidsys_Model_Nascar_Stream_Reader_TvStation($conn, $table_set);
		
		$this->_reader		= new Lidsys_Model_Nascar_Accessor_Reader_TvStation(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_stream
		);
	}
	
	
	
	public function testReaderAccessorCanBeInitialized()
	{
	}
	

	
	public function testTvStationCanBeReadById()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 3)));
		
		$this->assertEquals('3',					$entity->getId());
		$this->assertEquals('FOX',					$entity->getName());
	}
}