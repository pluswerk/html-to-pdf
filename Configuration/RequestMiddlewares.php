<?php

use Pluswerk\HtmlToPdf\Middleware\ContentTypeResolver;

return [
    'frontend' => [
        'htmltopdf/service/contenttyperesolver' => [
            'target' => ContentTypeResolver::class,
            'after' => [],
            'before' => [
                'typo3/cms-frontend/output-compression'
            ]
        ]
    ]
];
