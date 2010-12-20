<?php



/**
 * Mapper used to map data between a storage system
 * and a season entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Mapper_Season
extends Mephex_Model_Mapper_SequentialId
{
	/**
	 * Converts data from a storage system to a standardized
	 * object entity.
	 * 
	 * @param $data
	 * @return Lidsys_Nascar_Entity_Season
	 */
	public function getMappedEntity($data)
	{
		$entity	= new Lidsys_Nascar_Entity_Season();
		$entity
			->setId($data['seasonId'])
			->setYear($data['year'])
			->setTitle($data['relationTitle'])
			->setMaxPickCount($data['maxPickCount'])
			->setChaseRaceNumber($data['chaseRaceNo'])
			->setChaseDriverCount($data['chaseDriverCount'])
		;
		
		$entity->setReferencedProperty(
			'series',
			$this->getAccessorGroup()->getReference(
				'Series',
				new Mephex_Model_Criteria_Array(array('id' => $data['seriesId']))
			)
		);
		
		return $entity;
	}
	
	
	
	/**
	 * Converts an entity into data that a storage system
	 * can store (via a stream writer).
	 *  
	 * @param Lidsys_Nascar_Entity_Season $entity
	 * @return array
	 */
	public function getMappedData(Mephex_Model_Entity $entity)
	{
		return array
		(
			'seasonId'			=> $entity->getId(),
			'seriesId'			=> current(
					$entity->getReferencedPropertyCriteriaValues(
						'series',
						array('id')
					)
				),
			'year'				=> $entity->getYear(),
			'relationTitle'		=> $entity->getTitle(),
			'maxPickCount'		=> $entity->getMaxPickCount(),
			'chaseRaceNo'		=> $entity->getChaseRaceNumber(),
			'chaseDriverCount'	=> $entity->getChaseDriverCount()
		);	
	}	
}