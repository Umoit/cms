@extends('frontend.global')

@section('content')


<div>

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

<section class="service text-center">
  <div class="container">

        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Let's talk product</h2>
            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
          </div>
        </div>

        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Free Chat</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Verified Users</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Fingerprint</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
          </div>
        </div>
    
  </div>


</section>




  <section class="article">
    <div class="container">
      





            
      <div class="row">
          @foreach(App\Article::getArticleByCat(0,3) as $article)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img src="{{$article->img}}" width="100%;" height="200px">
                <div class="card-body">
                  <p class="card-text">{{$article->title}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach


      </div>




    </section>


  </div>





</div>

  






@endsection