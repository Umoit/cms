@extends('frontend.global')

@section('content')



<div class="main">

<section class="banner text-center">
    <div class="container">
      <h1 class="banner-title">尤木科技</h1>
      <p class="lead text-muted">分享Magento Worpdress各种技术文章</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Magento</a>
        <a href="#" class="btn btn-secondary my-2">Wordpress</a>
      </p>
    </div>
  </section>


<div class="container">
<div class="row">
    <div class="col-md-8 blog-main">


      <div class="blog-post">
        <h2 class="blog-post-title">{{$article->title}}</h2>
        <p class="blog-post-meta">{{$article->created_at}} <a href="#">{{$article->admin_id}}</a></p>

        {!!$article->content!!}
      </div>

  

      <nav class="blog-pagination">

        <a class="btn btn-outline-primary" href="#">上一篇</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">下一篇</a>

      </nav>

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


