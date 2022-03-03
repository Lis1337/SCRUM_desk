<?php


namespace Scrum\Controllers;


use Scrum\Controller;
use Scrum\Models\Sprint;
use Scrum\Models\Task as Tsk;

class Task extends Controller
{
    public function index()
    {
        $this->view->task = Tsk::findAll();
        $this->view->display(__DIR__ . '/../Templates/Task/index.php');
    }

    public function create()
    {
        $this->view->tasks = Tsk::findAll();
        $this->view->sprints = Sprint::findAll();
        $this->view->display(__DIR__ . '/../Templates/Task/taskCreate.php');
    }

    public function save()
    {
        $boardSave = new Tsk();

        $boardSave->sprintId = $_POST['sprintId'];
        $boardSave->title = $_POST['title'];
        $boardSave->estimation = $_POST['estimation'];
        if (isset($_POST['description'])) {
            $boardSave->description = $_POST['description'];
        }
        $boardSave->save();
        header('Location: /Task/Index');
    }

    public function close()
    {
        Tsk::delete($_POST['id']);
        header('Location: /Task/Index');
    }
}
