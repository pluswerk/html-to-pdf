<?php

/** @var string $_EXTKEY */

use Composer\InstalledVersions;

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
    'version' => InstalledVersions::getPrettyVersion('pluswerk/html_to_pdf'),
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.999',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
