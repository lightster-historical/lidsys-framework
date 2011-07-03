<?php



/**
 * An entity that represents a NASCAR series.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Entity_Series
extends Mephex_Model_Entity
{	
	/**
	 * The series id.
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * Series key name
	 * 
	 * @var string
	 */
	protected $keyName;
	
	/**
	 * Series title (e.g. 'Sprint Cup')
	 * 
	 * @var string
	 */
	protected $title;
	
	/**
	 * Short title (e.g. 'Cup')
	 * 
	 * @var string
	 */
	protected $shortTitle;

	
	
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
	 * Getter for key name.
	 * 
	 * @return string
	 */
	public function getKeyName()
	{
		return $this->getProperty('keyName');
	}
	
	
	
	/**
	 * Setter for key name.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setKeyName($keyName)
	{
		return $this->setProperty('keyName', $keyName);
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
	 * Getter for short title.
	 * 
	 * @return string
	 */
	public function getShortTitle()
	{
		return $this->getProperty('shortTitle');
	}
	
	
	
	/**
	 * Setter for short title.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setShortTitle($shortTitle)
	{
		return $this->setProperty('shortTitle', $shortTitle);
	}
	
	
	
	/**
	 * Returns an identifier that makes this series unique.
	 * 
	 * @return string
	 */
	public function getUniqueIdentifier()
	{
		return $this->getKeyName();
	}
}