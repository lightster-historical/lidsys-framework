<?php



/**
 * An entity that represents a NASCAR driver.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Entity_Driver
extends Mephex_Model_Entity
{	
	/**
	 * The driver id.
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * The driver's first name.
	 * 
	 * @var string
	 */
	protected $firstName;
	
	/**
	 * The driver's last name.
	 * 
	 * @var string
	 */
	protected $lastName;
	
	
	/**
	 * The text color used for displaying the driver name.
	 * 
	 * @var string
	 */
	protected $textColor;
	
	/**
	 * The background color used for displaying the driver name.
	 * 
	 * @var string
	 */
	protected $backgroundColor;
	
	/**
	 * The border color used for displaying the driver name.
	 * 
	 * @var string
	 */
	protected $borderColor;

	
	
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
	 * Getter for first name.
	 * 
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->getProperty('firstName');
	}
	
	
	
	/**
	 * Setter for first name.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setFirstName($firstName)
	{
		return $this->setProperty('firstName', $firstName);
	}

	
	
	/**
	 * Getter for last name.
	 * 
	 * @return string
	 */
	public function getLastName()
	{
		return $this->getProperty('lastName');
	}
	
	
	
	/**
	 * Setter for last name.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setLastName($lastName)
	{
		return $this->setProperty('lastName', $lastName);
	}

	
	
	/**
	 * Getter for text color.
	 * 
	 * @return string
	 */
	public function getTextColor()
	{
		return $this->getProperty('textColor');
	}
	
	
	
	/**
	 * Setter for text color.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setTextColor($textColor)
	{
		return $this->setProperty('textColor', $textColor);
	}

	
	
	/**
	 * Getter for background color.
	 * 
	 * @return string
	 */
	public function getBackgroundColor()
	{
		return $this->getProperty('backgroundColor');
	}
	
	
	
	/**
	 * Setter for background color.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setbackgroundColor($backgroundColor)
	{
		return $this->setProperty('backgroundColor', $backgroundColor);
	}

	
	
	/**
	 * Getter for border color.
	 * 
	 * @return string
	 */
	public function getBorderColor()
	{
		return $this->getProperty('borderColor');
	}
	
	
	
	/**
	 * Setter for border color.
	 * 
	 * @param string
	 * @return $this
	 */
	public function setBorderColor($borderColor)
	{
		return $this->setProperty('borderColor', $borderColor);
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