<?php 

    include './include/header.php';
    include './include/slider.php';

    if(isset($_GET['category'])){
        // Nothing
    }
    else{
        $post_fetch_query = "SELECT * FROM posts";
        $fetched_posts = $db->query($post_fetch_query);
    }

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <?php

                include './include/sidebar.php';
            
            ?>
        </div>
        <div class="col-8">
            <div class="row">
                <?php
            
                if($fetched_posts->rowCount() > 0){
                    foreach($fetched_posts as $fetched_post){
                        $category_id = $fetched_post['category_id']; 
                        $category_post_query = "SELECT * FROM posts WHERE id=$category_id";
                        ?>


                <div class="col-md-6 my-3">
                    <div class="card">
                        <img src="uploads/posts/<?php echo $fetched_post['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetched_post['title'] ?></h5>
                            <p class="card-text"><?php echo $fetched_post['body'] ?></p>
                            <span class="border d-block text-center border-primary py-2 px-5 rounded border-2"><?php echo "Author: " . $fetched_post['author'] ?></span>
                        </div>
                    </div>
                </div>


                <?php

                    }
                }
                else{
                    ?>

                <div class="col">
                    <p class="alert alert-danger mt-3">No post detected</p>
                </div>

                <?php
                }

            ?>
            </div>
        </div>
    </div>
</div>


<?php include './include/footer.php' ?>