<?php

class taskController extends Controller {

	public function index()
	{		
		$data['title'] = 'Data task';

		$data['task'] = $this->model('Task')->getAll();

		$this->view('templates/header', $data);
		$this->view('task/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Create Task';
		$this->view('templates/header', $data);
		$this->view('task/create');
	}

	public function store()
	{
		$name  = $_POST['name'];
		$email = $_POST['email'];
		$text = $_POST['text'];
		$this->model('Task')->store($name, $email,$text);
		$this->redirect('task');
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Task';
		$data['task'] = $this->model('Task')->edit($id);

		$this->view('templates/header', $data);
		$this->view('task/edit', $data);
	}

	public function update($id)
	{
		$text = $_POST['text'];
		$status = $_POST['status'];
		$this->model('Task')->update($id, $text,$status);
		$this->redirect('task');
	}

	public function destroy($id)
	{
		$this->model('Task')->destroy($id);

		$this->redirect('task');
	}



}