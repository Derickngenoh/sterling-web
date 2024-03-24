<link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
<?php 
include('admin/security.php');
include ('admin/includes/header.php');

?>
<div class="container py-5"><a href="index.php"><h1>ABOUT US </h1></a>
    <div class="row py-3">

        <div class="col-md-8"> 

                <div class="card">
                    <img src="img/wheel.jpg" class="card-img-top" alt="...">
                
                        <div class="card-body">
                            <?php
                            include('admin/includes/config.php');
                            
                            $query= "SELECT * FROM aboutus";
                            $query_run =mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                
                            foreach($query_run as $row)
                            {
                                ?>
                            <h5 class="card-title"><?php echo $row['title']; ?> </h5>
                            <h6> <?php echo  $row['subtitle']; ?> </h6>
                            <p class="card-text"><?php echo  $row['description']; ?></p>
                            <a href="#" class="btn btn-primary"><?php  echo $row['links']; ?></a>
                            <?php
                            }

                            }
                            else
                            {
                                echo "No Record Found";
                            }
                            ?>

                        </div>
                </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                    <div class="card-body">
                    <h5 class="card-title"> Notice</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates sit magni harum ex est esse sequi voluptatum distinctio quidem, aliquam, cumque itaque. Officia, debitis. Iusto aperiam asperiores facilis est mollitia!</p>
                    <a href="#" class="btn btn-primary">Go Somewhere</a>

                    </div>
            </div>
            <hr>
            <div class="card">
                    <div class="card-body">
                    <h5 class="card-title"> Notice</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates sit magni harum ex est esse sequi voluptatum distinctio quidem, aliquam, cumque itaque. Officia, debitis. Iusto aperiam asperiores facilis est mollitia!</p>
                    <a href="#" class="btn btn-primary">Go Somewhere</a>

                    </div>
            </div>

        </div>


    </div>
  </div>

<?php 
include ('admin/includes/scripts.php');

?>