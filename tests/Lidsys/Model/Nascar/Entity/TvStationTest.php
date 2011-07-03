<?php



class Lidsys_Model_Nascar_Entity_TvStationTest
extends Lidsys_Test_TestCase
{
	protected $_tv_station;
	
	
	
	public function setUp()
	{
		$this->_tv_station		= new Lidsys_Model_Nascar_Entity_TvStation();
	}
	
	
	
	public function testIdCanBeStoredAndRetrieved()
	{
		$id	= 4;
		$this->_tv_station->setId($id);
		$this->assertEquals($id, $this->_tv_station->getId());
	}
	
	
	
	public function testIdSetterCastsIdToInt()
	{
		$this->_tv_station->setId('yow!');
		$this->assertEquals(0, $this->_tv_station->getId());
		
		$this->_tv_station->setId('-2yow!');
		$this->assertEquals(-2, $this->_tv_station->getId());
	}
	
	
	
	public function testIdSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_tv_station === $this->_tv_station->setId(4));
	}
	
	
	
	public function testNameCanBeStoredAndRetrieved()
	{
		$name	= 'ABC';
		$this->_tv_station->setName($name);
		$this->assertEquals($name, $this->_tv_station->getName());
	}
	
	
	
	public function testNameSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_tv_station === $this->_tv_station->setName('ABC'));
	}
	
	
	
	public function testUniqueIdentifierIsSeriesKeyName()
	{
		$id		= '2';
		$this->_tv_station->setId($id);
		$this->assertEquals($this->_tv_station->getId(), $this->_tv_station->getUniqueIdentifier());
	}
}