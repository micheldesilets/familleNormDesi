<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    
    				
<!-- 1. Add latest jQuery and fancyBox files -->

<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />

</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
    <script src="jquery.fancybox.min.js"></script>
<?php 
$directory = 'images'; //path to thumbnails
$link = 'images'; //path to full-sized images
$allowed_types = array('jpg','jpeg','gif','png'); 
$aFiles = array();
$dir_handle = @opendir($directory) or die("There is an error with your image directory!"); 
while ($file = readdir($dir_handle)) //traverse through files
{ 
if($file=='.' || $file == '..') continue; //skip links to parent directories
$file_parts = explode('.',$file); //split filenames and put each part in an array
$ext = strtolower(array_pop($file_parts)); //last element is the file extension
$title = implode('.',$file_parts); //what's left is the filename
if(in_array($ext,$allowed_types)) 
{ 
$aFiles[] = $file; //filename array
}
} 
closedir($dir_handle); //close directory
natsort($aFiles); // natural sort by filename 01, 02, 10, 20
    echo count($aFiles);
$i=0; 
foreach ($aFiles as $file) {
$file_parts = explode('.',$file); //split filenames and put each part in an array
$ext = strtolower(array_pop($file_parts)); //last element is the file extension
$title = implode('.',$file_parts); //what's left is the filename
$title = htmlspecialchars($title);	//make it html-safe 
echo ' 
//add fancybox class for viewer
<div class="thumbs fancybox" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%">
//group linked images into one slideshow
<a rel="group" href="slides/'.$file.'" title="'.$title.'">'.$title.'</a>
</div>';
$i++;	//increment the image counter
}

?>
</body>
</html>