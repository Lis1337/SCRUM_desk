<?php


namespace Scrum\Controllers;

use Scrum\Models\Sprint;
use Scrum\Models\Task;
use Scrum\Models\Task as Tsk;

class Api extends \Scrum\Controller
{
    public function sprints()
    {
        $sprintSave = new Sprint();
        $data = $_POST;

        $sprintSave->year = $_POST['year'];
        $sprintSave->week = $_POST['week'];

        $sprintSave->save();
        $this->showId($data);
    }

    public function tasks()
    {
        $boardSave = new Tsk();
        $data = $_POST;

        $boardSave->sprintId = $_POST['sprintId'];
        $boardSave->title = $_POST['title'];
        $boardSave->estimation = $_POST['estimation'];
        if (isset($_POST['description'])) {
            $boardSave->description = $_POST['description'];
        }
        $boardSave->save();
        $this->showId($data);
    }

    public function showId($data)
    {
        if (!$data['title']) {
            $object = Sprint::findByParams($data);
            } else {
            $object = Task::findByParams($data);
        }

        $idArray['id'] = $object[array_key_first($object)]->id;
        $this->view->objectSerialized = json_encode($idArray);
        $this->view->display(__DIR__ . '/../Templates/API/showId.php');
    }
}
