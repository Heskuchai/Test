<div class="container">
   <div class="game-title center">
      <em class="game-title-l" style="float:none;">
      <span><b style="color:#e7c333;">топ</b> - игроков</span>
      <span style="text-align:center; background:0;"><em>СЧАСТЛИВЧИКИ ПРОЕКТА</em></span>
      </em>
   </div>
   <div class="clear"></div>
   <div class="topuser">
      <div class="topuser-i">
         <div class="topuser-num">1</div>
         <div class="topuser-ava"><a href="http://vk.com/id<?=$top[0]->network_id;?>"><img src="<?=$top[0]->avatar;?>" alt=""></a></div>
         <div class="topuser-login ell"><?=$top[0]->nickname;?></div>
         <div class="topuser-credit ell">Кредитов: <?=$top[0]->mmoney;?></div>
         <div class="topuser-all ell">Всего игр: <?=$top[0]->cases;?></div>
      </div>
      <div class="topuser-i">
         <div class="topuser-num">2</div>
         <div class="topuser-ava"><a href="http://vk.com/id<?=$top[1]->network_id;?>"><img src="<?=$top[1]->avatar;?>" alt=""></a></div>
         <div class="topuser-login ell"><?=$top[1]->nickname;?></div>
         <div class="topuser-credit ell">Кредитов: <?=$top[1]->mmoney;?></div>
         <div class="topuser-all ell">Всего игр: <?=$top[1]->cases;?></div>
      </div>
      <div class="topuser-i">
         <div class="topuser-num">3</div>
         <div class="topuser-ava"><a href="http://vk.com/id<?=$top[2]->network_id;?>"><img src="<?=$top[2]->avatar;?>" alt=""></a></div>
         <div class="topuser-login ell"><?=$top[2]->nickname;?></div>
         <div class="topuser-credit ell">Кредитов: <?=$top[2]->mmoney;?></div>
         <div class="topuser-all ell">Всего игр: <?=$top[2]->cases;?></div>
      </div>
      <div class="topuser-i">
         <div class="topuser-num">4</div>
         <div class="topuser-ava"><a href="http://vk.com/id<?=$top[3]->network_id;?>"><img src="<?=$top[3]->avatar;?>" alt=""></a></div>
         <div class="topuser-login ell"><?=$top[3]->nickname;?></div>
         <div class="topuser-credit ell">Кредитов: <?=$top[3]->mmoney;?></div>
         <div class="topuser-all ell">Всего игр: <?=$top[3]->cases;?></div>
      </div>
      <div class="topuser-i">
         <div class="topuser-num">5</div>
         <div class="topuser-ava"><a href="http://vk.com/id<?=$top[4]->network_id;?>"><img src="<?=$top[4]->avatar;?>" alt=""></a></div>
         <div class="topuser-login ell"><?=$top[4]->nickname;?></div>
         <div class="topuser-credit ell">Кредитов: <?=$top[4]->mmoney;?></div>
         <div class="topuser-all ell">Всего игр: <?=$top[4]->cases;?></div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="table table-top">
      <div class="table-i">
         <div>№</div>
         <div>пользователь</div>
         <div>игр</div>
         <div>кредитов</div>
      </div>
	  <? $i = 6;?>
	  <? foreach($users as $user) { ?>
      <div class="table-i">
         <div><?=$i++;?></div>
         <div><a href="http://vk.com/id<?=$user->network_id;?>"><img src="<?=$user->avatar;?>" alt=""></a> <span class="ell"><?=$user->nickname;?></span></div>
         <div><?=$user->cases;?></div>
         <div><?=$user->mmoney;?></div>
      </div>
	  <? } ?>
   </div>
</div>