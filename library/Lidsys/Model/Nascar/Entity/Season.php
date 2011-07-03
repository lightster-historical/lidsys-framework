<?php



/**
 * An entity that represents a NASCAR season.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Entity_Season
extends Mephex_Model_Entity
{	
	/**
	 * The season id.
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * The series that this season is a part of.
	 * 
	 * @var Lidsys_Model_Nascar_Entity_Series
	 */
	protected $series;
	
	/**
	 * The season year.
	 * 
	 * @var year
	 */
	protected $year;
	
	/**
	 * Season title
	 * 
	 * @var string
	 */
	protected $title;
	
	
	/**
	 * The number of races before the chase starts.
	 * 
	 * @var int
	 */
	protected $chaseRaceNumber;
	
	/**
	 * The number of drivers that are part of the chase.
	 * 
	 * @var int
	 */
	protected $chaseDriverCount;
	
	
	/**
	 * The maximum number of picks a fantasy player can make per race.
	 * 
	 * @var int
	 */
	protected $maxPickCount;
	
	
	
	/**
	 * Getter for id.
	 * 
	 * @return int
	 */
	public function getId()
	{
		return $this->getProperty('id');
	}
	
	
	
	/**
	 * Setter for id.
	 * 
	 * @param int
	 * @return $this
	 */
	public function setId($id)
	{
		return $this->setProperty('id', intval($id));
	}
	
	
	
	/**
	 * Getter for series.
	 * 
	 * @return Lidsys_Model_Nascar_Entity_Series
	 */
	public function getSeries()
	{
		return $this->getProperty('series');
	}
	
	
	
	/**
	 * Setter for series.
	 * 
	 * @param Lidsys_Model_Nascar_Entity_Series
	 * @return $this
	 */
	public function setSeries(Lidsys_Model_Nascar_Entity_Series $series)
	{
		return $this->setProperty('series', $series);
	}
	
	
	
	/**
	 * Getter for year.
	 * 
	 * @return year
	 */
	public function getYear()
	{
		return $this->getProperty('year');
	}
	
	
	
	/**
	 * Setter for year.
	 * 
	 * @param year
	 * @return $this
	 */
	public function setYear($year)
	{
		return $this->setProperty('year', intval($year));
	}
	
	
	
	/**
	 * Getter for title.
	 * 
	 * @return string
	 */
	public function getTitle()
	{
		return $this->getProperty('title');
	}
	
	
	
	/**
	 * Setter for title.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setTitle($title)
	{
		return $this->setProperty('title', $title);
	}
	
	
	
	/**
	 * Getter for chase race number.
	 * 
	 * @return int
	 */
	public function getChaseRaceNumber()
	{
		return $this->getProperty('chaseRaceNumber');
	}
	
	
	
	/**
	 * Setter for chase race number.
	 * 
	 * @param int
	 * @return $this
	 */
	public function setChaseRaceNumber($chaseRaceNumber)
	{
		return $this->setProperty('chaseRaceNumber', intval($chaseRaceNumber));
	}
	
	
	
	/**
	 * Getter for chase driver count.
	 * 
	 * @return int
	 */
	public function getChaseDriverCount()
	{
		return $this->getProperty('chaseDriverCount');
	}
	
	
	
	/**
	 * Setter for chase driver count.
	 * 
	 * @param int
	 * @return $this
	 */
	public function setChaseDriverCount($chaseDriverCount)
	{
		return $this->setProperty('chaseDriverCount', intval($chaseDriverCount));
	}
	
	
	
	/**
	 * Getter for maximum pick count.
	 * 
	 * @return int
	 */
	public function getMaxPickCount()
	{
		return $this->getProperty('maxPickCount');
	}
	
	
	
	/**
	 * Setter for maximum pick count.
	 * 
	 * @param int
	 * @return $this
	 */
	public function setMaxPickCount($maxPickCount)
	{
		return $this->setProperty('maxPickCount', intval($maxPickCount));
	}
	
	
	
	/**
	 * Returns an identifier that makes this series unique.
	 * 
	 * @return string
	 */
	public function getUniqueIdentifier()
	{
		return $this->getId();
	}
	
	
	
	/**
	 * Determines if the property of the given name is allowed
	 * to be set to a reference.
	 * 
	 * @param bool $name
	 */
	protected function isReferencedPropertyAllowed($name)
	{
		return ($name === 'series'
			? true
			: parent::isReferencedPropertyAllowed($name)
		);
	}
}