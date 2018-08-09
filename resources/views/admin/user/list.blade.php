<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>1114</title>
    <link rel="stylesheet" type="text/css" href="/a/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/a/css/main.css"/>
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
                    <a href="#"><i class="icon-font">&#xe003;</i>管理</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe008;</i>用户列表</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>用户添加</a></li>
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
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">3</option>
                                    <option value="20">5</option>
                                    <option value="20">10</option>
                                </select>
                            </td>
                            <td>页</td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="guanjianzi" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="username" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
               
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>密码</th>
                            <th>手机号</th>
                            <th>邮箱</th>
                            <th>审核状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($data as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="58" type="checkbox"></td>
                           <td>{{ $v->id }}</td>
                           <td>{{ $v->username }}</td>
                           <td>{{ $v->password }}</td>
                           <td>{{ $v->phone }}</td>
                           <td>{{ $v->email }}</td>
                           <td></td>
                            <td>
                                <a class="" href="#">修改</a>
                                <a class="" href="/admin/index/destroy/{{ $v->id }}">删除</a>
                            </td>
                        </tr>
                       @endforeach 
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>


