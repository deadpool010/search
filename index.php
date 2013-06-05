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
	$result = array();
    foreach(new RecursiveIteratorIterator($it) as $file) {
        if (strpos($file, DIRECTORY_SEPARATOR . $key . DIRECTORY_SEPARATOR) !== false) {
			if (substr($file, -1) == '.' or substr($file, -1) == DIRECTORY_SEPARATOR)
            continue;
			$result[] = $file;
		}
	}
	return $result;
}

$query = $_POST['destination'];
$files = search("app", $query);

if (count($files) > 0) {
	foreach ($files as $filename) {
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