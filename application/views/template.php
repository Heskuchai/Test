<!doctype html>
<html lang="ru">
   <head>
      <title><?=config('site_name');?> - <?=$title;?></title>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="/assets/css/animate.css" />
      <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
      <script type="text/javascript" src="/assets/js/jquery-1.9.1.js"></script>
      <script type="text/javascript" src="/assets/js/wScratchPad.min.js"></script>
      <script type="text/javascript" src="/assets/js/jquery.arcticmodal-0.3.min.js"></script>
      <script type="text/javascript" src="/assets/js/socket.js"></script>
      <script type="text/javascript" src="/assets/js/app.js"></script>
      <script type="text/javascript" src="/assets/js/script.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <link href="http://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="//ulogin.ru/js/ulogin.js"></script>
      <link rel="icon" type="image/x-icon" href="<?=config('fav_url');?>" />
      <link rel="shortcut icon" href="<?=config('fav_url');?>" />
   </head>
   <body>
      <div class="inputs">
         <div class="inputs_info inputs_green alert-success" style="display:none;">
            <div class="close"></div>
            <em></em>
         </div>
         <div class="inputs_info inputs_red alert-error" style="display:none;">
            <div class="close"></div>
            <em></em>
         </div>
      </div>
      <div style="display:none;">
      </div>
      <? if (!empty($this->session->id)) { ?>
      <div style="display:none;">
         <div class="modal" id="modal-1" style="width:358px;">
            <div class="modal-y">
               <div class="modal-title">ПОПОЛНЕНИЕ <b>БАЛАНСА</b></div>
               <form class="form">
                  <div class="form-text">Введите сумму в рублях, на которую хотите пополнить <br> ваш счет на сайте</div>
                  <input type="text" value="<?=config('min_bet');?>" class="form-input merchant_sum" style="width:125px;">
                  <div class="clear"></div>
                  <input type="submit" class="form-button merchant" value="Пополнить баланс">
               </form>
            </div>
         </div>
         <div class="modal" id="modal-2" style="width:358px;">
            <div class="modal-y">
               <div class="modal-title">Вывод <b>кредитов</b></div>
               <div class="form">
                  <div class="form-text-2">Количество выигранных кредитов:</div>
                  <input type="text" value="<?=user('wf_coint');?>" class="form-input credit_value" style="width:125px;">
                  <div class="clear"></div>
                  <div class="form-text">Вам нужно указать почту от аккаунта Warface, на который будут перечислены выигрышные кредиты. <br>Кредиты будут на Вашем аккаунте в течении 24 часов</div>
                  <input type="text" placeholder="Адрес электронной почты" class="form-input withdraw_email" style="width:284px;">
                  <div class="clear"></div>
                  <input type="submit" class="form-button withdraw" value="Вывести кредиты">
               </div>
            </div>
         </div>
         <div class="modal" id="modal-3" style="width:608px;">
            <div class="modal-y" style="padding-bottom:5px;">
               <div class="modal-title">Ваш <b>инвентарь</b></div>
               <div class="viewn-content inventory">
                  <div class="viewn-content">
				     <? foreach ($user_wins as $win) { ?>
                     <div class="live-i1 live-<?=$win->color;?> credit">
                        <div class="live-val"></div>
                        <div class="live-col"><?=$win->award;?>k</div>
                     </div>
					 <? } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal" id="modal-4" style="width:608px;">
            <div class="modal-y" style="padding-bottom:5px;">
               <div class="modal-title" style="margin-bottom:5px;">история <b>выводов</b></div>
               <div class="hist">
                  <div class="hist-i">
                     <div>дата</div>
                     <div>e-mail</div>
                     <div>кредитов</div>
                     <div>статус</div>
                  </div>
				  <? $st = array('1' => 'Ожидается', '2' => 'Выплачено'); ?>
				  <? foreach( $wt as $eu ) { ?>
                  <div class="hist-i">
                     <div><?=$eu->date;?></div>
                     <div><?=$eu->email;?></div>
                     <div><?=$eu->money;?>K</div>
                     <div><?=$st[$eu->status];?></div>
                  </div>
				  <? } ?>
               </div>
            </div>
         </div>
      </div>
      <? }  ?>
      <div class="wrapper">
         <div class="header">
            <a href="/" style="background:url(<?=config('logo_url');?>) no-repeat 0 0;" class="logo"></a>
            <? if (empty($this->session->id)) { ?>
            <div id="uLogin1" data-ulogin="display=buttons;fields=first_name,last_name,nickname,photo;theme=flat;providers=steam;redirect_uri=http://<?=$_SERVER['HTTP_HOST'];?>/login">
               <a data-uloginbutton="vkontakte" style="cursor:pointer;" class="login">Войти через ВК</a>
            </div>
            <? } else { ?>
            <div class="mini-profile">
               <a href="/login/logout" class="mini-profile-logout"></a>
               <div class="mini-profile-ava">
                  <a href="https://vk.com/id<?=user('network_id');?>"></a>
                  <img src="<?=user('avatar');?>" alt="" />
               </div>
               <div class="hidden">
                  <div class="mini-profile-info mini-profile-info-1">
                     <div class="mini-profile-text"><?=user('nickname');?></div>
                     <a href="#" onclick="$('#modal-3').arcticmodal(); return false;">Инвентарь</a>
                  </div>
                  <div class="mini-profile-info mini-profile-info-2">
                     <div class="mini-profile-text"><b>ВЫИГРЫШ:</b> <font class="credit_value"><?=user('wf_coint');?></font> К</div>
                     <a href="#" onclick="$('#modal-2').arcticmodal(); return false;">Вывести</a>
                  </div>
                  <div class="mini-profile-info mini-profile-info-3">
                     <div class="mini-profile-text"><b>БАЛАНС:</b> <?=user('money');?> Р</div>
                     <a href="#" onclick="$('#modal-1').arcticmodal(); return false;">Пополнить</a>
                  </div>
               </div>
            </div>
            <? }  ?>
            <ul class="nav">
               <li><a <?php if($_SERVER['REQUEST_URI'] == '/') {echo 'class="active"';}else{echo "";} ?> href="/">Главная</a></li>
               <li><a <?php if($_SERVER['REQUEST_URI'] == '/top') {echo 'class="active"';}else{echo "";} ?> href="/top">Топ игроков</a></li>
               <li><a <?php if($_SERVER['REQUEST_URI'] == '/faq') {echo 'class="active"';}else{echo "";} ?> href="/faq">Частые вопросы</a></li>
               <? if (empty($this->session->id)) { ?><li><a <?php if($_SERVER['REQUEST_URI'] == '/tech') {echo 'class="active"';}else{echo "";} ?> href="/tech">Техническая поддержка</a></li><? } else { ?><li class="lasted"><a href="#" onclick="$('#modal-4').arcticmodal(); return false;">История выводов</a></li><? }  ?>
            </ul>
         </div>
         <div class="live">
            <div class="live-content">
               <? foreach($wins as $win) { ?>
               <div class="live-i live-<?=$win->color;?> credit">
                  <a href="https://vk.com/id<?=$win->user->network_id;?>" class="live-ava" target="_blank"><img src="<?=$win->user->avatar;?>" alt="" /></a>
                  <div class="live-val"></div>
                  <div class="live-col"><?=$win->award;?>k</div>
               </div>
               <? } ?>
            </div>
         </div>
         <? $this->load->view($load); ?>
         <div class="footer">
            <div class="footer-text">
               Все права защищены &copy; <?=date('Y');?> <?=config('site_name');?><br>
               <?php

               if(config('vk_url')){
                 echo '<a target="_blank" href="'.config('vk_url').'">Мы Вконтакте</a>';
               }else{
                 echo '';
               }

               ?>
            </div>
         </div>
      </div>
   </body>
   <script type="text/javascript">
      $(function() {
      		})
$(window).scroll(function(){
            if ($(window).scrollTop() >100) {
                $('.menu-scroll').addClass('menu-scrollfixed');
            }
            else {
                $('.menu-scroll').removeClass('menu-scrollfixed');
            }
        });
   </script>
</html>
