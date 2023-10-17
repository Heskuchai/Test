<div class="card ">
   <div class="card-title">Пользователи</div>
   <div class="card-content ">
  <table>
         <thead>
            <tr>
               <th data-field="id">№</th>
               <th data-field="name">Ник</th>
               <th data-field="cat">Баланс</th>
			   <th data-field="cat">Баланс(K)</th>
               <th data-field="cat">Группа</th>
            </tr>
         </thead>
         <tbody>
            <? if(count($users)): foreach($users as $user): ?>
            <tr>
               <td><?=$user->id;?></td>
               <td><?=$user->nickname;?></td>
               <td><?=$user->money;?> <i class="fa fa-rub" aria-hidden="true"></i></td>
			   <td><?=$user->wf_coint;?>K</td>
               <td><?if ($user->group == 2 ) { ?>Администратор<? } else { ?>Пользователь<? } ?></td>
			   <td class="d25"><a href="/admin/users/edit/<?=$user->id;?>" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td>
			   <td class="d25"><a href="/admin/users/delete/<?=$user->id;?>" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td>
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
 