<?php



/**
 * Mapper used to map data between a storage system
 * and a driver entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Mapper_Driver
extends Mephex_Model_Mapper_SequentialId
{
	/**
	 * Converts data from a storage system to a standardized
	 * object entity.
	 * 
	 * @param $data
	 * @return Lidsys_Nascar_Entity_Driver
	 */
	public function getMappedEntity($data)
	{
		$entity	= new Lidsys_Nascar_Entity_Driver();
		$entity
			->setId($data['driverId'])
			->setFirstName($data['firstName'])
			->setLastName($data['lastName'])
			->setTextColor($data['color'])
			->setBackgroundColor($data['background'])
			->setBorderColor($data['border'])
		;
		
		return $entity;
	}
	
	
	
	/**
	 * Converts an entity into data that a storage system
	 * can store (via a stream writer).
	 *  
	 * @param Lidsys_Nascar_Entity_Driver $entity
	 * @return array
	 */
	public function getMappedData(Mephex_Model_Entity $entity)
	{
		return array
		(
			'driverId'		=> $entity->getId(),
			'firstName'		=> $entity->getFirstName(),
			'lastName'		=> $entity->getLastName(),
			'color'			=> $entity->getTextColor(),
			'background'	=> $entity->getBackgroundColor(),
			'border'		=> $entity->getBorderColor()
		);	
	}	
}