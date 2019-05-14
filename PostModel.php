<?php


require_once 'AbstractModel.php';
include_once 'Database.php';


class PostModel extends AbstractModel{


	function getAllPosts()
	{    
	    // $pdo=getPDOConnection();
	    $sql='SELECT Post.Id,Title,Content,CreatedAt,Image,CategoryId,Name FROM Post INNER JOIN Category ON Post.CategoryId=Category.Id';

	    // $query = $pdo -> prepare($sql);
	    // $query -> execute();
		$database = new Database();
		$posts =$database-> queryAll($sql);
	    return $posts;
	}


	function getOnePost($id)
	{
	    // $pdo=getPDOConnection();
	    $sql='SELECT Id,Title,Content,CreatedAt,Image FROM Post WHERE Id=?';

	    // $query = $pdo -> prepare($sql); 
	    // $query -> execute([$PostId]);
	    $database=new Database;
	    $post= $database->queryOne($sql, [$id]);
	    return $post;
	}

}