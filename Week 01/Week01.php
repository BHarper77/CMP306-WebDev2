<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Formula 1 Teams</title>

        <meta charset = 'utf-8'>

        <meta name="viewport" content="width=device-width, intial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    </head>

    <body>
        <?php include "../navbarInclude.php"; ?>
        <?php include "../connectionInclude.php"; ?>
        
        <?php
        $query = mysqli_query($conn, "SELECT Title, Description FROM Items");

        $query2 = mysqli_query($conn, "SELECT Images.ImagePath
                                       FROM Images 
                                       INNER JOIN RelatedImagesItems
                                       ON Images.ImageNo = RelatedImagesItems.ImageNo
                                       INNER JOIN Items
                                       ON RelatedImagesItems.ItemNo = Items.ItemNo");

        $title = array();
        $description = array();
        $image = array();

        while ($row = mysqli_fetch_assoc($query))
        {
            array_push($title, $row["Title"]);
            array_push($description, $row["Description"]);
        }

        while ($row = mysqli_fetch_assoc($query2)) 
        {
            array_push($image, $row["ImagePath"]);
        }

        mysqli_close($conn);

        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[0]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[0]; ?></h4>
                    <div class="card-body"><?php echo $description[0]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[1]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[1]; ?></h4>
                    <div class="card-body"><?php echo $description[1]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[2]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[2]; ?></h4>
                    <div class="card-body"><?php echo $description[2]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[3]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[3]; ?></h4>
                    <div class="card-body"><?php echo $description[3]; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[4]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[4]; ?></h4>
                    <div class="card-body"><?php echo $description[4]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[5]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[5]; ?></h4>
                    <div class="card-body"><?php echo $description[5]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[6]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[6]; ?></h4>
                    <div class="card-body"><?php echo $description[6]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[7]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[7]; ?></h4>
                    <div class="card-body"><?php echo $description[7]; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[8]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[8]; ?></h4>
                    <div class="card-body"><?php echo $description[8]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[9]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[9]; ?></h4>
                    <div class="card-body"><?php echo $description[9]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[10]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[10]; ?></h4>
                    <div class="card-body"><?php echo $description[10]; ?></div>
                </div>
                <div class="col-sm-3 card">
                    <div class="card-img-top"><img class="img-fluid" src="../<?php echo $image[11]; ?>"></div>
                    <h4 class="card-title"><?php echo $title[11]; ?></h4>
                    <div class="card-body"><?php echo $description[11]; ?></div>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <p>Name: Brady Harper</p>
        <p>Student Number: 1700485</p>
    </footer>
</html>