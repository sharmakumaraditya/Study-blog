<?php
  include('session.php');
 ?>
<?php
    include('header.php');
?>
<?php
    include('post.php');
?>
<?php
    include('image_upload_function.php');
?>
<?php
  include('Tag.php');
 ?>
 <?php
     $tags = new Tag($db);
     $post = new Post($db);
     ?>
<?php
    if(isset($_POST['btnSubmit'])){

       	$data = date('Y-m-d');

    	if(!empty($_POST['title'])&&!empty($_POST['description'])){
    		$title = strip_tags($_POST['title']);
    		$description = $_POST['description'];
        $slug = createSlug($title);
    		$record = $post->addPost($title,$description,uploadImage(),$data,$slug);
    		if($record==True){
    			echo"<div class='text-center alert alert-success'>Post added Successfully!</div>";
    		}
    	}else{
    		echo"<div class='text-center alert alert-danger'>Every field is required</div>";
    	}
    }
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form action="add.php" method="POST" enctype="multipart/form-data">
			<div class="card">
				<div class="card-header">Add post</div>
				<div class="card-body">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<textarea cols="10" id="editor" name="description" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" name="image" class="form-control">
					</div>
          <div class="form-group form-check-inline">
            <label for="image"><b>Choose tags</b>&nbsp;&nbsp;</label>
            <?php  foreach($tags->getAllTags() as $tag){ ?>
              <input type="checkbox" name="tags[]" class="form-check-input" value="<?php echo $tag['id'] ?>"><?php echo $tag['tag']; ?>
            <?php } ?>
          </div>

					<div class="form-group">
						<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</form>

		</div>
	</div>

</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</script>
