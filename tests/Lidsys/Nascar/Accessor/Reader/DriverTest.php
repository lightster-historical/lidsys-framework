<?php



class Lidsys_Nascar_Accessor_Reader_DriverTest
extends Lidsys_Test_TestCase
{
	protected $_group;
	protected $_mapper;
	protected $_cache;
	protected $_stream;
	
	protected $_reader;
	
	
	
	public function setUp()
	{
		$conn		= $this->getDbConnection('testing');
		$table_set	= new Mephex_Db_TableSet('nascar');
		
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Nascar', 'stream');
		
		$this->_group	= new Lidsys_Nascar_Accessor_Group($conn, $table_set);
		$this->_mapper	= new Lidsys_Nascar_Mapper_Driver($this->_group);
		$this->_cache	= new Lidsys_Nascar_Cache_Driver();
		$this->_stream	= new Lidsys_Nascar_Stream_Reader_Driver($conn, $table_set);
		
		$this->_reader		= new Lidsys_Nascar_Accessor_Reader_Driver(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_stream
		);
	}
	
	
	
	public function testReaderAccessorCanBeInitialized()
	{
	}
	

	
	public function testDriverCanBeReadById()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 24)));
		
		$this->assertEquals('24',					$entity->getId());
		$this->assertEquals('Jeff',					$entity->getFirstName());
		$this->assertEquals('Gordon',				$entity->getLastName());
		$this->assertEquals('gold',					$entity->getTextColor());
		$this->assertEquals('navy',					$entity->getBackgroundColor());
		$this->assertEquals('red',					$entity->getBorderColor());
	}
	

	
	public function testDriverCanBeReadByName()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('firstName' => 'Jamie', 'lastName' => 'McMurray')));
		
		$this->assertEquals('1',					$entity->getId());
		$this->assertEquals('Jamie',				$entity->getFirstName());
		$this->assertEquals('McMurray',				$entity->getLastName());
		$this->assertEquals('black',				$entity->getTextColor());
		$this->assertEquals('orange',				$entity->getBackgroundColor());
		$this->assertEquals('yellow',				$entity->getBorderColor());
	}
}