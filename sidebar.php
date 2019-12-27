<?php require('dbcon.php'); ?>

<?php

                // Create prepared statement
                $sql = "SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 5";
                $statement = $connection->prepare($sql);

                // Execute the prepared statement
                $statement->execute();

                // If we want to get associative array
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // Filling up variable with results of query
                $singlePostsTitles = $statement->fetchAll();

            ?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <!-- Getting last 5 posts -->
                <h4>Latest posts</h4>
                <?php foreach ($singlePostsTitles as $singlePostTitle) {?>
                <p><a href="single-post.php?posts_id=<?php echo($singlePostTitle['id']) ?>"><?php echo($singlePostTitle['title']) ?></a></p>
                <?php }?>
            </div>
            
            
        </aside> <!-- blog-sidebar-->