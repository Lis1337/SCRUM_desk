<?php


namespace Scrum\Models;


use Scrum\Db;
use Scrum\Model;

class Sprint extends Model
{
    public const TABLE = 'Sprints';

    public string $id;

    public int $year;

    public int $week;
}
