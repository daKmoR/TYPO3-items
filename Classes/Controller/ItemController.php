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
class Tx_Items_Controller_ItemController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * itemRepository
	 *
	 * @var Tx_Items_Domain_Repository_ItemRepository
	 */
	protected $itemRepository;

	/**
	 * injectItemRepository
	 *
	 * @param Tx_Items_Domain_Repository_ItemRepository $itemRepository
	 * @return void
	 */
	public function injectItemRepository(Tx_Items_Domain_Repository_ItemRepository $itemRepository) {
		$this->itemRepository = $itemRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//$items = $this->itemRepository->findAll();
		$items = $this->itemRepository->findDemanded($this->settings);
		$this->view->assign('items', $items);
	}

	/**
	 * action show
	 *
	 * @param $item
	 * @return void
	 */
	public function showAction(Tx_Items_Domain_Model_Item $item) {
		$this->view->assign('item', $item);
	}

	/**
	 * action new
	 *
	 * @param $newItem
	 * @dontvalidate $newItem
	 * @return void
	 */
	public function newAction(Tx_Items_Domain_Model_Item $newItem = NULL) {
		if ($newItem == NULL) { // workaround for fluid bug ##5636
			$newItem = t3lib_div::makeInstance('Tx_Items_Domain_Model_Item');
		}
		$this->view->assign('newItem', $newItem);
	}

	/**
	 * action create
	 *
	 * @param $newItem
	 * @return void
	 */
	public function createAction(Tx_Items_Domain_Model_Item $newItem) {
		$this->itemRepository->add($newItem);
		$this->flashMessageContainer->add('Your new Item was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $item
	 * @return void
	 */
	public function editAction(Tx_Items_Domain_Model_Item $item) {
		$this->view->assign('item', $item);
	}

	/**
	 * action update
	 *
	 * @param $item
	 * @return void
	 */
	public function updateAction(Tx_Items_Domain_Model_Item $item) {
		$this->itemRepository->update($item);
		$this->flashMessageContainer->add('Your Item was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $item
	 * @return void
	 */
	public function deleteAction(Tx_Items_Domain_Model_Item $item) {
		$this->itemRepository->remove($item);
		$this->flashMessageContainer->add('Your Item was removed.');
		$this->redirect('list');
	}

}
?>