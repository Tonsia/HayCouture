<?php

require_once('TCPDF/tcpdf.php');


// Load the PDF file using TCPDF
$pdf = new TCPDF();
$pdf->setSourceData('path/to/pdf_file.pdf');
$pdf->AddPage();
$pdf->useTemplate($pdf->importPage(1));

// Get the text content of the PDF file
$text = $pdf->getTextFromPage(1);

// Check if the text contains the words you're looking for
if (strpos($text, 'word1') !== false || strpos($text, 'word2') !== false) {
    // The PDF contains at least one of the words
    echo "The PDF contains the word(s) you're looking for.";
} else {
    // The PDF does not contain any of the words
    echo "The PDF does not contain the word(s) you're looking for.";
}
