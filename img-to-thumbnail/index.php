<?php 
    if(isset($_POST["submit"])){
        $imagesource = null;
        $randomNumber = rand(1, 100);
        $type = $_FILES["image"]["type"];
        $tmp_file = $_FILES["image"]["tmp_name"];
        $newWidth = 400;
        $newHeight = 400;
        $blankImage = imagecreatetruecolor($newWidth, $newHeight);
        
        if ($type == 'image/png') {
            $imagesource = imagecreatefrompng($tmp_file);
        }else if($type == 'image/jpeg'){
            $imagesource = imagecreatefromjpeg($tmp_file);
        }
        $sourceWidth = imagesx($imagesource);
        $sourceHeight = imagesy($imagesource);
        
        imagecopyresampled($blankImage ,$imagesource , 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);

        imagepng($blankImage, 'thumbnail/output' . $randomNumber . '.png');
        // imagepng($blankImage);

        imagedestroy($imagesource);
        imagedestroy($blankImage);

        echo "Sebelum resize";
        // echo '<img src="' . $tmp_file  . '" />';
        echo $tmp_file ;
        echo '<img src="thumbnail/output' . $randomNumber . '.png" />';

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Masukkan Gambar Anda</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>