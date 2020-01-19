<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="/Public/res/element/element.css">
    <script type="text/javascript" src="/Public/res/element/vue.js"></script>
    <script type="text/javascript" src="/Public/res/element/element.js"></script>
    <script type="text/javascript" src="/Public/res/element/axios.min.js"></script>
    <script type="text/javascript" src="/Public/res/element/vue-router.js"></script>
    <script type="text/javascript" src="/Public/res/js/md5.js"></script>
    <style>
        .login{
            width:450px;
            margin: 100px auto;
        }
        .login .yl-input{
            width:400px;
            height: 40px;
            line-height: 40px;
            padding: 10px;
            clear: both;
        }
        .yl-float{
            float:left;
        }
        .yl-btn{
            text-align: center;
        }
        .yl-input-size{
            width:300px;
        }
        .yl-login-label{
            text-align: center;
            height:40px;
            font-size: 22px;
        }
    </style>
</head>
<body>
<div id="app">
    <el-container>

        <el-main class="login">
            <div class="yl-login-label">登录</div>
            <div class="yl-input">
                <div class="yl-float">账号：</div>
                <div class="yl-float yl-input-size">
                    <el-input placeholder="请输入账号" v-model="input1" value="" clearable></el-input>
                </div>

            </div>
            <div class="yl-input">
                <div class="yl-float">密码：</div>
                <div class="yl-float yl-input-size">
                    <el-input placeholder="请输入密码" v-model="input2" clearable @keydown.enter="yl_get"></el-input>
                </div>
            </div>
            <div class="yl-btn">
                <el-button v-on:click="yl_get" >登录</el-button>
                <!--<el-button @click = "counter++">{{counter}}</el-button>-->
                <el-button>取消</el-button>
            </div>
        </el-main>
        <el-footer></el-footer>
    </el-container>
</div>

</body>
<script>
    var vv = new Vue({
        el: '#app',
        data:{
            router: new VueRouter(),
                input1: '',
                input2: '',
                /*counter:0,*/
        },
        methods:{
            yl_get:function(event){
                const self = this;
                const params = new URLSearchParams();
                params.append('username', this.input1);
                var a = b64_md5(this.input2);
                console.log(a);
                params.append('password', b64_md5(this.input2));
                axios.post('/admin/admin/login', params).then(function (response) {
                    if(response.data == true){
                        self.$message({
                            message: '登录成功',
                            type: 'success'
                        });
                        window.location.href = '/admin/home/index';
                        //vv.router.push('/admin/home/index');
                    }else{
                        self.$message.error('账号或则密码错误');
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }
        },

    })
</script>
</html>