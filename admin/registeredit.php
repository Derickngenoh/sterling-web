<?php 
include('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> EDIT ADMIN PROFILE
                </h6>
            </div>
            
    <div class="card-body">
        <?php
        include_once('includes/config.php');
         if(isset($_POST['edit_btn']))
         {
    
            $id = $_POST['edit_id'];
            
            $query = "SELECT * FROM register WHERE id='$id'";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                     ?>
                    
<form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

        <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control"  name="edit_username" value="<?php echo $row['username'] ?>" required="required" placeholder="Enter Username" >
        </div>
                    
        <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control "  name="edit_email" value="<?php  echo $row['email'] ?>" required="required" placeholder="Enter Email" >
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control " name="edit_password" value="<?php   echo $row['password']?>" required="required" placeholder="Enter password">
        </div>
        <div class="form-group">
        <label>Usertype</label>
        <select name="update_usertype" class="form-control">
                <option value="admin"> Admin</option>
                <option value="user"> User</option>
        </select>
        </div>
        
        <a href="register.php" class="btn btn-danger ">CANCEL</a>
        <button type="submit" name="updatebtn" class="btn btn-primary ">UPDATE</button>
</form>
    
    <?php   
            }
         }
        ?>
                
</div>
</div>
</div>


<?php 
include ('includes/scripts.php');
include ('includes/footer.php');
?>