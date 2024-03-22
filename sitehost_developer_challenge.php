<?php
 
 
	$url = 'https://raw.githubusercontent.com/gesab001/assets/master/bible/kjv-version.json'; 
	$API_Server = 'https://api.demo.sitehost.co.nz';
    $API_Version =  '1.0';
    $API_Key = 'd17261d51ff7046b760bd95b4ce781ac';
    $Client_ID =  '293785';
    $Format = 'json';
	$filename = 'list_domains';
	$params = array();
	$params['client_id'] = $_GET['client_id'];
	$params['apikey'] = $_GET['apikey'];
	$url_params = http_build_query($params);
	$url_sitehost = $API_Server . '/' . $API_Version . '/srs' . '/' . $filename . '.' . $Format . '?' . $url_params;
	echo $url_sitehost . "<br>"; 
	echo 'https://api.demo.sitehost.co.nz/1.0/srs/list_domains.json?client_id={client_id}&apikey={api_key}' . "<br>";
	// Initializing curl
	$curl = curl_init();

	// Sending GET request to reqres.in
	// server to get JSON data
	curl_setopt($curl, CURLOPT_URL, 
	$url);

	// Telling curl to store JSON
	// data in a variable instead
	// of dumping on screen
	curl_setopt($curl, 
	CURLOPT_RETURNTRANSFER, true);

	// Executing curl
	$response = curl_exec($curl);

	// Checking if any error occurs 
	// during request or not
	if($e = curl_error($curl)) {
		echo $e;
	} else {
	  $bible_json = json_decode($response, true); 
	  

	  if (isset($_GET['client_id']) and isset($_GET['apikey'])){
		// Decoding JSON data
		
		$bookNumber = $_GET['book'];
		$bookName = $bible_json['version'][$bookNumber]['book_name'];
		$chapterNumber = $_GET['chapter'];
		$verseNumber = $_GET['verse'];
		$word = $bible_json['version'][$bookNumber]['book'][$chapterNumber]['chapter'][$verseNumber]['verse'];
        echo $bookName . ' ' . $chapterNumber . ':' . $verseNumber . '<br>' .$word;
		//var_dump($bible_json);
		//$json_pretty = json_encode($bible_json, JSON_PRETTY_PRINT);
        //echo "<pre>".$json_pretty."<pre/>";
	  }
	  else if (isset($_GET['book']) and isset($_GET['chapter'])){
		$bible_json = json_decode($response, true); 
		$bookNumber = $_GET['book'];
		$bookName = $bible_json['version'][$bookNumber]['book_name'];

		$chapterNumber = $_GET['chapter'];
		$verses = $bible_json['version'][$bookNumber]['book'][$chapterNumber]['chapter'];
		$numberOfVerses = count($verses);
		echo '<h1>' . $bookName . ' ' . $chapterNumber . '</h1>';
		for ($x=1; $x<=$numberOfVerses; $x++){
		  $verseNumber = $x;
		  $word = $bible_json['version'][$bookNumber]['book'][$chapterNumber]['chapter'][$verseNumber]['verse'];
          echo $verseNumber . '. ' .$word;
          echo '<br>';		  
		}
	  }
	}

	// Closing curl
	curl_close($curl);
	
  
?>


