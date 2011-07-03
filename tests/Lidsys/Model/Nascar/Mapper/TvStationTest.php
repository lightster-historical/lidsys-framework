<?php



class Lidsys_Model_Nascar_Mapper_TvStationTest
extends Lidsys_Test_TestCase
{
	protected $_mapper;
	
	
	
	public function setUp()
	{
		$this->_mapper	= new Lidsys_Model_Nascar_Mapper_TvStation(
			new Stub_Mephex_Model_Accessor_Group()
		);
	}
	
	
	
	public function testDataIsProperlyMappedToEntity()
	{
		$entity	= $this->_mapper->getMappedEntity
		(
			array(
				'stationId'			=> 8,
				'name'				=> 'SPEED2',
			)
		);
		
		$this->assertEquals(8, 							$entity->getId());
		$this->assertEquals('SPEED2',					$entity->getName());
	}
	
	
	
	public function testEntityIsProperlyMappedToData()
	{
		$entity	= new Lidsys_Model_Nascar_Entity_TvStation();
		$entity
			->setId(9)
			->setName('CBS')
		;
		
		$data = $this->_mapper->getMappedData($entity);
		
		$this->assertEquals(9,						$data['stationId']);
		$this->assertEquals('CBS',					$data['name']);
	}
}