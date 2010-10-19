<?php



class Lidsys_Nascar_Stream_Reader_SeasonTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Nascar_Stream_Reader_Season(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testGetSeasonById()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 3)));
		$iter->rewind();
		$record	= $iter->current();
		
		$this->assertEquals('3',					$record['seasonId']);
		$this->assertEquals('1',					$record['seriesId']);
		$this->assertEquals('2009',					$record['year']);
		$this->assertEquals('2009 Cup',				$record['relationTitle']);
		$this->assertEquals('5',					$record['maxPickCount']);
		$this->assertEquals('26',					$record['chaseRaceNo']);
		$this->assertEquals('12',					$record['chaseDriverCount']);
	}
	
	
	
	public function testGetSeasonByYearAndSeriesKeyName()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('year' => '2010', 'series' => 'truck')));
		$iter->rewind();
		$record	= $iter->current();

		$this->assertEquals('8',					$record['seasonId']);
		$this->assertEquals('3',					$record['seriesId']);
		$this->assertEquals('2010',					$record['year']);
		$this->assertEquals('2010 Truck',			$record['relationTitle']);
		$this->assertEquals('3',					$record['maxPickCount']);
		$this->assertEquals('0',					$record['chaseRaceNo']);
		$this->assertEquals('0',					$record['chaseDriverCount']);
	}
	
	
	
	public function testGetSeasonByYearAndSeries()
	{
		$series	= new Lidsys_Nascar_Entity_Series();
		$series->setKeyName('national');
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('year' => '2010', 'series' => $series)));
		$iter->rewind();
		$record	= $iter->current();

		$this->assertEquals('7',					$record['seasonId']);
		$this->assertEquals('2',					$record['seriesId']);
		$this->assertEquals('2010',					$record['year']);
		$this->assertEquals('2010 Nationwide',		$record['relationTitle']);
		$this->assertEquals('4',					$record['maxPickCount']);
		$this->assertEquals('0',					$record['chaseRaceNo']);
		$this->assertEquals('0',					$record['chaseDriverCount']);
	}
	
	
	
	public function testGetSeriesByOtherCriteriaReturnsNull()
	{
		$this->assertNull(
			$this->_istream->read(new Mephex_Model_Criteria_Array(array('seriesId' => '2')))
		);
	}
}