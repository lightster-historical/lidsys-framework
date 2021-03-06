<?php



/**
 * Writer used to store a driver record to a storage system 
 * after mapping it from an entity.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Stream_Writer_Driver
extends Mephex_Model_Stream_Writer_Database_SequentialId
{
	/**
	 * Getter for the table name.
	 * 
	 * @return string
	 */
	protected function getStorageTable()
	{
		return $this->getTable('Driver');
	}
	
	
	
	/**
	 * Getter for the array of field names (not including the sequential id field).
	 * 
	 * @return array
	 */
	protected function getStorageFields()
	{
		return array(
			'firstName',
			'lastName',
		);
	}
	
	
	
	/**
	 * The name of the sequential id field.
	 * 
	 * @return string
	 */
	protected function getStorageSequentialIdField()
	{
		return 'driverId';
	}
}  