      <script type="text/javascript">
         var soid = '<?if (!empty($this->session->id)) echo $this->session->id;?>';
         var games_count = <?=count($items)*14;?>;
         function cass() {
                 if (soid.length === 0 ) {
					 App.noty('error', "Для совершения данного действия Вам нужно войти в аккаунт!");
                     return false;
                 }
				 document.getElementById("button_buy").disabled = true; 
                 get_random_game( function (err) {
                     if (err) {
                         console.error(err);
                     } else {
						 document.getElementsByClassName("ruletbtn").disabled = true;
                         var game_width = 166,
                             games_left = 1,
                             offset = -((games_count-4)*166+166);
                         console.log('count_offset', games_count, game_width, offset);
                         $('.rulet ul').css('transform', 'translate3d(' + offset + 'px, 0, 0)');
                     }
                 });
         }
         function get_random_game(cb) {
         
             $.post('/ajax/card/rult', {
                 case_id: '<?=$case->id;?>'
             }).done(function done(data) {
         data = $.parseJSON(data);
                 if (typeof data === 'undefined') {
                     console.error('api - random_game - result is undefined');
					 App.noty('error','Что-то странное происходит');
                     return cb(new Error('Result is undefined'));
                 }
                 if (typeof data.error !== 'undefined') {
                     console.error('api - random_game - error', data.error);
                     if (typeof data.error.refill !== 'undefined') {
						 App.noty('error','Для совершения данного действия Вам нужно пополнить баланс!');
                     } else if ( typeof data.error.item_not_found !== 'undefined') {
                         $('#modal5').arcticmodal();
                     } else {
                         $('#modal_error_header').text(data.message);
                         $('#modal_error_message').text(data.message);
                         $('#modal_error').arcticmodal();
                     }
                     return cb(new Error(data.error));
                 }
                 var item = data.item;
				 var img_roulette = '<div class="roulette-item"> <div class="item-weapon"> <div class="item-weapon-inset"> <div class="item-weapon-pict" style="background-image:url('+ item.image +');"></div> <div class="item-weapon-price"><span>'+ item.award +'</span> <span class="item-weapon-price-k">K</span></div> <div class="item-weapon-bottom" data-color="" style="background-color:'+ item.color +'"> <div class="item-weapon-bottom-inset"> <div class="item-weapon-title-wrap"> <div class="item-weapon-title" data-title="">'+ item.name +'</div> <span data-title-sub="">' + item.day +'</span> </div> </div> </div> </div> </div> </div>';
         
                 $('#sell_price_1').html(item.sum);
                 $('#sell_price_2').html(item.sum);
         
                 $('.prize').each( function(){
                     $(this).html(img_roulette);
                 });
				 setTimeout( function(){swal({ title: "Поздравляем!", text: "Вы выиграли "+ item.name +" . Данная вещь автоматически обменяется на "+ item.award +" K", imageUrl: item.image },function(){ window.location.href = '/case/<?=$case->id;?>'; } );}, 7000);
                 return cb(null, data);
             }).fail( function fail ( jqXHR, textStatus, errorThrown ) {
                 console.error('api - random_game - fail', jqXHR, textStatus, errorThrown);
				 App.noty('error','Ошибка обращения к серверу');
                 return cb(new Error(errorThrown));
             });
         
         }
         function modal4() {
             $('#modal4').arcticmodal();
         }
         function hideDiv() {
             $('#mailbutton').toggle();
             $('.email').attr('onclick', '');
             $('#inputemail').prop('disabled', false);
         }

         function call(url, id, form) {
           var msg = $('#' + form).serialize();
           $.ajax({
               type: 'POST',
               url: url + '?id=' + id,
               data: msg,
               success: function(data) {
                   eval(data);
         
               },
               error: function(xhr, str) {
                   alert('Ошибка: ' + xhr.responseCode);
               }
           });
         }
$(window).scroll(function(){
            if ($(window).scrollTop() >100) {
                $('.menu-scroll').addClass('menu-scrollfixed');
            }
            else {
                $('.menu-scroll').removeClass('menu-scrollfixed');
            }   
        });

      </script>
<input id="case_id" value="<?=$card->id;?>" style="display:none">
<div class="rulet_full full">
   <button  onclick="cass()" id="button_buy" class="btn case-btn ruletbtn rulet_btn">Открыть за <?=$case->price;?> <img src="http://i.imgur.com/SYdeVIL.png" style=" width: 15px; "></button>
   <div class="rulet">
      <ul>
         
		 <? for ($x=0; $x<14; $x++) { foreach($items_rulet as $item) { ?>
         <li>
            <div class="roulette-item">
               <div class="item-weapon">
                  <div class="item-weapon-inset">
                     <div class="item-weapon-pict" style="width: 50px;height: 50px;margin-left: 59px;margin-top: 13px;background-image:url(<?=$item->image;?>);"></div>
                     <div class="item-weapon-price"><span><?=$item->award;?></span> <span class="item-weapon-price-k">K</span></div>
                     <div class="item-weapon-bottom" data-color="" style="background-color:<?=$item->color;?>">
                        <div class="item-weapon-bottom-inset">
                           <div class="item-weapon-title-wrap">
                              <div class="item-weapon-title" data-title=""><?=$item->name;?></div>
                              <span data-title-sub=""><?=$item->day;?></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </li>
		 <? } } ?>
		 <li class="prize"></li>
		 <? for ($x=0; $x<14; $x++) { foreach($items_rulet as $item) { ?>
         <li>
            <div class="roulette-item">
               <div class="item-weapon">
                  <div class="item-weapon-inset">
                     <div class="item-weapon-pict" style="background-image:url(<?=$item->image;?>);"></div>
                     <div class="item-weapon-price"><span><?=$item->award;?></span> <span class="item-weapon-price-k">K</span></div>
                     <div class="item-weapon-bottom" data-color="" style="background-color:<?=$item->color;?>">
                        <div class="item-weapon-bottom-inset">
                           <div class="item-weapon-title-wrap">
                              <div class="item-weapon-title" data-title=""><?=$item->name;?></div>
                              <span data-title-sub=""><?=$item->day;?></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </li>
		 <? } } ?>
      </ul>
   </div>
</div>
<div class="viewn-loop">
   <div class="viewn-title">ЧТО МОЖЕТ <b>вЫПАСТЬ?</b></div>
   <div class="viewn-content">
   <ul class="asa">
      <? foreach ($items as $item) { ?> 
         <li>
            <div class="roulette-item">
               <div class="item-weapon bzn">
                  <div class="item-weapon-inset">
                     <div class="item-weapon-pict" style="width: 52px;height: 65px;margin-left: 66px;margin-top: 13px;background-image:url(<?=$item->image;?>);"></div>
                     <div class="bzn-price"><span><?=$item->award;?></span> <span class="item-weapon-price-k">K</span></div>
                     <div class="item-weapon-bottom" data-color="" style="background-color:<?=$item->color;?>">
                        <div class="item-weapon-bottom-inset">
                           <div class="item-weapon-title-wrap">
                              <div class="item-weapon-title" data-title=""><?=$item->name;?></div>
                              <span data-title-sub=""><?=$item->day;?></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </li>
      <? } ?>
	  </ul>
   </div>
</div>