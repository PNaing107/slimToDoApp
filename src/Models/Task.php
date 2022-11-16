<?php

declare(strict_types=1);


namespace App\Models;
use PDO;

class Task
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addTask($newTask): int
    {
        try {
            $query = $this->db->prepare(
                "INSERT INTO `tasks` (`description`, `status`, `created`, `due`)
                    VALUES (:description, 'To Do', :created, :due);"
            );

            $query->bindParam(':description', $newTask['description']);
            $query->bindParam(':created', $newTask['created']);
            $query->bindParam(':due', $newTask['due']);
            $query->execute();
            return (int) $this->db->lastInsertId();

        } catch (\PDOException $exception) {
            return 0;
        }
    }


}