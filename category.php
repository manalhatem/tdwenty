<?php require('include/header.php'); ?>
   <!-- start navbar-->
   <nav class="navbar navbar-expand-sm bg-dark navbar-light">
       <div class="container">
           <a href="index.php" class="navbar-brand">Tdwenaty</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="menu">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                    <a href=""class="nav-link">about us</a>
                   </li>
                   <li class="nav-item">
                    <a href=""class="nav-link">explanations</a>
                   </li>
                   <li class="nav-item">
                    <a href=""class="nav-link">varieties</a>
                   </li>
                   <li class="nav-item">
                    <a href=""class="nav-link">Connect with us</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>
   <!-- end navbar-->
   <!--start content-->
   <div class="content">
       <div class="container">
           <div class="row">
               <div class="col-md-9">
                <?php 
                $name=$_GET['categoryname'];
                $c= mysqli_query($con,"SELECT id FROM category where category_name='$name'");
                $r=mysqli_fetch_assoc($c);
                $id=$r['id'];
                $query="SELECT * FROM posts where postCat='$id' order by id desc";
                $res=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($res)){
                ?>
                <div class="post">
                    <div class="post-image">
                    <a href="post.php?id=<?php echo $row['id'];?>">
                        <img src="upload\postimages\<?php echo $row['postImage']; ?>" alt="image1"></a>
                    </div>
                    <div class="post-title">
                        <h4><a href="post.php?id=<?php echo $row['id'];?>"><?php  echo $row['postTitle']; ?></a></h4>
                    </div>
                    <div class="post-details" >
                        <p class="post-info">
                            <span><i class="fas fa-user"><?php echo $row['postAuthor']; ?></i></span>
                            <span><i class="far fa-calendar-alt"><?php echo $row['postDate']; ?></i></span>
                            <?php
                            $id=$row['postCat'];
                             $query2="SELECT category_name FROM category where id='$id'";
                             $res2=mysqli_query($con,$query2);
                             $name=mysqli_fetch_assoc($res2);

                             ?>
                            <span><i class="fas fa-tag"><?php echo $name['category_name']; ?></i></span>
                        </p>
                        <p class="postcontent"><?php echo $row['postContent']; ?> </p>
                        <a href="post.php?id=<?php echo $row['id'];?>"><button class="btn btn-style">Read more</button></a>
                    </div>
                  
                </div>

                <?php
                }
                ?>
                
                 
                 
                
               </div>
               <div class="col-md-3">
                <!-- Category-->
                <div class="categories">
                    <h4>Categories</h4>
                    
                    <ul>
                        <?php 
                      $q=mysqli_query($con,'SELECT * FROM category order by id desc');
                      while($r=mysqli_fetch_assoc($q)){
                      ?>
                        <li>
                            <a href="">
                                <span><i class="fas fa-tag"></i></span>
                                <span><?php echo $r['category_name']; ?></span>
                            </a>
                        </li>              

                    <?php
                    }

                    ?>
                 </ul>
                </div>
                    
                    
                <!--End categories-->
                <!--start latest post-->
                <div class="last-posts">
                    <h4>Latest Posts</h4>
                   
                    <ul>
                        <?php 
                         $query="SELECT * FROM posts order by id desc";
                         $res=mysqli_query($con,$query);
                         while($row=mysqli_fetch_assoc($res)){
                          ?>
                        <li>
                            <a href="post.php?id=<?php echo $row['id']; ?>">
                                <span class="span-img"><img src="upload\postimages\<?php echo $row['postImage']; ?>" alt="image1" style="width:80px;height:60px" ></span>
                                <span><?php  echo $row['postTitle']; ?></span>
                            </a>
                        </li>
                        <?php
                         }
                        ?>
                    </ul>
                    
                    
                </div>
                <!--end latest post-->
                   
               </div>
           </div>
       </div>
   </div>
   <!--End content-->
   <footer>
       <p>all rights are save</p>
   </footer>
<?php require('include/footer.php'); ?>