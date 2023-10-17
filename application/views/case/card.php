<input id="case_id" value="<?=$card->id;?>" style="display:none">
<div class="container">
   <div class="game-title">
      <ul>
         <li>
            <em class="game-title-l">
            <span>СУПЕР ПРИЗ ИГРЫ</span>
            <span>МАКСИМАЛЬНЫЙ ВЫИГРЫШ</span>
            </em>
            <em class="game-title-r"><?=$card->max;?>k</em>
         </li>
      </ul>
   </div>
   <div class="cart-loop">
      <div class="cart-i" data-id="0">
         <div class="row row-1"></div>
         <div class="row row-2"></div>
         <div class="row row-3"></div>
         <div class="row row-4"></div>
         <div class="cart-prize cart-0"><b>ПРИЗ</b> ВАШ ВЫИГРЫШ: <font class="data-0">0</font>k</div>
         <div class="live-i credit color-0">
            <div class="live-val"></div>
            <div class="live-col"><font class="data-0">0</font>k</div>
         </div>
      </div>
      <div class="cart-i" data-id="1">
         <div class="row row-5"></div>
         <div class="row row-6"></div>
         <div class="row row-7"></div>
         <div class="row row-8"></div>
         <div class="cart-prize cart-1"><b>ПРИЗ</b> ВАШ ВЫИГРЫШ: <font class="data-1">0</font>k</div>
         <div class="live-i credit color-1">
            <div class="live-val"></div>
            <div class="live-col"><font class="data-1">0</font>k</div>
         </div>
      </div>
      <div class="cart-i" data-id="2">
         <div class="row row-9"></div>
         <div class="row row-10"></div>
         <div class="row row-11"></div>
         <div class="row row-12"></div>
         <div class="cart-prize cart-2"><b>ПРИЗ</b> ВАШ ВЫИГРЫШ: <font class="data-2">0</font>k</div>
         <div class="live-i credit color-2">
            <div class="live-val"></div>
            <div class="live-col"><font class="data-2">0</font>k</div>
         </div>
      </div>
   </div>
   <div class="game-price start_game">
      Стоимость игры: <b><?=$card->price;?>Р</b>
      <span>НАЖМИТЕ ЧТОБЫ НАЧАТЬ ИГРАТЬ</span>
   </div>
   <a href="#" class="game-link buy_card start_game">НАЧАТЬ ИГРАТЬ</a>	
   <script type="text/javascript">
      $(function() {
		    <? if (empty($this->session->id)) { ?> 
      		$('.cart-i').click(function() {
      			App.noty('error', 'Авторизуйтесь, чтобы начать играть');
            });
			<? } ?>
      		$('.cart-i').wScratchPad('disable');
      })
   </script>
</div>
<div class="viewn-loop">
   <div class="viewn-title">ЧТО МОЖЕТ <b>вЫПАСТЬ?</b></div>
   <div class="viewn-content">
      <? foreach ($items as $item) { ?> 
      <div class="live-i live-<?=$item->color;?> credit">
         <div class="live-val"></div>
         <div class="live-col"><?=$item->award;?>k</div>
      </div>
	  <? } ?>
   </div>
</div>