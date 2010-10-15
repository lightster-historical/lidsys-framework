<?php



class Lidsys_Nascar_Entity_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_series;
	
	
	
	public function setUp()
	{
		$this->_series		= new Lidsys_Nascar_Entity_Series();
	}
	
	
	
	public function testIdCanBeStoredAndRetrieved()
	{
		$id	= 24;
		$this->_series->setId($id);
		$this->assertEquals($id, $this->_series->getId());
	}
	
	
	
	public function testIdSetterCastsIdToInt()
	{
		$this->_series->setId('yow!');
		$this->assertEquals(0, $this->_series->getId());
		
		$this->_series->setId('-2yow!');
		$this->assertEquals(-2, $this->_series->getId());
	}
	
	
	
	public function testIdSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_series === $this->_series->setId(24));
	}
	
	
	
	public function testKeyNameCanBeStoredAndRetrieved()
	{
		$keyname	= 'cup';
		$this->_series->setKeyName($keyname);
		$this->assertEquals($keyname, $this->_series->getKeyName());
	}
	
	
	
	public function testKeyNameSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_series === $this->_series->setKeyName('cup'));
	}
	
	
	
	public function testTitleCanBeStoredAndRetrieved()
	{
		$title	= 'Sprint Cup';
		$this->_series->setTitle($title);
		$this->assertEquals($title, $this->_series->getTitle());
	}
	
	
	
	public function testTitleSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_series === $this->_series->setTitle('Sprint Cup'));
	}
	
	
	
	public function testShortTitleCanBeStoredAndRetrieved()
	{
		$title	= 'Cup';
		$this->_series->setShortTitle($title);
		$this->assertEquals($title, $this->_series->getShortTitle());
	}
	
	
	
	public function testShortTitleSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_series === $this->_series->setShortTitle('Cup'));
	}
	
	
	
	public function testUniqueIdentifierIsSeriesKeyName()
	{
		$keyName	= 'national';
		$this->_series->setKeyName($keyName);
		$this->assertEquals($this->_series->getKeyName(), $this->_series->getUniqueIdentifier());
	}
}