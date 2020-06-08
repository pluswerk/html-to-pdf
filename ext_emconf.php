<?php

/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = [
    'title' => '+Pluswerk: Html To Pdf',
    'description' => 'Generates a pdf out of the website',
    'category' => 'services',
    'author' => 'Felix König',
    'author_email' => 'felix.koenig@pluswerk.ag',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
