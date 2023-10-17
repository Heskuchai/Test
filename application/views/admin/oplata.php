<? echo !empty($errors) ? $errors : "" ; ?>
<? echo validation_errors(); ?>
<? echo form_open_multipart();?>
<div class="card ">
   <div class="card-title">Активация способов оплаты </div>
   <div class="card-content ">
      <p>
         <input type="checkbox" id="qiwi" name="load_qiwi" <?if (config('load_qiwi') == 1) echo 'checked';?> />
         <label for="qiwi">Qiwi</label>
      </p>
      <p>
         <input type="checkbox" id="wm" name="load_wm"  <?if (config('load_wm') == 1) echo 'checked';?> />
         <label for="wm">Webmoney</label>
      </p>
      <p>
         <input type="checkbox" id="yad" name="load_yad" <?if (config('load_yad') == 1) echo 'checked';?> />
         <label for="yad">Yandex Money</label>
      </p>
      <p>
         <input type="checkbox" id="fk" name="load_fk" <?if (config('load_fk') == 1) echo 'checked';?> />
         <label for="fk">Free-kassa</label>
      </p>
      <p>
         <input type="checkbox" id="ik" name="load_ik" <?if (config('load_ik') == 1) echo 'checked';?> />
         <label for="ik">Interkassa</label>
      </p>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
   </div>
</div>
<div class="card ">
   <div class="card-title">Настроки Webmoney </div>
   <div class="card-content ">
      <div class="input-field file-field">
        <div class="btn">
           <span>Ключ-файл .kwm</span>
		   <input type="hidden" name="configure" id="input"  value="webmoney">
           <input type="file" accept=".kwm" name="userfile">
        </div>
        <div class="file-path-wrapper">
           <input class="file-path validate" type="text">
        </div>
		<?if($oplata->wm_key_date) {?>Последняя загрузка : <?=$oplata->wm_key_date?> <? } ?>
      </div>
      <br>
      <div class="input-field">
         <? echo form_password( 'wm_pass', set_value( 'wm_pass', '******'), 'class="validate"'); ?>
         <label for="qiwi_pass">Пароль от ключ-файла </label>
      </div>
      <div class="input-field">
         <input type="text" value="<?=$oplata->wmr?>" name="wmr" class="validate">
         <label for="qiwi_pass">Номер кошелька WMR </label>
      </div>
      <div class="input-field">
         <input type="text" value="<?=$oplata->wmid?>" name="wmid" class="validate">
         <label for="qiwi_pass">WMID </label>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
   </div>
</div>

<div class="card ">
   <div class="card-title">Настроки Qiwi </div>
   <div class="card-content ">
      <div class="input-field">
         <input type="text" value="<?=$oplata->qiwi_num?>" name="qiwi_num" class="validate">
         <label for="qiwi_num">Номер телефона (без +)</label>
      </div>
      <br>
      <div class="input-field">
         <input type="password" value="******" name="qiwi_pass" class="validate">
         <label for="qiwi_pass">Пароль </label>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
   </div>
</div>

<div class="card ">
   <div class="card-title">Настроки Yandex Money  <a class="modal-trigger" href="#infoyan">Информация</a></div>
   <div class="card-content ">
      <div class="input-field">
         <input type="text" value="<?=$oplata->yad_client_id?>" name="yad_client_id" class="validate">
         <label for="yad_client_id">Client ID</label>
      </div>
      <br>
      <div class="input-field">
         <input type="text" value="<?=$oplata->yad_token?>"  name="yad_token" class="validate">
         <label for="yad_token">Токен </label>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
	 
   </div>
</div>

<div id="infoyan" class="modal">
   <div class="modal-content">
      <h4>Как подключить Yandex Money?</h4>
      <ul style="list-style-type: decimal;">
         <li>Сначала создайте приложение в Яндекс.Деньги <a href="https://sp-money.yandex.ru/myservices/new.xml" target="_BLANK">(нажмите сюда для перехода)</a>
         </li>
         <li>
            Укажите следующите данные
            <ul>
               <li><b>НАЗВАНИЕ ПРИЛОЖЕНИЯ:</b> <font color="#aaaa00"><i class="fa fa-info"></i> Укажите любое название</font>
               </li>
               <li><b>АДРЕС ВАШЕГО САЙТА</b>: <u><font color="#0000dd">http://<? echo $_SERVER['HTTP_HOST'] ; ?></font></u>
               </li>
               <li><b>REDIRECT URI</b>: <u><font color="#dd0000">http://<? echo $_SERVER['HTTP_HOST'] ; ?>/yandex/token</font></u>
               </li>
               <li><b>Использовать проверку подлинности приложения: </b> <font color="red"><i class="fa fa-minus-square"></i> Нет </font>
               </li>
            </ul>
         </li>
         <li>Вставьте полученный идентификатор приложения в поле ниже и нажмите сохранить . После сохранение получите токен приложения по ссылке <a href="http://<? echo $_SERVER['HTTP_HOST'] ; ?>/yandex/" target="_BLANK">(нажмите сюда для перехода)</a>
         </li>
      </ul>
   </div>
   <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Готово</a>
   </div>
