<div class="card ">
   <div class="card-title">Выигрыши</div>
   <div class="card-content ">
  <table>
         <thead>
            <tr>
               <th data-field="id">№</th>
               <th data-field="name">Сумма</th>
               <th data-field="cat">Пользователь</th>
               <th data-field="cat">id кейса</th>
               <th data-field="price">Дата</th>
            </tr>
         </thead>
         <tbody>
            <? if(count($wins)): foreach($wins as $win): ?>
            <tr>
               <td><?=$win->id;?></td>
               <td><?=$win->award;?></td>
               <td><?=$win->nickname ?> | id : <?=$win->user_id ?></td>
               <td><?=$win->case_id ?></td>
               <td><?=$win->date ?></td>
            </tr>
            <? endforeach; ?>
            <? else: ?>
            <tr>
               <td>Выигрыши отсутствуют</td>
            </tr>
            <? endif; ?>
         </tbody>
      </table>
	  <center><?=$pagination;?></center>
   </div>
</div>
 