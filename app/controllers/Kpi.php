<?php
	class Kpi extends controller{
		public function index(){
			$data['judul'] = 'Data KPI';
			$this->view('templates/header' , $data);
			$this->view('kpi/index');
			$this->view('templates/footer');
		}
	}
