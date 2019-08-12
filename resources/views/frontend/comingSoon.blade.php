@extends('frontend.global')




@section('content')


<style type="text/css">
html,body{
	height: 88%;
    text-align: center;

}
.cover-container {
    max-width: 42em;
}
.cover-heading{
	padding-top: 2em;
}
.ml-auto, .mx-auto {
    margin-left: auto!important;
}
.mr-auto, .mx-auto {
    margin-right: auto!important;
}
.p-3 {
    padding: 1rem!important;
}
.h-100 {
    height: 100%!important;
}
.w-100 {
    width: 100%!important;
}
</style>

	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

	 <h1 class="cover-heading">页面制作中</h1>
    <p class="lead">当前页面正在维护，后面会继续开放！<br>
	不要返回吗?<br>
确定不要返回吗?<br>
真的真的确定不要返回吗?<br>
好吧.还是随便你要不要真的确定返回吧<br>
    </p>
    <p class="lead">
      <a href="{{url('/')}}" class="btn btn-lg btn-secondary">主页</a>
    </p>

	</div>
   



@endsection


