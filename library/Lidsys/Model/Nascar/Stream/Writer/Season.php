<?php



/**
 * Writer used to store a season record to a storage system 
 * after mapping it from an entity.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Stream_Writer_Season
extends Mephex_Model_Stream_Writer_Database_SequentialId
{
	/**
	 * Getter for the table name.
	 * 
	 * @return string
	 */
	protected function getStorageTable()
	{
		return $this->getTable('Season');
	}
	
	
	
	/**
	 * Getter for the array of field names (not including the sequential id field).
	 * 
	 * @return array
	 */
	protected function getStorageFields()
	{
		return array(
			'seriesId',
			'year',
			'relationTitle',
			//'pointSystemId',
			'maxPickCount',
			/*
			'chaseRaceNo',
			'chaseDriverCount',
			'chaseDriverByWinsCount',
			'chasePreChaseWinBonus',
			'chaseResetPoints',
			'chaseMaxAllowedRank',
			*/
		);
	}
	
	
	
	/**
	 * The name of the sequential id field.
	 * 
	 * @return string
	 */
	protected function getStorageSequentialIdField()
	{
		return 'seasonId';
	}
}  