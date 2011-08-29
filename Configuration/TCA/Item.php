<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_items_domain_model_item'] = array(
	'ctrl' => $TCA['tx_items_domain_model_item']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, preview, body_text, priority_item, start_date_time, end_date_time, categories, item_assets, related_items',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, preview, body_text;;2;richtext:rte_transform[flag=rte_enabled|mode=ts_css];4-4-4, priority_item, start_date_time, end_date_time, categories, item_assets, related_items,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_items_domain_model_item',
				'foreign_table_where' => 'AND tx_items_domain_model_item.pid=###CURRENT_PID### AND tx_items_domain_model_item.sys_language_uid IN (-1,0)',
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
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'preview' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.preview',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'body_text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.body_text',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 5
			),
		),
		'priority_item' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.priority_item',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'start_date_time' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.start_date_time',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'end_date_time' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.end_date_time',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0
			),
		),
		'categories' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.categories',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_items_domain_model_category',
				'MM' => 'tx_items_item_category_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_items_domain_model_category',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'item_assets' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.item_assets',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_items_domain_model_itemasset',
				'foreign_field' => 'item',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'related_items' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:items/Resources/Private/Language/locallang_db.xml:tx_items_domain_model_item.related_items',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_items_domain_model_item',
				'MM' => 'tx_items_item_item_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_items_domain_model_item',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
	),
);
?>