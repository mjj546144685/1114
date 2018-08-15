@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

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
@endsection
