<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>登陆</title>
    <!-- Bootstrap core CSS -->
    {{ HTML::style('common/css/bootstrap.min.css'); }}
    {{ HTML::style('admin/css/signin.css'); }}
    <!-- Custom styles for this template -->
</head>
<body>
    <div class="col-lg-3">  
      <!--  <p class="help-text-signin">登陆</p> -->
    </div>
    <div class="container help-padding-top">
        @if(Auth::guest())
        {{ Form::open(array('url' => 'login', 'method' => '{POST}', 'class'=>'form-signin' , 'role'=>'form')) }}
       
        <input type="text" name="username" class="form-control help-control" placeholder="用户名" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="密码" required>
        <button class="btn btn-lg btn-primary btn-block help-btn" type="submit">登陆</button>
        {{ Form::close() }}
        @endif 
        @if(Auth::check())
        <div class="alert alert-warning fade in text-center">
            <p class="text-danger">您已经登陆，2s后页面将跳转至后台</p>
        </div>
        <script>
            window.setTimeout("window.location='{{URL::to('/admin/home')}}'",2000); 
        </script>
        @endif 
    </div>
    @if (Session::has('flash_error'))
    <div class="alert alert-warning fade in text-center">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <p class="text-danger">{{Session::get('flash_error')}}</p>
    </div>
    @endif
    {{ HTML::script('js/jquery_1.10.2.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    <script type="text/javascript">
    $(document).ready(function() {
        $(".alert").alert('close')
    }
    </script>
</body>
</html>