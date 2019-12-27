<?php require('dbcon.php'); ?>


<?php
if (isset($_POST['delete-post-id'])) {
    echo "delete - post  id je setovan!";
    
    echo "posle post delete post id";
   try{
       // Create prepared statement
       $sql = "DELETE FROM posts WHERE id = :id;";
       echo "pre prepare za delete";
       $stmt = $connection->prepare($sql);
       echo "posle prepare za delete";
       // Bind parameters to statement
       $stmt->bindParam(':id', $_POST['delete-post-id']);
      
       
       // $stmt->debugDumpParams();
       
       // Execute the prepared statement
       $stmt->execute();
   
       echo "Records DELETE inserted successfully.";
       header('Location: home.php');
    echo "udjem u try";
    echo($_POST['delete-post-id']);
   } catch(PDOException $e){
       die("ERROR: Could not able to execute $sql. " . $e->getMessage());
   }
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

    <title>Single Post</title>

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

                    // Create prepared statement
                    $sql = "SELECT * from posts WHERE posts.id= {$_GET['posts_id']}";
                    $statement = $connection->prepare($sql);

                    // Execute the prepared statement
                    $statement->execute();

                    // If we want to get associative array
                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    // Filling up variable with results of query
                    $singlePost = $statement->fetch();                  
            ?>

<main role="main" class="container">

    <div class="row">                    

        <div class="blog-post" >

                        <!-- Single post -->
                        <h2 class="blog-post-title"><?php echo $singlePost['title']?></h2>
                        <p class="blog-post-meta"><?php echo $singlePost['created_at']?> by <a href="#"><?php echo $singlePost['author']?></a></p>

                        <p><b><?php echo $singlePost['body']?></b></p>
                       
                       <!-- Delete POST button -->
                       <form method="POST" action="" name = "delete-post-form">
                        <input type="hidden" value="<?php echo($_GET['posts_id'])?>" name="delete-post-id">
                        <p><button id= "delete-post-button" onclick="return ConfirmDelete()" type="submit" class="btn-primary">Delete this post</button><p>
                        </form>
                        <br>
                        
                        <!-- Create COMMENT form -->
                        <p><form method='POST' action='create-comment.php'>

                            <p><label>Name: <input type="text" name="name"></label></p>

                            <p><input type="hidden" value="<?php echo(($_GET['posts_id']))?>" name="post-id"></p>

                            <p><label>Comment: <textarea id=”comment-id” name="comment" rows=”5”></textarea></label></p>

                            <!-- Alert if form isn't filled up correctly -->
                            <?php if ( isset($_GET['is_valid'])) {
                                if (($_GET['is_valid']) === "false") { ?>
                            <div class="alert-danger"><p> Warning: Please fill all fields<p></div>
                            <?php }}?>

                            <p> <input type="submit" name = "submit" value = "Add comment"></p>
                        </form><p>        
                        
                        <p>All Comments:</p>
                        <br>
                    <p><button class= "btn" id="hide-comments-button" onclick="myFunction()"> Hide Comments</button><p>
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