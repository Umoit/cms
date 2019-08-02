<footer class="footer text-center">
            <div class="container">
                 <ul class="footer-menu ">
                          <li >
                            <a href="{{url('/')}}">主页</a>
                          </li>
                      @foreach(App\Category::all() as $category)
                          <li>
                            <a href="#">{{$category->name }}</a>
                          </li>
                      @endforeach

                  
                    
                  </ul>
                  <p class="copy-right">© 2017-2019 Company Name</p>
            </div>
        </footer>
