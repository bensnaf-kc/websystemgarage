<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$pattern = "/[-\s:]/";
$components = preg_split($pattern, $text);
$t_service = $components[1];

?>
</body>
</html>