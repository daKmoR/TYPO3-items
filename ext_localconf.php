<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Items',
	array(
		'Item' => 'list, show, new, create, edit, update, delete',
		'Category' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Item' => 'create, update, delete',
		'Category' => 'create, update, delete',
		
	)
);

?>