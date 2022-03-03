<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

    <form action="/api/showId" method="post" enctype="multipart/form-data">
        <p>
            <label>
                Select sprintId:
                <select name="sprintId" required>
                    <?php
                    foreach ($this->tasks as $task) {
                        echo '<option>' . $task->sprintId . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                Select title:
                <select name="title" required>
                    <?php
                    foreach ($this->tasks as $task) {
                        echo '<option>' . $task->title . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                Select estimation:
                <select name="estimation" required>
                    <?php
                    foreach ($this->tasks as $task) {
                        echo '<option>' . $task->estimation . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                Select description:
                <select name="description">
                    <?php
                    foreach ($this->tasks as $task) {
                        echo '<option>' . $task->description . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <button>
            Show id
        </button>
    </form>

    <p>
        <a href="/Index">
            <button>
                return
            </button>
        </a>
    </p>

</body>
</html>