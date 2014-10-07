<!DOCTYPE html>
<html>
<head>
	<title> </title>
	@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main-layout.css')}}">
	@show
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-menu">
	<div class="container">
		<ul class="nav navbar-nav">
			<li class="dorpdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Memo <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{url('/data-memo')}}">Daftar memo</a></li>
					<li class="divider"></li>
					<li class="data-accept"><a href="{{url('/data-memo/accepted')}}">Memo di setujui</a></li>
					<li class="data-edit"><a href="{{url('/data-memo/edit')}}">Memo harus di ubah</a></li>
					<li class="data-reject"><a href="{{url('/data-memo/rejected')}}">Memo di tolak</a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle ava-menu" data-toggle="dropdown" href="#">
					<img class="avatar" src="{{asset('avatar/'.Auth::user()->avatar)}}"> {{Auth::user()->full_name}} <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->username}}</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
					<li><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
	@yield('content')
</div>
@section('script')
<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
@show
</body>
</html>