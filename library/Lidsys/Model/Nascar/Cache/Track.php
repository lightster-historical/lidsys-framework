<?php



/**
 * A cache to keep track of Track objects.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Cache_Track
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
		
		return null;
	}
	
}