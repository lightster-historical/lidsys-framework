<?php



/**
 * Accessor group for accessing NASCAR-related entities.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Accessor_Group
extends Mephex_Model_Accessor_Group
{	
	/**
	 * Database connection used by the accessor group.
	 * @var Mephex_Db_Sql_Base_Connection
	 */
	protected $_db_connection;
	
	/**
	 * Database table set used by the accessor group.
	 * @var Mephex_Db_TableSet
	 */
	protected $_db_table_set;
	
	
	
	/**
	 * @param Mephex_Db_Sql_Base_Connection $connection - the DB connection the
	 * 		accessor group will use 
	 * @param Mephex_Db_TableSet $table_set - the table set the accessor group 
	 * 		will use
	 */
	public function __construct(
		Mephex_Db_Sql_Base_Connection $connection,
		Mephex_Db_TableSet $table_set = null)
	{
		$this->_db_connection	= $connection;
		$this->_db_table_set	= $table_set ? $table_set : new Mephex_Db_TableSet('nascar');
		
		parent::__construct();
	}
	
	
	
	/**
	 * Initializes the accessor group, including all accessors
	 * and caches.
	 */
	protected function init()
	{
	}
	
	
	
	/**
	 * Getter for DB connection.
	 * 
	 * @return Mephex_Db_Sql_Base_Connection
	 */
	protected function getDbConnection()
	{
		return $this->_db_connection;
	}
	
	
	
	/**
	 * Getter for DB table set.
	 * 
	 * @return Mephex_Db_TableSet
	 */
	protected function getDbTableSet()
	{
		return $this->_db_table_set;
	}
}