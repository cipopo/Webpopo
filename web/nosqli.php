<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOSQL Injection</title>

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
            <h3 class="ui header">NoSQL Injection</h3>

            <form class="ui action left icon input" action="" method="GET">
                <i class="search icon"></i>
                <input type="text" name="num" placeholder="Search...">
                <button class="ui teal button" type="submit">Search</button>
            </form>
            
            <div class="column left">
                <table class="ui celled padded table">
                <tr>
                    <th class="single line">num</th>
                    <th>username</th>
                </tr>
            </div>
            
            <div class="ui divider"></div>
        </div>
    </div>
</div>

<?php

// 连接数据库
$manager = new MongoDB\Driver\Manager("mongodb://192.168.99.100:27017");  


// 插入数据
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(["num" => '1', 'username'=>'zhangsan', 'password' => '123456zs']);
$bulk->insert(["num" => '2', 'username'=>'lisi', 'password' => '123456ls']);
$bulk->insert(["num" => '3', 'username'=>'wangwu', 'password' => '123456ww']);
$bulk->insert(["num" => '4', 'username'=>'laoliu', 'password' => '123456ll']);
$bulk->insert(["num" => '5', 'username'=>'xiaoqi', 'password' => '123456xq']);

$manager->executeBulkWrite('nosqli.webpopo', $bulk);


// 查询数据
$num = @$_GET['num'];
$filter = ["num" => $num];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('nosqli.webpopo', $query);

foreach($cursor as $user){
    $num = @$user->num;
    $username = @$user->username;
    echo "<tr><td>$num</td><td>$username</td></tr>";
    break;
}

?>

</body>
</html>










