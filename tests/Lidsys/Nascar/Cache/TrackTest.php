<?php



class Lidsys_Nascar_Cache_TrackTest
extends Lidsys_Test_TestCase
{
	protected $_entity;
	protected $_cache;
	
	
	
	public function setUp()
	{
		$this->_entity	= new Lidsys_Nascar_Entity_Track();
		$this->_entity->setId(4);
		
		$this->_cache		= new Lidsys_Nascar_Cache_Track();
	}
	
	
	
	public function testRememberTrackAndFindById()
	{
		$this->_cache->remember($this->_entity);
		$entity	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('id' => 4)));
		$this->assertTrue($entity === $this->_entity);
	}
	
	
	
	/**
	 * @expectedException Mephex_Model_Criteria_Exception_UnknownKey
	 */
	public function testFindByUnknown()
	{
		$this->assertNull($this->_cache->find(new Mephex_Model_Criteria_Array(array('unknown' => 'yep'))));
	}
	
	
	
	public function testForgetTrack()
	{
		$this->_cache->remember($this->_entity);
		$this->assertTrue($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 4))));
		
		$this->_cache->forget($this->_entity);
		$this->assertFalse($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 4))));
	}
}