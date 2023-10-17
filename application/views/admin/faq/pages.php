<div class="card ">
   <div class="card-title">Вопросы</div>
   <div class="card-content ">
      <a class="waves-effect btn-floating btn-large waves-light btn danger-btn add-btn" href="/admin/pages/edit/">    <i class="material-icons">add</i></a>
      <table>
         <thead>
            <tr>
               <th data-field="id">№</th>
               <th data-field="name">Заголовок</th>
            </tr>
         </thead>
         <tbody>
            <? if(count($pages)): foreach($pages as $page): ?>
            <tr>
               <td><?=$page->id;?></td>
               <td><?=$page->title;?></td>
               <td class="d25"><a href="/admin/pages/edit/<?=$page->id;?>" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td>
               <td class="d25"><a href="/admin/pages/delete/<?=$page->id;?>" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td>
            </tr>
            <? endforeach; ?>
            <? else: ?>
            <tr>
               <td>Страницы отсутствуют</td>
            </tr>
            <? endif; ?>
         </tbody>
      </table>
   </div>
</div>
