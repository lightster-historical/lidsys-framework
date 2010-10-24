<?php



/**
 * Accessor for reading and caching TV station entities from storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Accessor_Reader_TvStation
extends Mephex_Model_Accessor_Reader_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Nascar_Mapper_TvStation $mapper
	 * @param Lidsys_Nascar_Cache_TvStation $cache
	 * @param Lidsys_Nascar_Stream_Reader_TvStation $stream
	 */
	public function __construct(
		Lidsys_Nascar_Accessor_Group $accessor_group,
		Lidsys_Nascar_Mapper_TvStation $mapper,
		Lidsys_Nascar_Cache_TvStation $cache,
		Lidsys_Nascar_Stream_Reader_TvStation $stream
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