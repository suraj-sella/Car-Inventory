<!doctype html>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-animations.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

    <title>Manage Inventory | Car Inventory Application</title>
    <link rel="shortcut icon" href="../img/car.png">
  </head>
  
  <body>
  	
  	<div class="container-fluid">
      <div class="row">
          <div class="col-xs-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
            <div class="preloader-wrapper">
                <div class="preloader"></div>
            </div>
          </div>
      </div>
      <div class="row page-header-row hidden feedbackkk mt-5">
        <div class="col-xs-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 page-header success-div">
          <p class="text-center"><i class="fas fa-check faa-tada animated"></i>Inventory Updated Successfully!</p>
        </div>
      </div>
      <div class="row page-header-row">
        <div class="col-xs-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 page-header">
        </div>
      </div>
  		<div class="row">
  			<div class="col-xs-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 form-div">
          <p class="h4 text-center mb-4 card-head faa-parent animated-hover"><i class="fas fa-store-alt faa-shake"></i>Inventory</p>
          <div class="table-responsive">
            <table class="table table-condensed table-hover text-center">
              <thead class="thead thead-dark mythead">
                <tr>
                  <th>Serial Number</th>
                  <th>Manufacturer Name</th>
                  <th>Model Name</th>
                  <th>Count</th>
                  <th>Added Button</th>
                  <th>Sold Button</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $servername = "localhost";
                  $username = "id5843625_swaggerboy";
                  $password = "swaggerboy@1234";
                  $dbname = "id5843625_inventory";
                  $response=1;

                  $conn = new mysqli($servername, $username, $password, $dbname);

                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }else{
                    $sql="SELECT * FROM models";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0){
                      $i=1;
                      while($row = $res->fetch_assoc()){
                        echo"<tr><td class='idd'>$i</td><td class='manufacturer'>" . $row['manufacturer'] . "</td><td class='name'>" . $row['name'] . "</td><td class='count'>" . $row['count'] . "</td><td><button class='btn btn-primary submitbtn sold add'>Added</button></td><td><button class='btn btn-primary submitbtn sold sell'>Sold</button></td></tr>";
                        $i++;
                      }
                    }
                  }
                  $conn->close();  
                ?>
              </tbody>
            </table>
            <a class="btn btn-primary submitbtn sold faa-parent animated-hover hidden-xs" href="../model"><i class="fas fa-caret-left faa-horizontal"></i>Add Model</a>
            <a class="btn btn-primary skipbtn sold faa-parent animated-hover hidden-xs" href="../"><i class="fas fa-fast-backward faa-horizontal"></i>Add Manufacturer</a>
            <a class="btn btn-primary submitbtn sold faa-parent animated-hover hidden-md" href="../model"><i class="fas fa-caret-left faa-horizontal"></i></a>
            <a class="btn btn-primary skipbtn sold faa-parent animated-hover hidden-md" href="../"><i class="fas fa-fast-backward faa-horizontal"></i></a>
          </div>
  			</div>
    </div>
  	    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="../js/scripts.js"></script>
  </body>
</html>