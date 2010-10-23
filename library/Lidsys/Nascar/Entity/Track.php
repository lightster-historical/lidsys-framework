<?php



/**
 * An entity that represents a NASCAR track.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Entity_Track
extends Mephex_Model_Entity
{	
	/**
	 * The track id.
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * The track name.
	 * 
	 * @var string
	 */
	protected $name;
	
	/**
	 * An abbreviated track name.
	 * 
	 * @var string
	 */
	protected $shortName;
	
	/**
	 * The location of the track.
	 * 
	 * @var string
	 */
	protected $location;
	
	/**
	 * The length of the track, in miles.
	 * 
	 * @var float
	 */
	protected $length;

	
	
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
	 * Getter for name.
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->getProperty('name');
	}
	
	
	
	/**
	 * Setter for name.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setName($name)
	{
		return $this->setProperty('name', $name);
	}

	
	
	/**
	 * Getter for short name.
	 * 
	 * @return string
	 */
	public function getShortName()
	{
		return $this->getProperty('shortName');
	}
	
	
	
	/**
	 * Setter for short name.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setShortName($shortName)
	{
		return $this->setProperty('shortName', $shortName);
	}

	
	
	/**
	 * Getter for location.
	 * 
	 * @return string
	 */
	public function getLocation()
	{
		return $this->getProperty('location');
	}
	
	
	
	/**
	 * Setter for location.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setLocation($location)
	{
		return $this->setProperty('location', $location);
	}

	
	
	/**
	 * Getter for length.
	 * 
	 * @return float
	 */
	public function getLength()
	{
		return $this->getProperty('length');
	}
	
	
	
	/**
	 * Setter for length.
	 * 
	 * @param float
	 * @return $this
	 */
	public function setLength($length)
	{
		return $this->setProperty('length', floatval($length));
	}
	
	
	
	/**
	 * Returns an identifier that makes this Track unique.
	 * 
	 * @return string
	 */
	public function getUniqueIdentifier()
	{
		return $this->getId();
	}
}