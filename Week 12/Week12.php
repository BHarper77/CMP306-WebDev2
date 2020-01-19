<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <title>Formula 1</title>

        <meta charset = 'utf-8'>

        <meta name="viewport" content="width=device-width, intial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    </head>

    <body>
        <?php include "../navbarInclude.php"; ?>
        <?php include "../connectionInclude.php"; ?>

        <a href="../Controller/getItemsREST.php">Get all</a>

        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="../Controller/insertItemsREST.php" method="post">
                        <h4>Insert an Item</h4>
                        <div class="form-group">
                            <label>Title:</label>
                            <input class="form-control" type="text" name="itemTitle" requierd>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <input class="form-control" type="text" name="itemDescription" required>
                        </div>

                        <button class="btn btn-light" type="submit">Submit</button>
                    </form>
                </div>

                <div class="col">
                    <h4>Get items</h4>
                    <div class="dropdown">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../Controller/getItemsREST.php">All</a>
                            <a class="dropdown-item" href="../Controller/getItemOneREST.php">1</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <footer class="container">
        <p>Name: Brady Harper</p>
        <p>Student Number: 1700485</p>
    </footer>
</html>