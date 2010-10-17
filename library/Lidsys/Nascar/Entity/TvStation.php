<?php



/**
 * An entity that represents a NASCAR TV station.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Entity_TvStation
extends Mephex_Model_Entity
{	
	/**
	 * The TV station id.
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * The TV station name.
	 * 
	 * @var string
	 */
	protected $name;

	
	
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
	 * Returns an identifier that makes this TV Station unique.
	 * 
	 * @return string
	 */
	public function getUniqueIdentifier()
	{
		return $this->getId();
	}
}