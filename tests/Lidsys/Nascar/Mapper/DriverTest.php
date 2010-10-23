<?php



class Lidsys_Nascar_Mapper_DriverTest
extends Lidsys_Test_TestCase
{
	protected $_mapper;
	
	
	
	public function setUp()
	{
		$this->_mapper	= new Lidsys_Nascar_Mapper_Driver(
			new Stub_Mephex_Model_Accessor_Group()
		);
	}
	
	
	
	public function testDataIsProperlyMappedToEntity()
	{
		$entity	= $this->_mapper->getMappedEntity
		(
			array(
				'driverId'			=> 1536,
				'firstName'			=> 'Brendan',
				'lastName'			=> 'Burke',
				'color'				=> 'red',
				'background'		=> 'orange',
				'border'			=> 'yellow',
			)
		);
		
		$this->assertEquals(1536, 				$entity->getId());
		$this->assertEquals('Brendan',			$entity->getFirstName());
		$this->assertEquals('Burke',			$entity->getLastName());
		$this->assertEquals('red', 				$entity->getTextColor());
		$this->assertEquals('orange',			$entity->getBackgroundColor());
		$this->assertEquals('yellow',			$entity->getBorderColor());
	}
	
	
	
	public function testEntityIsProperlyMappedToData()
	{
		$entity	= new Lidsys_Nascar_Entity_Driver();
		$entity
			->setId(1537)
			->setFirstName('Mark')
			->setLastName('Reedy')
			->setTextColor('green')
			->setBackgroundColor('blue')
			->setBorderColor('purple')
		;
		
		$data = $this->_mapper->getMappedData($entity);
		
		$this->assertEquals(1537,					$data['driverId']);
		$this->assertEquals('Mark',					$data['firstName']);
		$this->assertEquals('Reedy',				$data['lastName']);
		$this->assertEquals('green',				$data['color']);
		$this->assertEquals('blue',					$data['background']);
		$this->assertEquals('purple',				$data['border']);
	}
}