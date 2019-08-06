

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container">
    <a class="navbar-brand" href="#">Umoit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
              <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/')}}">主页</a>
              </li>
          @foreach(App\Category::all() as $category)
              <li class="nav-item {{ Request::is('$category->name') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/',$category->url_name)}}">{{$category->name }}</a>
              </li>
          @endforeach

      
        
      </ul>
      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="搜索" aria-label="Search">
      </form>
    </div>
  </div>
</nav>
</header>