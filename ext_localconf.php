<?php
defined('TYPO3_MODE') || die ('Access denied.');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:vimeovideo/Configuration/PageTS/setup.ts">');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(

    // The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
    'Brightside.Vimeovideo',

     // A unique name of the plugin in UpperCamelCase
    'ContentRenderer',

    // An array holding the controller-action-combinations that are accessible
    array (
         // The first controller and its first action will be the default
        'Vimeovideo' => 'index',
    ),

    // An array of non-cachable controller-action-combinations (they must already be enabled)
    array (
    )
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
  'vimeovideo_icon',
  \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
  ['source' => 'EXT:vimeovideo/Resources/Public/Icons/ext_icon_content.svg']
);


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['vimeovideo_pi1'] =
   \Brightside\Vimeovideo\Hooks\PageLayoutView\NewContentElementPreviewRenderer::class;
