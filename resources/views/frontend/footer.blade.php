<footer class="footer text-center">
            <div class="container">
                 <ul class="footer-menu ">
                          <li >
                            <a href="{{url('/')}}">主页</a>
                          </li>
                      @foreach(App\Category::all() as $category)
                          <li>
                            <a href="{{url($category->url_name)}}">{{$category->name }}</a>
                          </li>
                      @endforeach

                  
                    
                  </ul>
              <a class="logo_link" href="{{url('/')}}">
                <img alt="logo"  class="logo" src="{{asset('frontend/img/logo-dark.png')}}">
              </a>
                  <p class="copy-right">© Copyright 2017 umoit.com   <a href="http://www.beian.miit.gov.cn/">粤ICP备17025826号 </a></p>
            </div>
        </footer>
