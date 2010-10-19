<?php



/**
 * Reader used to load a driver record from a storage system 
 * before mapping it to an entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Stream_Reader_Driver
extends Mephex_Model_Stream_Reader_Database
{
	/**
	 * Lazy-loaded prepared query for selecting a driver record by id.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_id		= null;
	
	/**
	 * Lazy-loaded prepared query for selecting a driver record
	 * by first & last name.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_name	= null;
	
	
	
	/**
	 * Lazy-loads a prepared query for selecting a driver record by id.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getIdQuery()
	{
		if(null === $this->_query_id)
		{
			$this->_query_id	= $this->getConnection()->read(
				"SELECT * FROM {$this->getTable('Driver')} WHERE driverId = ?",
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_id;
	}
	
	
	
	/**
	 * Lazy-loads a prepared query for selecting a driver record 
	 * by first & last name.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getNameQuery()
	{
		if(null === $this->_query_name)
		{
			$this->_query_name	= $this->getConnection()->read("
				SELECT * FROM {$this->getTable('Driver')}
				WHERE firstName = ?
					AND lastName = ?",
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_name;
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
		else if($criteria->hasCriteriaFields(array('firstName', 'lastName')))
		{
			$firstName	= $criteria->getCriteriaValue('firstName');
			$lastName	= $criteria->getCriteriaValue('lastName');
			$query		= $this->getNameQuery();
			return $query->execute($params = array($firstName, $lastName));
		}
		
		return null;
	}
}  