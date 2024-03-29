<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Thomas Allmer <at@delusionworld.com>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package items
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Items_Domain_Repository_ItemRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * Finds all items that meets the settings.
	 *
	 * @param array $settings 
	 * @return array Matched labors
	 */
	public function findDemanded($settings) {
		$query = $this->createQuery();
		
		$constraints = array();
		
		if ($settings['showOnlyFutureItems']) {
			$constraints[] = $query->logicalOr(
				$query->greaterThan('start', mktime()),
				$query->greaterThan('end', mktime())
			);
		}
		
		if (count($constraints) > 0) {
			$query->matching($query->logicalAnd($constraints));
		}
		
		$query->setOrderings($settings['orderings']);
		$query->setLimit((int) $settings['limit']);
		return $query->execute();
	}

}
?>