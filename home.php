<?php require('dbcon.php'); ?>

<!doctype html>
    <html lang="en">
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="../../../../favicon.ico">

            <title>Home</title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

            <!-- Custom styles for this template -->
            <link href="styles/blog.css" rel="stylesheet">
            <link href= "styles/styles.css" rel="stylesheet">
        </head>

        
        <?php

                // Create prepared statement
                $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC";
                $statement = $connection->prepare($sql);
                
                // Execute the prepared statement
                $statement->execute();
                
                // If we want to get associative array
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // Filling up variable with results of query
                $posts = $statement->fetchAll();
        ?>

        <body>

            <?php include('header.php') ?>

            <main role="main" class="container">

                <div class="row">

                    <div class="col-sm-8 blog-main">

                        <div class="blog-post">
                                
                                <?php
                                foreach ($posts as $post) {
                                ?>
                                <!-- All posts -->
                                <div class="blog-home" >
                                        <h2 class="blog-post-title"><a target="_blank" href="single-post.php?posts_id=<?php echo ($post['id']) ?>"><?php echo $post['title']?> <a></h2>
                                        <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>
                                        <p><?php echo $post['body']?></p>

                                </div>
                                    <?php
                                        }
                                        ?>

                        </div><!-- /.blog-post -->

                    </div><!-- /.blog-main -->


                    <?php include('sidebar.php') ?>

                </div><!-- /.row -->

            </main><!-- /.container -->

                <?php include('footer.php'); ?>
            
        </body>
</html>