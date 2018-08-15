@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

<!-- 在这儿输入内容 -->
<!-- 在这儿输入内容 -->
<!-- 在这儿输入内容 -->

<!-- 显示验证错误 -->
    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/user/store" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">用户名：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="username" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">头像：</label>
                                    <div class="mws-form-item">
                                        <input type="file" name="imgpath" class="large">
                                    </div>
                                </div>
                               <div class="mws-form-row bordered">
                                    <label class="mws-form-label">密码：</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="password" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">确认密码：</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="repassword" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">手机号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="phone" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">邮箱：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="email" class="large">
                                    </div>
                                </div>
                            <div class="mws-button-row">
                                <input type="submit" value="提交" class="btn btn-success btn-small">
                                <input type="reset" value="重置" class="btn btn-warning btn-small">
                            </div>
                        </form>
                    </div>      
                </div>

@endsection
