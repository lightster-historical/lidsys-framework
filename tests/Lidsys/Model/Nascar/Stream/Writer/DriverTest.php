<?php



class Lidsys_Model_Nascar_Stream_Writer_DriverTest
extends Lidsys_Test_TestCase
{
	protected $_istream;
	protected $_ostream;
	
	
	
	public function setUp()
	{
		$conn	= $this->getDbConnection('testing');
		$this->loadXmlDataSetIntoDb($conn, 'Lidsys_Model_Nascar', 'stream');
		
		$this->_istream		= new Lidsys_Model_Nascar_Stream_Reader_Driver(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
		$this->_ostream		= new Lidsys_Model_Nascar_Stream_Writer_Driver(
			$conn,
			new Mephex_Db_TableSet('nascar')
		);
	}
	
	
	
	public function testEntityCanBeUpdated()
	{
		$entity	= array(
			'driverId'		=> 1,
			'firstName'		=> 'Firstfirst',
			'lastName'		=> 'Lastlast',
		);
		$this->_ostream->update($entity);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => 1)));
		$iter->rewind();
		$read	= $iter->current();
		
		$this->assertEquals(1,						$read['driverId']);
		$this->assertEquals('Firstfirst',			$read['firstName']);
		$this->assertEquals('Lastlast',				$read['lastName']);
	}
	
	
	
	public function testEntityCanBeInserted()
	{
		$entity	= array(
			'firstName'		=> 'Newfirst',
			'lastName'		=> 'Newlast',
		);
		$id	= $this->_ostream->create($entity);
		
		$iter	= $this->_istream->read(new Mephex_Model_Criteria_Array(array('id' => $id)));
		$iter->rewind();
		$read	= $iter->current();

		$this->assertTrue($read['driverId'] > 0);
		$this->assertEquals($id,					$read['driverId']);
		$this->assertEquals('Newfirst',				$read['firstName']);
		$this->assertEquals('Newlast',				$read['lastName']);
	}
}