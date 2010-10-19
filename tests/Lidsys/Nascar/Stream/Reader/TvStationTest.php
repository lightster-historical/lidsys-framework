<?php



class Lidsys_Nascar_Stream_Reader_TvStationTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Nascar_Stream_Reader_TvStation(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testGetTvStationById()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 3)));
		$iter->rewind();
		$record	= $iter->current();
		
		$this->assertEquals('3',					$record['stationId']);
		$this->assertEquals('FOX',					$record['name']);
	}
	
	
	
	public function testGetTvStationByOtherCriteriaReturnsNull()
	{
		$this->assertNull(
			$this->_istream->read(new Mephex_Model_Criteria_Array(array('name' => 'SPEED')))
		);
	}
}