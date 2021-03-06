<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/XSL/Transform" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="UTF-8">
 <title>后台管理</title>
 <link rel="stylesheet" href="/Public/res/element/element.css">
 <script type="text/javascript" src="/Public/res/element/vue.js"></script>
 <script type="text/javascript" src="/Public/res/element/element.js"></script>
 <script type="text/javascript" src="/Public/res/element/axios.min.js"></script>
 <script type="text/javascript" src="/Public/res/element/vue-router.js"></script>

</head>
<style>
 el-header {
  background-color: #B3C0D1;
  color: #333;
  line-height: 60px;
 }
 el-aside {
  color: #333;
 }
</style>
<body>
<div id="app">
     <el-container>
         <el-header style="text-align: right; font-size: 12px;border-bottom: solid 1px #dbddde;">
             <div style="float:left;font-size: 20px;">管理平台</div>
             <el-row>
                 <el-button type="info">用户：{{ username }}</el-button>
                 <el-button type="danger" v-on:click="click_logout">退出登录</el-button>
             </el-row>
         </el-header>
          <el-container style="height: 800px;">
              <el-aside width="200px" style="background-color: #b9c7dc;">
                  <el-menu >
                      <el-menu-item index="1" v-on:click="click_menu" data="/admin/home/home"><i class="el-icon-eleme"></i>首页</el-menu-item>
                      <el-submenu index="2">
                          <template slot="title"><i class="el-icon-setting"></i>其他</template>
                          <el-menu-item index="2-1" v-on:click="click_menu" data="http://www.baidu.com">百度</el-menu-item>
                          <el-menu-item index="2-2" v-on:click="click_menu" data="http://www.google.com">谷歌</el-menu-item>
                      </el-submenu>
                  </el-menu>
                  <el-menu v-for="(val,key) in menu_data">
                      <el-submenu :index="val.path">
                          <template slot="title"><i class="el-icon-message"></i>{{ val.name }}</template>
                          <el-menu-item :index="children_val.path" v-for="(children_val,children_key) in val.children" v-on:click="click_menu" :data="children_val.url">
                              {{ children_val.name }}
                          </el-menu-item>
                      </el-submenu>
                  </el-menu>

              </el-aside>
               <el-container>
                   <div>{{default_menu}}</div>
                <el-main style="height:100%;overflow-y: hidden;">
                    <iframe v-bind:src="default_menu" style="width: 100%;height:100%;border-style: hidden;"></iframe>
                </el-main>

                <el-footer>
                    <div style="text-align: center;">
                        copyright@youli
                    </div>
                </el-footer>
               </el-container>
          </el-container>
     </el-container>
</div>

</body>
</html>
<script>
    var user_name = "<?php echo $username;?>";
    var vv = new Vue({
        el: '#app',
        data:{
            menu_data:[],
            username:user_name,
            default_menu:'/admin/home/home'
        },
        methods:{
            click_menu:function(event){
                this.$message('点击菜单');
                this.default_menu = event.$attrs.data;
            },
            click_logout:function(event){

                axios.get('/admin/admin/logout').then(function (response) {
                    if(response.data == true){
                        vv.$message({
                            message: '退出成功',
                            type: 'success'
                        });
                        window.location.href = '/admin/index/index';
                        //vv.router.push('/admin/home/index');
                    }else{
                        vv.$message.error('退出失败');
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            },
        },
        mounted(){
            axios.get('/admin/home/getMenu')
                .then(function (response) {
                    console.log(response.data);
                    vv.menu_data = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
    });
</script>