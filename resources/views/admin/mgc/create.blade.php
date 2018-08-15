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
                        <span>敏感词添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/mgc/store" method="post">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">敏感词：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="mgcname" class="large">
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
