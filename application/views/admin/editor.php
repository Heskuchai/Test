<div class="card ">
   <div class="card-title">Редактор шаблонов</div>
   <ul class="tabs tab-demo z-depth-1">
      <li class="tab col s3"><a class="active" href="#main_tpl">Основной шаблон</a></li>
      <li class="tab col s3"><a href="#items_tpl">Шаблон товара</a></li>
      <li class="tab col s3"><a href="#item_tpl">Шаблон страницы товара</a></li>
      <li class="tab col s3"><a href="#page_tpl">Шаблон страницы</a></li>
   </ul>
   <div class="card-content ">
      <? echo form_open_multipart();?>
      <? echo validation_errors(); ?>
      <div id="main_tpl" class="col s12">
         <textarea name="main_tpl" id="textarea_main"  cols="40" class="textarr" rows="10"><?=template('main_tpl');?></textarea>
		 <hr>
		 <p><h5>Документация [Основной шаблон]</h5></p>
         <ul class="collapsible" data-collapsible="accordion">
            <li>
               <div class="collapsible-header"><i class="material-icons">language</i> Основное</div>
               <div class="collapsible-body card-content">
                  <ul>
                     <li>{title} - выводит заголовок (Название сайта - Раздел)</li>
                     <li>{meta}&nbsp;- выводит meta теги&nbsp;</li>
                     <li>{favicon} - выводит ссылку на изображение favicon</li>
                     <li>{shop-name} - выводит название магазина</li>
                     <li>{logo} - выводит ссылку на логотип</li>
                     <li>{bg} - выводит ссылка на обои</li>
                     <li>{script} - выводит js скрипты </li>
					 <li>{content} - выводит контент в основном шаблоне </li>
                  </ul>
               </div>
            </li>
            <li>
               <div class="collapsible-header"><i class="material-icons">view_list</i> Категории</div>
               <div class="collapsible-body card-content">
                  <ul>
                     <li><b>[category]​</b> - начало вывода категорий</li>
                     <li>{category-title} - выводит&nbsp; заголовок&nbsp; категории</li>
                     <li>{category-url} - выводит ссылка на категорию</li>
                     <li><b>[/category]​</b> - конец вывода категорий</li>
                  </ul>
            </li>
            <li>
               <div class="collapsible-header"><i class="material-icons">description</i> Страницы</div>
               <div class="collapsible-body card-content">
                  <ul>
                     <li><b>[pages]​</b> - начало вывода страниц</li>
                     <li>{page-title} - выводит&nbsp; заголовок&nbsp; страницы</li>
                     <li>{page-url} - выводит ссылка на страницу</li>
                     <li><b>[/pages]​</b> - конец вывода&nbsp;страниц</li>
                  </ul>
            </li>
            <li>
               <div class="collapsible-header"><i class="material-icons">equalizer</i> Список последних покупок</div>
               <div class="collapsible-body card-content">
                  <ul>
                     <li><b>[last_buy]</b>- начало вывода списка</li>
                     <li>{last-title} - заголовок товара</li>
                     <li>{last-item-url} - ссылка на товар</li>
                     <li>{last-date} - дата покупки&nbsp;</li>
                     <li>{last-email} - E-mail покупателя</li>
                     <li>{last-price} - цена покупки&nbsp;</li>
                     <li>{last-count} - кол-во купленного товара</li>
                     <li>{last-fund} - способ оплаты</li>
                     <li>{last-bill} -&nbsp;уникальный идентификатор</li>
                     <li>{last-icon} -&nbsp;Изображение товара</li>
                     <li><b>[/last_buy]</b>- конец&nbsp;вывода списка</li>
                  </ul>
            </li>
         </ul>
		 <hr>
      </div>
	  
      <div id="items_tpl" class="col s12">
         <textarea name="items_tpl"  cols="40" class="textarr" rows="10"><?=template('items_tpl');?></textarea>
		 
		 <hr>
		 <p><h5>Документация [Шаблон  товара]</h5></p>
         <ul class="collapsible" data-collapsible="accordion">
            <li>
               <div class="collapsible-header"><i class="material-icons">language</i> Основное</div>
               <div class="collapsible-body card-content">
			   Как вызвать окно ввода данных для оплаты ? Добавьте на элемент onclick="buy('{item-id}')" .
			   <br>
                  <ul>
	                 <li><b>[items]​</b> - начало вывода всех  товаров</li>
	                 <li>{item-id} - id товара</li>
	                 <li>{item-title} - заголовок товара</li>
	                 <li>{item-descr} - описание товара</li>
	                 <li>{item-icon} - ссылка на изображение товара</li>
	                 <li>{item-date} - дата добавления товара</li>
	                 <li>{item-price} - цена товара</li>
	                 <li>{item-min} - мин покупка</li>
	                 <li>{item-category-title} - заголовок категории товара</li>
	                 <li>{item-category-url} - ссылка на категорию товара</li>
	                 <li>{item-count} - кол-во товара</li>
	                 <li>{item-views} - &nbsp;кол-во просмотров</li>
	                 <li>{item-url} - ссылка на товар</li>
	                 <li><b>[/items]​</b> - конец вывода товаров</li>
	                 <li><b>[no-items]​</b> - Данный блок выводится , если товар отсутствует </li>
	                 <li><b>[/no-items]​</b> - Конец блока </li>
	                 <li>{pagination} - вывод пагинатора </li>
                  </ul>
               </div>
            </li>
         </ul>
		 <hr>
		 
      </div>
      <div id="item_tpl" class="col s12">
         <textarea name="item_tpl" cols="40" class="textarr" rows="10"><?=template('item_tpl');?></textarea>
		 <hr>
		 <p><h5>Документация [Шаблон страницы товара]</h5></p>
         <ul class="collapsible" data-collapsible="accordion">
            <li>
               <div class="collapsible-header"><i class="material-icons">language</i> Основное</div>
               <div class="collapsible-body card-content">
			   Как вызвать окно ввода данных для оплаты ? Добавьте на элемент onclick="buy('{item-id}')" .
			   <br>
                  <ul>
	                 <li><b>[item]​</b> - начало вывода товара</li>
	                 <li>{item-id} - id товара</li>
	                 <li>{item-title} - заголовок товара</li>
	                 <li>{item-descr} - описание товара</li>
	                 <li>{item-icon} - ссылка на изображение товара</li>
	                 <li>{item-date} - дата добавления товара</li>
	                 <li>{item-price} - цена товара</li>
	                 <li>{item-min} - мин покупка</li>
	                 <li>{item-category-title} - заголовок категории товара</li>
	                 <li>{item-category-url} - ссылка на категорию товара</li>
	                 <li>{item-count} - кол-во товара</li>
	                 <li>{item-views} - &nbsp;кол-во просмотров</li>
	                 <li>{item-url} - ссылка на товар</li>
	                 <li><b>[/item]​</b> - конец вывода товара</li>
	                 <li><b>[no-item]​</b> - Данный блок выводится , если товар отсутствует </li>
	                 <li><b>[/no-item]​</b> - Конец блока </li>
                  </ul>
               </div>
            </li>
         </ul>
		 <hr>
      </div>
      <div id="page_tpl" class="col s12">
         <textarea name="page_tpl" cols="40" class="textarr" rows="10"><?=template('page_tpl');?></textarea>
		 <hr>
		 <p><h5>Документация [Шаблон страницы]</h5></p>
         <ul class="collapsible" data-collapsible="accordion">
            <li>
               <div class="collapsible-header"><i class="material-icons">language</i> Основное</div>
               <div class="collapsible-body card-content">
                  <ul>
	                 <li>{page-id} - id страницы</li>
	                 <li>{page-title} - заголовок страницы</li>
	                 <li>{page-body} - контент страницы</li>
                  </ul>
               </div>
            </li>
         </ul>
		 <hr>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
      <? echo form_close(); ?>
   </div>
</div>