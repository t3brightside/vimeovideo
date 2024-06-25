<?php
$EM_CONF[$_EXTKEY] = [
  'title' => 'Vimeo Video',
	'description' => 'Vimeo videos with custom cover images, gallery layout, pagination, GDPR options, and backend previews.',
  'category' => 'fe',
	'version' => '2.0.0',
	'state' => 'stable',
	'clearcacheonload' => true,
	'author' => 'Tanel Põld',
	'author_email' => 'tanel@brightside.ee',
	'author_company' => 'Brightside OÜ / t3brightside.com',
	'constraints' => [
		'depends' => [
			'typo3' => '12.4.0-13.9.99',
			'fluid_styled_content' => '12.4.0-13.9.99',
      		'embedassets' => '1.3.0-1.9.99',
			'paginatedprocessors' => '1.6.0-1.9.99',
		],
  ],
];