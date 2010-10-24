<?php



class Lidsys_Nascar_Accessor_Reader_TrackTest
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
		$this->_mapper	= new Lidsys_Nascar_Mapper_Track($this->_group);
		$this->_cache	= new Lidsys_Nascar_Cache_Track();
		$this->_stream	= new Lidsys_Nascar_Stream_Reader_Track($conn, $table_set);
		
		$this->_reader		= new Lidsys_Nascar_Accessor_Reader_Track(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_stream
		);
	}
	
	
	
	public function testReaderAccessorCanBeInitialized()
	{
	}
	

	
	public function testTrackCanBeReadById()
	{
		$entity	= $this->_reader->read(new Mephex_Model_Criteria_Array(array('id' => 6)));
		
		$this->assertEquals('6',					$entity->getId());
		$this->assertEquals('Daytona International Speedway',					
													$entity->getName());
		$this->assertEquals('Daytona',				$entity->getShortName());
		$this->assertEquals('Daytona Beach, FL',	$entity->getLocation());
		$this->assertEquals('2.5',					$entity->getLength());
	}
}