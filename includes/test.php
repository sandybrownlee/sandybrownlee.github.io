<?php
	// now need to make request twice, once to get cookies, then second time to get data.
	$pageGS = file_get_contents('http://scholar.google.co.uk/citations?user=Yxwz9b0AAAAJ');//, false, $context);

	// $http_response_header has cookies among other things
	$cookies = array();
	foreach ($http_response_header as $hdr) {
	    if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
	        parse_str($matches[1], $tmp);
	        $cookies += $tmp;
	    }
	}
print_r($http_response_header);
	// now make second request with any cookies added
	$first = 1;
	$cookiestring = "";
	foreach ($cookies as $name => $value) {
		if ($first == 1) {
			$first = 0;
		} else {
			$cookiestring .= "; "; // separator for cookies is semicolon
		}
		$cookiestring .= $name."=".$value;
	}
	$opts = array(
	  'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				  "Cookie: ".$cookiestring."\r\n" .
				  "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3"
	  )
	);
	$context = stream_context_create($opts);
print_r($context);
	$pageGS2 = file_get_contents('http://scholar.google.co.uk/citations?user=Yxwz9b0AAAAJ', false, $context);
	//$pageGS = "";

	// make sure the remote file is successfully opened before doing anything else
	//if ($fp = fopen('http://scholar.google.co.uk/citations?user=Yxwz9b0AAAAJ', 'r')) {
	//   // keep reading until there's nothing left
	//   while ($line = fread($fp, 512)) {// && (!line.contains("i10-index")))) { // stop once we've passed the i10 line which follows citations and h-index
	//	  $pageGS .= $line;
	//   }
	//}

echo("=========".$pageGS."========CCCC".$pageGS2."CCCC========");
print_r($http_response_header);
echo("=========");
	//old preg_match('@h-index</a></td><td class=\\\\"cit-borderleft cit-data\\\\">(\d+)</td>@i', $pageGS, $matches);
	preg_match('@h-index</a></td><td class=\\\\"gsc_rsb_std\\\\">(\d+)</td>@i', $pageGS, $matches);
	$hindexGS = $matches[1];

	//old preg_match('@Citations</a></td><td class=\\\\"cit-borderleft cit-data\\\\">(\d+)</td>@i', $pageGS, $matches);
	preg_match('@itations</a></td><td class=\\\\"gsc_rsb_std\\\\">(\d+)</td>@i', $pageGS, $matches);
	$citationsGS = $matches[1];
//echo("|||");
//print_r($opts);
//echo("|||");
	$dateGS = "today"; //date("j/n/y");

	// double check - if failed revert to defaults
	if (!is_numeric($citationsGS) || !is_numeric($hindexGS)) {
		$citationsGS = 248;
		$hindexGS = 8;
		$dateGS = date("18/11/15");
	}

//	times out - possibly protected from scraping; Scopus does have an API to investigate.
//	// need to find 'show all documents that cite this author">\d+</a>' in a Scopus page
//	$pageSC = file_get_contents('http://www.scopus.com/authid/detail.url?authorId=19638592200');
//	echo($pageSC);
//
//	preg_match('@show all documents that cite this author\\\\">(\d+)</a>@i', $pageSC, $matches);
//	$citationsSC = $matches[1];
//
//	// some defaults just in case
//	preg_match('@h-index</a></td><td class=\\\\"cit-borderleft cit-data\\\\">(\d+)</td>@i', $pageSC, $matches);
//	$hindexSC = $matches[1];
//
//	$dateSC = date("j/n/y");

	$citationsSC = 79;
	$hindexSC = 6;
	$dateSC = "18/11/15";

	//	old format
//	echo("Citations: ".$citationsGS." (Google Scholar), ".$citationsSC." (Scopus)<br/>");
//	echo("h-index: ".$hindexGS."(Google Scholar), ".$hindexSC." (Scopus)<br/>");

	echo("<table class='zebra'>");
	echo("<thead><tr><th></th><th>Google Scholar ($dateGS)</th><th>Scopus ($dateSC)</th></tr></thead>");
	echo("<tr><td>Citations</td><td>$citationsGS</td><td>$citationsSC</td></tr>");
	echo("<tr><td>h-index</td><td>$hindexGS</td><td>$hindexSC</td></tr>");
	echo("</table>");
?>