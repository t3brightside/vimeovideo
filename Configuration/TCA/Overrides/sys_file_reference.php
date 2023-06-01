<?php

$vimeoVideoColumns = array(
  'tx_vimeovideo_starttime' => array(
    'exclude' => 0,
    'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_starttime.title',
    'config' => array(
      'type' => 'input',
      'size' => '8',
      'eval' => 'trim,nospace,Brightside\Vimeovideo\Evaluation\HoursMinutesSeconds',
      'behaviour' => [
        'allowLanguageSynchronization' => true,
      ],
    ),
  ),
  'tx_vimeovideo_endtime' => array(
    'exclude' => 0,
    'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_endtime.title',
    'config' => array(
      'type' => 'input',
      'size' => '1',
      'eval' => 'trim,nospace,Brightside\Vimeovideo\Evaluation\HoursMinutesSeconds',
      'behaviour' => [
        'allowLanguageSynchronization' => true,
      ],
    ),
  ),
  'tx_vimeovideo_ratio' => array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_ratio.title',
        'config'  => array(
            'type'     => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Widescreen (16:9)', 0],
                ['Vertical (9:16)', 'vertical'],
                ['Square (1:1)', 'square'],
            ],
            'size'     => 1,
            'maxitems' => 1,
            'behaviour' => [
              'allowLanguageSynchronization' => true,
            ]
        )
    ),
    'tx_vimeovideo_mute' => array (
      'exclude' => 1,
      'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_mute.title',
      'config' => [
        'type' => 'check',
        'renderType' => 'checkboxToggle',
        'behaviour' => [
          'allowLanguageSynchronization' => true,
        ],
        'items' => [
          [
            0 => '',
            1 => '',
          ]
        ],
      ]
    ),
  'tx_vimeovideo_loop' => array (
    'exclude' => 1,
    'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_loop.title',
    'config' => [
      'type' => 'check',
      'renderType' => 'checkboxToggle',
      'behaviour' => [
        'allowLanguageSynchronization' => true,
      ],
      'items' => [
        [
          0 => '',
          1 => '',
        ]
      ],
    ]
  ),
  'tx_vimeovideo_coverimage' => [
    'exclude' => 1,
    'label' => 'LLL:EXT:vimeovideo/Resources/Private/Language/locallang_db.xlf:tx_vimeovideo_cover.image',
    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
      'tx_vimeovideo_coverimage',
      [
        'behaviour' => [
          'allowLanguageSynchronization' => true,
        ],
        'overrideChildTca' => [
          'columns' => [
            'crop' => [
              'config' => [
                'cropVariants' => [
                  'widescreen' => [
                    'title' => 'Widescreen (16:9)',
                    'selectedRatio' => '16:9',
                    'allowedAspectRatios' => [
                      '16:9' => [
                        'title' => 'Widescreen',
                        'value' => 16 / 9,
                      ],
                    ],
                  ],
                  'vertical' => [
                    'title' => 'Vertical (9:16)',
                    'selectedRatio' => '9:16',
                    'allowedAspectRatios' => [
                      '9:16' => [
                        'title' => 'Vertical',
                        'value' => 9 / 16,
                      ],
                    ],
                  ],
                  'square' => [
                    'title' => 'Square (1:1)',
                    'selectedRatio' => '1:1',
                    'allowedAspectRatios' => [
                      '1:1' => [
                        'title' => 'Square',
                        'value' => 1 / 1,
                      ],
                    ],
                  ],
                ],
              ],
            ],
          ],
          'types' => [
            '0' => [
              'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
              'showitem' => '
              crop,
              --palette--;;filePalette'
          ],
        ],
      ],
    ],
    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
  ),
  ],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $vimeoVideoColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'sys_file_reference',
    'vimeovideoOverlayPalette',
    'title,description,
    --linebreak--,
    tx_vimeovideo_mute,tx_vimeovideo_loop,
    --linebreak--,
    tx_vimeovideo_starttime,tx_vimeovideo_endtime,
    --linebreak--,
    tx_vimeovideo_ratio,
    --linebreak--,
    tx_vimeovideo_coverimage'
);
