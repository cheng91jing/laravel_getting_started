@extends('layouts.default')
@section('content')
<div class="jumbotron">
    <h1>Hello Coder</h1>
    <p class="lead">你现在所看到的是  <a href="http://chen91jing.com">Laravel 入门</a> 示例主页</p>
    <p>一切，将从这里开始。</p>
    <p><a class="btn btn-lg btn-success" role="button" href="{{ route('signup') }}">现在注册</a></p>
</div>
@stop
