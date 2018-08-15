@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>敏感词列表页</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        	<form action="/admin/mgc/index" method="get">
            	<div id="DataTables_Table_0_length" class="dataTables_length">
            		<label>第<select size="1" name="count" aria-controls="DataTables_Table_0">
            			<option value="2" @if(!empty($request['count']) && isset($request['count']) ==2) selected @endif>2</option>
            			<option value="5" @if(!empty($request['count']) && isset($request['count']) ==5) selected @endif>5</option>
            			<option value="10" @if(!empty($request['count']) && isset($request['count']) ==10) selected @endif>10</option>
            		</select>条</label>
            	</div>
            	<div class="dataTables_filter" id="DataTables_Table_0_filter">
            		<th width="70">关键字:</th>
                	<td><input class="common-text" name="search" placeholder="关键字" name="guanjianzi" value="" id="" type="text"></td>
                	<td><input class="btn btn-primary btn2" name="username" value="查询" type="submit"></td>
            	</div>
        	</form>
        	<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <thead>
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 130px;">ID</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">敏感词</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 130px;">操作</th>
                </tr>
            </thead>
            
        	<tbody role="alert" aria-live="polite" aria-relevant="all">
        		@foreach ($data as $k=>$v)
            		<tr class="odd">
                        <td class=" ">{{ $v->id }}</td>
                        <td class=" ">{{ $v->mgcname }}</td>
                        <td class=" ">
                        	<a class="btn btn-warning btn-small" href="/admin/mgc/edit/{{ $v->id }}">修改</a>
                        	<a class="btn btn-danger btn-small" href="/admin/mgc/destroy/{{ $v->id }}">删除</a>
                        </td>
                    </tr>
				@endforeach 
            </tbody>
        </table>
        
        <div class="page_page">
                 {!! $data->appends($page)->render() !!}
        </div>
    </div>
   </div>
</div>


@endsection