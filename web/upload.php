<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File upload</title>

    <link rel="stylesheet" type="text/css" href="dist/semantic.css">
</head>
<body>

<div class="ui vertical segment middle aligned center aligned">
    <h3 class="ui red inverted header">Vulnerability</h3>
</div>

<div class="ui bottom attached vertical segment pushable">
    <div class="ui visible inverted left vertical sidebar menu">
        <a href="xss.php" class="item"><i class="calendar icon"></i> XSS </a>
        <a href="sqli.php" class="item"><i class="calendar icon"></i> SQL Injection </a>
        <a href="upload.php" class="item"><i class="calendar icon"></i> File uplpoad </a>
        <a href="rce.php" class="item"><i class="calendar icon"></i> RCE </a>
        <a href="ssrf.php" class="item"><i class="calendar icon"></i> SSRF </a>
        <a href="tpli.php" class="item"><i class="calendar icon"></i> Template Injection </a>
        <a href="xxe.php" class="item"><i class="calendar icon"></i> XXE </a>
        <a href="nosqli.php" class="item"><i class="calendar icon"></i> NoSQL Injection </a>
    </div>

    <div class="pusher">
        <div class="ui basic container segment">
            <h3 class="ui header">File upload</h3>
            
            <form action="" method="POST" enctype="multipart/form-data">
                <input class="ui button" type="file" name="file" id="file" />
                <button class="ui primary button" type="submit">提交</button>
            </form>

        </div>
    </div>
</div>

<?php
    
    header("Content-Type:text/html; charset=utf-8");

    $fileName = @$_FILES['file']['name'];
    $fileType = @$_FILES["file"]["type"];
    $fileSize = @$_FILES["file"]["size"];

    if($fileType == "image/png" || $fileType == "image/jpg" || $fileType == "image/jpeg" && $fileSize <10000){
        $fileExtension = pathinfo($fileName);
        $fileExtension = $fileExtension['extension'];
        $time = time();
        $destinationPath = "upload/";
        $newFileName = $destinationPath.$time.".".$fileExtension;
        move_uploaded_file($_FILES['file']['tmp_name'],$newFileName);
        echo "文件路径为:".$newFileName;
    }else{
        echo "上传失败";
    }
    

?>

</body>
</html>