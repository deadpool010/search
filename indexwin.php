
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/search/style.css">

</head>

<body>
<div id="upload">

<h2>search results:</h2>


<?php


function search($dir, $key) {
    $it = new RecursiveDirectoryIterator($dir);
    foreach(new RecursiveIteratorIterator($it) as $file) {
        if (strpos(strtolower($file), strtolower($key)."\..") !== false)
        // echo $key . "<br/> \n";
          //echo $file . "<br/> \n";
          echo substr($file, 0, strlen($file) - 3) ;
    }
	
}

$query = $_POST['destination'];





ob_start();

search("app", $query);

$out1 = ob_get_contents();

if ($out1 != "") { 
	//get images containing the string '_thumb'  
	foreach (glob("$out1\*.*") as $filename) {  
	// echo $filename."<br />";  
		echo "<table>";
		echo "<tr>";
		echo "<td><a href=\"$filename\">$filename</a></td>";
        echo "</tr>";
	}  
} else {
		echo "<table>";
		echo "<tr>";
		echo "<td>Not Found</td>";
        echo "</tr>";
}


?>


</div>




</body>

</html>