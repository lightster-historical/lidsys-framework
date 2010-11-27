<?php



/**
 * Writer used to store a series record to a storage system 
 * after mapping it from an entity.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Stream_Writer_Series
extends Mephex_Model_Stream_Writer_Database_InsertUpdate
{
	/**
	 * Generates the default insert generator.
	 * 
	 * @return Mephex_Db_Sql_Base_Generator_Insert
	 */
	protected function getDefaultInsertGenerator()
	{
		return $this->getConnection()->generateInsert(
			$this->getTable('Series'), 
			array(
				'keyname',
				'name',
				'shortName',
				'feedName'
			)
		);
	}
	
	
	
	/**
	 * Generates the default update generator.
	 * 
	 * @return Mephex_Db_Sql_Base_Generator_Update
	 */
	protected function getDefaultUpdateGenerator()
	{
		return $this->getConnection()->generateUpdate(
			$this->getTable('Series'), 
			array(
				'keyname',
				'name',
				'shortName',
				'feedName'
			),
			array(
				'seriesId'
			)
		);
	}
	
	
	
	/**
	 * Determines whether or not the record is a new record.
	 * 
	 * @param $data
	 * @return bool
	 */
	protected function isRecordNew($data)
	{
		return empty($data['seriesId']);
	}
}  