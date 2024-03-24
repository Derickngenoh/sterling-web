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
        <h1 class="modal-title fs-5" id="exampleModalLabel">About us </h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hiddden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form class="login100-form validate-form " action="code.php" method="POST" autocomplete='off'>
        <div class="modal-body">  
        
                 <div class="form-group">
                  <label>Title</label>
                    <input type="text" class="form-control"  name="title"  placeholder="Enter Title" >
                  </div>
                
                   <div class="form-group">
                   <label>Sub Title</label>
                     <input type="text" class="form-control"  name="subtitle"  placeholder="Enter Sub Title" >
                   </div>
                   <div class="form-group">
                   <label >Description</label>
                     <input type="text" class="form-control" name="description"  placeholder="Enter Description">
                   </div>
                   
                   <div class="form-group">
                   <label >Links</label>
                     <input type="text" class="form-control"  name="links"  placeholder="Enter Links" >
                   </div>

                   <input type="hidden" name="usertype" value="admin">
                   </div>
                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="about_save" class="btn btn-primary">Save</button>
                    </div>
             
                 </form>

      </div>
      
    </div>
  </div>
</div>
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">About Us
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                        Add 
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

          $query= 'SELECT * FROM aboutus';
          $query_run = mysqli_query($conn , $query);
        ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>title</th>
                        <th>subtitle</th>
                        <th>description</th>
                        <th>links</th>
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
                <td> <?php echo $row['title'];?></td>
                <td><?php echo $row['subtitle']; ?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['links'];?></td>

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
