<div class="card ">
   <div class="card-title"><?if(empty($cases->id)) {?> Добавление кейса <? } else { ?> Редактировать кейс <? } ?> </div>
   <div class="card-content ">
      <? echo !empty($errors) ? $errors : "" ; ?>
      <? echo validation_errors(); ?>
      <? echo form_open_multipart();?>
      <div class="input-field">
         <input type="text" value="<?=$cases->name?>" name="name" class="validate">
         <label for="email">Название</label>
      </div>
      <div class="input-field">
         <input type="text" value="<?=$cases->price?>" name="price" class="validate">
         <label for="email">Цена</label>
      </div>
      <div class="input-field">
         <?php echo form_dropdown('type', array('1' => 'Обычный(Рулетка)' , '2' => 'Карточки'), $cases->type,'class="form-control select2" '); ?>
         <label for="email">Тип</label>
      </div>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
      <? echo form_close(); ?>
   </div>
</div>
<?if(!empty($cases->id)) {?> 
<?$colors=array('Желтый','Серый','Синий','Красный');?>
<div class="card ">
<div class="card-title">Содержание кейса </div>
<div id="template" class="card-content pagg">
   <button href="#addtemplate" class="modal-trigger waves-effect btn-floating btn-large waves-light btn danger-btn add-btn" href="/admin/cases/edit/"> <i class="material-icons">add</i></button>
   <table>
      <thead>
         <tr>
            <th data-field="id">№</th>
            <th data-field="name">Сумма</th>
            <th data-field="name">Цвет</th>
         </tr>
      </thead>
      <tbody id="templates">
         <? foreach($items as $item) { ?> 
         <tr id="tm<?=$item->id;?>">
            <td><?=$item->id;?></td>
            <td><?=$item->award;?>K</td>
            <td><?=$colors[$item->color-1];?></td>
            <td class="d25"><a onclick="edittmid(<?=$item->id;?>)" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td>
            <td class="d25"><a onclick="deletetm(<?=$item->id;?>)" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td>
         </tr>
         <? } ?>
      </tbody>
   </table>
</div>
<div id="addtemplate" class="modal">
   <div class="modal-content">
      <center>
         <h5>Добавить приз</h5>
      </center>
      <form id="addtm2" action="javascript:void(null);" onsubmit="call('/admin/cases/edit/<?=$cases->id;?>','addtm2')" method="post">
         <div class="input-field">
            <input  value="" name="award" type="text" class="validate valid">
            <label class="active" for="key">Сумма :</label>
         </div>
		 <p>1 - Желтый , 2 - Синий , 3 - Серый , 4- Красный </p>
         <div class="input-field">
            <input  value="" name="color" type="text" class="validate valid">
            <label class="active" for="key">Номер цвета :</label>
         </div>
         <input type="hidden" name="addtm2" value="true">
         <button type="submit" class="waves-effect waves-light btn botaddbtn">Добавить</button>
      </form>
   </div>
</div>
<div id="edittemplate" class="modal">
   <div class="modal-content">
      <center>
         <h5>Редактировать приз</h5>
      </center>
      <form id="edittempform" action="javascript:void(null);" onsubmit="call('/admin/cases/item/','edittempform')" method="post">
         <div class="input-field">
            <input  value="" id="award" name="award" type="text" class="validate valid">
            <label class="active" for="key">Сумма :</label>
         </div>
		 <p>1 - Желтый , 2 - Синий , 3 - Серый , 4- Красный </p>
         <div class="input-field">
            <input  value="" id="color" name="color" type="text" class="validate valid">
            <label class="active" for="key">Номер цвета :</label>
         </div>
         <input type="hidden" name="edittm2" value="true">
         <input type="hidden" id="idss" name="idss">
         <button type="submit" class="waves-effect waves-light btn botaddbtn">Сохранить</button>
      </form>
   </div>
</div>
<script>
   function edittmid(id) {
       $.get("/admin/cases/item/"+id+"?type=edit", function(data, status){
           data = $.parseJSON(data);
   		$('#award').val(data.award);
		$('#color').val(data.color);
   		$('#idss').val(data.id);
   		Materialize.updateTextFields();
   		$('#edittemplate').openModal();
       });
   }
   function deletetm(id) {
       $.get("/admin/cases/item/"+id+"?type=delete", function(data, status){
           eval(data);
       });
   }
</script>    
<? } ?>