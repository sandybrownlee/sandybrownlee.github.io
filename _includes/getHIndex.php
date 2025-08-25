<?php
	// used to need to find 'h-index</a></td><td class="cit-borderleft cit-data">\d+</td>' in a google scholar page
	// now updated
	//$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
	//$context = stream_context_create($opts);

// currently not working - maybe scraping is blocked now?
//	$pageGS = file_get_contents('http://scholar.google.co.uk/citations?user=Yxwz9b0AAAAJ');//, false, $context);
	$pageGS = "";
	
	//old preg_match('@h-index</a></td><td class=\\\\"cit-borderleft cit-data\\\\">(\d+)</td>@i', $pageGS, $matches);
//	preg_match('@h-index</a></td><td class=\\\\"gsc_rsb_std\\\\">(\d+)</td>@i', $pageGS, $matches);
//	$hindexGS = $matches[1];
	$hindexGS = "";

	//old preg_match('@Citations</a></td><td class=\\\\"cit-borderleft cit-data\\\\">(\d+)</td>@i', $pageGS, $matches);
//	preg_match('@itations</a></td><td class=\\\\"gsc_rsb_std\\\\">(\d+)</td>@i', $pageGS, $matches);
//	$citationsGS = $matches[1];
	$citationsGS = "";
//echo("|||");
//print_r($opts);
//echo("|||");
	$dateGS = "today"; //date("j/n/y");

	// double check - if failed revert to defaults
	if (!is_numeric($citationsGS) || !is_numeric($hindexGS)) {
		$citationsGS = 745;
		$hindexGS = 16;
		$dateGS = date("22/5/20");
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

	// see this
	// http://kitchingroup.cheme.cmu.edu/blog/2015/04/03/Getting-data-from-the-Scopus-API/
	$apiKeySB = "9cd2551192dde4abb70750d6bc89547e";

	$citationsSC = 400;
	$hindexSC = 12;
	$dateSC = "22/5/20";

	//	old format
//	echo("Citations: ".$citationsGS." (Google Scholar), ".$citationsSC." (Scopus)<br/>");
//	echo("h-index: ".$hindexGS."(Google Scholar), ".$hindexSC." (Scopus)<br/>");

	echo("<table class='zebra'>");
	echo("<thead><tr><th></th><th>Google Scholar ($dateGS)</th><th>Scopus ($dateSC)</th></tr></thead>");
	echo("<tr><td>Citations</td><td>$citationsGS</td><td>$citationsSC</td></tr>");
	echo("<tr><td>h-index</td><td>$hindexGS</td><td>$hindexSC</td></tr>");
	echo("</table>");
?>
