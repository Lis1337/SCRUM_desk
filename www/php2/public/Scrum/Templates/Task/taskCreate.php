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

    <h1>Create new task</h1>
    <form name="create" action="/Task/save"
          enctype="multipart/form-data" method="post">
        <p>
            <label>
                Choose sprint:
                <select name="sprintId" required>
                    <?php
                    foreach ($this->sprints as $sprint) {
                        echo '<option>' . $sprint->id . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                Enter title:
                <input name="title" size="100" required>
            </label>
        </p>
        <p>
            <label>
                Time estimation:
                <input name="estimation" size="10" required>
            </label>
        </p>
        <label>
            Enter description:
            <input name="description" size="100">
        </label>
        <p>
            <button>
            Save
            </button>
        </p>
    </form>

</body>
</html>
