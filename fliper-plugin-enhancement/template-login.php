<?php 
/* 
Template Name: FLiPER Login Template
*/
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  
  <title><?php wp_title( '-', true, 'right' ); ?></title>

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css"> -->

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php echo plugins_url( 'css/normalize.css', __FILE__ ); ?>">
  <link rel="stylesheet" href="<?php echo plugins_url( 'css/skeleton.css', __FILE__ ); ?>">

  <style type="text/css">
  a:hover {
    color:#39308e;
  }
  a {
    text-decoration: none;
  }
  #login-block {
    margin-left:-140px;
    left:50%;
    position:fixed;
    width:280px;
    margin-top:-200px;
    top:50%;
  }
  #login-block #logo a{
    display:block;
    background:url(<?php echo plugins_url( 'images/FLiPER_logo_2015_RGB_WHITE_219.png', __FILE__ ); ?>);
    text-indent: -34965px;
    height: 50px;
    width: 219px;
    margin: 0 auto;
  }
  #login-block #login-submit {
    width: 175px;
  }
  #login-block #sign-up-submit {
    width: 100px;
    padding: 0;
    background-color:#fff; 
  }
  #login-block #email-input {
    margin-bottom:0px;
    border-radius: 4px 4px 0 0;
  }
  #login-block #password-input {
    border-top:0px;
    border-radius: 0 0 4px 4px;
  }
  #login-block p {
    font-size: 21px;
    text-align: center;
    color:#fff;
  }
  #login-block #login-form {
    margin-bottom:0px;
  }
  #login-block #facebook-login-button {
    background-color:#3B5998;
  }
  #login-block #facebook-login-button a {
    text-decoration: none;
    color:#fff;
  }
  #login-block .description {
    font-size:18px;
    color:#fff;
  }
  #login-page #footer {
    position:absolute;
    bottom:0px;
    width:100%;
    text-align: center;
  }
  #login-page #footer ul {
    margin-bottom:0px;
    display:inline-block;
    line-height: 14px;
    font-size: 14px;
  }
  #login-page #footer li {
    float:left;
    list-style: none;
    display:block;
  }
  #login-page #footer li:before {
    padding:0 12px;
    height:14px;
    font-size: 14px;
    content:'|';
    color:#fff;
  }
  #login-page #footer li:first-child:before {
    padding:0px;
    content:'';
  }
  #login-page #footer li a {
    color:#fff;
    text-decoration: none;
  }
  .clearfix:after {
    height: 0px;
    clear:both;
    display:block;
    visibility: hidden;
    content:'.';
    line-height: 0px;
  }
  </style>

</head>
<body id="login-page" <?php body_class(); ?>>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div id="login-block">
        <h1 id="logo"><a href="/">FLiPER MAG</a></h1>
        <p>輕鬆閱讀，來自全世界的創意</p>
        <form id="login-form" name="loginform" action="<?php echo get_option( 'home' ); ?>/wp-login.php" method="post">
          <button id="facebook-login-button" class="button-default u-full-width"><a href="<?php echo site_url(); ?>/wp-login.php?loginFacebook=1&redirect=<?php echo site_url(); ?>" onclick="window.location = '<?php echo site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" class="fliper-fb-login" style="color:#fff;">Facebook Login</a></button>
          <input name="log" class="u-full-width" type="text" placeholder="電子信箱" id="email-input" />
          <input name="pwd" class="u-full-width" type="password" placeholder="密碼" id="password-input" />
          <input name="wp-submit" class="button-primary" type="submit" id="login-submit" value="Login" />
          <input type="hidden" name="redirect_to" value="<?php echo get_option( 'home' ); ?>" />
          <input type="hidden" name="testcookie" value="1" />
          <input class="button-default" type="submit" id="sign-up-submit" value="Sign Up" />
        </form>
        <p><a class="description" href="" target="_blank">FLiPER 可以幹嘛？</a></p>
      </div>
    </div>
  </div>

<!--
<p id="nav">

<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a>

</p>
-->



  <div id="footer">
    <ul class="clearfix">
      <li><a href="/terms-of-service/" target="_blank">服務條款</a></li>
      <li><a href="/privacy-policy/" target="_blank">隱私權政策</a></li>
    </ul>
  </div>


  <?php wp_footer(); ?>

  <script type="text/javascript" src="<?php echo plugins_url( "js/jquery.backstretch.min.js", __FILE__ ); ?>"></script>

  <script type="text/javascript">
    jQuery.backstretch( '<?php echo plugins_url( "images/index-background.jpg", __FILE__ ); ?>');
  </script>

</body>
</html>
