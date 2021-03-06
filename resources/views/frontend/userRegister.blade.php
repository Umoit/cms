@extends('frontend.global')

@section('content')
<div id="wrap">
  <div class="main container">
    <div class="entry">
   <div class="entry-content clearfix">
    <div class="member-form-wrap member-form-full member-form-boxed card" >
     <div class="member-form-inner">
      <div class="member-form-head clearfix">
       <h3 class="member-form-title">注册 <span class="member-switch pull-right">已经有帐号？ <a href="{{route('login')}}">马上登录</a></span></h3>
      </div>
      <div class="wpcom-errmsg j-errmsg"></div>
      <form id="register-form" class="member-form j-member-form" method="post">
       <div class="form-group">
        <label><i class="fa fa-user"></i> <input type="text" class="form-input " name="name" placeholder="请输入用户名"  /></label>
       </div>
       <div class="form-group">
        <label><i class="fa fa-envelope"></i> <input type="text" class="form-input " name="email" placeholder="请输入电子邮箱" data-rule="email"  /></label>
       </div>
       <div class="form-group">
        <label><i class="fa fa-lock"></i> <input type="password" class="form-input " name="password" placeholder="请输入登录密码" data-rule="password"  /></label>
       </div>
       <div class="form-group">
        <label><i class="fa fa-lock"></i> <input type="password" class="form-input " name="password_confirmation" placeholder="请输入登录密码" data-rule="password:user_pass"  /></label>
       </div>
       <div class="form-group">
          <label><i class="fa fa-barcode"></i><input type="text" style="width:55%;display:inline-block;margin-right:10px;" class="form-input require" id="user_password" name="captcha" placeholder="验证码">
              <img style="vertical-align:middle;cursor:pointer;" id="captcha_img" src="{{captcha_src()}}" onclick="this.src ='/captcha/default?'+Math.random() "></label>
             
        
       </div>


       
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group" style="color: red">
          @if (count($errors) > 0)
                      @foreach ($errors->all() as $error)
                          <li style="margin-bottom:0">{{ $error }}</li>
                      @endforeach
          @endif

        </div>


       <div class="last" style="margin-top: 25px;"> 
        <input class="btn btn-login btn-block btn-lg" type="submit" id="submit" value="提交注册"  />
       </div>
      </form>
     </div>
     <div class="member-form-social">
      <div class="member-form-head clearfix">
       <h3 class="member-form-title">也可使用以下帐号<br />简单注册快人一步</h3>
      </div>
      <ul class="member-social-list">
       <li class="social-item social-qq"> <a href="http://demo.wpcom.cn/justnews/login?type=qq&amp;action=login" target="_blank"><i class="fa fa-qq"></i> QQ登录</a></li>
       <li class="social-item social-weibo"> <a href="http://demo.wpcom.cn/justnews/login?type=weibo&amp;action=login" target="_blank"><i class="fa fa-weibo"></i> 微博登录</a></li>
       <li class="social-item social-wechat2"> <a href="http://demo.wpcom.cn/justnews/login?type=wechat2&amp;action=login" target="_blank"><i class="fa fa-wechat"></i> 微信登录</a></li>
      </ul>
     </div>
    </div>
   </div>
  </div>
  </div>
</div>
@endsection


@section('after-content')
<script type="text/javascript">
  autoheight();
  function autoheight(){
    var winHeight=0;
    if (window.innerHeight)
      winHeight = window.innerHeight;
    else if ((document.body) && (document.body.clientHeight))
      winHeight = document.body.clientHeight;
    if (document.documentElement && document.documentElement.clientHeight)
      winHeight = document.documentElement.clientHeight;
    document.getElementById("wrap").style.height= winHeight-130 +"px";
  }
  window.onresize=autoheight; //浏览器窗口发生变化时同时变化DIV高度
</script>
@endsection