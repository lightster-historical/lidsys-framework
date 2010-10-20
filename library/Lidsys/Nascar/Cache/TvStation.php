<?php



/**
 * A cache to keep track of TvStation objects.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Cache_TvStation
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
	 * Forgets the given entity.
	 * 
	 * @param Mephex_Model_Entity $entity
	 */
	public function forget(Mephex_Model_Entity $entity)
	{
		$cache	= $this->getCache();
		$cache->forget('id=' . $entity->getId());
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