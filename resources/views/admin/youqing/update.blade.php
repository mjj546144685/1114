@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')
        <div class="admin_input">
            <form action="/admin/youqing/update/{{ $data->id }}" method="post">
                {{ csrf_field() }}
                <ul class="admin_items">
                    <li>
                        <label for="user">网站名：</label>
                        <input type="text" value="{{ $data->username }}" name="username" size="40" class="admin_input_style" />
                    </li>

                    <li>
                        <label for="phone">网址：</label>
                        <input type="text" value="{{ $data->url }}" name="url" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#" target="_blank">进入前台</a> &copy; 2016 Powered by <a href="#" target="_blank">你的大名</a></p>
@endsection
