<!-- 内容开始 -->
<div class="container">
@if(session('success'))
<div class="mws-form-message success">
	{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mws-form-message success">
	{{ session('error') }}
</div>
@endif
@section('container')

@show
<!-- 内容结束 -->