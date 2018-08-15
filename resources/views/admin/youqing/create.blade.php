<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/a/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/a/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/a/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="/a/css/admin_login.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="http://www.17sucai.com/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/index/index"><i class="icon-font">&#xe008;</i>用户列表</a></li>
                        <li><a href="/admin/index/create"><i class="icon-font">&#xe005;</i>用户添加</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>轮播图管理</a>
                    <ul class="sub-menu">
                        <li><a href=""><i class="icon-font">&#xe008;</i>轮播图列表</a></li>
                        <li><a href=""><i class="icon-font">&#xe005;</i>轮播图添加</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>友情链接管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/youqing/index"><i class="icon-font">&#xe008;</i>友情链接列表</a></li>
                        <li><a href="/admin/youqing/create"><i class="icon-font">&#xe005;</i>友情链接添加</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!--/sidebar-->
    <div class="admin_input">
            <form action="/admin/youqing/add" method="post">
                {{ csrf_field() }}
                <ul class="admin_items" style="height:0px">
                    <li>
                        <label for="user">网站名：</label>
                        <input type="text" value="" name="username" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">网址：</label>
                        <input type="text" value="" name="url" size="40" class="admin_input_style" />
                    </li>                    
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#" target="_blank">进入前台</a> &copy; 2016 Powered by <a href="#" target="_blank">你的大名</a></p>

</div>
    <!--/main-->
</div>
  
</body>
</html>
