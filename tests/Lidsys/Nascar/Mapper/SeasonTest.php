<?php



class Lidsys_Nascar_Mapper_SeasonTest
extends Lidsys_Test_TestCase
{
	protected $_mapper;
	
	
	
	public function setUp()
	{
		$group	= new Stub_Mephex_Model_Accessor_Group();
		$reader	= new Stub_Mephex_Model_Accessor_Reader(
			$group,
			new Stub_Mephex_Model_Mapper($group),
			new Stub_Mephex_Model_Cache(),
			new Stub_Mephex_Model_Stream_Reader()
		);
		$group->registerAccessor('Series', $reader);
		
		$this->_mapper	= new Lidsys_Nascar_Mapper_Season($group);
	}
	
	
	
	public function testDataIsProperlyMappedToEntity()
	{
		$entity	= $this->_mapper->getMappedEntity
		(
			array(
				'seasonId'			=> 2431,
				'seriesId'			=> 2,
				'year'				=> 2008,
				'relationTitle'		=> '2008 Piston Cup',
				'maxPickCount'		=> 3,
				'chaseRaceNo'		=> 24,
				'chaseDriverCount'	=> 5,
			)
		);
		
		$this->assertEquals(2431, 				$entity->getId());
		$this->assertEquals(2008,				$entity->getYear());
		$this->assertEquals('2008 Piston Cup',	$entity->getTitle());
		$this->assertEquals(3, 					$entity->getMaxPickCount());
		$this->assertEquals(24, 				$entity->getChaseRaceNumber());
		$this->assertEquals(5, 					$entity->getChaseDriverCount());
		
		$this->assertEquals(
			2, 					
			current(
				$entity->getReferencedPropertyCriteriaValues('series', array('id'))
			)
		);
	}
	
	
	
	public function testEntityIsProperlyMappedToData()
	{
		$series	= new Lidsys_Nascar_Entity_Series();
		$series->setId(2569);
		
		$entity	= new Lidsys_Nascar_Entity_Season();
		$entity
			->setId(15741)
			->setSeries($series)
			->setYear(2005)
			->setTitle('2005 W00t! Racing')
			->setMaxPickCount(11)
			->setChaseRaceNumber(30)
			->setChaseDriverCount(15)
		;
		
		$data = $this->_mapper->getMappedData($entity);
		
		$this->assertEquals(15741,					$data['seasonId']);
		$this->assertEquals(2569,					$data['seriesId']);
		$this->assertEquals(2005,					$data['year']);
		$this->assertEquals('2005 W00t! Racing',	$data['relationTitle']);
		$this->assertEquals(11,						$data['maxPickCount']);
		$this->assertEquals(30,						$data['chaseRaceNo']);
		$this->assertEquals(15,						$data['chaseDriverCount']);
	}
}