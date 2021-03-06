<?php



/**
 * Accessor for reading and caching driver entities from storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Accessor_Reader_Driver
extends Mephex_Model_Accessor_Reader_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Model_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Model_Nascar_Mapper_Driver $mapper
	 * @param Lidsys_Model_Nascar_Cache_Driver $cache
	 * @param Lidsys_Model_Nascar_Stream_Reader_Driver $stream
	 */
	public function __construct(
		Lidsys_Model_Nascar_Accessor_Group $accessor_group,
		Lidsys_Model_Nascar_Mapper_Driver $mapper,
		Lidsys_Model_Nascar_Cache_Driver $cache,
		Lidsys_Model_Nascar_Stream_Reader_Driver $stream
	) 
	{
		parent::__construct(
			$accessor_group,
			$mapper,
			$cache,
			$stream
		);
	}
}