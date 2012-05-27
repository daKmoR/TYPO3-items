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
class Tx_Items_Domain_Model_Item extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * preview
	 *
	 * @var string
	 */
	protected $preview;

	/**
	 * bodyText
	 *
	 * @var string
	 */
	protected $bodyText;

	/**
	 * priorityItem
	 *
	 * @var boolean
	 */
	protected $priorityItem;

	/**
	 * start
	 *
	 * @var DateTime
	 */
	protected $start;

	/**
	 * end
	 *
	 * @var DateTime
	 */
	protected $end;

	/**
	 * categories
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_Category>
	 */
	protected $categories;

	/**
	 * itemAssets
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_ItemAsset>
	 */
	protected $itemAssets;

	/**
	 * relatedItems
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_Item>
	 */
	protected $relatedItems;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->categories = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->itemAssets = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->relatedItems = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the preview
	 *
	 * @return string $preview
	 */
	public function getPreview() {
		return $this->preview ? $this->preview : $this->getBodyText();
	}

	/**
	 * Sets the preview
	 *
	 * @param string $preview
	 * @return void
	 */
	public function setPreview($preview) {
		$this->preview = $preview;
	}

	/**
	 * Returns the bodyText
	 *
	 * @return string $bodyText
	 */
	public function getBodyText() {
		return $this->bodyText;
	}

	/**
	 * Sets the bodyText
	 *
	 * @param string $bodyText
	 * @return void
	 */
	public function setBodyText($bodyText) {
		$this->bodyText = $bodyText;
	}

	/**
	 * Returns the priorityItem
	 *
	 * @return boolean $priorityItem
	 */
	public function getPriorityItem() {
		return $this->priorityItem;
	}

	/**
	 * Sets the priorityItem
	 *
	 * @param boolean $priorityItem
	 * @return void
	 */
	public function setPriorityItem($priorityItem) {
		$this->priorityItem = $priorityItem;
	}

	/**
	 * Returns the boolean state of priorityItem
	 *
	 * @return boolean
	 */
	public function isPriorityItem() {
		return $this->getPriorityItem();
	}

	/**
	 * Returns the start
	 *
	 * @return DateTime $start
	 */
	public function getStart() {
		return $this->start;
	}

	/**
	 * Sets the start
	 *
	 * @param DateTime $start
	 * @return void
	 */
	public function setStart($start) {
		$this->start = $start;
	}

	/**
	 * Returns the end
	 *
	 * @return DateTime $end
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * Sets the end
	 *
	 * @param DateTime $end
	 * @return void
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * Adds a Category
	 *
	 * @param Tx_Items_Domain_Model_Category $category
	 * @return void
	 */
	public function addCategory(Tx_Items_Domain_Model_Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param Tx_Items_Domain_Model_Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(Tx_Items_Domain_Model_Category $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}

	/**
	 * Returns the categories
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_Category> $categories
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets the categories
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_Category> $categories
	 * @return void
	 */
	public function setCategories(Tx_Extbase_Persistence_ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Adds a ItemAsset
	 *
	 * @param Tx_Items_Domain_Model_ItemAsset $itemAsset
	 * @return void
	 */
	public function addItemAsset(Tx_Items_Domain_Model_ItemAsset $itemAsset) {
		$this->itemAssets->attach($itemAsset);
	}

	/**
	 * Removes a ItemAsset
	 *
	 * @param Tx_Items_Domain_Model_ItemAsset $itemAssetToRemove The ItemAsset to be removed
	 * @return void
	 */
	public function removeItemAsset(Tx_Items_Domain_Model_ItemAsset $itemAssetToRemove) {
		$this->itemAssets->detach($itemAssetToRemove);
	}

	/**
	 * Returns the itemAssets
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_ItemAsset> $itemAssets
	 */
	public function getItemAssets() {
		return $this->itemAssets;
	}

	/**
	 * Sets the itemAssets
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_ItemAsset> $itemAssets
	 * @return void
	 */
	public function setItemAssets(Tx_Extbase_Persistence_ObjectStorage $itemAssets) {
		$this->itemAssets = $itemAssets;
	}

	/**
	 * Adds a Item
	 *
	 * @param Tx_Items_Domain_Model_Item $relatedItem
	 * @return void
	 */
	public function addRelatedItem(Tx_Items_Domain_Model_Item $relatedItem) {
		$this->relatedItems->attach($relatedItem);
	}

	/**
	 * Removes a Item
	 *
	 * @param Tx_Items_Domain_Model_Item $relatedItemToRemove The Item to be removed
	 * @return void
	 */
	public function removeRelatedItem(Tx_Items_Domain_Model_Item $relatedItemToRemove) {
		$this->relatedItems->detach($relatedItemToRemove);
	}

	/**
	 * Returns the relatedItems
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_Item> $relatedItems
	 */
	public function getRelatedItems() {
		return $this->relatedItems;
	}

	/**
	 * Sets the relatedItems
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Items_Domain_Model_Item> $relatedItems
	 * @return void
	 */
	public function setRelatedItems(Tx_Extbase_Persistence_ObjectStorage $relatedItems) {
		$this->relatedItems = $relatedItems;
	}

}
?>