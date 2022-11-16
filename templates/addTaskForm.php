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
    </style>
</head>
<body>
<h1>To Do App</h1>
<div>Built with Slim - a microframework for PHP</div>
<p>Try <a href="http://www.slimframework.com">SlimFramework</a></p>
<form action="/add" method="post">
    <label for="description">Describe the task</label>
    <input id="description" name="description" type="text" maxlength="255"><br>
    <label for="created">Created Date</label>
    <input id="created" name="created" type="text" maxlength="255"><br>
    <label for="due">Due Date</label>
    <input id="due" name="due" type="text" maxlength="255"><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>
