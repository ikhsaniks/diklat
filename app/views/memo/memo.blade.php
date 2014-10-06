@extends('layout.main-layout')
@section('content')
<div class="row row-white">
	<div class="col-md-9 memo-data text-center">
		<div class="dropdown memo-edit-menu">
			<a data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span></a>
			<ul class="dropdown-menu">
				<li><a href="{{url('/data-memo/edit/'.$memo->id)}}">Ubah</a></li>
				<li class="data-delete"><a href="{{url('/data-memo/delete/'.$memo->id)}}">Hapus</a></li>
			</ul>
		</div>
		<h1>{{$memo->nama_memo}}</h1>
		<h2><small>{{$memo->nomor_memo}}</small></h2>
		<h3><small>{{$memo->status}}</small></h3>
	</div>
	<div class="col-md-3 memo-ava">
		<img class="avatar" src="{{asset('avatar/'.$memo->user->avatar)}}"/>
		<h1>{{$memo->user->full_name}}</h1>
		<small class="memo-date">{{$memo->created_at}}</small>
	</div>
	@if($memo->status_memo == 1)
		<?php
		$status = 'accepted';
		$glyph = 'glyphicon glyphicon-ok';
		?>
		@elseif($memo->status_memo == 2)
		<?php
		$status = 'rejected';
		$glyph = 'glyphicon glyphicon-remove';
		?>
		@elseif($memo->status_memo == 3)
		<?php
		$status = 'edit';
		$glyph = 'glyphicon glyphicon-warning-sign';
		?>
		@else
		<?php
		$status = 'unchecked';
		$glyph = 'glyphicon glyphicon-question-sign';
		?>
	@endif
	<div class="col-md-3 memo-status {{$status}}">
		<h1><span class="{{$glyph}}"></span> {{strtoupper($status)}}</h1>
	</div>
</div>
<div class="row row-white">
	<div class="col-md-9">
		<ul class="list-group">
			<li class="list-group-item">
				<h4 class="list-group-item-heading">RBB:</h4>
				<p class="list-group-item-text">{{$memo->rbb->rbb}}</p>
			</li>
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Karakter:</h4>
				<p class="list-group-item-text">{{$memo->karakter}}</p>
			</li>
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Jumlah:</h4>
				<p class="list-group-item-text">{{$memo->jumlah}}</p>
			</li>
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Lama:</h4>
				<p class="list-group-item-text">{{$memo->lama}} Hari</p>
			</li>
			<li class="list-group-item">
				<h4 class="list-group-item-heading">Anggaran:</h4>
				<p class="list-group-item-text">Rp.{{$memo->anggaran}}</p>
			</li>
		</ul>
	</div>
	<div class="col-md-3 memo-pdf">
		@if($memo->memo === NULL)
		<?php
		$btn = 'disabled';
		$link = '#';
		?>
		@else
		<?php
		$btn = '';
		$link = asset('/memo/'.$memo->memo);
		?>
		@endif
		<a target="__blank" href="{{$link}}" class="btn btn-danger btn-flat {{$btn}}" href="#">
			<img src="{{asset('images/memo.png')}}">
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="up">
		</div>
	</div>
</div>
<div class="row row-white">
	<div class="container">
		<div class="row">
			<div class="col-md-9 form-comment">
				{{Form::open(['url'=>'/data-memo/data/comment','method'=>'POST'])}}
				<div class="form-group">
					{{Form::textarea('comment','',['class'=>'form-control','rows'=>3])}}
				</div>
				<div class="form-group">
					{{Form::hidden('id_memo',$memo->id)}}
					{{Form::hidden('id_user',Auth::user()->id)}}
					<button class="btn btn-primary btn-flat" type="submit">Komentar</button>
				</div>
				{{Form::close()}}
			</div>
		</div> 
		@if(!count($comments)>0)
		<div class="row">
			<div class="col-md-12">
				<h1>Belum ada Komentar</h1>
			</div>
		</div>
		@else
			@foreach($comments as $comment)
			<div class="row">
				<div class="col-md-12">
					<img class="avatar" src="{{asset('avatar/'.$comment->user->avatar)}}">
					<h3>{{$comment->user->full_name}} <small>{{$comment->created_at}}</small></h3>
					<p>{{$comment->comment}}</p>
				</div>
			</div>
			<hr/>
			@endforeach
		@endif
	</div>
</div>
@stop