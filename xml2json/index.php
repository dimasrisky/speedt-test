<?php 
if(isset($_POST["submit"])){
    // var_dump($_FILES["xmlFile"]);
    if($_FILES["xmlFile"]["type"] == 'text/xml'){

        $tmp_file = $_FILES["xmlFile"]["tmp_name"];
        $namaFile = basename($_FILES["xmlFile"]["name"]);

        move_uploaded_file($tmp_file, 'xml/' . $namaFile);
        $xml = simplexml_load_file('xml/' . $namaFile);
        file_put_contents('json/fileJson.json', json_encode($xml));
        echo "file sudah berhasil di konversi";
    }else{
        echo "File nya salah";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML to Json</title>
</head>
<body>
    <h1>XML TO JSON</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="xmlFile">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>