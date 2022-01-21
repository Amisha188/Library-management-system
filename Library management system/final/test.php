<?php
    $pdffilename='poem1.pdf';
    header('Content-type: application/pdf');
    header('Content-Description: inline; filename "'.$pdffilename.'"');
    header('Content-Transfer-Encoding: Binary');
    header('Accept-Ranges: bytes');
    @readfile($pdffilename);
?>