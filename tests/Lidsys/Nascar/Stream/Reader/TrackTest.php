<?php



class Lidsys_Nascar_Stream_Reader_TrackTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Nascar_Stream_Reader_Track(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testGetTrackById()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 6)));
		$iter->rewind();
		$record	= $iter->current();
		
		$this->assertEquals('6',					$record['trackId']);
		$this->assertEquals('Daytona International Speedway',					
													$record['name']);
		$this->assertEquals('Daytona',				$record['shortName']);
		$this->assertEquals('Daytona Beach, FL',	$record['location']);
		$this->assertEquals('2.5',					$record['length']);
	}
	
	
	
	public function testGetTrackByOtherCriteriaReturnsNull()
	{
		$this->assertNull(
			$this->_istream->read(new Mephex_Model_Criteria_Array(array('name' => 'Bristol Motor Speedway')))
		);
	}
}