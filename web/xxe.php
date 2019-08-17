<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XXE</title>

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
            <h3 class="ui header">XXE</h3>

            <form action="" method="POST" class="ui fluid action input">
                <textarea type="text" placeholder="" style="width:200px;height:80px;"></textarea>
                <button class="ui button" type="submit">输入XML</button>
            </form>

            <div class="column left">
                <table class="ui celled padded table">
                <tr>
                    <th class="single line">output</th>
                </tr>
            </div>
            
            <div class="ui divider"></div>
            
        </div>
    </div>

</div>



<?php

    $xmlfile = @file_get_contents('php://input');
    $dom = new DOMDocument();
    @$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
    @$xml = simplexml_import_dom($dom);
    $xxe = @$xml->xxe;
    echo "<tr><td>$xxe</td></tr>";

?>

</body>
</html>