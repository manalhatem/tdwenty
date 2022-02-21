<?php require('include/header.php');
session_start();
if (isset($_SESSION['id'])){

 if (isset($_POST['add'])) {

     $name=$_POST['category'];

     $sql="INSERT INTO category(category_name) values('$name')";
     $query=mysqli_query($con,$sql);
   }

   if (isset($_GET['id'])) {
       $id=$_GET['id'];
       $q=mysqli_query($con,"DELETE FROM category WHERE id='$id'");
       if (isset ($q)) {
           echo "<div class='alert alert-success'>" . "Category Delete Successfuly." ."</div>";
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
                    <div class="add-category">
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="form-group">
                             <label for="category"> New Category</label>
                            <input type="text" name="category" class="form-control" max="100" required> <br>
                            </div>
                           
                            <input type="submit" name="add" value="Add" class="btn-custom">
                            
                        </form>
                        
                    </div>

                    <!-- Display Category-->
                    <div class="display-cat mt-5">
                        <table class="table table-borderd">
                            <tr class="btn-custom">
                                <th>SN</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                            $sn=1;
                            $res=mysqli_query($con,'SELECT * FROM category order by id desc');
                            while ($row=mysqli_fetch_assoc($res)) {

                             ?>
                              <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td> <?php echo $row['category_date']; ?></td>
                                <td><a class="btn btn-danger" href="categories.php?id=<?php echo $row['id'] ?>"> Delete</a></td>
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
    <?php 
}
else{
    echo "<div class= 'alert alert-danger'>" . "you can not access this page" . "</div>";
    header('location: login.php');
}

?>
<?php require('include/footer.php'); ?>