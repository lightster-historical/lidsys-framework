<?php



/**
 * Reader used to load a track record from a storage system 
 * before mapping it to an entity.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Stream_Reader_Track
extends Mephex_Model_Stream_Reader_Database
{
	/**
	 * Lazy-loaded prepared query for selecting a track record by id.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_id		= null;
	
	
	
	/**
	 * Lazy-loads a prepared query for selecting a track record by id.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getIdQuery()
	{
		if(null === $this->_query_id)
		{
			$this->_query_id	= $this->getConnection()->read(
				"SELECT * FROM {$this->getTable('Track')} WHERE trackId = ?",
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_id;
	}
	
	
	
	/**
	 * Reads the records that meet the specified criteria
	 * from the storage system.
	 * 
	 * @param array $criteria
	 * @return Iterator - an iterator used to 
	 */
	public function read(Mephex_Model_Criteria $criteria)
	{
		if($criteria->hasCriteriaFields(array('id')))
		{
			$id		= $criteria->getCriteriaValue('id');
			$query	= $this->getIdQuery();
			return $query->execute($params = array($id));
		}
		
		return null;
	}
}  