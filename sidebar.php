<?php require('dbcon.php'); ?>

<?php

                // pripremamo upit
                $sql = "SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 5";
                $statement = $connection->prepare($sql);

                // izvrsavamo upit
                $statement->execute();

                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita
                $singlePostsTitles = $statement->fetchAll();

                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    // echo '<pre>';
                    // var_dump($singlePostsTitles);
                    // echo '</pre>';

            ?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4>
                <?php foreach ($singlePostsTitles as $singlePostTitle) {?>
                <p><a href="single-post.php?posts_id=<?php echo($singlePostTitle['id']) ?>"><?php echo($singlePostTitle['title']) ?></a></p>
                <?php }?>
            </div>
            
            
        </aside> <!-- blog-sidebar-->