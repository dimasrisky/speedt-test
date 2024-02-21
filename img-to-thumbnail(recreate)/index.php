<?php 
if (isset($_POST["submit"])) {
    $typeFile = $_FILES["file"]["type"];
    $tmp_file = $_FILES["file"]["tmp_name"];
    $srcFile = null;
    if($typeFile == 'image/png'){
        $srcFile = imagecreatefrompng($tmp_file);
    }else if($typeFile == 'image/jpeg'){
        $srcFile = imagecreatefromjpeg($tmp_file);
    }else if($typeFile == 'image/gif'){
        $srcFile = imagecreatefromgif($tmp_file);
    }else if($typeFile == 'image/webp'){
        $srcFile = imagecreatefromwebp($tmp_file);
    }
    
    $width = imagesx($srcFile);
    $height = imagesy($srcFile);
    
    $newWidth = 300;
    $newHeight = 200;
    
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    
    imagecopyresampled($newImage, $srcFile, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
    if($typeFile == 'image/png'){
        header("Content-Type: image/png");
        imagepng($newImage, null);
        // imagepng($newImage, 'img/result/img' . rand(), 80);
    }else if($typeFile == 'image/jpeg'){
        header("Content-Type: image/jpeg");
        imagejpeg($newImage, null);
    }else if($typeFile == 'image/gif'){
        header("Content-Type: image/gif");
        imagegif($newImage, null);
    }else if($typeFile == 'image/webp'){
        header("Content-Type: image/webp");
        imagewebp($newImage, null);
    }

    imagedestroy($srcFile);
    imagedestroy($newImage);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Img To Thumbnail</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>