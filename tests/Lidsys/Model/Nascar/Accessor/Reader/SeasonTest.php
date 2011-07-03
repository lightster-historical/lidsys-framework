<?php



class Lidsys_Model_Nascar_Accessor_Reader_SeasonTest
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
		$this->_mapper	= new Lidsys_Model_Nascar_Mapper_Season($this->_group);
		$this->_cache	= new Lidsys_Model_Nascar_Cache_Season();
		$this->_stream	= new Lidsys_Model_Nascar_Stream_Reader_Season($conn, $table_set);
		
		$this->_reader		= new Lidsys_Model_Nascar_Accessor_Reader_Season(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_stream
		);
	}
	
	
	
	public function testReaderAccessorCanBeInitialized()
	{
	}
	

	
	public function testSeasonCanBeReadById()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 3)));
		
		$this->assertEquals('3',					$entity->getId());
		$this->assertEquals('1',					$entity->getSeries()->getId());
		$this->assertEquals('2009',					$entity->getYear());
		$this->assertEquals('2009 Cup',				$entity->getTitle());
		$this->assertEquals('5',					$entity->getMaxPickCount());
		$this->assertEquals('26',					$entity->getChaseRaceNumber());
		$this->assertEquals('12',					$entity->getChaseDriverCount());
	}
	

	
	public function testSeasonCanBeReadByYearAndSeriesKeyName()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('year' => '2010', 'series' => 'truck')));
		
		$this->assertEquals('8',					$entity->getId());
		$this->assertEquals('3',					$entity->getSeries()->getId());
		$this->assertEquals('2010',					$entity->getYear());
		$this->assertEquals('2010 Truck',			$entity->getTitle());
		$this->assertEquals('3',					$entity->getMaxPickCount());
		$this->assertEquals('0',					$entity->getChaseRaceNumber());
		$this->assertEquals('0',					$entity->getChaseDriverCount());
	}
	

	
	public function testSeasonCanBeReadByYearAndSeries()
	{
		$series	= new Lidsys_Model_Nascar_Entity_Series();
		$series->setKeyName('national');
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('year' => '2010', 'series' => $series)));
		
		$this->assertEquals('7',					$entity->getId());
		$this->assertEquals('2',					$entity->getSeries()->getId());
		$this->assertEquals('2010',					$entity->getYear());
		$this->assertEquals('2010 Nationwide',		$entity->getTitle());
		$this->assertEquals('4',					$entity->getMaxPickCount());
		$this->assertEquals('0',					$entity->getChaseRaceNumber());
		$this->assertEquals('0',					$entity->getChaseDriverCount());
	}
}