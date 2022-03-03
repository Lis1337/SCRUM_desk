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

    <h1>PM actions</h1>
    <p>
        <a href="/Sprint/create">
            <button>
                Create sprint
            </button>
        </a>
    </p>

    <h2>
        Sprints in progress:
    </h2>
    <?php foreach ($this->sprints as $sprint):
        $sprintSplit = str_split($sprint->year, 2);
        echo '<p>';
        echo 'id: ' . $sprintSplit[array_key_last($sprintSplit)] .
            '-' . $sprint->week . '<br>';
        echo 'Week: ' . $sprint->week . '<br>';
        echo 'Year: ' . $sprint->year . '<br>' . '<br>';
        echo '<a href="/Task/create"><button>' . 'add tasks' . '</button></a>' . '</p>'; ?>

        <form enctype="multipart/form-data" method="post"
              action="/Sprint/close">
            <input size="2" name="id" value="<?php echo $sprint->id ?>" readonly>
            <button>
                close task
            </button>
        </form>

    <?php endforeach ?>
</body>
</html>
