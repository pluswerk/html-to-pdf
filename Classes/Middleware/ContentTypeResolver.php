<?php

namespace Pluswerk\HtmlToPdf\Middleware;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Mpdf\Output\Destination;
use Pluswerk\HtmlToPdf\Service\PdfGenerationService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Http\Stream;
use TYPO3\CMS\Core\Routing\PageArguments;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class ContentTypeResolver implements MiddlewareInterface
{
    /**
     * Resolve the response content-type based on the page type
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var Response $response */
        $response = $handler->handle($request);
        /** @var PageArguments $pageArguments */
        $pageArguments = $request->getAttribute('routing');

        switch ((int)$pageArguments->getPageType()) {
            case 1590672891:
                if (
                    $GLOBALS['TSFE'] instanceof TypoScriptFrontendController
                    && $GLOBALS['TSFE']->isOutputting()
                ) {
                    $title = 'page';
                    if (isset($GLOBALS['TSFE']->page['title'])) {
                        $title = $GLOBALS['TSFE']->page['title'];
                    }
                    $pdfService = GeneralUtility::makeInstance(PdfGenerationService::class);
                    $pdf = $pdfService->generatePdf($GLOBALS['TSFE']->content, $title);
                    $body = new Stream('php://temp', 'wb+');
                    $body->write($pdf->Output('', Destination::STRING_RETURN));
                    return new Response(
                        $body,
                        200,
                        [
                            'Content-Type' => 'application/pdf',
                            'Content-disposition' => 'inline; filename="' . $title . '.pdf"',
                        ]
                    );
                }
                break;
            default:
        }
        return $response;
    }
}
