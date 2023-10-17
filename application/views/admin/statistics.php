<div class="card">
   <div class="card-title"> Статистика  </div>
   <div class="card-content">
   <canvas id="stat" width="400" ></canvas>
   </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<script>
var data = {
    labels: <?=json_encode($date);?>,
    datasets: [
        {
            label: "Доход",
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            data: [<?foreach($income as $in) { ?> <?=$in;?> ,<? } ?>],
        } ,
        {
            label: "Кол-во продаж",
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            borderWidth: 1,
            pointHoverBackgroundColor: "rgba(255,99,132,0.4)",
            pointHoverBorderColor: "rgba(255,99,132,1)",
            pointBackgroundColor: "#fff",
            data: [<?foreach($count as $cn) { ?> <?=$cn;?> ,<? } ?>],
        } ,
        {
            label: "Кол-во транзакций",
            backgroundColor: "rgb(255, 230, 171)",
            borderColor: "rgb(253, 211, 109)",
            pointBorderColor: "rgb(255, 208, 92)",
            pointBackgroundColor: "#fff",
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgb(255, 208, 92)",
            data: [<?foreach($tranz as $tz) { ?> <?=$tz;?> ,<? } ?>],
        } 
    ]
};
var ctx = document.getElementById("stat");
var stat = new Chart(ctx, {
    type: 'line',
    data: data,
});
</script>
<div class="card">
   <div class="card-title"> Десять последних покупок </div>
   <div class="card-content">
   <table>
         <thead>
            <tr>
               <th>№</th>
               <th>Название</th>
			   <th>Способ оплаты</th>
			   <th>Цена</th>
			   <th>Кол-во</th>
            </tr>
         </thead>
         <tbody>
		 <?foreach($last_buy as $lb) { ?>
            <tr>
               <td><?=$lb->id;?></td>
               <td><?=$lb->item_title;?></td>
			   <td><?=$lb->pay_mode;?></td>
			   <td><?=$lb->price;?><i class="fa fa-rub" aria-hidden="true"></i></td>
			   <td><?=$lb->count;?></td>
            </tr>
		 <? } ?>
        </tbody>
      </table>
   </div>
</div>