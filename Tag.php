<?php
include('db.php');
class Tag{
	private $db;
	public function __construct($db ){
		$this->db = $db;
	}

	public function getAllTags(){
		$sql = "SELECT * FROM tags";
		$result = mysqli_query($this->db,$sql);
		return $result;
	}

	public function getTags($slug){
		$data = [];
		//$sql = "SELECT * FROM tags";
		$sql = "SELECT  *
				FROM   posts
   				INNER JOIN post_tags
      			ON post_tags.post_id = posts.id
   				INNER JOIN tags
    			ON tags.id = post_tags.tag_id
   				WHERE tags.tag='$slug'";
   		$result = mysqli_query($this->db,$sql);
   		//return $result;
		//$result = mysqli_query($this->db,$sql);
		foreach($result as $res){
			array_push($data, $res['tag']);
		}
		return $data;
	}


}
