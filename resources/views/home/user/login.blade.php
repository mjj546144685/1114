@extends('home.layout.index')

<!--在占位符中填充内容 -->
@section('container')
	    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" role="main">
            <form method="POST" action="/home/login">
			    {!! csrf_field() !!}

			    <div>
			        //Email
			        <input type="email" name="email" value="{{ old('email') }}">
			    </div>

			    <div>
			        //密码
			        <input type="password" name="password" id="password">
			    </div>

			    <div>
			    	//记住我
			        <input type="checkbox" name="remember"> 
			    </div>

			    <div>
			        <button type="submit">登录</button>
			    </div>
			</form>
@endsection