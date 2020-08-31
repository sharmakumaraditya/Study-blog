<?php
include('header.php');
include('post.php');
include('Tag.php')
?>
<?php
$post = new Post($db);
$tags = new Tag($db);
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <?php foreach($post->getPost() as $post) { ?>
            <div class="media">
                <div class="media-left media-top">
                    <img src="images/<?php echo $post['image']; ?>" class="media-object" style="width:200px; margin-right: 10px;"/>
                    <p>
                      Author:Admin<br>
          						Created:<?php echo date('Y-m-d',strtotime($post['created_at'])); ?>
                    </p>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="view.php?slug=<?php echo $post['slug'];?>"><?php echo $post['title']; ?></a></h4>
                  <?php echo htmlspecialchars_decode(substr($post['description'],0,100));?>                 </div>
            </div>

            <?php } ?>

            <div class="col-md-4">
            	<h4>Browse by Tags</h4>
            	<p>
            	<?php
            	foreach($tags->getAllTags() as $tag){?>
            		<a href="index.php?tag=<?php  echo $tag['tag'];?>"><button type="button" class="btn btn-outline-warning btn-sm">
            			<?php  echo $tag['tag'];?>
            		</button></a>

            	<?php  } ?>

            	</p>

        </div>
    </div>
</div>
</div>
</div>

<style type="text/css">
    body{
        text-align: justify;
    }
    img{
        margin-right: 10px;
    }
    .media{
        margin-top: 20px;
    }
</style>
