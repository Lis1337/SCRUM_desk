<?php


namespace Scrum;


abstract class Model
{
    public const TABLE = '';

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    public static function findById(string $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE .
            ' WHERE id = :id';
        $params['id'] = $id;

        $query = $db->query($sql, $params, static::class);
        return $query[array_key_first($query)];
    }

    protected function insert()
    {
        $properties = get_object_vars($this);

        $columns  = [];
        $binds = [];
        $data = [];
        foreach ($properties as $name => $value) {
            $columns[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        if (static::TABLE == 'Sprints') {
            $columns[] = 'id';
            $binds[] = ':id';
            $week = $data[':week'];
            $yearSplit = str_split($data[':year'], 2)[1];
            $data[':id'] = $yearSplit . '-' . $week;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(',', $columns) .
            ') VALUES (' . implode(',', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);
    }

    protected function update()
    {
        $properties = get_object_vars($this);
        $column = [];
        $data = [];

        foreach ($properties as $name => $value) {
            $data[':' . "$name"] = $value;
            if (!is_null($value) && $name != 'id') {
                $column[] = "$name" . ' = ' . ":$name";
            }
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' .
            implode(', ', $column) .
            ' WHERE id = :id';

        $db = new Db();
        $db->execute($sql, $data);
    }

    public static function findByParams(array $params): array
    {
        $db = new Db();
        $column = [];
        $binds = [];

        foreach ($params as $name => $value) {
            $column[] = $name;
            $binds[] = $name . ' = :' . $name;
        }

        if (!in_array('id', $column)) {
            $column[] = 'id';
        }

        $sql = 'SELECT ' . implode(', ', $column) .
            ' FROM' . ' ' . static::TABLE .
            ' WHERE ' . implode(' AND ', $binds);

        return $db->query($sql,
            $params,
            static::class
        );
    }

    public function save()
    {
        if (empty($this->findByParams($_POST))) {
            $this->insert();
        }
    }

    public static function delete($id): bool
    {
        $sql = 'DELETE FROM' . ' ' . static::TABLE .
            ' WHERE id = :id';

        $params['id'] = $id;
        $db = new Db();
        return $db->execute($sql, $params);
    }
}
