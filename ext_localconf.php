<?php
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use Brightside\Vimeovideo\Evaluation\HoursMinutesSeconds;

defined('TYPO3') || die ('Access denied.');

(function () {
    $versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
    // Only include page.tsconfig if TYPO3 version is below 13 so that it is not imported twice.
    if ($versionInformation->getMajorVersion() < 13) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
            @import "EXT:vimeovideo/Configuration/TSConfig/wizard.tsconfig"
        ');
    }

  $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
  $iconRegistry->registerIcon(
    'vimeovideo_icon',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:vimeovideo/Resources/Public/Icons/ext_icon_content.svg']
  );

  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][HoursMinutesSeconds::class] = '';
})();