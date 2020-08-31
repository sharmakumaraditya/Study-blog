<?php
include('session.php');
include('header.php'); ?>
<?php
include('post.php');
$post = new Post($db);

?>

<div class="container">
	<h2>All Posts</h2>


	<?php
		if(!empty($_SESSION['username'])){
			echo "Hello, {$_SESSION['username']}";
		}else{
			echo"You're not logged in!";
		}
	?>

	</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Created at</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($post->getPost() as $post){ ?>
			<tr>
				<td><?php echo $post['title']; ?></td>
				<td><?php echo $post['description'] ?></td>
				<td><?php echo date('Y-m-d',strtotime($post['created_at'])); ?></td>
				<td>
					<a href="view.php?slug=<?php echo $post['slug'];?>"><button type="submit" class="btn btn-outline-success btn-sm">View</button></a>
					<a href="edit.php?slug=<?php echo $post['slug'];?>"><button type="submit" class="btn btn-outline-primary btn-sm">Edit</button></a>
					<a href="delete.php?slug=<?php echo $post['slug'];?>"><button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></a>
				</td>
			<?php }?>
			</tr>
		</tbody>
	</table>
</div>
