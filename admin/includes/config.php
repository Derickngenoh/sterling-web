<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename="Motors";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$databasename);

// Check connection
if ($conn) {
   // echo "Connected successfully";
}
else
{
  echo '
        <div class="container">
            <div class ="row">
              <div class="col-md-6 mr-auto ml-auto text-center py-5 mt-5">
                <div clas="card">
                    <div class="card-body">
                      <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                        <h2 class="card-title"> Database Failure </h2>
                          <p class="card-text"> Please Check Your Database Connection.</p>
                          <a href="#" class="btn btn-primary"> :( </a>
                    </div>
                  </div>
              </div>
            </div>
        </div>

        ';
  }


?>