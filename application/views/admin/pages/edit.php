<div class="card ">
   <div class="card-title"><?if(empty($pages->id)) {?> Добавление вопроса <? } else { ?> Редактировать вопрос : <?=$pages->title?> <? } ?> </div>
   <div class="card-content ">
      <? echo !empty($errors) ? $errors : "" ; ?>
	  <? echo validation_errors(); ?>
      <? echo form_open_multipart();?>
         <div class="input-field">
            <input type="text" value="<?=$pages->title?>" name="title" class="validate">
            <label for="email">Заголовок</label>
         </div>
		 <br>
         <div class="input-field ">
		    <p>Содержание</p>
            <textarea name="body" id="editor1"><?=$pages->body?></textarea>
         </div>
		 <br>
         <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
      <? echo form_close(); ?>
   </div>
</div>
