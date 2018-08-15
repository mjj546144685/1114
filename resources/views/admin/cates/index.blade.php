@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

<div class="mws-panel grid_8 mws-collapsible">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>分类列表</span>
            <div class="mws-collapse-button mws-inset">
                <span></span></div></div>
                
                    <div class="mws-panel-inner-wrap">
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                             <div id="DataTables_Table_0_length" class="dataTables_length">
                             <form action="/admin/cates" method="get">
                                 <label>显示<select size="1" name="count" aria-controls="DataTables_Table_0">
                                    <option value="2" @if(!empty($request['count']) && isset($request['count']) == 2) selected @endif>2</option>
                                    <option value="5" @if(!empty($request['count']) && isset($request['count']) == 5) selected @endif>5</option>
                                     <option value="10" @if(!empty($request['count']) && isset($request['count']) == 10) selected @endif>10</option>
                                     </select>条</label>
                            </div>
                                     <div class="dataTables_filter" id="DataTables_Table_0_filter"><label>关键字：<input type="text" aria-controls="DataTables_Table_0" name="search">
                                     <input class="btn btn-success" name="cname" value="查询" type="submit"></label>
                                     </div>
                </form>
                
                                        <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 115px;">ID</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 157px;">分类名称</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 142px;">分类路径</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 99px;">分类状态</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 70px;">操作</th>
                                                    <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;"></th>
                                                </tr>
                                            </thead>
                            
                                        <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                                         @foreach($data as $k=>$v)
                                    <td class="  sorting_1">{{ $v->id }}</td>
                                    <td class=" ">{{ $v->cname }}</td>
                                    <td class=" ">{{ $v->pid }}</td>
                                    <td class=" ">{{ $v->path }}</td>
                                    <td class=" "><span class="badge badge-info">{{ $v->status == 1 ? '激活' : '禁用' }}</span></td>
                                    <td class=" ">
                                        <span class="btn-group">
                                            <form>
                                            <a href="/admin/cates/{{ $v->id }}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                                            </form>
                                            <form method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="/admin/cates/{{ $v->id}}" class="btn btn-small"><i class="icon-trash"></i></a>
                                        </form>
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                                @endforeach
                                </table>
                                 <div class="page_page">
                                    {!! $data->appends($page)->render() !!}
                                </div>
                                <div class="dataTables_info" id="DataTables_Table_0_info">
                               
                                </div>
                               
                                </div></div>
                    </div></div>
                </div>

@endsection
