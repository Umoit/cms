 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>@yield('title', '')尤木科技-Wordpress Magento文章分享</title>
  
  <meta name="keywords" content="@yield('keywords', '')尤木科技,Wordpress Magento文章分享,Wordpress Magento网站设计，Wordpress Magento网站建设 web方案">
  <meta name="description" content="@yield('description', '')尤木科技,Wordpress Magento文章分享,Wordpress Magento网站设计,Wordpress Magento网站建设,Magento Wordpress方案">
 
  
  <link rel="stylesheet" href="{{asset('bootstrap-4.3.1/css/bootstrap.min.css')}}"  />
  <link rel="stylesheet" href="{{asset('frontend/css/global.css')}}"  />
  <link rel="stylesheet" href="{{asset('frontend/css/font.css')}}"  />
	@yield('before-content')
</head>

<body>

@include('frontend.header')


@yield('content')

@include('frontend.footer')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="{{asset('bootstrap-4.3.1/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>


@yield('after-content')


</body>

</html>