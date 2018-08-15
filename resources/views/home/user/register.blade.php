@extends('home.layout.index')

<!--在占位符中填充内容 -->
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" role="main">
               <form method="POST" action="/home/register">
				    {!! csrf_field() !!}
				    <div>
				        //用户名
				        <input type="text" name="name" value="{{ old('name') }}">
				    </div>

				    <div>
				        //Email
				        <input type="email" name="email" value="{{ old('email') }}">
				    </div>

				    <div>
				        //密码
				        <input type="password" name="password">
				    </div>

				    <div>
				        //确认密码
				        <input type="password" name="password_confirmation">
				    </div>

				    <div>
				         <button type="submit">注册</button>
				    </div>
				</form>
                        @if($errors->any())
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
            </div>
        </div>
    </div>


@endsection