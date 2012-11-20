<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTTF-8" />
    <title>后台管理</title>
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/fp-include/css/bootstrap.min.css"/>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading, .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"], .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <script type="text/javascript">
      window.onload = function() {
        if(!<?php echo ($loginFlag); ?>) {
          alert("用户名或密码错误！");
        }
      }
    </script>
  </head>
  <body>
    <div class="container">

      <form class="form-signin" action="login" method="post">
        <h2 class="form-signin-heading">后台管理</h2>
        <input name="username" type="text" class="input-block-level" placeholder="账号">
        <input name="password" type="password" class="input-block-level" placeholder="密码">
        <button class="btn btn-large btn-primary" type="submit">
          登陆
        </button>
      </form>

    </div>
    <!-- /container -->
  </body>
</html>