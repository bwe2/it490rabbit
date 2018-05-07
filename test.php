<?php
if (isset($_GET['year']) && isset($_GET['make']) && isset($_GET['model']))
{
	$url = "https://one.nhtsa.gov/webapi/api/Recalls/vehicle"."/modelyear/".$_GET['year']."/make/".$_GET['make']."/model/".$_GET['model']."?format=json";
	 // create curl resource 
	$ch = curl_init(); 

	// set url 
	curl_setopt($ch, CURLOPT_URL, $url); 

	//return the transfer as a string 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	// $output contains the output string 
	$output = curl_exec($ch); 

	// close curl resource to free up system resources 
	curl_close($ch);
	$json = json_decode($output);
	//echo '<pre>'.print_r($json, true).'</pre>'; exit;
	echo $json->Count." results are received.";
	echo '<br>';
	echo '<br>';

	foreach ($json->Results as $car) {
		echo "Manufacturer: ".$car->Manufacturer;
		echo '<br>';
		echo "NHTSACampaignNumber: ".$car->NHTSACampaignNumber;
		echo '<br>';
		echo "ReportReceivedDate: ".$car->ReportReceivedDate;
		echo '<br>';
		echo "Component: ".$car->Component;
		echo '<br>';
		echo "Summary: ".$car->Summary;
		echo '<br>';
		echo "Conequence: ".$car->Conequence;
		echo '<br>';
		echo "Remedy: ".$car->Remedy;
		echo '<br>';
		echo "Notes: ".$car->Notes;
		echo '<br>';
		echo "ModelYear: ".$car->ModelYear;
		echo '<br>';
		echo "Make: ".$car->Make;
		echo '<br>';
		echo "Model: ".$car->Model;
		echo '<br>';
		echo '<br>';
	}
//./send_mail.php
?>

<input type="email" id="input-email" name="email" required>
<button id="btn-email">Get notified for new recalls by email</button>

<form method="POST" action="./order_shop.php">
	<input type="text" name="zip" required>
	<button>Find Shop</button>
</form>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script>
/* var record_count = parseInt('<?=$json->Count?>');
$('#btn-email').on('click', function() {
	const email = $('#input-email').val();
	setInterval(function() {
		$.ajax({
			url: "$url",
			success:  function(data) {
				console.log(data);
			}
		})
	}, 1000);
}) */
</script>
<?php
}
else{
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose your car</title>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="javascript"></script>
    <link type="text/css" rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="Fake.css">
</head>

<body>
    <script src="Fake.css"></script>
    <script src="FakeCars.js"></script>
    <center>
        <h3>Choose your car</h3>
    </center>
    <div class="login-card">
        <div id="demo">
            <h1>Echo "$un".PHP_EOL;</h1><br>
            <form>
                <div id="main-wrapper">
                    <div id="form-wrapper">

                        <fieldset>
                            <table>
                                <div id="personal-info">
                                    <tr>
                                        <td colspan="2">

                                        </td>

                                        <tr>
                                            <td colspan="2">



                                            </td>
                                </div>
                                <tr>
                                    <td colspan="2">

                                    </td>
                                    <div id="vehicle" class="info">
                                        <tr>
                                            <td colspan="3">
                                                <p>Select Vehicle Information</p>
                                                <select name="year" id="year">
  <option value="" selected="form-year">Year</option>
<option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option></select>

                                                <select name="make" id="formmake">
<option value="" selected="selected">Make</option></select>

                                                <select name="model" id="formmodel">
  <option value="" selected="selected">Model</option></select>

                                        </tr>
                                        </td>
                                        <tr>
                                            <td colspan="3">

                                        </tr>
                                        </td>
                        </fieldset>
                        </table>
                        </div>
                        <input type="submit" name="Find Recalls" id="Find Recalls" class="Find Recalls" value="Find Recalls">
                    </div>
            </form>




            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>
<?php 
}
?>
