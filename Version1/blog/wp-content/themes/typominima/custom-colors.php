<?php
header('Content-type: text/css');

$link = "#".substr($_GET['colors'],0,6);
$hover = "#".substr($_GET['colors'],7,6);

echo "
a { color: ".$link."!important; }

a:hover { color: ".$hover."!important; }

#searchform button { color: ".$link."!important; }

#searchform button:hover { color: ".$hover."!important; }

.comment-form button { background-color: ".$link."!important; }

.comment-form button:hover { background-color: ".$hover."!important; }
";
?>