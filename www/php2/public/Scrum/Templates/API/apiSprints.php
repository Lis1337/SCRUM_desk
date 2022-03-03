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
                Select year:
                <select name="year" required>
                    <?php
                    foreach ($this->sprints as $sprint) {
                        echo '<option>' . $sprint->year . '</option>';
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
                    foreach ($this->sprints as $sprint) {
                        echo '<option>' . $sprint->week . '</option>';
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