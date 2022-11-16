<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Slim 4</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <style>
        body {
            margin: 50px 0 0 0;
            padding: 0;
            width: 100%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-align: center;
            color: #aaa;
            font-size: 18px;
        }

        h1 {
            color: #719e40;
            letter-spacing: -3px;
            font-family: 'Lato', sans-serif;
            font-size: 100px;
            font-weight: 200;
            margin-bottom: 0;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 2rem;
        }

        thead {
            padding: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>To Do App</h1>
<div>Built with Slim - a microframework for PHP</div>
<p>Try <a href="http://www.slimframework.com">SlimFramework</a></p>
<table>
    <thead>
        <td>Description</td>
        <td>Status</td>
        <td>Date Created</td>
        <td>Date Due</td>
        <td>Mark As Complete</td>
        <td>Remove from List</td>
    </thead>
    <tbody>
        <?php
        foreach ($tasks as $task) {
            if ($task['status'] == 'Done') {
                echo "<tr>
                    <td>{$task['description']}</td>
                    <td>{$task['status']}</td>
                    <td>{$task['created']}</td>
                    <td>{$task['due']}</td>
                    <td></td>
                    <td><button type='button' name='id' value='{$task['id']}' formaction='/delete'>Delete</button></td>
                    </tr>";
            } else {
                echo "<tr>
                    <td>{$task['description']}</td>
                    <td>{$task['status']}</td>
                    <td>{$task['created']}</td>
                    <td>{$task['due']}</td>
                    <td><button type='button' name='id' value='{$task['id']}' formaction='/status'>Done</button></td>
                    <td><button type='button' name='id' value='{$task['id']}' formaction='/delete'>Delete</button></td>
                    </tr>";
            }
        }
        ?>
    </tbody>
</table>
<form action="/add"><button>Add a new Task</button></form>

</body>
</html>
