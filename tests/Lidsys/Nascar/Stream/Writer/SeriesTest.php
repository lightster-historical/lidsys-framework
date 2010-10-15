<?php



class Lidsys_Nascar_Stream_Writer_SeriesTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	protected $_ostream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Nascar_Stream_Reader_Series(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
		$this->_ostream		= new Lidsys_Nascar_Stream_Writer_Series(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testSeriesCanBeUpdated()
	{
		$series	= array(
			'seriesId'		=> 1,
			'keyname'		=> 'not_cup',
			'name'			=> 'Not Sprint Cup',
			'shortName'		=> 'Not Cup',
			'feedName'		=> 'nascar_not_cup'
		);
		$this->_ostream->write($series);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		$iter->rewind();
		$read	= $iter->current();
		
		$this->assertEquals('1',					$read['seriesId']);
		$this->assertEquals('not_cup',				$read['keyname']);
		$this->assertEquals('Not Sprint Cup',		$read['name']);
		$this->assertEquals('Not Cup',				$read['shortName']);
		$this->assertEquals('nascar_not_cup',		$read['feedName']);
	}
	
	
	
	public function testSeriesCanBeInserted()
	{
		$series	= array(
			'keyname'		=> 'modified',
			'name'			=> 'Whelen Modified',
			'shortName'		=> 'Modified',
			'feedName'		=> 'nascar_modified'
		);
		$this->_ostream->write($series);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('keyname' => 'modified')));
		$iter->rewind();
		$read	= $iter->current();

		$this->assertTrue($read['seriesId'] > 0);
		$this->assertEquals('modified',				$read['keyname']);
		$this->assertEquals('Whelen Modified',		$read['name']);
		$this->assertEquals('Modified',				$read['shortName']);
		$this->assertEquals('nascar_modified',		$read['feedName']);
	}
}