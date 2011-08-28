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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Items_Domain_Model_Item.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Manage Items
 *
 * @author Thomas Allmer <at@delusionworld.com>
 */
class Tx_Items_Domain_Model_ItemTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Items_Domain_Model_Item
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Items_Domain_Model_Item();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getPreviewReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setPreviewForStringSetsPreview() { 
		$this->fixture->setPreview('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getPreview()
		);
	}
	
	/**
	 * @test
	 */
	public function getBodyTextReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBodyTextForStringSetsBodyText() { 
		$this->fixture->setBodyText('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBodyText()
		);
	}
	
	/**
	 * @test
	 */
	public function getPriorityItemReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getPriorityItem()
		);
	}

	/**
	 * @test
	 */
	public function setPriorityItemForBooleanSetsPriorityItem() { 
		$this->fixture->setPriorityItem(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getPriorityItem()
		);
	}
	
	/**
	 * @test
	 */
	public function getStartDateTimeReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setStartDateTimeForDateTimeSetsStartDateTime() { }
	
	/**
	 * @test
	 */
	public function getEndDateTimeReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setEndDateTimeForDateTimeSetsEndDateTime() { }
	
	/**
	 * @test
	 */
	public function getCategoriesReturnsInitialValueForObjectStorageContainingTx_Items_Domain_Model_Category() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function setCategoriesForObjectStorageContainingTx_Items_Domain_Model_CategorySetsCategories() { 
		$category = new Tx_Items_Domain_Model_Category();
		$objectStorageHoldingExactlyOneCategories = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCategories->attach($category);
		$this->fixture->setCategories($objectStorageHoldingExactlyOneCategories);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCategories,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategories() {
		$category = new Tx_Items_Domain_Model_Category();
		$objectStorageHoldingExactlyOneCategory = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->addCategory($category);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategories() {
		$category = new Tx_Items_Domain_Model_Category();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($category);
		$localObjectStorage->detach($category);
		$this->fixture->addCategory($category);
		$this->fixture->removeCategory($category);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function getItemAssetsReturnsInitialValueForObjectStorageContainingTx_Items_Domain_Model_ItemAsset() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getItemAssets()
		);
	}

	/**
	 * @test
	 */
	public function setItemAssetsForObjectStorageContainingTx_Items_Domain_Model_ItemAssetSetsItemAssets() { 
		$itemAsset = new Tx_Items_Domain_Model_ItemAsset();
		$objectStorageHoldingExactlyOneItemAssets = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneItemAssets->attach($itemAsset);
		$this->fixture->setItemAssets($objectStorageHoldingExactlyOneItemAssets);

		$this->assertSame(
			$objectStorageHoldingExactlyOneItemAssets,
			$this->fixture->getItemAssets()
		);
	}
	
	/**
	 * @test
	 */
	public function addItemAssetToObjectStorageHoldingItemAssets() {
		$itemAsset = new Tx_Items_Domain_Model_ItemAsset();
		$objectStorageHoldingExactlyOneItemAsset = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneItemAsset->attach($itemAsset);
		$this->fixture->addItemAsset($itemAsset);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneItemAsset,
			$this->fixture->getItemAssets()
		);
	}

	/**
	 * @test
	 */
	public function removeItemAssetFromObjectStorageHoldingItemAssets() {
		$itemAsset = new Tx_Items_Domain_Model_ItemAsset();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($itemAsset);
		$localObjectStorage->detach($itemAsset);
		$this->fixture->addItemAsset($itemAsset);
		$this->fixture->removeItemAsset($itemAsset);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getItemAssets()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedItemsReturnsInitialValueForObjectStorageContainingTx_Items_Domain_Model_Item() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelatedItems()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedItemsForObjectStorageContainingTx_Items_Domain_Model_ItemSetsRelatedItems() { 
		$relatedItem = new Tx_Items_Domain_Model_Item();
		$objectStorageHoldingExactlyOneRelatedItems = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedItems->attach($relatedItem);
		$this->fixture->setRelatedItems($objectStorageHoldingExactlyOneRelatedItems);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRelatedItems,
			$this->fixture->getRelatedItems()
		);
	}
	
	/**
	 * @test
	 */
	public function addRelatedItemToObjectStorageHoldingRelatedItems() {
		$relatedItem = new Tx_Items_Domain_Model_Item();
		$objectStorageHoldingExactlyOneRelatedItem = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedItem->attach($relatedItem);
		$this->fixture->addRelatedItem($relatedItem);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRelatedItem,
			$this->fixture->getRelatedItems()
		);
	}

	/**
	 * @test
	 */
	public function removeRelatedItemFromObjectStorageHoldingRelatedItems() {
		$relatedItem = new Tx_Items_Domain_Model_Item();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($relatedItem);
		$localObjectStorage->detach($relatedItem);
		$this->fixture->addRelatedItem($relatedItem);
		$this->fixture->removeRelatedItem($relatedItem);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRelatedItems()
		);
	}
	
}
?>