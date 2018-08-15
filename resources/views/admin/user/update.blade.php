<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link rel="stylesheet" type="text/css" href="/a/css/admin_login.css"/>
</head>
<body>
<!-- <div class="admin_login_wrap">
    <div class="adming_login_border">
    <!-- <h1><b><font color="black">后台管理</font></b></h1> -->
        <div class="admin_input">
            <form action="/admin/index/update/{{ $data->id }}" method="post">
                {{ csrf_field() }}
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" value="{{ $data->username }}" name="username" size="40" class="admin_input_style" />
                    </li>

                    <li>
                        <label for="phone">手机号：</label>
                        <input type="text" value="{{ $data->phone }}" name="phone" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="email">邮箱：</label>
                        <input type="text" value="{{ $data->email }}" name="email" size="40" class="admin_input_style" />
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
</body>
</html>