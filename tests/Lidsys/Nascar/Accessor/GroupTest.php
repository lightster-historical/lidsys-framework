<?php



class Lidsys_Nascar_Accessor_GroupTest
extends Lidsys_Test_TestCase
{
	protected $_db_conn;
	protected $_table_set;
	
	protected $_group;
	
	
	
	public function setUp()
	{
		$this->_db_conn		= $this->getDbConnection('testing');
		$this->_table_set	= new Mephex_Db_TableSet('nascar');
		
		$this->loadXmlDataSetIntoDb($this->_db_conn, 'Lidsys_Nascar', 'stream');
		
		$this->_group	= new Stub_Lidsys_Nascar_Accessor_Group(
			$this->_db_conn, $this->_table_set
		);
	}
	
	
	
	public function testDbConnectionGetterReturnsSameObjectPassedToConstructor()
	{
		$this->assertTrue($this->_db_conn === $this->_group->getDbConnection());
	}
	
	
	
	public function testDbTableSetGetterReturnsSameObjectPassedToConstructor()
	{
		$this->assertTrue($this->_table_set === $this->_group->getDbTableSet());
	}
	
	
	
	public function testDbTableSetIsOptional()
	{
		$group	= new Stub_Lidsys_Nascar_Accessor_Group($this->_db_conn);
		$this->assertTrue($group->getDbTableSet() instanceof Mephex_Db_TableSet);
	}
}