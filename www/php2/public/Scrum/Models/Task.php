<?php


namespace Scrum\Models;


use Scrum\Model;

class Task extends Model
{
    public const TABLE = 'Tasks';

    public int $id;

    public string $sprintId;

    public string $title;

    public string $estimation;

    public string $description;
}