</div>

<div class="card ">
   <div class="card-title">Настроки Free-kassa  <a class="modal-trigger" href="#infofk">Информация</a></div>
   <div class="card-content ">
      <div class="input-field">
         <input type="text" value="<?=$oplata->fk_id?>" name="fk_id" class="validate">
         <label for="fk_id">Free-kassa id</label>
      </div>
      <div class="input-field">
         <input type="password" value="<?=$oplata->fk_key_1?>"  name="fk_key_1" class="validate">
         <label for="fk_key_1">Секретное слово </label>
      </div>
      <div class="input-field">
         <input type="password" value="<?=$oplata->fk_key_2?>"  name="fk_key_2" class="validate">
         <label for="fk_key_2">Секретное слово 2 </label>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
	 
   </div>
</div>

<div id="infofk" class="modal">
   <div class="modal-content">
      <h4>Как подключить Free-kassу?</h4>
      <ul style="list-style-type: decimal;">
         <li>
            Укажите следующите данные в настройках Free-kassa
            <ul>
               <li><b>Название сайта:</b> <font color="#aaaa00"><i class="fa fa-info"></i> Укажите любое название</font>
               </li>
               <li><b>URL сайта</b>: <u><font color="#0000dd">http://<? echo $_SERVER['HTTP_HOST'] ; ?></font></u>
               </li>
               <li><b>URL оповещения</b>: <u><font color="#dd0000">http://<? echo $_SERVER['HTTP_HOST'] ; ?>/checkpay/freekassa</font></u>
               </li>
               <li><b>URL возврата в случае успеха</b>: <u><font color="#dd0000">http://<? echo $_SERVER['HTTP_HOST'] ; ?>/payments/success</font></u>
               </li>
               <li><b>URL возврата в случае неудачи </b>: <u><font color="#dd0000">http://<? echo $_SERVER['HTTP_HOST'] ; ?></font></u>
               </li>
            </ul>
         </li>
      </ul>
   </div>
   <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Готово</a>
   </div>
</div>

<div class="card ">
   <div class="card-title">Настроки Interkassa  <a class="modal-trigger" href="#infoik">Информация</a></div>
   <div class="card-content ">
      <div class="input-field">
         <input type="text" value="<?=$oplata->ik_id?>" name="ik_id" class="validate">
         <label for="ik_id">Interkassa id</label>
      </div>
      <div class="input-field">
         <input type="password" value="<?=$oplata->ik_key?>"  name="ik_key" class="validate">
         <label for="ik_key">Секретный ключ </label>
      </div>
      <div class="input-field">
         <input type="password" value="<?=$oplata->ik_test?>"  name="ik_test" class="validate">
         <label for="ik_test">Тестовый ключ </label>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light btn danger-btn srbtn">Сохранить</button>
	 
   </div>
</div>

<div id="infoik" class="modal">
   <div class="modal-content">
      <h4>Как подключить Interkassу?</h4>
      <p><span style="font-size:14px">Укажите следующите данные в настройках Interkassa</span></p>
      <hr />
      <p>Раздел &quot;<strong>Интерфейс</strong>&quot; :</p>
      <ul>
	      <li><strong>URL успешной оплаты :&nbsp;</strong>http://<? echo $_SERVER['HTTP_HOST'] ; ?>/payments/success/</li>
	      <li><strong>URL неуспешной оплаты :</strong> http://<? echo $_SERVER['HTTP_HOST'] ; ?></li>
	      <li><strong>URL ожидания проведения платежа :</strong> http://<? echo $_SERVER['HTTP_HOST'] ; ?>/payments/pay/</li>
	      <li><strong>URL взаимодействия :</strong> http://<? echo $_SERVER['HTTP_HOST'] ; ?>/checkpay/interkassa</li>
      </ul>
      <p>​Тип всех запросов : POST;</p>
      <p>Раздел &quot;<strong>Безопасность</strong>&quot; :</p>
      <ul>
	      <li><strong>Алгоритм подписи</strong> : MD5</li>
	      <li><strong>Проверять подпись в форме запроса платежа</strong> : Да</li>
      </ul>
   </div>
   <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Готово</a>
   </div>
</div>
<? echo form_close(); ?>