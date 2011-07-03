<?php



class Lidsys_Model_Nascar_Accessor_GroupTest
extends Lidsys_Test_TestCase
{
	protected $_db_conn;
	protected $_table_set;
	
	protected $_group;
	
	
	
	public function setUp()
	{
		$this->_db_conn		= $this->getDbConnection('testing');
		$this->_table_set	= new Mephex_Db_TableSet('nascar');
		
		$this->loadXmlDataSetIntoDb($this->_db_conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_group	= new Stub_Lidsys_Model_Nascar_Accessor_Group(
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
		$group	= new Stub_Lidsys_Model_Nascar_Accessor_Group($this->_db_conn);
		$this->assertTrue($group->getDbTableSet() instanceof Mephex_Db_TableSet);
	}
	
	
	
	public function testSeriesCacheIsRegistered()
	{
		$this->assertTrue(
			$this->_group->getCache('Series')
			instanceof Lidsys_Model_Nascar_Cache_Series
		);
	}
	
	
	
	public function testSeriesReaderIsRegistered()
	{
		$this->assertTrue(
			$this->_group->getReader('Series')
			instanceof Lidsys_Model_Nascar_Accessor_Reader_Series
		);
	}
	

	
	public function testSeriesCanBeRead()
	{
		$entity	= $this->_group->getSeries(new Mephex_Model_Criteria_Array(array('id' => 1)));
		
		$this->assertEquals('1',					$entity->getId());
		$this->assertEquals('cup',					$entity->getKeyName());
		$this->assertEquals('Sprint Cup',			$entity->getTitle());
		$this->assertEquals('Cup',					$entity->getShortTitle());
//		$this->assertEquals('nascar_cup',			$series['feedName']);
	}
}