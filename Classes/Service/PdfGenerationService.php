<?php

namespace Pluswerk\HtmlToPdf\Service;

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

use Mpdf\Mpdf;

final class PdfGenerationService
{
    public function generatePdf(string $content, string $name = ''): Mpdf
    {
        $pdf = new Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'default_font_size' => 0,
                'dpi' => 300,
                'img_dpi' => 300,
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
            ]
        );
        $pdf->curlAllowUnsafeSslRequests = true;
        $pdf->showImageErrors = false;
        $pdf->SetProtection(['print']);
        $pdf->SetDisplayMode('fullpage');

        $pdf->setTitle($name);
        $pdf->WriteHTML($content);

        return $pdf;
    }
}
