<html>
<head>
  <meta http-equiv='refresh' content='0; URL=http://192.168.1.12/sitehost/index.php/'>
</head>

<body>


</body>

<script>
// given url string
let url_str = window.location.href;
console.log(url_str);
 
// create new URL object from the url string
let url = new URL(url_str);

// searchParams property is URLSearchParams object
let search_params = url.searchParams; 

// loop to get all query parameters
search_params.forEach(function(value, key) {
	console.log(key + '=' + value);
});

</script>
</html>