<?php
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>

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

<body>

<?php include('header.php'); ?>
<div><?php
                if (isset($_GET['posts_id'])) {

                    // pripremamo upit
                    $sql = "SELECT * from posts WHERE posts.id= {$_GET['posts_id']}";
                    $statement = $connection->prepare($sql);

                    // izvrsavamo upit
                    $statement->execute();

                    // zelimo da se rezultat vrati kao asocijativni niz.
                    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    // punimo promenjivu sa rezultatom upita
                    $post = $statement->fetch();

                    // koristimo var_dump kada god treba da proverite sadrzaj neke promenjive
                        // echo '<pre>';
                        // var_dump($post);
                        // echo '</pre>';                    

            ?>

<?php
                            
                            
                            // pripremamo upit
                            $sql = "SELECT * from comments where post_id = {$_GET['posts_id']} order by created_at DESC";
                            $statement = $connection->prepare($sql);

                            // izvrsavamo upit
                            $statement->execute();

                            // zelimo da se rezultat vrati kao asocijativni niz.
                            // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                            $statement->setFetchMode(PDO::FETCH_ASSOC);

                            // punimo promenjivu sa rezultatom upita
                            $comments = $statement->fetchAll();

                            // koristimo var_dump kada god treba da proverite sadrzaj neke promenjive
                                // echo '<pre>';
                                // var_dump($comments);
                                // echo '</pre>';

                    ?></div>
<?php include('sidebar.php'); ?>

<div class="blog-post">
                <h2 class="blog-post-title"><?php echo $post['title']?></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>

                <p><?php echo $post['body']?></p>
                
            </div>

            
                            <div class="single-comment">
                            <?php foreach ($comments as $comment) { ?>
                            <ul type = "none">
                                <li>
                                    <?php echo $comment['text'];?> <br>  
                                        <i>posted by:</i> <strong><?php echo $comment['author'];?><hr class="comment-ruller"></strong>
                                </li>  
                            </ul> 
                            
                             <?php }?>
                             </div>


















<?php
                } else {
                    echo('post_id nije prosledjen kroz $_GET');
                }
            ?>

<?php include ('footer.php'); ?>
</body>
</html>