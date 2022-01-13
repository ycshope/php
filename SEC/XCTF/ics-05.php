<?php
error_reporting(0);

@session_start();
posix_setuid(1000);


?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="layui/css/layui.css" media="all">
    <title>è®¾å¤ç»´æ¤ä¸­å¿</title>
    <meta charset="utf-8">
</head>

<body>
    <ul class="layui-nav">
        <li class="layui-nav-item layui-this"><a href="?page=index">äºå¹³å°è®¾å¤ç»´æ¤ä¸­å¿</a></li>
    </ul>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>è®¾å¤åè¡¨</legend>
    </fieldset>
    <table class="layui-hide" id="test"></table>
    <script type="text/html" id="switchTpl">
        <!-- è¿éç checked çç¶æåªæ¯æ¼ç¤º -->
    <input type="checkbox" name="sex" value="{{d.id}}" lay-skin="switch" lay-text="å¼|å³" lay-filter="checkDemo" {{ d.id==1 0003 ? 'checked' : '' }}>
    </script>
    <script src="layui/layui.js" charset="utf-8"></script>
    <script>
        layui.use('table', function() {
            var table = layui.table,
                form = layui.form;

            table.render({
                elem: '#test',
                url: '/somrthing.json',
                cellMinWidth: 80,
                cols: [
                    [{
                            type: 'numbers'
                        },
                        {
                            type: 'checkbox'
                        },
                        {
                            field: 'id',
                            title: 'ID',
                            width: 100,
                            unresize: true,
                            sort: true
                        },
                        {
                            field: 'name',
                            title: 'è®¾å¤å',
                            templet: '#nameTpl'
                        },
                        {
                            field: 'area',
                            title: 'åºå'
                        },
                        {
                            field: 'status',
                            title: 'ç»´æ¤ç¶æ',
                            minWidth: 120,
                            sort: true
                        },
                        {
                            field: 'check',
                            title: 'è®¾å¤å¼å³',
                            width: 85,
                            templet: '#switchTpl',
                            unresize: true
                        }
                    ]
                ],
                page: true
            });
        });
    </script>
    <script>
        layui.use('element', function() {
            var element = layui.element; //å¯¼èªçhoverææãäºçº§èåç­åè½ï¼éè¦ä¾èµelementæ¨¡å
            //çå¬å¯¼èªç¹å»
            element.on('nav(demo)', function(elem) {
                //console.log(elem)
                layer.msg(elem.text());
            });
        });
    </script>

    <?php

    $page = $_GET[page];

    if (isset($page)) {



        if (ctype_alnum($page)) {
    ?>

            <br /><br /><br /><br />
            <div style="text-align:center">
                <p class="lead"><?php echo $page;
                                die(); ?></p>
                <br /><br /><br /><br />

            <?php

        } else {

            ?>
                <br /><br /><br /><br />
                <div style="text-align:center">
                    <p class="lead">
                        <?php

                        if (strpos($page, 'input') > 0) {
                            die();
                        }

                        if (strpos($page, 'ta:text') > 0) {
                            die();
                        }

                        if (strpos($page, 'text') > 0) {
                            die();
                        }

                        if ($page === 'index.php') {
                            die('Ok');
                        }
                        include($page);
                        die();
                        ?>
                    </p>
                    <br /><br /><br /><br />

            <?php
        }
    }


    //æ¹ä¾¿çå®ç°è¾å¥è¾åºçåè½,æ­£å¨å¼åä¸­çåè½ï¼åªè½åé¨äººåæµè¯

    if ($_SERVER['HTTP_X_FORWARDED_FOR'] === '127.0.0.1') {

        echo "<br >Welcome My Admin ! <br >";

        $pattern = $_GET[pat];
        $replacement = $_GET[rep];
        $subject = $_GET[sub];

        if (isset($pattern) && isset($replacement) && isset($subject)) {
            preg_replace($pattern, $replacement, $subject);
        } else {
            die();
        }
    }





            ?>

</body>

</html>