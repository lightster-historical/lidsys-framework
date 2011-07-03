<?php



/**
 * Mapper used to map data between a storage system
 * and a TV station entity.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Mapper_TvStation
extends Mephex_Model_Mapper_SequentialId
{
	/**
	 * Converts data from a storage system to a standardized
	 * object entity.
	 * 
	 * @param $data
	 * @return Lidsys_Model_Nascar_Entity_TvStation
	 */
	public function getMappedEntity($data)
	{
		$entity	= new Lidsys_Model_Nascar_Entity_TvStation();
		$entity
			->setId($data['stationId'])
			->setName($data['name'])
		;
		
		return $entity;
	}
	
	
	
	/**
	 * Converts an entity into data that a storage system
	 * can store (via a stream writer).
	 *  
	 * @param Lidsys_Model_Nascar_Entity_TvStation $entity
	 * @return array
	 */
	public function getMappedData(Mephex_Model_Entity $entity)
	{
		return array
		(
			'stationId'		=> $entity->getId(),
			'name'			=> $entity->getName(),
		);	
	}	
}