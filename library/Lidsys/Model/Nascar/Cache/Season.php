<?php



/**
 * A cache to keep track of Season objects.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Cache_Season
extends Mephex_Model_Cache
{
	/**
	 * Remembers the given entity.
	 * 
	 * @param Mephex_Model_Entity $entity
	 * @return void
	 */
	public function remember(Mephex_Model_Entity $entity)
	{
		$cache	= $this->getCache();
		$cache->remember('id=' . $entity->getId(), $entity);
		$cache->remember(
			'[year=' . $entity->getYear() . ']' .
				'[series=' . $entity->getSeries()->getKeyName() . ']'
			, $entity
		);
	}
	
	
	
	
	/**
	 * Generates a string key using the given criteria.
	 * 
	 * @param Mephex_Model_Criteria $criteria
	 * @return string
	 */
	protected function generateKeyFromCriteria(Mephex_Model_Criteria $criteria)
	{
		if($criteria->hasCriteriaFields(array('id')))
		{
			return 'id=' . $criteria->getCriteriaValue('id');
		}
		else if($criteria->hasCriteriaFields(array('year', 'series')))
		{
			$series		= $criteria->getCriteriaValue('series');
			$keyName	= ($series instanceof Lidsys_Model_Nascar_Entity_Series
				? $series->getKeyName() 
				: $series
			);
			$year		= $criteria->getCriteriaValue('year');
			return "[year={$year}][series={$keyName}]";
		}
		
		return null;
	}
	
}