<?php 
include('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="addadminprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin Data</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hiddden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form class="login100-form validate-form " action="code.php" method="POST" autocomplete='off'>
        <div class="modal-body">  
        
                 <div class="form-group">
                  <label>Username</label>
                    <input type="text" class="form-control"  name="username" required="required" placeholder="Enter Username" >
                  </div>
                
                   <div class="form-group">
                   <label>Email</label>
                     <input type="email" class="form-control"  name="email"  required="required" placeholder="Enter Email" >
                   </div>
                   <div class="form-group">
                   <label >Password</label>
                     <input type="password" class="form-control" name="password" required="required" placeholder="Enter password">
                   </div>
                   
                   <div class="form-group">
                   <label >Confirm Password</label>
                     <input type="password" class="form-control"  name="confirmpassword" required="required" placeholder="Enter password" >
                   </div>

                   <input type="hidden" name="usertype" value="admin">
                   </div>
                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                    </div>
             
                 </form>

      </div>
      
    </div>
  </div>
</div>

<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                        Add Admin Profile
                    </button>
                </h6>
            </div>
            
    <div class="card-body">
      <?php
        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
          echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
          unset ($_SESSION['success']);
        }

        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
          echo '<h2 class="bg-danger"> '.$_SESSION['status'].' </h2>';
          unset ($_SESSION['status']);
        }
      ?>
        <div class="table-responsive">

        <?php
          include_once("includes/config.php");

          $query= 'SELECT * FROM register';
          $query_run = mysqli_query($conn , $query);
        ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Usertype</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                        </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0)
            {
                  while($row = mysqli_fetch_assoc($query_run))
                  {
                     ?>

                <tr>
                <td><?php echo $row['id']; ?></td>
                <td> <?php echo $row['username'];?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password'];?></td>
                <td><?php echo $row['usertype'];?></td>

                <td>
                  <form action="registeredit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                  <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                  </form>
                </td>

                <td>
                  <form action="code.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                  <button  type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                  </form>
                </td>
                </tr>
                <?php
                  }
            }
            else{
              echo 'No record found';
            }
            ?>
            </tbody>
            </table>
        </div>
</div>
    </div>

</div>

<?php 
include ('includes/scripts.php');
include ('includes/footer.php');
?>