<?php
 
	$url = 'https://api.kiezelpay.com/api/merchant/history?sort=desc&successOnly=true&key=08acc498271aef247dfc25a78775e6bb';
	


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
	  $json_pretty = json_encode($bible_json, JSON_PRETTY_PRINT);
	  $totalPurchases = $bible_json['numberOfResults'];
	  echo "total purchases: " . $totalPurchases;
	  echo '<h1>Users</h1>';
	  for ($i=0; $i<$totalPurchases; $i++){
		  $customerObj = $bible_json['purchases'][$i];
		  $userName = $customerObj['user'];
		  $country = $customerObj['country'];
		  $count = $i + 1;
		  echo "<br>" . $count . ". " . 
		  "<br> Name: " . $userName . 
		  "<br>Country: " . $country  . 
		  "<br>Product bought: " . $customerObj['product'] .
		  "<br>Paid: \$USD "  . $customerObj['amountToPayOut'] .
		  "<br><br>";
		  
	  }
      //echo "<pre>".$json_pretty."<pre/>";

	}

	// Closing curl
	curl_close($curl);
	
  
?>


