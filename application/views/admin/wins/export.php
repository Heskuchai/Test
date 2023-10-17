<style>
table {
    border-collapse:collapse ;
    border: 2px solid black;
}
td {
    border: 1px solid black;
    border-collapse:separate;
}
</style>
<table>
   <thead>
      <tr>
         <th>№</th>
         <th>Название товара</th>
         <th>Примечание</th>
         <th>E-mail</th>
         <th>Способ оплаты</th>
         <th>Цена</th>
         <th>Кол-во</th>
         <th>IP</th>
         <th>Дата</th>
         <th>Купон</th>
      </tr>
   </thead>
   <?foreach ($sales as $sale) { ?>
   <tr>
      <td><?=$sale->id;?></td>
      <td><?=$sale->item_title;?></td>
      <td><?=$sale->bill;?></td>
      <td><?=$sale->email;?></td>
      <td><?=$sale->pay_mode;?></td>
      <td><?=$sale->price;?></td>
      <td><?=$sale->count;?></td>
      <td><?=$sale->ip_address;?></td>
      <td><?=$sale->date;?></td>
      <td><?=$sale->coupon;?></td>
   </tr>
   <? } ?>
</table>
