@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

 <div class="admin_input">
            <form action="/admin/cates" method="post">
                {{ csrf_field() }}
                <ul class="admin_items">
                    <li>
                        <label for="user">分类名称：</label>
                        <input type="text" value="" name="cname" class="admin_input_style" />
                    </li>
                     <li>
                    <label for="user">所属类别：</label>
                   <select class="admin_input_style" name="pid">
                       <option value="0">-- 请选择 --</option>
                       @foreach($data as $k=>$v)
                       @if(substr_count($v->path,',')==0)
                       <option value="{{$v->id}}" style="font-size:20px;font-weight:bold;">{{ $v->cname }}</option>
                       @elseif(substr_count($v->path,',')==1)
                        <option value="{{$v->id}}" style="color:blue;font-weight:bold;">{{ $v->cname }}</option>
                        @else
                        <option value="{{$v->id}}">{{ $v->cname }}</option>
                        @endif
                       @endforeach
                   </select>
                </li>
                    <button>
                        <input type="submit" value="提交">
                    </button>
                </ul>
            </form>
        </div>
    </div>
@endsection