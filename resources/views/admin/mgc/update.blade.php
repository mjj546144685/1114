@extends('admin.layout.index')

<!--在占位符中填充内容 -->
@section('container')

<div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/mgc/update/{{ $data->id }}" method="post">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">用户名：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="mgcname" value="{{ $data->mgcname }}" class="large">
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