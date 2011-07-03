<?php



/**
 * Accessor for reading and caching series entities from storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Accessor_Reader_Series
extends Mephex_Model_Accessor_Reader_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Model_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Model_Nascar_Mapper_Series $mapper
	 * @param Lidsys_Model_Nascar_Cache_Series $cache
	 * @param Lidsys_Model_Nascar_Stream_Reader_Series $stream
	 */
	public function __construct(
		Lidsys_Model_Nascar_Accessor_Group $accessor_group,
		Lidsys_Model_Nascar_Mapper_Series $mapper,
		Lidsys_Model_Nascar_Cache_Series $cache,
		Lidsys_Model_Nascar_Stream_Reader_Series $stream
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