<?php require('dbcon.php'); ?>

<?php
// Checking if everything is submited
 if (isset($_POST['post-title']) && isset($_POST['post-body']) && isset($_POST['post-author'])) {

     //VALIDATION for CREATE POST
     if (!empty($_POST['post-title']) && !empty($_POST['post-body']) && !empty($_POST['post-author'])) {
         $date = date('Y-m-d H:i:s');
try{
    // Create prepared statement
    $sql = "INSERT INTO posts (author, title, body, created_at) VALUES (:author, :title, :body, :created_at)";

    $stmt = $connection->prepare($sql);
 
    // Bind parameters to statement
    $stmt->bindParam(':author', $_POST['post-author']);
    $stmt->bindParam(':title', $_POST['post-title']);
    $stmt->bindParam(':body', $_POST['post-body']);
    $stmt->bindParam(':created_at', $date);
    
    // Execute the prepared statement
    $stmt->execute();

} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    } //Returning on home.php if everything is fine

        header('Location: home.php?');
    }
    else { // Returning false if validation is not sucesfull
            
        header('Location: create.php?'  . '&is_valid=false');
    }}

?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Create post</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href= "styles/styles.css" rel="stylesheet">
</head>


<?php
    include('header.php');
    ?>

<body>

        <main role="main" class="container">

            <div class="row">  

                <div class="col-sm-8 blog-main">

                        <div class="blog-post">

                        
                            <form method='POST' action=""> <!-- Form for CREATING posts -->

                                <p>
                                <label>Your name:
                                <input type="text" name="post-author">
                                </label> 
                                </p>

                                <p>
                                <label>Title of post:
                                <input type="text" name="post-title">
                                </label> 
                                </p>

                                <p>
                                <label>Your Post: </label>
                                <textarea name="post-body" rows=”10”></textarea>
                                </label>
                                </p>

                                <?php if ( isset($_GET['is_valid'])) {
                                    if (($_GET['is_valid']) === "false") { ?>
                                <div class="alert-danger"><p> Warning: Please fill all fields!<p></div>
                                <?php }}?>

                                <p>
                                <input type="submit" name="submit" value = "Create Post">
                                </p>
                        </form>

                        </div> <!-- blog-post -->
                </div> <!-- blog-main -->
                            <?php include('sidebar.php');?>
            </div> <!-- row -->   
            
        </main>
    <?php include('footer.php');
    ?>

</body>
</html>