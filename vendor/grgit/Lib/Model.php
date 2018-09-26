<?php

namespace grgit\Lib;

use grgit\Lib\Db;

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Db::getDb();
    }

    public function fetchAll()
    {
        $query = "select * from {$this->table}";
        $data = $this->db->query($query);
        return $data->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    public function fetchAllAuthorized()
    {
        $query = "select * from {$this->table} where id_user = ".$_SESSION['user']['id'];
        $data = $this->db->query($query);
        return $data->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    public function find(int $id)
    {
        $query = "select * from {$this->table} WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchObject(get_called_class());
    }

    public function edit(array $data) {
        $update = [];
        foreach($data as $key => $value) {
            if($key != 'id') {
                $update[] = "{$key} = '{$value}'";
            }
        }
        $query = "update {$this->table} set ".join(',', $update)." WHERE id={$data['id']} and id_user = ".$_SESSION['user']['id'];
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    public function save(array $data) {
        $fields = join(',', array_keys($data));
        $values = "'".join("','", array_values($data))."'";
        $query = "insert into {$this->table} ({$fields}) values ({$values})";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    public function remove(int $id) {
        $query = "delete from {$this->table} where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->execute();
    }
    
}