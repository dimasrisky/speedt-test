<?php 
$result = null;
if(isset($_POST["submit"])){
    $input = $_POST["input"];
    $xml = simplexml_load_string($input);
    $result = json_encode($xml, JSON_PRETTY_PRINT);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>XMl To Json</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <textarea name="input" id="input" cols="40" rows="30"></textarea>
            <button type="submit" name="submit">Convert</button>
        </form>
        <textarea name="result" id="" cols="40" rows="30"><?= $result ?></textarea>
    </div>
</body>
</html> 