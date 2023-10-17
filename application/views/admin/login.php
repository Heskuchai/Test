<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Панель управления - Авторизация</title>
      <!--  Android 5 Chrome Color-->
      <meta name="theme-color" content="#EE6E73">
      <!-- CSS-->
      <link href="http://materializecss.com/css/prism.css" rel="stylesheet">
      <link href="/assets/system/sweetalert.css" rel="stylesheet">
      <link href="http://materializecss.com/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
      <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="/assets/templates/pay/style.css">
	  <script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>
	  <script type="text/javascript"> VK.init({ apiId: <?=bconf('vk_id');?> }); </script> 
   </head>
   <body class="form-bg">
      <br><br>
      <div class="container">
         <div class="row">
            <div class="col s12 m4 l4">
               <p></p>
            </div>
            <div class="col s12 m12 l4">
               <div class="card">
                  <div class="coli-cat">
                     <a class="secondary-content left block-title"><i class="material-icons">supervisor_account</i> </a>  
                     <div class="text-nav">Авторизация</div>
                  </div>
                  <div class="card-content">
                     <form id="send_data" action="javascript:void(null);" onsubmit="call('/admin/login/ajax','send_data')" method="post">
                        <div class="input-field">
                           <input type="email" name="email" class="validate">
                           <label for="email">E-mail</label>
                        </div>
                        <div class="input-field">
                           <input type="password" name="password" class="validate">
                           <label for="pass">Пароль</label>
                        </div>
                        <center>
                           <div id="captcha" ></div>
                        </center>
                        <div class="input-field">
                           <input type="text" name="code" class="validate">
                           <label for="pass">Ответ </label>
                        </div>
                        <button class="btn  waves-effect waves-light widess search-btn checkbtn" type="submit">Вход</button> 
						<a  href="https://oauth.vk.com/authorize?client_id=<?=bconf('vk_id');?>&redirect_uri=http://<?=$_SERVER['HTTP_HOST']?>/admin/login&scope=offline&display=popup&response_type=code&v=5.52" class="btn  waves-effect waves-light widess vkbtn" >Авторизация VK</a> 
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
      <script src="/assets/system/sweetalert-dev.js"></script>
      <script src="/assets/system/main.js"></script>
      <script>
	     $(document).ready(function() { $('.modal-trigger').leanModal(); });
	     VK.Widgets.Auth("vk_auth", {width: "200px", authUrl: '<?=$_SERVER['REQUEST_URI']?>'});
         function loadcpt() {
           $.ajax({ url: "/admin/login/img", cache: true, success: function(html){ $("#captcha").html(html); } });
         }
            $(document).ready(function(){ loadcpt();  });
      </script>
   </body>
</html>