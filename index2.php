<?php

$var1 = "C:\app\accounts\98452";

// get images containing the string '_thumb'  
foreach (glob("$var1\*.*") as $filename) {  
    echo $filename."<br />";  
}  

?>