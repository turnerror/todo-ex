<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
<h3> <?php echo $error; ?></h3>
<form action="/markDone" method="post">
    <h2>Uncompleted</h2>
    <ul>
        <?php echo \App\ViewHelpers\TodoViewHelper::displayUnCompleted($uncompleted); ?>
    </ul>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Mark done!">
    </div>
    <p><?php echo $markDoneMsg; ?></p>
</form>

<h2>Completed</h2>
<form action="/delete" method="post">
    <ul>
        <?php echo \App\ViewHelpers\TodoViewHelper::displayCompleted($completed); ?>
    </ul>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Delete!">
    </div>
    <p><?php echo $deleteMsg; ?></p>
</form>

<h1>Create Todo</h1>
<form action="/add" method="post">
    <div class="form-group">
        <label>Task</label>
        <input name="todoName" type="text" class="form-control name">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Create!">
    </div>
    <p><?php echo $createMsg; ?></p>
</form>

</body>
</html>



