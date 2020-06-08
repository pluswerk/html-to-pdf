<?php

return [
    'frontend' => [
        'htmltopdf/service/contenttyperesolver' => [
            'target' => \Pluswerk\HtmlToPdf\Middleware\ContentTypeResolver::class,
            'after' => [],
            'before' => [
                'typo3/cms-frontend/output-compression'
            ]
        ]
    ]
];
