<?php



/**
 * Mapper used to map data between a storage system
 * and a track entity.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Mapper_Track
extends Mephex_Model_Mapper_SequentialId
{
	/**
	 * Converts data from a storage system to a standardized
	 * object entity.
	 * 
	 * @param $data
	 * @return Lidsys_Model_Nascar_Entity_Track
	 */
	public function getMappedEntity($data)
	{
		$entity	= new Lidsys_Model_Nascar_Entity_Track();
		$entity
			->setId($data['trackId'])
			->setName($data['name'])
			->setShortName($data['shortName'])
			->setLocation($data['location'])
			->setLength($data['length'])
		;
		
		return $entity;
	}
	
	
	
	/**
	 * Converts an entity into data that a storage system
	 * can store (via a stream writer).
	 *  
	 * @param Lidsys_Model_Nascar_Entity_Track $entity
	 * @return array
	 */
	public function getMappedData(Mephex_Model_Entity $entity)
	{
		return array
		(
			'trackId'		=> $entity->getId(),
			'name'			=> $entity->getName(),
			'shortName'		=> $entity->getShortName(),
			'location'		=> $entity->getLocation(),
			'length'		=> $entity->getLength(),
		);	
	}	
}