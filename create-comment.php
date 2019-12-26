<?php require('dbcon.php'); ?>

<?php

//  if (isset($_POST['submit'])) {
//      $author = $_POST['name'];
//      $text = $_POST['comment'];
//      $id = $_POST['post-id'];
//      echo $author;
//      echo $text;
//      echo $id;
     
    // Attempt insert query execution

    
        // if (isset($_POST['name']) && ($_POST['comment'] && ($_POST['post-id']))){
        //     echo "radi";
        //     var_dump($_POST['name']);
        //     var_dump($_POST['comment']);
        //     var_dump($_POST['post-id']);
    
        // $stmt =  $connection->prepare("INSERT INTO comments (author, text, post_id) VALUES (?, ?, ?)");
        
        
        // $stmt->bind_param("ssi", $_POST['name'], $_POST['comment'], $_POST['post-id']);
        
        // $stmt->execute();
        // echo "Records inserted successfully.";    
        // echo($_POST['comment']);
    

        // } 
    





try{
    // Create prepared statement
    $sql = "INSERT INTO comments (author, text, post_id, created_at) VALUES (:author, :text, :post_id, :created_at)";
echo "pre prepare";
    $stmt = $connection->prepare($sql);
    echo "posle prepare";
    // Bind parameters to statement
    $stmt->bindParam(':author', $_POST['name']);
    $stmt->bindParam(':text', $_POST['comment']);
    $stmt->bindParam(':post_id', $_POST['post-id']);
    $stmt->bindParam(':created_at', date('Y-m-d H:i:s'));
    
    // $stmt->debugDumpParams();
    
    // Execute the prepared statement
    $stmt->execute();

    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
header('Location: single-post.php?posts_id=' . $_POST['post-id']);

// Close connection
    unset($pdo);

    echo "submit je setovan";

//  } 
//  else {

//    echo "ne radi";   
//     // header('Location: home.php');
//  };


?>





<!DOCTYPE html>

<head>
<title> create-comment</title>
</head>
<body>
<p>ja sam create-comment.php</p>




</body>
</html>