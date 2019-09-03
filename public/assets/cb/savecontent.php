<?php
if ($_POST['content']) {
    $myFile = "content.html";
    $stringData = $_POST['content'];
    file_put_contents($myFile,$stringData);
	echo $stringData;
}
?>