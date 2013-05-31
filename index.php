<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/search/style.css">

</head>

<body>
<div id="result">

<h2>search results:</h2>

 
<?php




function search($dir, $key) {
    $it = new RecursiveDirectoryIterator($dir);
    foreach(new RecursiveIteratorIterator($it) as $file) {
        if (strpos(strtolower($file), strtolower($key) . DIRECTORY_SEPARATOR) !== false) {
			// echo $key . "<br/> \n";
			//echo $file . "<br/> \n";
			//echo substr($file, 0, strlen($file) - 3);
			echo substr($file, 0, strrpos($file, DIRECTORY_SEPARATOR));
			return;
		}
    }

}

$query = $_POST['destination'];





ob_start();

search("app", $query);

$out1 = ob_get_contents();

if ($out1 != "") { 

	foreach (glob("$out1" . DIRECTORY_SEPARATOR . "*.*") as $filename) {  
	// echo $filename."<br />";  
		echo "<table>";
		echo "<tr>";
		echo "<td><a href=\"$filename\">$filename</a></td>";
        echo "</tr>";
		echo "</table>";
	}  
} else {
		echo "<table>";
		echo "<tr>";
		echo "<td>Not Found</td>";
        echo "</tr>";
		echo "</table>";
}


?>
<p>
<a href="/search/form.html">New Search</a>
</p>
</div>




</body>

</html>