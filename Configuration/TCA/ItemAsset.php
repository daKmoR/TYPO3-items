<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_items_domain_model_itemasset'] = array(
	'ctrl' => $TCA['tx_items_domain_model_itemasset']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, use_in_preview, add_as_download, override_name, override_description, override_copyright, override_caption, asset',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, use_in_preview, add_as_download, override_name, override_description, override_copyright, override_caption, asset,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_items_domain_model_itemasset',
				'foreign_table_where' => 'AND tx_items_domain_model_itemasset.pid=###CURRENT_PID### AND tx_items_domain_model_itemasset.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'use_in_preview' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.use_in_preview',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'add_as_download' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.add_as_download',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'override_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.override_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'override_description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.override_description',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'override_copyright' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.override_copyright',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'override_caption' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.override_caption',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'asset' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_itemasset.asset',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_items_domain_model_asset',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'item' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
?>