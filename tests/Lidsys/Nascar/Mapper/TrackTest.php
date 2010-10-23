<?php



class Lidsys_Nascar_Mapper_TrackTest
extends Lidsys_Test_TestCase
{
	protected $_mapper;
	
	
	
	public function setUp()
	{
		$this->_mapper	= new Lidsys_Nascar_Mapper_Track(
			new Stub_Mephex_Model_Accessor_Group()
		);
	}
	
	
	
	public function testDataIsProperlyMappedToEntity()
	{
		$entity	= $this->_mapper->getMappedEntity
		(
			array(
				'trackId'			=> 44,
				'name'				=> 'Stater Bros. Speedway',
				'shortName'			=> 'Staters',
				'location'			=> 'San Bernardino, CA',
				'length'			=> .52,
			)
		);
		
		$this->assertEquals(44, 						$entity->getId());
		$this->assertEquals('Stater Bros. Speedway',	$entity->getName());
		$this->assertEquals('Staters',					$entity->getShortName());
		$this->assertEquals('San Bernardino, CA', 		$entity->getLocation());
		$this->assertEquals(.52,						$entity->getLength());
	}
	
	
	
	public function testEntityIsProperlyMappedToData()
	{
		$entity	= new Lidsys_Nascar_Entity_Track();
		$entity
			->setId(45)
			->setName('Toyota Speedway at Irwindale')
			->setShortName('Irwindale')
			->setLocation('Irwindale, CA')
			->setLength(.5)
		;
		
		$data = $this->_mapper->getMappedData($entity);
		
		$this->assertEquals(45,						$data['trackId']);
		$this->assertEquals(
			'Toyota Speedway at Irwindale',					
			$data['name']
		);
		$this->assertEquals('Irwindale',			$data['shortName']);
		$this->assertEquals('Irwindale, CA',		$data['location']);
		$this->assertEquals(.5,						$data['length']);
	}
}