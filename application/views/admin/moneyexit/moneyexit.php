<? $pa = array('Qiwi','Yandex.Money','Webmoney');?>
<div class="card ">
   <div class="card-title">Запросы на вывод</div>
   <div class="card-content ">
  <table>
         <thead>
            <tr>
               <th data-field="id">№</th>
               <th data-field="name">Сумма</th>
               <th data-field="name">ID пользователя</th>
               <th data-field="cat">Email</th>
               <th data-field="price">Дата</th>
               <th data-field="price"></th>
            </tr>
			
         </thead>
         <tbody>
            <? if(count($moneyexit)): foreach($moneyexit as $me): ?>
            <tr>
               <td><?=$me->id;?></td>
               <td><?=$me->money;?>K</td>
               <td><a href="/admin/users/edit/<?=$me->user_id;?>"><?=$me->user_id;?></a></td>
               <td><?=$me->email;?></td>
               <td><?=$me->date;?></td>
              <td><a href="/admin/moneyexit/del/<?=$me->id;?>" class="waves-effect waves-light btn info-btn"> <i class="material-icons">delete</i></a></td>
            </tr>
            <? endforeach; ?>
            <? else: ?>
            <tr>
               <td>Запросы отсутствуют</td>
            </tr>
            <? endif; ?>
         </tbody>
      </table>
	  <center><?=$pagination;?></center>
   </div>
</div>
 