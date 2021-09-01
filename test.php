<!DOCTYPE html>
<html>
<head>
<title>Refresh Div withour refershing the page completely</title>
</head>
<body>
    <?php $array = ["a","b","c"];
    foreach ($array as $key) {
      echo $key." ";
    }
    array_splice($array, 1, 1);
    foreach ($array as $key) {
      echo $key." ";
    }
?>
</body>
</html>
