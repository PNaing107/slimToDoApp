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

    public function updateTask($id): int
    {
        try {
            $query = $this->db->prepare(
                "UPDATE `tasks` SET `status` = 'Done' WHERE `id` = :id;"
            );

            $query->bindParam(':id', $id['id']);
            $query->execute();
            return 1;

        } catch (\PDOException $exception) {
            return 0;
        }
    }

    public function deleteTask($id): int
    {
        //Check if the task exists
        try {
            $query = $this->db->prepare(
                "SELECT `description`, `status`, `created`, `due` FROM `tasks` WHERE `id` = :id;"
            );

            $query->bindParam(':id', $id['id']);
            $query->execute();
            $taskToDelete = $query->fetch();
            // Insert task into delete Table
            try {
                $query = $this->db->prepare(
                    "INSERT INTO `deleted` (`description`, `status`, `created`, `due`)
                    VALUES (:description, :status, :created, :due);"
                );

                $query->bindParam(':description', $taskToDelete['description']);
                $query->bindParam(':status', $taskToDelete['status']);
                $query->bindParam(':created', $taskToDelete['created']);
                $query->bindParam(':due', $taskToDelete['due']);
                $query->execute();

                // Delete task from tasks table
                try {
                    $query = $this->db->prepare(
                        "DELETE FROM `tasks` WHERE `id` = :id;"
                    );

                    $query->bindParam(':id', $id['id']);
                    $query->execute();
                    return -1;

                } catch (\PDOException $exception) {
                    return 2;
                }

            } catch (\PDOException $exception) {
                return 1;
            }


        } catch (\PDOException $exception) {
            return 0;
        }
    }
}