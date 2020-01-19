<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <title>Formula 1</title>

        <meta charset = 'utf-8'>

        <meta name="viewport" content="width=device-width, intial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    </head>

    <body>
        <?php include "../navbarInclude.php"; ?>

        <?php include "../connectionInclude.php"; ?>

        <?php
        include "../Model/itemsAPI.php";

        $itemsJSON = getAllItems();
        $items = json_decode($itemsJSON);

        echo '<div class="container">';
        for($i = 0; $i < 3; $i++)
        {
            echo '<div class="row">';
            for ($j = 0; $j < 4; $j++)
            {
                $counter = $j +($i * 4);
                echo '<div class="col-sm-3 card">
                        <div class="card-img-top"><img class="img-fluid" src="../'. $items[$counter] -> ImagePath.'"></div>
                        <h4 class="card-title">'.$items[$counter] -> Title.'</h4>
                        <div class="card-body">'.$items[$counter] -> Description.'</div>';

                echo '<div class="card-body"><button class="btn btn-light"><a href="articlesPageUpdated.php?id='.$items[$counter] -> ItemNo.'">View Articles</a></button></div>';

                echo '</div>';
            }

            echo '</div>';
        }

        echo '</div>';     

        mysqli_close($conn);
        ?>

    </body>

    <footer class="container">
        <p>Name: Brady Harper</p>
        <p>Student Number: 1700485</p>
    </footer>
</html>