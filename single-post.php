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
    <link href="styles/blog.css" type="text/css" rel="stylesheet">
    <link href= "styles/styles.css" type="text/css" rel="stylesheet">
</head>

<body>

<?php include('header.php'); 
    ?>
            
            <?php
                if (isset($_GET['posts_id'])) {

                    // pripremamo upit za postove
                    $sql = "SELECT * from posts WHERE posts.id= {$_GET['posts_id']}";
                    $statement = $connection->prepare($sql);

                    // izvrsavamo upit
                    $statement->execute();

                    // zelimo da se rezultat vrati kao asocijativni niz.
                    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    // punimo promenjivu sa rezultatom upita
                    $singlePost = $statement->fetch();

                    // koristimo var_dump kada god treba da proverite sadrzaj neke promenjive
                        // echo '<pre>';
                        // var_dump($singlePost);
                        // echo '</pre>';                    
            ?>

<main role="main" class="container">

    <div class="row">                    

        <div class="blog-post" >
                        <h2 class="blog-post-title"><?php echo $singlePost['title']?></h2>
                        <p class="blog-post-meta"><?php echo $singlePost['created_at']?> by <a href="#"><?php echo $singlePost['author']?></a></p>

                        <p><b><?php echo $singlePost['body']?></b></p>
                        <br>
                        <p>Komentari:</p>

                        <form method='POST' action='create-comment.php'>

                            <p>
                            <label>Name:
                            <input type="text" name="name">
                            </label> 
                            </p>

                            <p>
                            <input type="hidden" value="<?php echo(($_GET['posts_id']))?>" name="post-id">
                            </p>

                            <p>
                            <label>Comment: </label>
                            <textarea id=”comment-id” name="comment" rows=”5”></textarea>
                            </label>
                            </p>

                            <p>
                            <input type="submit" name = "submit" value = "Dodaj komentar">
                            </p>
                        </form>
                    

                        <br>
                        <br>
                    <button style= "display:block" class= "btn" onclick="myFunction()"> Hide Comments</button>
                    <br>
                            <div class="single-comment" >
                            <?php include('comments.php'); ?>
                             </div> <!-- single-comment -->
            </div> <!-- blog-post -->

                <?php include('sidebar.php'); ?>

    </div> <!-- row -->

</main>    

<?php
                } else {?>

<main role="main" class="container">

    <div class="row" style="border red solid 2px">

        <div class="col-sm-8 blog-main" style="border blue solid 2px">

            <div class="blog-post">

                   <div class= "blog-post-title"><a href='home.php'><?php echo('post_id nije prosledjen kroz $_GET');?><a>

                   </div> <!-- title -->
            </div> <!-- blog-post -->  
        </div> <!-- blog-main -->            
                    <?php include ('sidebar.php');
                        }
                    ?>
    </div> <!-- row -->
</main>
<?php include ('footer.php');?>

</body>
    <script type="text/javascript" src="main.js"></script>
</html>