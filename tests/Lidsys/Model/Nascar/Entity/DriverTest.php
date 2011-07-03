<?php



class Lidsys_Model_Nascar_Entity_DriverTest
extends Lidsys_Test_TestCase
{
	protected $_driver;
	
	
	
	public function setUp()
	{
		$this->_driver		= new Lidsys_Model_Nascar_Entity_Driver();
	}
	
	
	
	public function testIdCanBeStoredAndRetrieved()
	{
		$id	= 24;
		$this->_driver->setId($id);
		$this->assertEquals($id, $this->_driver->getId());
	}
	
	
	
	public function testIdSetterCastsIdToInt()
	{
		$this->_driver->setId('yow!');
		$this->assertEquals(0, $this->_driver->getId());
		
		$this->_driver->setId('-2yow!');
		$this->assertEquals(-2, $this->_driver->getId());
	}
	
	
	
	public function testIdSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_driver === $this->_driver->setId(24));
	}
	
	
	
	public function testFirstNameCanBeStoredAndRetrieved()
	{
		$name	= 'Jeff';
		$this->_driver->setFirstName($name);
		$this->assertEquals($name, $this->_driver->getFirstName());
	}
	
	
	
	public function testFirstNameSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_driver === $this->_driver->setFirstName('Jeff'));
	}
	
	
	
	public function testLastNameCanBeStoredAndRetrieved()
	{
		$name	= 'Gordon';
		$this->_driver->setLastName($name);
		$this->assertEquals($name, $this->_driver->getLastName());
	}
	
	
	
	public function testLastNameSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_driver === $this->_driver->setLastName('Gordon'));
	}
	
	
	
	public function testTextColorCanBeStoredAndRetrieved()
	{
		$color	= 'color';
		$this->_driver->setTextColor($color);
		$this->assertEquals($color, $this->_driver->getTextColor());
	}
	
	
	
	public function testTextColorSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_driver === $this->_driver->setTextColor('color'));
	}
	
	
	
	public function testBackgroundColorCanBeStoredAndRetrieved()
	{
		$color	= 'Background';
		$this->_driver->setBackgroundColor($color);
		$this->assertEquals($color, $this->_driver->getBackgroundColor());
	}
	
	
	
	public function testBackgroundColorSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_driver === $this->_driver->setBackgroundColor('bgcolor'));
	}
	
	
	
	public function testBorderColorCanBeStoredAndRetrieved()
	{
		$color	= 'border';
		$this->_driver->setBorderColor($color);
		$this->assertEquals($color, $this->_driver->getBorderColor());
	}
	
	
	
	public function testBorderColorSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_driver === $this->_driver->setBorderColor('border'));
	}
	
	
	
	public function testUniqueIdentifierIsSeriesKeyName()
	{
		$id		= 12;
		$this->_driver->setId($id);
		$this->assertEquals($this->_driver->getId(), $this->_driver->getUniqueIdentifier());
	}
}