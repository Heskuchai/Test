<?php
class cases extends Admin_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('cases_model');
		$this->load->model('items_model');
    }
	public function index()
	{
        $cases = $this->cases_model->get();
		foreach ($cases as $case) {
			$case->max = $this->items_model->get_max(array('case_id' => $case->id),'award','max')->award;
			$case->min = $this->items_model->get_max(array('case_id' => $case->id),'award','min')->award;
		}
		$this->data['title'] = 'Кейсы';
		$this->data['load'] = 'admin/cases/index';
		$this->data['cases'] = $cases;
		$this->load->view('admin/template',$this->data);
	}
	public function edit($id)
	{
	  $colors=array('Желтый','Серый','Синий','Красный');
      $cases = $this->cases_model->get($id);
	  $items = $this->items_model->get_by(array('case_id' =>$id) ,TRUE);
	  if (empty($cases) and !empty($id)) die(show_404('')); 
	  
	  if ($_POST['addtm1'] == TRUE) {
		  $data['award'] = (integer)$_POST['award'];
		  $data['image'] = $_POST['image'];
		  $data['color'] = (integer)$_POST['color'];
		  $data['name'] = $_POST['name'];
		  $data['case_id'] = $id;
		  $idt  = $this->items_model->save($data);
		  $item = $this->items_model->get($idt);
		  echo "Materialize.toast('Приз успешно добавлен !', 4000); $('#ll').html(''); $('#addtemplate').closeModal();";
		  die("$('#templates tr:last').after('".'<tr id="tm'.$item->id.'"><td>'.$item->id.'</td><td>'.$item->award.'K</td><td>'.$item->name.'</td> <td class="d25"><a onclick="edittmid('.$item->id.')" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td><td class="d25"><a onclick="deletetm('.$item->id.')" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td></tr>'."');");
	  }
	  if ($_POST['addtm2'] == TRUE) {
		  $data['award'] = (integer)$_POST['award'];
		  $data['color'] = (integer)$_POST['color'];
		  $data['case_id'] = $id;
		  $idt  = $this->items_model->save($data);
		  $item = $this->items_model->get($idt);
		  echo "Materialize.toast('Приз успешно добавлен !', 4000); $('#ll').html(''); $('#addtemplate').closeModal();";
		  die("$('#templates tr:last').after('".'<tr id="tm'.$item->id.'"><td>'.$item->id.'</td><td>'.$item->award.'K</td><td>'.$colors[$item->color-1].'</td> <td class="d25"><a onclick="edittmid('.$item->id.')" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td><td class="d25"><a onclick="deletetm('.$item->id.')" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td></tr>'."');");
	  }
      if ($_POST == TRUE) {
		$data = $this->cases_model->array_from_post(array('price','type','name'));
		$id = $this->cases_model->save($data, $id);
		redirect('/admin/cases/edit/'.$id);
	  } 
	  if (!empty($cases->title)) { 
		  $this->data['title'] = 'Редактировать кейс : '.$cases->title.' .';
	  } else {
		  $this->data['title'] = 'Добавить кейс';
	  }
	  $this->data['cases'] = $cases;
	  $this->data['items'] = $items;
	  if ($cases->type == 1) {$this->data['load'] = 'admin/cases/edit'; } else {$this->data['load'] = 'admin/cases/edit1';} 
	  $this->load->view('admin/template',$this->data);
	  
    }
	public function item($id)
	{
	  $colors=array('Желтый','Серый','Синий','Красный');
	  if ($_POST['edittm1'] == TRUE) {
		  $id = (integer)$_POST['idss'];
		  $data['award'] = (integer)$_POST['award'];
		  $data['image'] = $_POST['image'];
		  $data['color'] = (integer)$_POST['color'];
		  $data['name'] = $_POST['name'];
		  $this->items_model->save($data,$id);
		  echo "Materialize.toast('Приз успешно изменен!', 4000);$('#edittemplate').closeModal();";
		  die( '$("#tm'.$id.'").html('."'".'<td>'.$id.'</td><td>'.$data['award'].'K</td><td>'.$data['name'].'</td> <td class="d25"><a onclick="edittmid('.$id.')" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td><td class="d25"><a onclick="deletetm('.$id.')" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td>'."'".');');
	  }
	  if ($_POST['edittm2'] == TRUE) {
		  $id = (integer)$_POST['idss'];
		  $data['award'] = (integer)$_POST['award'];
		  $data['color'] = (integer)$_POST['color'];
		  $this->items_model->save($data,$id);
		  echo "Materialize.toast('Приз успешно изменен!', 4000);$('#edittemplate').closeModal();";
		  die( '$("#tm'.$id.'").html('."'".'<td>'.$id.'</td><td>'.$data['award'].'K</td><td>'.$colors[$data['color']-1].'</td> <td class="d25"><a onclick="edittmid('.$id.')" class="waves-effect waves-light btn info-btn"> <i class="material-icons">mode_edit</i></a></td><td class="d25"><a onclick="deletetm('.$id.')" class="waves-effect waves-light btn danger-btn"> <i class="material-icons">delete</i></a></td>'."'".');');
	  }
      $item = $this->items_model->get($id);
	  if (empty($item)) die(show_404());
	  if ($_GET['type'] == 'delete') {
		  $this->items_model->delete($id);
		  die("Materialize.toast('Приз успешно удален!', 4000);$('#tm".$id."').html('');");
	  }
	  echo json_encode($item);
	}
    public function delete($id)
    {
        $this->cases_model->delete($id);
        redirect('admin/cases');
    }
}
