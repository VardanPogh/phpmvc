<?php

class TaskController extends Controller
{
    private $peerPageCount = 3;

    public function index()
    {
        $taskData['title'] = 'Task List';

        $taskData['task'] = $this->model('Task')->select($this->peerPageCount);
        $count = $this->model('Task')->getCount();
        $taskData['count'] = ceil($count[0]['count'] / $this->peerPageCount);
        $this->view('layouts/header', $taskData);
        $this->view('task/index', $taskData);
        $this->view('layouts/footer');
    }

    public function create($pageInfo = [])
    {
        $pageInfo['title'] = 'Create Task';
        $this->view('layouts/header', $pageInfo);
        $this->view('task/create', $pageInfo);
    }

    public function store()
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $storeResponse['error'] = "Invalid email format";
                $this->create($storeResponse);
                return;
            }

            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
            $this->model('Task')->store($name, $email, $text);
            $this->redirect('task');
        } else {
            $storeResponse['error'] = 'The fields are required';
            $this->create($storeResponse);
        }
    }

    public function edit($id, $editInfo = [])
    {
        $editInfo['title'] = 'Edit Task';
        $editInfo['task'] = $this->model('Task')->edit($id);

        $this->view('layouts/header', $editInfo);
        $this->view('task/edit', $editInfo);
    }

    public function update($id)
    {
        if (empty($_POST['text'])) {
            $updateResponse['error'] = 'The Text field can not be empty';
            $this->edit($id, $updateResponse);
            return;
        }
        $text = $_POST['text'];
        $status = $_POST['status'];
        $this->model('Task')->update($id, $text, $status);
        $this->redirect('task');
    }

    public function destroy($id)
    {
        $this->model('Task')->destroy($id);

        $this->redirect('task');
    }

    public function sort()
    {
        $sortColumn = $_POST['sortColumn'];
        $sortColumnType = $_POST['sortColumnType'];
        echo json_encode($this->model('Task')->select($this->peerPageCount, 0, [$sortColumn, $sortColumnType]));
    }

    public function pagination()
    {
        $pageNumber = $_GET['pageNumber'];
        $sortColumn = $_GET['sortColumn'];
        $sortColumnType = $_GET['sortColumnType'];
        $taskData = $this->model('Task')->select($this->peerPageCount, ($pageNumber - 1) * $this->peerPageCount, [$sortColumn, $sortColumnType]);
        echo json_encode($taskData);

    }
}