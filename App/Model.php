<?php

namespace App;

abstract class Model
{

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function countAll()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::$table;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' .static::$table. ' WHERE id = :id';
        $query_res = $db->query($sql, [':id' => $id], static::class);
        return empty($query_res) ? false : $query_res[0];
    }

    public function update()
    {
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }
        $db = new Db();
        $sql = 'UPDATE ' . static::$table . ' 
        SET ' . implode(',', $sets) . ' 
        WHERE id=:id';
        return $db->execute($sql, $data);
    }

    public function insert()
    {
        $sets = [];
        $ph_sets = [];
        $data = [];

        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $ph_sets[] = ':' . $key;
            $sets[] = $key;
            $data[':' . $key] = $value;
        }

        $db = new Db();
        $sql =  'INSERT INTO ' . static::$table . '
        (' . implode(',', $sets) .') VALUES (' . implode(',', $ph_sets) .')';
        return $db->execute($sql, $data);
    }

    public function save()
    {
        if(is_null($this->id)) {
            $this->insert();
            return $this;
        } else {
            return $this->update();
        }
    }

    //Тут не знал нужно ли делать методы update() и insert() как protected?
    public function delete(): bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table .' 
        WHERE id = :id';

        if(is_null($this->id)) {
            return false;
        } else {
            return $db->execute($sql, [':id' => $this->id]);
        }
    }
}