<?php

$url = 'http://localhost/haycouture/admin/printJobRank.php?jobid='.$_GET["jobid"];

$content = file_get_contents($url);
//$array = json_decode($content, true);

print_r($content);



?>