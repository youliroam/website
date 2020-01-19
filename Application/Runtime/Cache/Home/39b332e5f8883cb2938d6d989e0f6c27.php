<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <!-- import CSS -->
    <link rel="stylesheet" href="/Public/res/element/element.css?v=1">
    <script type="text/javascript" src="/Public/res/element/vue.js"></script>
    <script type="text/javascript" src="/Public/res/element/element.js"></script>
</head>
<body>
<div id="app">
    <el-button @click="visible = true">Button</el-button>
    <el-dialog :visible.sync="visible" title="Hello world">
        <p>Try element</p>
    </el-dialog>
</div>
</body>

<script>
    new Vue({
        el: '#app',
        data: function() {
            return { visible: false }
        }
    });

</script>
</html>
    <div id="sy">
        home222222 首页
        <el-button @click="visible = true">Button</el-button>
        <el-dialog :visible.sync="visible" title="Hello world">
            <p>shouye xinxi</p>
        </el-dialog>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <div>
        尾部
    </div>
</body>
</html>
<script>
    console.log(11111);
    new Vue({
        el: '#sy',
        data: function() {
            return { visible: false }
        }
    });
</script>