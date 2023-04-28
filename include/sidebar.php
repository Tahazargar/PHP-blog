<?php

    $query_cat = "SELECT * FROM categories";

    $categories = $db->query($query_cat);

?>

<!-- Search Box Section -->


    <form class="border rounded p-3 m-3" action="search.php" method="get">
        <h5>Search here</h5>
        <div class="content">
            <input class="form-control w-75 d-inline" type="Search" name="search" id="seach" placeholder="Search">
            <button class="btn btn-primary">Search</button>
        </div>
    </form>


<!-- Category Section -->


    <nav class="border rounded overflow-hidden m-3">
        <h5 class="nav-title px-3 py-2 bg-primary m-0 text-light">
            Categories
        </h5>
        <?php
        
            if($categories->rowCount() > 0){
                foreach ($categories as $category) {

                    ?>

        <li class="nav-item list-unstyled"><a class="py-2 px-3 d-block text-decoration-none text-dark"
                href="index.php?=<?php echo $category['id'] ?>"><?php echo $category['title'] ?></a></li>

        <?php
                }
            }
        
        ?>
    </nav>


<!-- News Letter Form -->


    <form class="border rounded p-3 m-3" method="post">
        <h5 class="mb-4">Join our news Letter!</h5>
        <label for="name">Name:</label>
        <input id="name" name="name" class="mt-1 form-control w-100 border rounded" type="name">
        <br>
        <label for="email">Email:</label>
        <input id="email" name="email" class="mt-1 mb-2 form-control w-100 border rounded" type="email">
        <b id="form-failed" class="text-danger">Fiels can't be empty or name can't be jsut numbers!</b>
        <b id="form-successfull" class="text-success">Congratulation, You have been subscribed successfully</b>
        <button class="btn btn-primary mt-3 w-100 d-block w-25" name="subscribe">Send</button>
    </form>


<!-- Handling News Letter Form -->

<?php


    if (isset($_POST['subscribe'])) {
        if(trim($_POST['name'] != "" && !is_numeric($_POST['name']) && trim($_POST['email'] != ""))){

            $name = $_POST['name'];
            $email = $_POST['email'];

            $subscriber_query = "INSERT INTO subscribers (name, email) VALUES ('$name', '$email');";
            $subscriber_insert = $db->query($subscriber_query);

            ?>

<script>
document.getElementById('form-successfull').style.display = "block";
</script>

<?php

        }

        else{
            ?>

<script>
document.getElementById('form-failed').style.display = "block";
</script>

<?php
        }
    }

?>

<!-- About Section -->


    <div class="border rounded p-3 m-3 lh-lg">
        <h5>About Me</h5>
        <p class="">Welcome to my website, I'm Taha Zargar and you can see my full CV and personal website in this address: <a
                class="text-decoration-none" href="https://tahazargar.ir"><b>www.TahaZargar.ir</b></a></p>
    </div>
