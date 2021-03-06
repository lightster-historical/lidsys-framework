<?php



class Lidsys_Model_Nascar_Entity_SeasonTest
extends Lidsys_Test_TestCase
{
	protected $_season;
	
	
	
	public function setUp()
	{
		$this->_season		= new Lidsys_Model_Nascar_Entity_Season();
	}
	
	
	
	public function testIdCanBeStoredAndRetrieved()
	{
		$id	= 3;
		$this->_season->setId($id);
		$this->assertEquals($id, $this->_season->getId());
	}
	
	
	
	public function testIdSetterCastsIdToInt()
	{
		$this->_season->setId('yow!');
		$this->assertEquals(0, $this->_season->getId());
		
		$this->_season->setId('-2yow!');
		$this->assertEquals(-2, $this->_season->getId());
	}
	
	
	
	public function testIdSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_season === $this->_season->setId(3));
	}
	
	
	
	public function testSeriesCanBeStoredAndRetrieved()
	{
		$series	 = new Lidsys_Model_Nascar_Entity_Series();
		$series->setId(1);
		
		$this->_season->setSeries($series);
		$this->assertEquals($series, $this->_season->getSeries());
	}
	
	
	
	public function testSeriesSetterReturnsOwnerObject()
	{
		$series	= new Lidsys_Model_Nascar_Entity_Series();
		$this->assertTrue($this->_season === $this->_season->setSeries($series));
	}
	
	
	
	public function testSeriesCanBeSetByReference()
	{
		$group	= new Stub_Mephex_Model_Accessor_Group();
		
		$reference	= new Mephex_Model_Entity_Reference(
			new Stub_Mephex_Model_Accessor_Reader(
				$group,
				new Stub_Mephex_Model_Mapper($group),
				new Stub_Mephex_Model_Cache(),
				new Stub_Mephex_Model_Stream_Reader()
			),
			new Mephex_Model_Criteria_Array(array('seriesId' => 1))
		);
		$this->_season->setReferencedProperty('series', $reference);
	}
	
	
	
	public function testYearCanBeStoredAndRetrieved()
	{
		$year	= 2010;
		$this->_season->setYear($year);
		$this->assertEquals($year, $this->_season->getYear());
	}
	
	
	
	public function testYearSetterCastsIdToInt()
	{
		$this->_season->setYear('yow!');
		$this->assertEquals(0, $this->_season->getYear());
		
		$this->_season->setYear('-2yow!');
		$this->assertEquals(-2, $this->_season->getYear());
	}
	
	
	
	public function testYearSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_season === $this->_season->setYear(2010));
	}
	
	
	
	public function testTitleCanBeStoredAndRetrieved()
	{
		$title	= '2010 Cup';
		$this->_season->setTitle($title);
		$this->assertEquals($title, $this->_season->getTitle());
	}
	
	
	
	public function testTitleSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_season === $this->_season->setTitle('2010 Cup'));
	}
	
	
	
	public function testChaseRaceNumberCanBeStoredAndRetrieved()
	{
		$num	= 26;
		$this->_season->setChaseRaceNumber($num);
		$this->assertEquals($num, $this->_season->getChaseRaceNumber());
	}
	
	
	
	public function testChaseRaceNumberSetterCastsIdToInt()
	{
		$this->_season->setChaseRaceNumber('yow!');
		$this->assertEquals(0, $this->_season->getChaseRaceNumber());
		
		$this->_season->setChaseRaceNumber('-2yow!');
		$this->assertEquals(-2, $this->_season->getChaseRaceNumber());
	}
	
	
	
	public function testChaseRaceNumberSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_season === $this->_season->setChaseRaceNumber(26));
	}
	
	
	
	public function testChaseDriverCountCanBeStoredAndRetrieved()
	{
		$num	= 12;
		$this->_season->setChaseDriverCount($num);
		$this->assertEquals($num, $this->_season->getChaseDriverCount());
	}
	
	
	
	public function testChaseDriverCountSetterCastsIdToInt()
	{
		$this->_season->setChaseDriverCount('yow!');
		$this->assertEquals(0, $this->_season->getChaseDriverCount());
		
		$this->_season->setChaseDriverCount('-2yow!');
		$this->assertEquals(-2, $this->_season->getChaseDriverCount());
	}
	
	
	
	public function testChaseDriverCountSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_season === $this->_season->setChaseDriverCount(12));
	}
	
	
	
	public function testMaxPickCountCanBeStoredAndRetrieved()
	{
		$num	= 5;
		$this->_season->setMaxPickCount($num);
		$this->assertEquals($num, $this->_season->getMaxPickCount());
	}
	
	
	
	public function testMaxPickCountSetterCastsIdToInt()
	{
		$this->_season->setMaxPickCount('yow!');
		$this->assertEquals(0, $this->_season->getMaxPickCount());
		
		$this->_season->setMaxPickCount('-2yow!');
		$this->assertEquals(-2, $this->_season->getMaxPickCount());
	}
	
	
	
	public function testMaxPickCountSetterReturnsOwnerObject()
	{
		$this->assertTrue($this->_season === $this->_season->setMaxPickCount(5));
	}
	
	
	
	public function testUniqueIdentifierIsSeriesKeyName()
	{
		$id		= 3;
		$this->_season->setId($id);
		$this->assertEquals($this->_season->getId(), $this->_season->getUniqueIdentifier());
	}
}