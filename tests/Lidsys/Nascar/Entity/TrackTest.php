<?php



class Lidsys_Nascar_Entity_TrackTest
extends Lidsys_Test_TestCase
{
	protected $_track;
	
	
	
	public function setUp()
	{
		$this->_track		= new Lidsys_Nascar_Entity_Track();
	}
	
	
	
	public function testIdCanBeStoredAndRetrieved()
	{
		$id	= 24;
		$this->_track->setId($id);
		$this->assertEquals($id, $this->_track->getId());
	}
	
	
	
	public function testIdSetterCastsIdToInt()
	{
		$this->_track->setId('yow!');
		$this->assertEquals(0, $this->_track->getId());
		
		$this->_track->setId('-2yow!');
		$this->assertEquals(-2, $this->_track->getId());
	}
	
	
	
	public function testIdSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_track === $this->_track->setId(24));
	}
	
	
	
	public function testNameCanBeStoredAndRetrieved()
	{
		$name	= 'Auto Club Speedway';
		$this->_track->setName($name);
		$this->assertEquals($name, $this->_track->getName());
	}
	
	
	
	public function testNameSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_track === $this->_track->setName('Auto Club Speedway'));
	}
	
	
	
	public function testShortNameCanBeStoredAndRetrieved()
	{
		$title	= 'California';
		$this->_track->setShortName($title);
		$this->assertEquals($title, $this->_track->getShortName());
	}
	
	
	
	public function testShortNameSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_track === $this->_track->setShortName('California'));
	}
	
	
	
	public function testLengthCanBeStoredAndRetrieved()
	{
		$length	= 2.66;
		$this->_track->setLength($length);
		$this->assertEquals($length, $this->_track->getLength());
	}
	
	
	
	public function testLengthSetterCastsLengthToFloat()
	{
		$this->_track->setLength('yow!');
		$this->assertEquals(0, $this->_track->getLength());
		
		$this->_track->setLength('-2.66yow!');
		$this->assertEquals(-2.66, $this->_track->getLength());
	}
	
	
	
	public function testLengthSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_track === $this->_track->setLength(1.5));
	}
	
	
	
	public function testUniqueIdentifierIsSeriesKeyName()
	{
		$id		= 12;
		$this->_track->setId($id);
		$this->assertEquals($this->_track->getId(), $this->_track->getUniqueIdentifier());
	}
}