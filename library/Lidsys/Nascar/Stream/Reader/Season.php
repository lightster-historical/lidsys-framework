<?php



/**
 * Reader used to load a season record from a storage system 
 * before mapping it to an entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Stream_Reader_Season
extends Mephex_Model_Stream_Reader_Database
{
	/**
	 * Lazy-loaded prepared query for selecting a season record by id.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_id		= null;
	
	/**
	 * Lazy-loaded prepared query for selecting a season record by 
	 * series key name and year.
	 * 
	 * @var Mephex_Db_Base_Query
	 */
	protected $_query_keyname_year	= null;
	
	
	
	/**
	 * Lazy-loads a prepared query for selecting a season record by id.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getIdQuery()
	{
		if(null === $this->_query_id)
		{
			$this->_query_id	= $this->getConnection()->read(
				"SELECT * FROM {$this->getTable('Season')} WHERE seasonId = ?",
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_id;
	}
	
	
	
	/**
	 * Lazy-loads a prepared query for selecting a season record by 
	 * year and series key name.
	 * 
	 * @return Mephex_Db_Base_Query
	 */
	protected function getSeriesKeyNameAndYearQuery()
	{
		if(null === $this->_query_keyname_year)
		{
			$this->_query_keyname_year	= $this->getConnection()->read("
				SELECT * 
				FROM {$this->getTable('Season')} AS season
				INNER JOIN {$this->getTable('Series')} AS series
					ON season.seriesId = series.seriesId
				WHERE series.keyname = ?
					AND season.year = ?",
				Mephex_Db_Sql_Base_Query::PREPARE_NATIVE
			);
		}
		
		return $this->_query_keyname_year;
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
		else if($criteria->hasCriteriaFields(array('series', 'year')))
		{
			$series		= $criteria->getCriteriaValue('series');
			$keyName	= ($series instanceof Lidsys_Nascar_Entity_Series
				? $series->getKeyName() 
				: $series
			);
			$year		= $criteria->getCriteriaValue('year');
			$query		= $this->getSeriesKeyNameAndYearQuery();
			return $query->execute($params = array($keyName, $year));
		}
		
		return null;
	}
}  