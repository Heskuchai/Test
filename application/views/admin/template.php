<html>
   <head>
      <title>Панель управления - <?=$title?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="/assets/templates/admin/css/materialize.min.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" >
      <link rel="stylesheet" href="/assets/templates/admin/css/ghpages-materialize.css">
      <link href="https://cdn.materialdesignicons.com/1.4.57/css/materialdesignicons.min.css" rel="stylesheet" >
      <link href='https://fonts.googleapis.com/css?family=Roboto:100normal,100italic,300normal,300italic,400normal,400italic,500normal,500italic,700normal,700italic,900normal,900italic|Poiret+One' rel='stylesheet' type='text/css'>
      <link href="/assets/system/sweetalert.css" rel="stylesheet">
      <meta name="theme-color" content="#4DD0E1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="/assets/templates/admin/css/app.min.css">
   </head>
   <body>
      <nav class="nav-fix mc">
         <div class="nav-wrapper">
            <a href="#" class="brand-logo l2">
               Admin Panel
               <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle "><i class="material-icons">menu</i></a></div></a>
            <ul class="right">
               <li><a href="/admin/main/ex" title="Выход"><i class="material-icons">power_settings_new</i></a></li>
            </ul>
         </div>
      </nav>
      <header>
         <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0%);">
            <div class="nav-wrapper mc">
               <center class="l2">Админ панель</center>
            </div>
            <br>
            <li class="bold"><a <?php if($_SERVER['REQUEST_URI'] == '/admin') echo 'style="background-color: rgba(0,0,0,0.05);"'; ?> href="/admin" class="waves-effect "><i class=" material-icons left icon-set">assessment</i> Главная</a></li>
            <li class="bold"><a <?php if($_SERVER['REQUEST_URI'] == '/admin/cases') echo 'style="background-color: rgba(0,0,0,0.05);"'; ?> href="/admin/cases" class="waves-effect"><i class=" material-icons left icon-set">work</i>  Кейсы</a></li>
            <li class="bold"><a <?php if($_SERVER['REQUEST_URI'] == '/admin/pages') echo 'style="background-color: rgba(0,0,0,0.05);"'; ?> href="/admin/pages" class="waves-effect"><i class=" material-icons left icon-set">warning</i>  Вопросы</a></li>
            <li class="bold"><a <?php if($_SERVER['REQUEST_URI'] == '/admin/wins') echo 'style="background-color: rgba(0,0,0,0.05);"'; ?> href="/admin/wins" class="waves-effect"><i class=" material-icons left icon-set">library_books</i>  Выигрыши </a></li>
            <li class="bold"><a <?php if($_SERVER['REQUEST_URI'] == '/admin/users') echo 'style="background-color: rgba(0,0,0,0.05);"'; ?> href="/admin/users" class="waves-effect"><i class=" material-icons left icon-set">supervisor_account</i>  Пользователи </a></li>
            <li class="bold"><a <?php if($_SERVER['REQUEST_URI'] == '/admin/moneyexit') echo 'style="background-color: rgba(0,0,0,0.05);"'; ?> href="/admin/moneyexit" class="waves-effect"><i class=" material-icons left icon-set">assignment_late</i>  Запросы на вывод </a></li>
         </ul>
      </header>
      <main class="mainwrap">
         <div class="container">
         <? $this->load->view($load); ?>
         </div>
		 <br><br>
      </main>
      <script type="text/javascript" src="/assets/templates/admin/js/jquery-2.1.4.min.js"></script>
	    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
      <script src="/assets/templates/admin/js/materialize.js"></script>
      <script src="/assets/system/sweetalert-dev.js"></script>
	  <script src="/assets/system/editor/ckeditor.js"></script>
      <script src="/assets/templates/admin/js/init.js"></script>
	  <script src="/assets/system/main.js"></script>
      <script>CKEDITOR.replace( 'editor1' );</script>
   </body>
</html>
