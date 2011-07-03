<?php



class Lidsys_Model_Nascar_Cache_SeasonTest
extends Lidsys_Test_TestCase
{
	protected $_series;
	protected $_entity;
	protected $_cache;
	
	
	
	public function setUp()
	{
		$this->_series	= new Lidsys_Model_Nascar_Entity_Series();
		$this->_series->setKeyName('cup');
		
		$this->_entity	= new Lidsys_Model_Nascar_Entity_Season();
		$this->_entity->setId(3);
		$this->_entity->setYear(2009);
		$this->_entity->setSeries($this->_series);
		
		$this->_cache		= new Lidsys_Model_Nascar_Cache_Season();
	}
	
	
	
	public function testRememberSeasonAndFindById()
	{
		$this->_cache->remember($this->_entity);
		$entity	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('id' => 3)));
		$this->assertTrue($entity === $this->_entity);
	}
	
	
	
	public function testRememberSeasonAndFindByYearAndSeriesKeyName()
	{
		$this->_cache->remember($this->_entity);
		$entity	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('year' => '2009', 'series' => 'cup')));
		$this->assertTrue($entity === $this->_entity);
	}
	
	
	
	public function testRememberSeasonAndFindByYearAndSeries()
	{
		$this->_cache->remember($this->_entity);
		$entity	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('year' => '2009', 'series' => $this->_series)));
		$this->assertTrue($entity === $this->_entity);
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
		$this->_cache->remember($this->_entity);
		$this->assertTrue($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 3))));
		
		$this->_cache->forget($this->_entity);
		$this->assertFalse($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 3))));
	}
}