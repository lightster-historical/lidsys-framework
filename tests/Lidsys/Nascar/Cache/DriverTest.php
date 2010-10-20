<?php



class Lidsys_Nascar_Cache_DriverTest
extends Lidsys_Test_TestCase
{
	protected $_entity;
	protected $_cache;
	
	
	
	public function setUp()
	{
		$this->_entity	= new Lidsys_Nascar_Entity_Driver();
		$this->_entity->setId(2);
		$this->_entity->setFirstName('Mark');
		$this->_entity->setLastName('Martin');
		
		$this->_cache		= new Lidsys_Nascar_Cache_Driver();
	}
	
	
	
	public function testRememberDriverAndFindById()
	{
		$this->_cache->remember($this->_entity);
		$entity	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('id' => 2)));
		$this->assertTrue($entity === $this->_entity);
	}
	
	
	
	public function testRememberDriverAndFindByFirstAndLastName()
	{
		$this->_cache->remember($this->_entity);
		$entity	= $this->_cache->find(new Mephex_Model_Criteria_Array(array('firstName' => 'Mark', 'lastName' => 'Martin')));
		$this->assertTrue($entity === $this->_entity);
	}
	
	
	
	/**
	 * @expectedException Mephex_Model_Criteria_Exception_UnknownKey
	 */
	public function testFindByUnknown()
	{
		$this->assertNull($this->_cache->find(new Mephex_Model_Criteria_Array(array('unknown' => 'yep'))));
	}
	
	
	
	public function testForgetDriver()
	{
		$this->_cache->remember($this->_entity);
		$this->assertTrue($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 2))));
		
		$this->_cache->forget($this->_entity);
		$this->assertFalse($this->_cache->has(new Mephex_Model_Criteria_Array(array('id' => 2))));
	}
}