<?php

namespace App\Models;

use grgit\Lib\Model;

class User extends Model
{
    protected $table = "users";

    public function getUserByEmail($email)
    {
        $query = "select * from {$this->table} where email=:email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTopContact()
    {
        $query = "select u.name, count(1) total from contacts c inner join users u on u.id = c.id_user group by c.id_user order by total desc limit 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getLessContact()
    {
        $query = "select u.name, count(1) total from contacts c inner join users u on u.id = c.id_user group by c.id_user order by total asc limit 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getContactsPerMonth()
    {
        $query = "select monthname(createdAt) as months, count(1) as total from contacts group by concat(year(createdAt),month(createdAt));";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUsersPerMonth()
    {
        $query = "select monthname(createdAt) as months, count(1) as total from users group by concat(year(createdAt),month(createdAt));";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}