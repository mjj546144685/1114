@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

<div class="admin_input">
            <form action="/admin/cates/{{ $cate->id }}" method="post">
                {{ csrf_field() }}
        {{ method_field('PUT') }}
                <ul class="admin_items">
                    <li>
                        <label for="user">分类名称：</label>
                        <input type="text" value="{{ $cate->cname }}" name="cname" class="admin_input_style" />
                    </li>
                     <li>
                    <label for="user">所属类别：</label>
                   <select class="admin_input_style" name="pid">
                       <option value="0">-- 请选择 --</option>
                       @foreach($data as $k=>$v)                      
                        <option value="{{ $v->id }}" @if($cate->pid == $v->id ) selected @endif>{{ $v->cname }}</option>
                       @endforeach
                   </select>
                </li>
                    
                        <input type="submit" value="提交" class="btn btn-success">
                 
                </ul>
            </form>
        </div>
    </div>
    
@endsection
