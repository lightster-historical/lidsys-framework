<?php



class Lidsys_Model_Nascar_Stream_Reader_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Model_Nascar_Stream_Reader_Series(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testGetSeriesById()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		$iter->rewind();
		$series	= $iter->current();
		
		$this->assertEquals('1',					$series['seriesId']);
		$this->assertEquals('cup',					$series['keyname']);
		$this->assertEquals('Sprint Cup',			$series['name']);
		$this->assertEquals('Cup',					$series['shortName']);
		$this->assertEquals('nascar_cup',			$series['feedName']);
	}
	
	
	
	public function testGetSeriesByKeyName()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('keyName' => 'national')));
		$iter->rewind();
		$series	= $iter->current();
		
		$this->assertEquals('2',					$series['seriesId']);
		$this->assertEquals('national',				$series['keyname']);
		$this->assertEquals('Nationwide',			$series['name']);
		$this->assertEquals('Nationwide',			$series['shortName']);
		$this->assertEquals('nascar_national',		$series['feedName']);
	}
	
	
	
	public function testGetSeriesByOtherCriteriaReturnsNull()
	{
		$this->assertNull(
			$this->_istream->read(new Mephex_Model_Criteria_Array(array('shortName' => 'Truck')))
		);
	}
}