<?php

require_once 'AbstractModel.php';
include_once 'Database.php';


class CommentModel extends AbstractModel{


    function getCommentsByPostId($id)
    {
        $sql='SELECT Nickname, CreatedAt, Content, Love
            FROM Comment
            WHERE PostId = ?
            ORDER BY CreatedAt DESC'; //SELECT FROM WHERE sont des clauses // il y a aussi INNER JOIN Category , ON Post.CategoryId=Category.Id 

        // $query = $pdo -> prepare($sql); 
        // $query -> execute([$Id]);
        // $post = $query -> Fetch(PDO::FETCH_ASSOC);//FETCH_ASSOC retire les lignes doubles
        // var_dump($post);
           
           

            return $this ->db -> queryAll($sql, [$id]);
    }

    function addComment($nickname, $content, $postId, $love)
    {
        // sert à afficher les commentaires, la requete se lance au chargement de la page
            $sql='INSERT INTO Comment (Nickname, Content, PostId, Love)
                    VALUES (?,?,?,?)';

        // $query = $pdo -> prepare($sql);
        // $query -> execute([$Id]);
        // $comments= $query -> FetchAll();
        // var_dump($comments);

           $this ->db ->queryAction($sql, [$nickname, $content, $postId, $love]);
 
    }

}


