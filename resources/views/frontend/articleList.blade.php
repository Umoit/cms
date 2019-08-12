@extends('frontend.global')




@section('content')



<div class="main">

<section class="banner text-center">
    <div class="container">
      <h1 class="banner-title">尤木科技</h1>
      <p class="lead text-muted">分享Magento Worpdress各种技术文章</p>
      <p>
        <a href="{{url('magento')}}" class="btn btn-primary my-2">Magento</a>
        <a href="{{url('wordpress')}}" class="btn btn-secondary my-2">Wordpress</a>
      </p>
    </div>
  </section>


<div class="container">
<div class="row">
    <div class="col-md-8 blog-list">

        @foreach($articles as $article)
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm ">

        <div class="article-thum">
            @if($article->img)
            <a href="{{url('article',$article->id)}}">
              <img class=" rounded" src="{{$article->img}}" width="160" height="100" />
            </a>
            @else
            <svg class="bd-placeholder-img" width="160" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"></rect></svg>
            @endif
          </div>

          <div class="col p-3">
            <div class="mb-1 text-muted">{{$article->created_at->format('Y-m-d')}}</div>
            <p class="card-text mb-auto">{{$article->title}}</p>
            <a href="{{url('article',$article->id)}}">阅读全文</a>
          </div>
          
        </div>
        @endforeach


    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">

      <div class="sidebar-info">
        <h4 class="sidebar-title">关于我们</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

       <div class="sidebar-menu">
        <h4 class="sidebar-title">菜单</h4>
        <ol class="list-unstyled">
            @foreach(\App\Category::all() as $category)
              <li><a href="#" class="">{{$category->name}}</a></li>
            @endforeach
        </ol>
      </div>

      <div class="sidebar-tag">
        <h4 class="sidebar-title">标签</h4>
        <ol class="list-unstyled">
            @foreach(\App\Tag::all() as $tag)
              <li><a href="#" class="btn btn-sm btn-primary">{{$tag->name}}</a></li>
            @endforeach
        </ol>
      </div>

      
    </aside><!-- /.blog-sidebar -->

  </div>
</div>


</div>

@endsection


