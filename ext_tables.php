<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Items',
	'Items'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . items;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .items. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Manage Items');


t3lib_extMgm::addLLrefForTCAdescr('tx_items_domain_model_item', 'EXT:items/Resources/Private/Language/locallang_csh_tx_items_domain_model_item.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_items_domain_model_item');
$TCA['tx_items_domain_model_item'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Item.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_items_domain_model_item.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_items_domain_model_category', 'EXT:items/Resources/Private/Language/locallang_csh_tx_items_domain_model_category.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_items_domain_model_category');
$TCA['tx_items_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_category',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_items_domain_model_category.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_items_domain_model_itemasset', 'EXT:items/Resources/Private/Language/locallang_csh_tx_items_domain_model_itemasset.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_items_domain_model_itemasset');
$TCA['tx_items_domain_model_itemasset'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset',
		'label' => 'use_in_preview',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/ItemAsset.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_items_domain_model_itemasset.gif'
	),
);

?>