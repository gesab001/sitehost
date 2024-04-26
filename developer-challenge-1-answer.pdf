<?php

$API_Server = 'https://api.demo.sitehost.co.nz';
$API_Version = '1.0';
$Format = 'json';
$filename = 'list_domains';
$params = array();
$params['client_id'] = $_GET['client_id'];
$params['apikey'] = $_GET['apikey'];
$url_params = http_build_query($params);
$url_sitehost = $API_Server . '/' . $API_Version . '/srs' . '/'
. $filename . '.' . $Format . '?' . $url_params;
// Initializing curl
$curl = curl_init();
// Sending GET request to reqres.in
// server to get JSON data
curl_setopt($curl, CURLOPT_URL,
$url_sitehost);
curl_setopt($curl,
CURLOPT_RETURNTRANSFER, true);
// Executing curl
$response = curl_exec($curl);
// Checking if any error occurs
// during request or not
if($e = curl_error($curl)) {
        echo $e;
}
else {
        $json_obj = json_decode($response, true);
        $domains = $json_obj["return"]["data"];
        //$json_pretty = json_encode($domains, JSON_PRETTY_PRINT);
        //echo "<pre>".$json_pretty."<pre/>";
        $numberOfDomains = count($domains);
        //echo $numberOfDomains;
        echo "<h1>LIST OF DOMAINS</h1>";
        echo "<ol>";
        for ($x=0; $x<$numberOfDomains; $x++){
           $item = $domains[$x];
           $domain = $item["domain"];
           echo "<li>" . $domain . "</li>";
        }
        echo "</ol>";

}
