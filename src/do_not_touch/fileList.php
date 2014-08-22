<?php

$options = new stdClass();

// Make changes here
$options->siteTitle = "Available Files List";
$options->pageTitle = "English Files";
$options->instructions = "On phone, long press and select 'Save Link' to save the file. Or your browser, right click and select 'Save Link'";
$options->backgroundColour = "#cefbff";
// DO NOT change below this line


$directory = './';

$dirArray = getDirList($directory);	
outputPage($dirArray, $options);


function getDirList($directory){
   $dirArray = array();
   
   if ($handle = opendir($directory)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {                
		if(!is_dir($directory . $entry)){
			$info = pathinfo($directory . $entry);
			if($info['extension'] != 'php') {
				$dirArray[$info['extension']][] = $entry;
			}
		}
            }
        }
        closedir($handle);
   }
   ksort($dirArray);
   return $dirArray;
}

function outputPage($dirArray, $options){
	$header = <<< EOT
<!DOCTYPE html>
<html>
	<head>
		<title>{$options->siteTitle}</title>
	</head>
	<body style="background-color:{$options->backgroundColour}">
	<h2>{$options->pageTitle}</h1>
	<i>{$options->instructions}</i>
	<hr/>
EOT;
	$footer = <<< EOT
	</body>
</html>
EOT;
	echo $header;

	foreach($dirArray as $extension=>$fileList){
		echo "<h2>[{$extension}] files</h2>";		
		echo "<ul>";
		sort($fileList);
		foreach($fileList as $entry){
			$urlEntry = urlencode($entry);
			echo "<li><a href=\"{$entry}\">{$entry}</a>";
		}
		echo "</ul>";
	}
	
	echo $footer;
}

?>
