<?php
	//echo $text;
    try {
        extract($_POST);
        $directory = '../pdfparse/pdfparser/';
        include $directory . 'autoload.php';
        $parser = new \Smalot\PdfParser\Parser();
        $file = './test.pdf';
        $pdf    = $parser->parseFile($_FILES['file']['tmp_name']);
    
        $text = $pdf->getText();
        if (strpos($text, 'Objective') !== false || strpos($text, 'email') !== false || strpos($text, 'Education') !== false || strpos($text, 'Experience') !== false || strpos($text, 'phone') !== false || strpos($text, 'linkedin') !== false || strpos($text, '.com') !== false || strpos($text, '.in') !== false || strpos($text, '.SKILLS') !== false || strpos($text, '.profile') !== false   ) {
            // The PDF contains at least one of the words
            echo "true";
        } else {
            // The PDF does not contain any of the words
            echo 'false';
        }
	}
	catch (Exception $e) {
		echo 'false';
		exit();
	}
?>
