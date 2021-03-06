<?php

require __DIR__ . '/autoload.php';


$serverExplode = explode('/', $_SERVER['REQUEST_URI']);
$ctrlName = $serverExplode[1];
$class = '\Scrum\Controllers\\' . $ctrlName;

if (!class_exists($class)) {
    die('Error 404');
}

$ctrlName = new $class;
if (!isset($serverExplode[2])) {
    $ctrlName->index();

} elseif (!isset($serverExplode[3])) {
    $methodName = $serverExplode[2];
    if (!method_exists($ctrlName, $methodName)) {
        die('error 404');

    } else {
        $ctrlName->$methodName();
    }

} else {
    if ($serverExplode[2] == 'sprints') {
        $ctrlName->sprintsClose();
    } else {
        $ctrlName->tasksClose();
    }
}
