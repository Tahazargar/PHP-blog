<?php

include("./include/db.php");

    $query = "SELECT * FROM categories";
    $categories = $db->query($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Taha Zargar</title>
</head>

<body>

    <section id="header" class="bg-dark">
        <div class="container">
            <div class="row bg-dark py-4">
                <div class="col-md-9">
                    <p class="text-light">Simple PHP Blog</p>
                </div>
                <div class="col-md-3">
                    <nav class="d-flex justify-content-around align-items-center list-unstyled">
                        
                        <?php
                            
                            if($categories->rowCount() > 0){
                                foreach($categories as $category){ ?>

                                    <li class="nav-item <?php echo (isset($_GET['category'])) && $category['id'] == $_GET['category'] ? 'active' : ''; ?>"><a class="nav-link" href="index.php?category=<?php echo $category['id'] ?>"><?php echo $category['title'] ?></a></li>

                        <?php
                                }
                            }

                        ?>

                    </nav>
                </div>
            </div>
        </div>
    </section>