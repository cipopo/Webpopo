<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Injection</title>

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
            <h3 class="ui header">SQL Injection</h3>
            <form class="ui action left icon input" action="" method="GET">
                <i class="search icon"></i>
                <input type="text" name="id" placeholder="Search...">
                <button class="ui teal button" type="submit">Search</button>
            </form>
            
            <div class="column left">
                <table class="ui celled padded table">
                <tr>
                    <th class="single line">id</th>
                    <th>username</th>
                </tr>
            </div>
            
            <div class="ui divider"></div>
        </div>
    </div>
</div>

<?php

    require_once 'functions.php';

    $id = @$_GET['id'];

    $query = "SELECT * FROM users WHERE id = $id;";
    $result = mysqli_query($conn,$query);
    $rowcount = @mysqli_num_rows($result);

    for($i=0;$i<$rowcount;$i++){
        $result_arr = mysqli_fetch_assoc($result);
    
        $id = $result_arr['id'];
        $username = $result_arr['user'];
        $password = $result_arr['passwd'];

        echo "<tr><td>$id</td><td>$username</td></tr>";
    }

?>

</body>
</html>










