<?php



/**
 * Writer used to store a series record to a storage system 
 * after mapping it from an entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Stream_Writer_Series
extends Mephex_Model_Stream_Writer_Database_SequentialId
{
	/**
	 * Getter for the table name.
	 * 
	 * @return string
	 */
	protected function getStorageTable()
	{
		return $this->getTable('Series');
	}
	
	
	
	/**
	 * Getter for the array of field names (not including the sequential id field).
	 * 
	 * @return array
	 */
	protected function getStorageFields()
	{
		return array(
			'keyname',
			'name',
			'shortName',
//			'feedName'
		);
	}
	
	
	
	/**
	 * The name of the sequential id field.
	 * 
	 * @return string
	 */
	protected function getStorageSequentialIdField()
	{
		return 'seriesId';
	}
}  