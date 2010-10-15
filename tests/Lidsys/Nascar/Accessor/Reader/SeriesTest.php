<?php



class Lidsys_Nascar_Accessor_ReaderSeriesTest
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
		$this->_mapper	= new Lidsys_Nascar_Mapper_Series($this->_group);
		$this->_cache	= new Lidsys_Nascar_Cache_Series();
		$this->_stream	= new Lidsys_Nascar_Stream_Reader_Series($conn, $table_set);
		
		$this->_reader		= new Lidsys_Nascar_Accessor_Reader_Series(
			$this->_group,
			$this->_mapper,
			$this->_cache,
			$this->_stream
		);
	}
	
	
	
	public function testReaderAccessorCanBeInitialized()
	{
	}
}