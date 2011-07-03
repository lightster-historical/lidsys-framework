<?php



class Lidsys_Model_Nascar_Mapper_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_mapper;
	
	
	
	public function setUp()
	{
		$this->_mapper	= new Lidsys_Model_Nascar_Mapper_Series(
			new Stub_Mephex_Model_Accessor_Group()
		);
	}
	
	
	
	public function testDataIsProperlyMappedToEntity()
	{
		$entity	= $this->_mapper->getMappedEntity
		(
			array(
				'seriesId'		=> 2431,
				'keyname'		=> 'series_key',
				'name'			=> 'A Series Name',
				'shortName'		=> 'Short Name'
			)
		);
		
		$this->assertEquals(2431, 				$entity->getId());
		$this->assertEquals('series_key', 		$entity->getKeyName());
		$this->assertEquals('A Series Name',	$entity->getTitle());
		$this->assertEquals('Short Name',		$entity->getShortTitle());
	}
	
	
	
	public function testEntityIsProperlyMappedToData()
	{
		$entity	= new Lidsys_Model_Nascar_Entity_Series();
		$entity
			->setId(5781)
			->setKeyName('another_series_key')
			->setTitle('Another Series Name')
			->setShortTitle('Another Short--');
		
		$data = $this->_mapper->getMappedData($entity);
		
		$this->assertEquals(5781, 					$data['seriesId']);
		$this->assertEquals('another_series_key', 	$data['keyname']);
		$this->assertEquals('Another Series Name',	$data['name']);
		$this->assertEquals('Another Short--',		$data['shortName']);
	}
	
	
	
	public function testDataMappedToEntityMapsToSameData()
	{	
		$data	= array(
			'seriesId'		=> 21,
			'keyname'		=> 'same_key',
			'name'			=> 'Same key?',
			'shortName'		=> 'Same?'
		);
		
		$entity	= $this->_mapper->getMappedEntity($data);
		
		$this->assertEquals($data, $this->_mapper->getMappedData($entity));
	}
}