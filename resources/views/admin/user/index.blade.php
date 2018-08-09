@extends('admin.user.index')

@section('container')
<div id="page_page">
	{!! $data->appends($request)->render()  !!}
</div>
@endsection