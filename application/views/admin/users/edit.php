<div class="card ">
   <div class="card-title">Редактировать пользователя </div>
   <div class="card-content ">
      <? echo !empty($errors) ? $errors : "" ; ?>
	  <? echo validation_errors(); ?>
      <? echo form_open_multipart();?>
         <div class="input-field">
            <input type="text" value="<?=$user->nickname?>" name="nickname" class="validate">
            <label for="email">Ник</label>
         </div>
         <div class="input-field">
            <input type="text" value="<?=$user->money?>" name="money" class="validate">
            <label for="email">Баланс</label>
         </div>
         <div class="input-field">
            <input type="text" value="<?=$user->wf_coint?>" name="wf_coint" class="validate">
            <label for="email">Баланс K</label>
         </div>
         <div class="input-field">
            <?php echo form_dropdown('group', array('1' => 'Пользователь' , '2' => 'Администратор'), $user->group,'class="form-control select2" '); ?>
            <label for="email">Группа</label>
         </div>
		 <br>
         <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
      <? echo form_close(); ?>
   </div>
</div>
