<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/a/login/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/plugins/fullcalendar/fullcalendar.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/plugins/fullcalendar/fullcalendar.print.css" media="print">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/a/login/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/a/login/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/a/login/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/a/login/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/a/login/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/login/css/themer.css" media="screen">
<!-- 分页css -->
<link rel="stylesheet" type="text/css" href="/a/login/css/list_page.css" >




<title>MWS Admin - Calendar</title>

</head>

<body>

    <!-- Themer (Remove if not needed) -->  
    <div id="mws-themer">
        <div id="mws-themer-css-dialog">
            <form class="mws-form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, a/login/images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/a/login/images/logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">        
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/a/login/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                        <li><a href="#">登录  </a></li>
                        <li><a href="#">忘记密码</a></li>
                        <li><a href="index.html">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->

            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="/admin/index/index"><i class="icon-users"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/user/list">用户列表</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                        </ul>
                        <a href="#"><i class="icon-list"></i>文章管理</a>
                        <ul>
                            <li><a href="form_layouts.html">文章列表</a></li>
                            <li><a href="form_elements.html">文章添加</a></li>
                        </ul>
                        <a href="#"><i class="icon-caret-down"></i>分类管理</a>
                        <ul>
                            <li><a href="form_layouts.html">分类列表</a></li>
                            <li><a href="form_elements.html">分类添加</a></li>
                        </ul>
                        <a href="#"><i class="icon-facebook-2"></i>友情链接管理</a>
                        <ul>
                            <li><a href="/admin/youqing/index">友情链接列表</a></li>
                            <li><a href="form_elements.html">友情链接添加</a></li>
                        </ul>
                        <a href="#"><i class="icon-facetime-video"></i>轮播图管理</a>
                        <ul>
                            <li><a href="/admin/lbt/index">轮播图列表</a></li>
                            <li><a href="/admin/lbt/add">轮播图添加</a></li>
                        </ul>
                        <a href="#"><i class="icon-newspaper"></i>敏感词管理</a>
                        <ul>
                            <li><a href="/admin/mgc/index">敏感词列表</a></li>
                            <li><a href="/admin/mgc/create">敏感词添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
        </div>
        <!-- 内容开始 -->
        <div id="mws-container" class="clearfix">
        <div class="container">
            <!-- 跳转信息 -->
            @if(session('success'))
            <div class="mws-form-message success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="mws-form-message error">
                {{ session('error') }}
            </div>
            @endif

            
            @section('container')
                    
            @show    
         </div>
    </div>
        <!-- 内容结束 -->
    </div>

    <!-- JavaScript Plugins -->
    <script src="/a/login/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/a/login/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/a/login/js/libs/jquery.placeholder.min.js"></script>
    <script src="/a/login/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/a/login/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/a/login/jui/jquery-ui.custom.min.js"></script>
    <script src="/a/login/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/a/login/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="/a/login/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/a/login/bootstrap/js/bootstrap.min.js"></script>
    <script src="/a/login/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/a/login/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/a/login/js/demo/demo.calendar.js"></script>

</body>
</html>
