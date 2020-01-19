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
        $query = mysqli_query($conn, "SELECT Items.Title, Items.Description, Images.ImagePath
                                      FROM Items
                                      INNER JOIN RelatedImagesItems
                                      ON Items.ItemNo = RelatedImagesItems.ItemNo
                                      INNER JOIN Images
                                      ON RelatedImagesItems.ImageNo = Images.ImageNo"); 

        $multiArray = array();

        while ($row = mysqli_fetch_assoc($query)) 
        {
            $cards = array("title" => $row["Title"], "description" => $row["Description"], "imagePath" => $row["ImagePath"]);

            array_push($multiArray, $cards);
        }

        mysqli_close($conn);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[0]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[0]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[0]["description"]; ?></div>
                    <div class="card-body"><button class="btn btn-light"><a href="LewisHamiltonArticle.php">Lewis Hamilton</a></button></div>	
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[1]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[1]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[1]["description"]; ?></div>
                    <div class="card-body"><button class="btn btn-light"><a href="ScuderiaFerrariArticle.php">Scuderia Ferrari</a></button></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[2]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[2]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[2]["description"]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[3]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[3]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[3]["description"]; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[4]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[4]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[4]["description"]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[5]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[5]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[5]["description"]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[6]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[6]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[6]["description"]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[7]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[7]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[7]["description"]; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[8]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[8]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[8]["description"]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[9]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[9]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[9]["description"]; ?></div>
                    <div class="card-body"><button class="btn btn-light"><a href="GeorgeRussell.php">George Russell</a></button></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[10]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[10]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[10]["description"]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $multiArray[11]["imagePath"]; ?>"></div>
                    <h4 class="card-title"><?php echo $multiArray[11]["title"]; ?></h4>
                    <div class="card-body"><?php echo $multiArray[11]["description"]; ?></div>
                </div>
            </div>
        </div>
    </body>

    <footer class="container">
        <p>Name: Brady Harper</p>
        <p>Student Number: 1700485</p>
    </footer>
</html>