<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Injection</title>

    <link rel="stylesheet" type="text/css" href="dist/semantic.css">
    <script src="./vue.min.js"></script>
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

            <h3 class="ui header">Template Injection</h3>
            <form class="ui action left icon input" action="">
                <i class="search icon"></i>
                <input type="text" name="number" value="<?= htmlspecialchars((string) @$_GET['number']) ?>" placeholder="">
                <button class="ui teal button" type="submit">输入</button>
            </form>

            <div class="ui divider"></div>

            <div id="root">
                <h4>
                    输出: <?= htmlspecialchars((string) @$_GET['number']) ?>
                </h4>
                <button class="ui button" @click="handleClick">
                    {{count}}
                </button>
            </div>
        </div>

    </div>

</div>




<script>
    new Vue({
        el:"#root",
        data: {
            count:0
        },
        methods: {
            handleClick: function() {
                this.count ++
            }
        }
    })
</script>

</body>
</html>