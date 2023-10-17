<div class="card ">
   <div class="card-title">Настройки </div>
   <div class="card-content ">
      <? echo form_open_multipart();?>
	  <? echo validation_errors(); ?>
         <div class="input-field">
            <input type="text" value="<?=$settings->site_name?>" name="site_name" class="validate">
            <label for="title">Название сайта</label>
         </div>
     <br>
         <div class="input-field">
            <input type="email" value="<?=$settings->e_mail?>" name="e_mail" class="validate">
            <label for="title">Email для связи</label>
         </div>
     <br>
         <div class="input-field">
            <input type="url" value="<?=$settings->vk_url?>" name="vk_url" class="validate">
            <label for="title">Ссылка на ВК</label>
         </div>
     <br>
         <div class="input-field">
            <input type="url" value="<?=$settings->logo_url?>" name="logo_url" class="validate">
            <label for="title">Ссылка на лого</label>
         </div>
		 <br>
         <div class="input-field">
            <input type="url" value="<?=$settings->fav_url?>" name="fav_url" class="validate">
            <label for="title">Ссылка на иконку</label>
         </div>
     <br>
         <div class="input-field">
            <input type="tel" value="<?=$settings->f_id?>" name="f_id" class="validate">
            <label for="title">Freekassa id</label>
         </div>
		 <br>
         <div class="input-field">
            <input type="text" value="<?=$settings->f_key_1?>" name="f_key_1" class="validate">
            <label for="title">Freekassa первый пароль</label>
         </div>
		 <br>
         <div class="input-field">
            <input type="text" value="<?=$settings->f_key_2?>" name="f_key_2" class="validate">
            <label for="title">Freekassa второй пароль</label>
         </div>
		 <br>
         <div class="input-field">
            <input type="tel" value="<?=$settings->min_bet?>" name="min_bet" class="validate">
            <label for="title">Минимальная сумма пополнения</label>
         </div>
		 <br>
         <div class="input-field">
            <input type="tel" value="<?=$settings->price_main?>" name="price_main" class="validate">
            <label for="title">Цена общего кейса на главной</label>
         </div>
     <br>
         <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
      <? echo form_close(); ?>
   </div>
</div>
