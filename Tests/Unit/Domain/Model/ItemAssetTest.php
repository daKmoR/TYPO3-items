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
 * Test case for class Tx_Items_Domain_Model_ItemAsset.
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
class Tx_Items_Domain_Model_ItemAssetTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Items_Domain_Model_ItemAsset
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Items_Domain_Model_ItemAsset();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getUseInPreviewReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getUseInPreview()
		);
	}

	/**
	 * @test
	 */
	public function setUseInPreviewForBooleanSetsUseInPreview() { 
		$this->fixture->setUseInPreview(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getUseInPreview()
		);
	}
	
	/**
	 * @test
	 */
	public function getAddAsDownloadReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getAddAsDownload()
		);
	}

	/**
	 * @test
	 */
	public function setAddAsDownloadForBooleanSetsAddAsDownload() { 
		$this->fixture->setAddAsDownload(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getAddAsDownload()
		);
	}
	
	/**
	 * @test
	 */
	public function getOverrideNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOverrideNameForStringSetsOverrideName() { 
		$this->fixture->setOverrideName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOverrideName()
		);
	}
	
	/**
	 * @test
	 */
	public function getOverrideDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOverrideDescriptionForStringSetsOverrideDescription() { 
		$this->fixture->setOverrideDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOverrideDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getOverrideCopyrightReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOverrideCopyrightForStringSetsOverrideCopyright() { 
		$this->fixture->setOverrideCopyright('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOverrideCopyright()
		);
	}
	
	/**
	 * @test
	 */
	public function getOverrideCaptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOverrideCaptionForStringSetsOverrideCaption() { 
		$this->fixture->setOverrideCaption('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOverrideCaption()
		);
	}
	
	/**
	 * @test
	 */
	public function getAssetReturnsInitialValueForTx_Items_Domain_Model_Asset() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getAsset()
		);
	}

	/**
	 * @test
	 */
	public function setAssetForTx_Items_Domain_Model_AssetSetsAsset() { 
		$dummyObject = new Tx_Items_Domain_Model_Asset();
		$this->fixture->setAsset($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getAsset()
		);
	}
	
}
?>