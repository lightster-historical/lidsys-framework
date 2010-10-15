<?php



/**
 * Writer used to store a series record to a storage system 
 * after mapping it from an entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Stream_Writer_Series
extends Mephex_Model_Stream_Writer_Database
{
	/**
	 * Lazy-loaded prepared query for inserting a series record.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_insert	= null;
	
	/**
	 * Lazy-loaded prepared query for updating a series record.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_update	= null;
	
	
	
	/**
	 * Lazy-loads a prepared query for inserting a series record.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getInsertQuery()
	{
		if(null === $this->_query_insert)
		{
			$insert		= new Mephex_Db_Sql_Base_Insert(
				$this->getTable('Series'), 
				array(
					'keyname',
					'name',
					'shortName',
					'feedName'
				)
			);
			$this->_query_insert	= $this->getConnection()->write(
				$insert->getSql(),
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_insert;
	}
	
	
	
	/**
	 * Lazy-loads a prepared query for updating a series record.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getUpdateQuery()
	{
		if(null === $this->_query_update)
		{
			$this->_query_update	= $this->getConnection()->write(
				"	UPDATE {$this->getTable('Series')}
					SET	keyname 	= ?,
						name		= ?,
						shortName	= ?,
						feedName	= ?
					WHERE seriesId	= ?
				",
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_update;
	}
	
	
	
	/**
	 * Writes the given records.
	 * 
	 * @param $data
	 * @return bool 
	 */
	public function write($data)
	{
		if(isset($data['seriesId']))
		{
			return $this->getUpdateQuery()->execute($tmp = array(
				$data['keyname'],
				$data['name'],
				$data['shortName'],
				$data['feedName'],
				$data['seriesId']
			));
		}			
		else
		{
			return $this->getInsertQuery()->execute($tmp = array(
				$data['keyname'],
				$data['name'],
				$data['shortName'],
				$data['feedName']
			));
		}
	}
}  