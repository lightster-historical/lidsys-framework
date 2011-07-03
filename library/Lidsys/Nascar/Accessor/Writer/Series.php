<?php



/**
 * Accessor for writing series entities to storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Nascar_Accessor_Writer_Series
extends Mephex_Model_Accessor_Writer_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Nascar_Mapper_Series $mapper
	 * @param Lidsys_Nascar_Cache_Series $cache
	 * @param Lidsys_Nascar_Stream_Writer_Series $stream
	 */
	public function __construct(
		Lidsys_Nascar_Accessor_Group $accessor_group,
		Lidsys_Nascar_Mapper_Series $mapper,
		Lidsys_Nascar_Cache_Series $cache,
		Lidsys_Nascar_Stream_Writer_Series $stream
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