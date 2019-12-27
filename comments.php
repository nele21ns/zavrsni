<?php require('dbcon.php'); ?>


<?php

if (isset($_POST['comment-id'])) {
 echo "comment id je setovan!";
try{
    // Create prepared statement
    $sql = "DELETE FROM comments WHERE id= :id;";
    echo "pre prepare za delete";
    $stmt = $connection->prepare($sql);
    echo "posle prepare za delete";
    // Bind parameters to statement
    $stmt->bindParam(':id', $_POST['comment-id']);
   
    
    // $stmt->debugDumpParams();
    
    // Execute the prepared statement
    $stmt->execute();

    echo "Records DELETE inserted successfully.";
    header('Location: single-post.php?posts_id=' . $_POST['post-id']);
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
}
   ?> 
 
        <?php 

            if (isset($_REQUEST['posts_id'])) {

                            // pripremamo upit za komentare
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
                    ?>
                
    <ul class="comments-ul">
    <?php foreach ($comments as $comment) { ?>
        


        <li class= "comments-li">
            <?php echo $comment['text'];?> <br>
            
                <i>commented by:</i> <strong><?php echo $comment['author'];?></strong> <br>
                
                <!-- DELETE COMMENTS BUTTON -->
                <form method="post" action="">
                <input type="hidden" name="comment-id" value="<?php echo($comment['id'])?>">
                <input type="hidden" name="post-id" value="<?php echo($_REQUEST['posts_id'])?>">
                <button type="submit" class="btn-default">Delete this comment</button></form>
                <hr class="comment-ruller">
        </li>  
     <?php }?>
     </ul> 
     <?php

                } else {?>
                    
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

<?php include('header.php') ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

        <div class= "blog-post-title"> <a href='home.php'><h2>Sorry... but no comments at the moment CLICK HERE TO RETURN AT HOME PAGE!!<h2></a> </div>

        

    </div><!-- /.row -->
    <?php include('sidebar.php') ?>
</main><!-- /.container -->

    <?php include('footer.php'); ?>
    
</body>
</html>

                <?php }
?>
                
