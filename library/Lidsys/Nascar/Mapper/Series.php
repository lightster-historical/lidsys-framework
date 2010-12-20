<?php



/**
 * Mapper used to map data between a storage system
 * and a series entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Mapper_Series
extends Mephex_Model_Mapper_SequentialId
{
	/**
	 * Converts data from a storage system to a standardized
	 * object entity.
	 * 
	 * @param $data
	 * @return Lidsys_Nascar_Entity_Series
	 */
	public function getMappedEntity($data)
	{
		$series	= new Lidsys_Nascar_Entity_Series();
		$series
			->setId($data['seriesId'])
			->setKeyName($data['keyname'])
			->setTitle($data['name'])
			->setShortTitle($data['shortName'])
		;
		
		return $series;
	}
	
	
	
	/**
	 * Converts an entity into data that a storage system
	 * can store (via a stream writer).
	 *  
	 * @param Lidsys_Nascar_Entity_Series $entity
	 * @return array
	 */
	public function getMappedData(Mephex_Model_Entity $series)
	{
		return array
		(
			'seriesId'	=> $series->getId(),
			'keyname'	=> $series->getKeyName(),
			'name'		=> $series->getTitle(),
			'shortName'	=> $series->getShortTitle()
		);	
	}	
}