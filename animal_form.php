<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Espace animal register</title>
</head>

<body>

    <form method="POST" action="./model/action.php">

        <input type="text" name="name" placeholder=" Animal Name" require><br><br>


        <input type="radio" name="type" value="herbivorous">Herbivorous<br><br>

        <input type="radio" name="type" value="carnivorous">Carnivorous<br><br>

        <input type="text" name="breed" placeholder=" Animal Breed" require><br><br>

        <div class="flexy">
            <input type="submit" class="submit" name="submit" value="submit">
        </div>

    </form>
</body>

</html>