<?php

namespace Scrum\Controllers;


use Scrum\Controller;
use Scrum\Models\Sprint as spr;

class Sprint extends Controller
{
    public function index()
    {
        $this->view->sprints = spr::findAll();
        $this->view->display(__DIR__ . '/../Templates/Sprint/index.php');
    }

    public function create()
    {
        $this->view->display(__DIR__ . '/../Templates/Sprint/sprintCreate.php');
    }

    public function save()
    {
        $sprintSave = new spr();
        $sprintSave->year = $_POST['year'];
        $sprintSave->week = $_POST['week'];
        $sprintSave->save();
        header('Location: /Sprint/Index');
    }

}
