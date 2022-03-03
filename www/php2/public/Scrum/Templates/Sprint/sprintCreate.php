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

    <h1>Create new sprint</h1>
    <form name="create" action="/Sprint/save"
          enctype="multipart/form-data" method="post">
        <p>
            <label>
                Select year:
                <select name="year">
                    <?php
                    $year = (int) date('Y');
                    while (2020 <= $year) {
                        echo '<option>' . $year . '</option>';
                        $year -= 1;
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                Select week:
                <select name="week" required>
                    <?php
                    $week = 1;
                    while ($week <= 53) {
                        echo '<option>' . $week . '</option>';
                        $week += 1;
                    }
                    ?>
                </select>
            </label>
        </p>
        <button>
            Save
        </button>
    </form>

</body>
</html>