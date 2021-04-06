<?php
defined('TYPO3_MODE') || die('Access denied.');
	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['vimeovideo_pi1'] =  'vimeovideo_icon';

	array_splice(
		$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'],
		6,
		0,
		array(
			array(
				'Vimeo Video',
				'vimeovideo_pi1',
				'vimeovideo_icon'
			)
		)
	);

$tempColumns = array(
	'tx_vimeovideo_url' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_url.title',
		'config' => array(
			'type' => 'input',
			'size' => '50',
			'eval' => 'required',
			'requiredCond' => '!field',
		),
	),
	'tx_vimeovideo_caption' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_caption.title',
		'config' => array(
			'type' => 'input',
			'size' => '50',
		),
	),
	'tx_vimeovideo_autoplay' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_autoplay.title',
		'config' => array (
			'type' => 'check',
			'items' => array(
                 array(
                 	'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                 ),
            ),
		),
	),
	'tx_vimeovideo_loop' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_loop.title',
		'config' => array (
			'type' => 'check',
			'items' => array(
                 array(
                 	'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                 ),
            ),
		),
	),
	'tx_vimeovideo_title' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_title.title',
		'config' => array (
			'type' => 'check',
			'items' => array(
                 array(
                 	'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                 ),
            ),
		),
	),
	'tx_vimeovideo_ratio' => array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_ratio.title',
        'config'  => array(
			'type'     => 'select',
			'renderType' => 'selectSingle',
            'items'    => array(), /* items set in page TsConfig */
            'size'     => 1,
            'maxitems' => 1
        )
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tt_content', 'EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf');


$GLOBALS['TCA']['tt_content']['types']['vimeovideo_pi1']['showitem'] = '

	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
            --palette--;LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimevideo.title;vimeovideoMain,
			--palette--;LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo.settings;vimeovideoSettings,

        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
            rowDescription,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
		--div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
	';

$GLOBALS['TCA']['tt_content']['palettes']['vimeovideoMain']['showitem'] = '
	tx_vimeovideo_url,
	--linebreak--,
	tx_vimeovideo_caption';

$GLOBALS['TCA']['tt_content']['palettes']['vimeovideoSettings']['showitem'] = '
	tx_vimeovideo_ratio,
	--linebreak--,
	tx_vimeovideo_autoplay,tx_vimeovideo_loop,tx_vimeovideo_title,

 ';

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['vimeovideo_pi1'] =  'vimeovideo_icon';
