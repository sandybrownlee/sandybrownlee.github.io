<?php
// trying to get http://kitchingroup.cheme.cmu.edu/blog/2015/04/03/Getting-data-from-the-Scopus-API/ working

	$apiKeySB = "9cd2551192dde4abb70750d6bc89547e";

	$scopusUrl = 'http://api.elsevier.com/content/author?author_id=19638592200&view=metrics';

//	$command = escapeshellcmd('/home/sbr/www/test.py');
	$command = "python";
	$output = shell_exec("$command");
//	exec("ls", $output);
	print_r($output);

//$opts = array(
//  'http'=>array(
//    'method'=>"GET",
//    'header'=>"Accept: application/json\r\n" .
//              "X-ELS-APIKey: ".$apiKeySB."\r\n"
//  )
//);

//$body = "";
//$headers = "POST $scopusUrl 1.1\r\n"; 
//        $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
//        $headers .= "Content-Type: application/json\r\n";
//        $headers .= "Accept: application/json\r\n";
//	$headers .= "X-ELS-APIKey: ".$apiKeySB."\r\n";
//        if (!empty($body)) {
//            $headers .= "Content-length: " . strlen($body) . "\r\n";
//        }
//        $headers .= "\r\n";

 //       $body = $query;

//        if ($fp = fsockopen($scopusUrl, 80, $errno, $errstr, 180)) {
//            fwrite($fp, $headers . $body, strlen($headers . $body));
//            fclose();
//        }

//$context = stream_context_create($opts);

//	file_get_contents($scopusUrl, false, $context);
	
	echo("==========");
//	print_r($response);
?>
