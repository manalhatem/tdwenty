<?php require ('include/header.php');
if (isset($_POST['sub'])) {
     $title=$_POST['title'];
     $cat=$_POST['category'];
     $cont=$_POST['content'];
     $author="noor";
     // img 4 --name ,tmp name ,size,type
      $img_name=$_FILES['postImage']['name'];
      $img_tmp=$_FILES['postImage']['tmp_name'];
     //$img_tmp=$_FILES['postImage']['size'];
     //$img_tmp=$_FILES['postImage']['type'];
      $postimage=rand(0,1000).'_'.$img_name;
      move_uploaded_file($img_tmp, "upload\postimages\\".$postimage);
     $query="INSERT INTO posts(postTitle,postCat,postImage,postContent,postAuthor) 
        values ('$title','$cat','$postimage','$cont','$author')";
           $re= mysqli_query($con,$query);

           if (isset($re)) {
               echo "<div class='alert alert-success'>". "Added Post Successfully" . "</div>";
           }
           else{
            echo "<div class='alert alert-danger'>". "Something went wrong" . "</div>";
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
                <h3 style="margin-top: 5px; color: #5b4834;"> Add New Article</h3>
                    <div class="add-category">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                             <label for="title"> title</label>
                            <input type="text" name="title" class="form-control" required> <br>
                            </div>
                            <div class="form-group">
                             <label for="category"> Category</label>
                           <select name="category" id="cate" class="form-control">
                            <?php 
                            $query=mysqli_query($con,"SELECT * FROM category");
                            while($r=mysqli_fetch_assoc($query)){
                                echo "<option value=" .$r['id'] . ">" . $r['category_name'] . "</option>";
                            }
                            ?>
                              
                           </select>
                            </div>
                            <div class="form-group">
                             <label for="img"> Image</label>
                            <input type="file" name="postImage" class="form-control" >
                            </div>
                            <div class="form-group">
                             <label for="content"> Content</label>
                             <textarea name="content" rows="10" cols="30" class="form-control" required></textarea>
                            
                            </div>
                           <input type="submit" name="sub" value="Post article" class="btn-custom"> 
                        
                                
                        </form>
                        
                    </div>
                    
                </div>
 <?php require('include/footer.php'); ?>
