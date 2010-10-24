<?php



/**
 * Accessor for reading and caching season entities from storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Accessor_Reader_Season
extends Mephex_Model_Accessor_Reader_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Nascar_Mapper_Season $mapper
	 * @param Lidsys_Nascar_Cache_Season $cache
	 * @param Lidsys_Nascar_Stream_Reader_Season $stream
	 */
	public function __construct(
		Lidsys_Nascar_Accessor_Group $accessor_group,
		Lidsys_Nascar_Mapper_Season $mapper,
		Lidsys_Nascar_Cache_Season $cache,
		Lidsys_Nascar_Stream_Reader_Season $stream
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