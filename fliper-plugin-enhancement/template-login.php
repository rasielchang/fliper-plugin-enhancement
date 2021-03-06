<?php 
/* 
Template Name: FLiPER Login Template
*/
?>

<?php if ( is_user_logged_in() ) { wp_safe_redirect( site_url() . '/apply-columnist' ); } ?>


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
    font-weight: normal;
  }
  a {
    text-decoration: none;
    font-weight: normal;
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
    background:#67ae55;
    border:1px solid #67ae55;
    font-size: 14px;
    width: 190px;
    text-transform: none;
    margin-right:15px;
    padding:0px;
  }
  #login-block #email-input {
    margin-bottom:0px;
    border-radius: 4px 4px 0 0;
  }
  #login-block #password-input {
    border-top:0px;
    border-radius: 0 0 4px 4px;
  }
  #login-block .sub-title {
    font-size: 21px;
    text-align: center;
    color:#fff;
  }
  #login-block #login-form {
    margin-bottom:0px;
  }
  #login-block #facebook-login-button button{
    background-color:#3B5998;
    border:1px solid #3B5998;
    text-decoration: none;
    color:#fff;
    font-size:14px;
    font-weight: normal;
    text-transform: none;
  }
  #login-block .description {
    font-size:12px;
    color:#fff;
    text-decoration: underline;
    margin-right:20px;
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
  #login-page #button-top-fix button {
    background: #fff;
    font-size:14px;
    position: fixed;
    top:20px;
    right:20px;
    color:#000;
    text-decoration: none;
  }
  .error-notice {
    color:#000;
    border-radius:3px;
    font-size:12px;
    padding:10px;
    background:rgb(255, 236, 236);
    border:1px solid #f5aca6;
  }
  .mobile-show {
    display:none;
  }
  @media only screen and ( max-width: 999px ) {
    .mobile-hide {
      display:none;
    }
    .mobile-show {
      display:block;
    }
    .backstretch {
      display:none;
    }
  }
  </style>

</head>
<body id="login-page" <?php body_class(); ?>>

  <div class="mobile-hide">

    <div class="container">
      <div class="row">
        <div id="login-block">
          <h1 id="logo"><a href="/">FLiPER MAG</a></h1>
          <p class="sub-title">寫下思想，傳遞溫度</p>
          <a  id="facebook-login-button" href="<?php echo site_url(); ?>/wp-login.php?loginFacebook=1&redirect=<?php echo site_url(); ?>/apply-columnist/form" onclick="window.location = '<?php echo site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" class="fliper-fb-login" style="color:#fff;">
            <button class="button-default u-full-width">使用 Facebook 帳號申請</button>
          </a>
          <form id="login-form" name="loginform" action="<?php echo get_option( 'home' ); ?>/wp-login.php" method="post">
            <p class="sub-title" style="margin-bottom: 16px;margin-top: 5px;">或</p>
            <input name="log" class="u-full-width" type="text" placeholder="電子信箱" id="email-input" />
            <input name="pwd" class="u-full-width" type="password" placeholder="密碼" id="password-input" />
            <?php //<p class="error-notice">帳號或密碼錯誤，請重新輸入</p> ?>
            <input name="wp-submit" class="button-primary" type="submit" id="login-submit" value="使用 FLiPER 帳號申請" />
            <input type="hidden" name="redirect_to" value="<?php echo get_option( 'home' ); ?>/apply-columnist/form" />
            <input type="hidden" name="testcookie" value="1" />
            <a class="description" href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" target="_blank">忘記密碼</a>
            <a class="description" href="<?php echo site_url(); ?>/apply-columnist/registration">註冊 FLiPER 帳號</a>
            <p><a class="description" href="<?php echo site_url(); ?>/apply-columnist" target="_blank">成為 FLiPER 專欄作家可以幹嘛？</a></p>
          </form>
        </div>
      </div>
    </div>

    <div id="footer">
      <ul class="clearfix">
        <li><a href="/terms-of-service/" target="_blank">服務條款</a></li>
        <li><a href="/privacy-policy/" target="_blank">隱私權政策</a></li>
      </ul>
    </div>

  </div>

  <div class="mobile-show">

    <p style="padding:20px;">請使用寬度超過 1000 px 的螢幕觀看</p>

  </div>


  <?php wp_footer(); ?>

  <script type="text/javascript" src="<?php echo plugins_url( "js/jquery.backstretch.min.js", __FILE__ ); ?>"></script>

  <script type="text/javascript">
    jQuery.backstretch( '<?php echo plugins_url( "images/index-background.jpg", __FILE__ ); ?>');
    var e = jQuery('.backstretch').append('<div style="width:100%;height:100%;opacity:0.3;background:#000;"></div>');
  </script>

</body>
</html>
