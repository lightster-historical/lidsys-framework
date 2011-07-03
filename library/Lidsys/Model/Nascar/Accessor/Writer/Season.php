<?php



/**
 * Accessor for writing season entities to storage
 * locations.
 * 
 * @author mlight
 */
class Lidsys_Model_Nascar_Accessor_Writer_Season
extends Mephex_Model_Accessor_Writer_Entity
{
	/**
	 * Override the constructor to tighten the type-hints.
	 * 
	 * @param Lidsys_Model_Nascar_Accessor_Group $accessor_group
	 * @param Lidsys_Model_Nascar_Mapper_Season $mapper
	 * @param Lidsys_Model_Nascar_Cache_Season $cache
	 * @param Lidsys_Model_Nascar_Stream_Writer_Season $stream
	 */
	public function __construct(
		Lidsys_Model_Nascar_Accessor_Group $accessor_group,
		Lidsys_Model_Nascar_Mapper_Season $mapper,
		Lidsys_Model_Nascar_Cache_Season $cache,
		Lidsys_Model_Nascar_Stream_Writer_Season $stream
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