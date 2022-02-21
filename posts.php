<?php require('include/header.php');
if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $sq=mysqli_query($con,"DELETE FROM posts WHERE id='$id'");
    if (isset ($sq)) {
           echo "<div class='alert alert-success'>" . "Post Delete Successfuly." ."</div>";
       }
       else{
        echo "<div class='alert alert-danger'>" . "Something Wrong." ."</div>";
       }
}
?>

<div class="contant">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="side-area">
                    <h4>Dashboard</h4>
                    <ul >
                        <li>
                            <a href="categories.php">
                                <span><i class="fas fa-tags"></i></span>
                                <span>Categories</span>
                            </a>
                        </li>
                         <li >
                            <a href="#">
                                <span><i class="fas fa-newspaper"></i></span>
                                <span>Articles</span>
                            </a>
                            <ul>
                            <li>
                                <a href="new_post.php">
                                    <span><i class="fas fa-edit"> </i></span>
                                    <span>New Article</span>
                                </a>
                            </li>
                            <li>
                                <a href="posts.php">
                                    <span><i class="fas fa-border-all"> </i></span>
                                    <span>All Articles</span>
                                </a>
                            </li>
                        </ul>
                        </li>
                        
                         <li>
                            <a href="index.php" target="_blank">
                                <span><i class="fas fa-window-restore"></i></span>
                                <span>View site</span>
                            </a>
                        </li>
                         <li>
                            <a href="logout.php">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                <span>Log_out</span>
                            </a>
                        </li>
                    </ul>
                    
                </div>
                <div class="col-md-10" id="main-area">
                	<!-- Dispalay Posts -->
                	
                	<div class="display-posts mt-4">
                		<table class="table table-borderd">
                            <h3 style="margin-top: 5px; color: #5b4834;">All articles </h3>
                		<tr  class="btn-custom">
                			<th>SN</th>
                			<th>PostTitle</th>
                			<th>PostAuthor</th>
                			<th>PostImage</th>
                			<th>PostDate</th>
                			<th>Action</th>
                			
                		</tr>
                		<?php
                	     $q="SELECT * FROM posts order by id desc";
                    	$res=mysqli_query($con,$q);
                    	$sn=1;
                    	while($row=mysqli_fetch_assoc($res)){
                    	?>
                		<tr>
                			<td><?php echo $sn++;?></td>
                			<td><?php echo $row['postTitle']; ?></td>
                			<td><?php echo $row['postAuthor']; ?></td>
                			<td><img src="upload\postimages\<?php echo $row['postImage']; ?>" width="70px" height="50px" ></td>
                			<td><?php echo $row['postDate']; ?></td>
                			<td><a class="btn btn-danger" href="posts.php?id=<?php echo $row['id']; ?>"> Delete</a></td>
                		
                		</tr>
                		<?php	
                	}
                	?>
                	</table>
                	</div>
                	
                </div>
            </div>
        </div>
    </div>



<?php require('include/footer.php'); ?>