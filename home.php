<?php require('dbcon.php'); ?>

<!doctype html>
    <html lang="en">
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="../../../../favicon.ico">

            <title>Vivify Blog</title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

            <!-- Custom styles for this template -->
            <link href="styles/blog.css" rel="stylesheet">
            <link href= "styles/styles.css" rel="stylesheet">
        </head>

        
    <?php

                // pripremamo upit
                $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC";
                $statement = $connection->prepare($sql);
                
                // izvrsavamo upit
                var_dump($statement->execute());
                
                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita
                $posts = $statement->fetchAll();

                // koristimo var_dump kada god treba da proverite sadrzaj neke promenjive
                    // echo '<pre>';
                    // var_dump($posts);
                    // echo '</pre>';
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
                
                        <div class="blog-post">
                                <h2 class="blog-post-title"><a target="_blank" href="single-post.php?posts_id=<?php echo ($post['id']) ?>"><?php echo $post['title']?> <a></h2>
                                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>
                                <p><?php echo $post['body']?></p>

                                </div>
                            <?php
                                }
                                ?>

                </div><!-- /.blog-post -->

                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                    </nav>

            </div><!-- /.blog-main -->


            <?php include('sidebar.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

        <?php include('footer.php'); ?>
    
</body>
</html>