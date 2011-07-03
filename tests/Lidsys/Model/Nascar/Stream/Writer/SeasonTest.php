<?php



class Lidsys_Model_Nascar_Stream_Writer_SeasonTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	protected $_ostream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Model_Nascar_Stream_Reader_Season(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
		$this->_ostream		= new Lidsys_Model_Nascar_Stream_Writer_Season(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testEntityCanBeUpdated()
	{
		$entity	= array(
			'seasonId'		=> 1,
			'seriesId'		=> 7,
			'year'			=> 2111,
			'relationTitle'	=> '2111 Fantasy Year',
			'maxPickCount'	=> 27
		);
		$this->_ostream->update($entity);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		$iter->rewind();
		$read	= $iter->current();
		
		$this->assertEquals(1,						$read['seasonId']);
		$this->assertEquals(7,						$read['seriesId']);
		$this->assertEquals(2111,					$read['year']);
		$this->assertEquals('2111 Fantasy Year',	$read['relationTitle']);
		$this->assertEquals(27,						$read['maxPickCount']);
	}
	
	
	
	public function testEntityCanBeInserted()
	{
		$entity	= array(
			'seriesId'		=> 8,
			'year'			=> 2424,
			'relationTitle'	=> '2424 Woohoo Racing',
			'maxPickCount'	=> 7,
		);
		$id	= $this->_ostream->create($entity);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => $id)));
		$iter->rewind();
		$read	= $iter->current();

		$this->assertTrue($read['seasonId'] > 0);
		$this->assertEquals($id,					$read['seasonId']);
		$this->assertEquals(8,						$read['seriesId']);
		$this->assertEquals(2424,					$read['year']);
		$this->assertEquals('2424 Woohoo Racing',	$read['relationTitle']);
		$this->assertEquals(7,						$read['maxPickCount']);
	}
}