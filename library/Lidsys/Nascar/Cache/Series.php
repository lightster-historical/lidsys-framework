<?php



/**
 * A cache to keep track of Series objects.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Cache_Series
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
		$cache->remember('keyName=' . $entity->getKeyName(), $entity);
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
		else if($criteria->hasCriteriaFields(array('keyName')))
		{
			return 'keyName=' . $criteria->getCriteriaValue('keyName');
		}
		
		return null;
	}
	
}