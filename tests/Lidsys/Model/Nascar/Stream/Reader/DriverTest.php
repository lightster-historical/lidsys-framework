<?php



class Lidsys_Model_Nascar_Stream_Reader_DriverTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Model_Nascar_Stream_Reader_Driver(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testGetDriverById()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 24)));
		$iter->rewind();
		$record	= $iter->current();
		
		$this->assertEquals('24',					$record['driverId']);
		$this->assertEquals('Jeff',					$record['firstName']);
		$this->assertEquals('Gordon',				$record['lastName']);
		$this->assertEquals('gold',					$record['color']);
		$this->assertEquals('navy',					$record['background']);
		$this->assertEquals('red',					$record['border']);
	}
	
	
	
	public function testGetDriverByName()
	{
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('firstName' => 'Jamie', 'lastName' => 'McMurray')));
		$iter->rewind();
		$record	= $iter->current();

		$this->assertEquals('1',					$record['driverId']);
		$this->assertEquals('Jamie',				$record['firstName']);
		$this->assertEquals('McMurray',				$record['lastName']);
		$this->assertEquals('black',				$record['color']);
		$this->assertEquals('orange',				$record['background']);
		$this->assertEquals('yellow',				$record['border']);
	}
	
	
	
	public function testGetDriverByOtherCriteriaReturnsNull()
	{
		$this->assertNull(
			$this->_istream->read(new Mephex_Model_Criteria_Array(array('lastName' => 'Harvick')))
		);
	}
}