<?php



class Lidsys_Nascar_Cache_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_series;
	protected $_cache;
	
	
	
	public function setUp()
	{
		$this->_series		= new Lidsys_Nascar_Entity_Series();
		$this->_series->setId(24);
		$this->_series->setKeyName('speedy');
		
		$this->_cache		= new Lidsys_Nascar_Cache_Series();
	}
	
	
	
	public function testRememberSeriesAndFindById()
	{
		$this->_cache->remember($this->_series);
		$series	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('id' => 24)));
		$this->assertTrue($series === $this->_series);
	}
	
	
	
	public function testRememberSeriesAndFindByKeyName()
	{
		$this->_cache->remember($this->_series);
		$series	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('keyName' => 'speedy')));
		$this->assertTrue($series === $this->_series);
	}
	
	
	
	/**
	 * @expectedException Mephex_Model_Criteria_Exception_UnknownKey
	 */
	public function testFindByUnknown()
	{
		$this->assertNull($this->_cache->find(new Mephex_Model_Criteria_Array(array('unknown' => 'yep'))));
	}
	
	
	
	public function testForgetSeries()
	{
		$this->_cache->remember($this->_series);
		$this->assertTrue($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 24))));
		
		$this->_cache->forget($this->_series);
		$this->assertFalse($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 24))));
	}
}