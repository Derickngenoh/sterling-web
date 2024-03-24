<?php
     include ('security.php');
     include_once("includes/config.php");

     if(isset($_POST['registerbtn']))
     {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmpassword'];
        $usertype = $_POST['usertype'];

        if($password === $cpassword)
        {
            $result = mysqli_query($conn, "INSERT INTO register(username,email,password,usertype) 
            VALUES('$username','$email','$password','$usertype')");

        if ($result)
        {
           
            $_SESSION['success'] ='Admin profile Added';
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] ='Admin profile  not Added';
            header('Location: register.php');
        }
        }
        else
        {
            $_SESSION['status'] = 'Password and Confirm password Does Not Match';
            header('Location: register.php');
        }
      
     }


     if(isset($_POST['updatebtn']))
     {
        $id = $_POST['edit_id'];
        $username = $_POST['edit_username'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];
        $usertypeupdate = $_POST['update_usertype'];

        $query = "UPDATE register SET username='$username',email='$email',password='$password',usertype='$usertypeupdate' WHERE id ='$id'";
        $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
                $_SESSION['success'] = "profile updated successfully";
                header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "profile is not updated successfully";
            header('Location: register.php');
             
        }
     }

     if(isset($_POST['delete_btn']))
     {
        $id = $_POST['delete_id'];

        $query = "DELETE  FROM register WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Your data is deleted";
            header('Location: register.php');
        }
        else {
            $_SESSION['status'] = "Your data is not deleted";
            header('Location: register.php');
        }
     }


     if(isset($_POST['about_save']))
     {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $description = $_POST['description'];
        $links = $_POST['links'];

        $query = "INSERT INTO aboutus (title,subtitle,description,links) VALUES ('$title','$subtitle','$description','$links')";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Aboutus added successfully";
            header('Location: about.php');  
        }
        else
        {
            $_SESSION['status'] = "Aboutus not added successfully";
            header('Location: about.php'); 
        }
     }



?>