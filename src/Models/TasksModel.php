<?php

declare(strict_types=1);


namespace App\Models;


use PDO;

class TasksModel
{
    private PDO $db;
    private array $tasks;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTasks(): array
    {
        $query = $this->db->prepare(
            "SELECT `id`, `description`, `status`, `created`, `due` FROM `tasks`;"
        );

        $query->execute();
        return $query->fetchAll();
//        return [
//            [
//                'id' => 1,
//                'description' => 'Clean bike',
//                'status' => 'To Do',
//                'created' => '16/11/2022',
//                'due' => '17/11/2022'
//            ],
//            [
//                'id' => 2,
//                'description' => 'Finish Portfolio Website',
//                'status' => 'To Do',
//                'created' => '16/11/2022',
//                'due' => '16/12/2022'
//            ],
//            [
//                'id' => 3,
//                'description' => 'Book Train to Cornwall',
//                'status' => 'Done',
//                'created' => '10/11/2022',
//                'due' => '16/11/2022'
//            ]
//
//        ];
    }


}