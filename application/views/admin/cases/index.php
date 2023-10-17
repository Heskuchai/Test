<div class="card ">
   <div class="card-title">Кейсы</div>
   <div class="card-content ">
      <a class="waves-effect btn-floating btn-large waves-light btn danger-btn add-btn" href="/admin/cases/edit/">    <i class="material-icons">add</i></a>
      <table>
         <thead>
            <tr>
               <th data-field="id">№</th>
               <th data-field="name">Название</th>
               <th data-field="name">Тип</th>
               <th data-field="name">Описание</th>
               <th data-field="name">Цена</th>
            </tr>
         </thead>
         <tbody>
            <? if(count($cases)): foreach($cases as $case): ?>
			<?$type = array('Обычный(Рулетка)','Карточки');?>
            <tr>
               <td><?=$case->id;?></td>
			   <td><?=$case->name;?></td>
			   <td><?=$type[$case->type-1];?></td>
               <td>От <?=$case->min;?> <i class="fa fa-rub" aria-hidden="true"></i> до <?=$case->max;?> <i class="fa fa-rub" aria-hidden="true"></i></td>
               <td><?=$case->price;?> <i class="fa fa-rub" aria-hidden="true"></i></td>
               <td class="d25"><a href="/admin/cases/edit/<?=$case->id;?>" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td>
               <td class="d25"><a href="/admin/cases/delete/<?=$case->id;?>" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td>
            </tr>
            <? endforeach; ?>
            <? else: ?>
            <tr>
               <td>Кейсы отсутствуют</td>
            </tr>
            <? endif; ?>
         </tbody>
      </table>
   </div>
</div>
 