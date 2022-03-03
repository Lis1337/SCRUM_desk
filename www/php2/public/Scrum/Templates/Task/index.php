<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        <a href="/Task/create">
            <button>
                Add task
            </button>
        </a>
    </p>
    <?php foreach ($this->task as $board): ?>
    <p>
        <?php echo 'id: ' . $board->id ?>
        <br>
        <?php echo 'sprintId: ' . $board->sprintId ?>
        <br>
        <?php echo 'title: ' . $board->title ?>
        <br>
        <?php echo 'estimation: ' . $board->estimation ?>
        <br>
        <?php echo 'description: ' . $board->description ?>
        <br>
    </p>
    <?php endforeach; ?>
    </p>
    <p>
        <a href="/Index">
            <button>
                Return main
            </button>
        </a>
    </p>

</body>
</html>
