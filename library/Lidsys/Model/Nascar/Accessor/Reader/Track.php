<?php



/**
 * Accessor for reading and caching track entities from storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Accessor_Reader_Track
extends Mephex_Model_Accessor_Reader_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Model_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Model_Nascar_Mapper_Track $mapper
	 * @param Lidsys_Model_Nascar_Cache_Track $cache
	 * @param Lidsys_Model_Nascar_Stream_Reader_Track $stream
	 */
	public function __construct(
		Lidsys_Model_Nascar_Accessor_Group $accessor_group,
		Lidsys_Model_Nascar_Mapper_Track $mapper,
		Lidsys_Model_Nascar_Cache_Track $cache,
		Lidsys_Model_Nascar_Stream_Reader_Track $stream
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