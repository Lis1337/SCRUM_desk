<?php

namespace Scrum\Controllers;


use Scrum\Controller;
use Scrum\Models\Sprint;

class Index extends Controller
{
    public function index()
    {
        $this->view->sprints = Sprint::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }
}
