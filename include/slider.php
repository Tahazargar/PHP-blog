<?php

  $query = "SELECT * FROM posts_slider";
  $sliders = $db->query($query);

?>

<section class="carousel">
    <button class="slider-button slider-button-prev" data-slide-direction="prev">&#8592</button>
    <button class="slider-button slider-button-next" data-slide-direction="next">&#8594</button>
    <ul class="slides">
        <?php
        if($sliders->rowCount() > 0){
          foreach($sliders as $slider){ 
            
            $post_id = $slider['post_id'];
            $query_post = "SELECT * FROM posts WHERE id=$post_id";
            $post = $db->query($query_post)->fetch(); 
            
            ?>


        <li class="slide <?php echo ($slider['active'] ? 'active' : '') ?>">
            <img class="slider-image" src="uploads/posts/<?php echo $post['image'] ?>" alt="engineers" />
            <div class="description-container">
                <h2><?php echo $post['title'] ?></h2>
                <p><?php echo substr($post['body'], 0, 200) . "..."; ?></p>
                <button class="slider-post-button"><a href="single.php?id=<?php echo $post['id']; ?>">See post</a></button>
            </div>
        </li>

        <?php 
        
      }
        }

    ?>
    </ul>
    <div class="slides-circles">
        <div data-active-slide></div>
        <div></div>
        <div></div>
    </div>
</section>