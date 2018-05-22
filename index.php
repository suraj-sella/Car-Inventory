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
    <link rel="stylesheet" type="text/css" href="css/fontawesome-animations.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

    <title>Add Manufacturer | Car Inventory Application</title>
    <link rel="shortcut icon" href="img/car.png">
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
  		<div class="row page-header-row">
  			<div class="col-xs-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6 page-header">
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-xs-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6 form-div">
  				<div class="form">
	  				<form class="form-manufacturer">
	  					<p class="h4 text-center card-head mb-4 faa-parent animated-hover"><i class="fas fa-plus-circle faa-spin"></i>Add Manufacturer</p>
	  					<div class="form-group">
	    					<input type="text" class="form-control" id="manufacturer" name="manufacturer" aria-describedby="manufacturerHelp" placeholder="Enter The Manufacturer Here" required="required">
	  					</div>
						<button type="submit" class="btn btn-primary submitbtn sold faa-parent animated-hover"><i class="fas fa-caret-right faa-horizontal"></i>Submit</button>
            <!--button type="submit" class="btn btn-primary skipbtn">Skip</button-->
            <a class="btn btn-primary skipbtn sold faa-parent animated-hover hidden-xs" href="model/"><i class="fas fa-fast-forward faa-horizontal"></i>Add Model Directly</a>
            <a class="btn btn-primary skippbtn sold faa-parent animated-hover hidden-xs" href="inventory/"><i class="fas fa-store-alt faa-pulse"></i>Inventory</a>
            <a class="btn btn-primary skipbtn sold faa-parent animated-hover hidden-md" href="model/"><i class="fas fa-fast-forward faa-horizontal"></i></a>
            <a class="btn btn-primary skippbtn sold faa-parent animated-hover hidden-md" href="inventory/"><i class="fas fa-store-alt faa-pulse"></i></a>
	  				</form>
	  			</div>
  			</div>
  		</div>
  		<div class="row page-header-row hidden feedback">
  			<div class="col-xs-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6 page-header success-div">
  				<p class="text-center"><i class="fas fa-check"></i>Manufacturer Added Successfully!</p>
  			</div>
  		</div>
  	</div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="js/scripts.js"></script>
  </body>
</html>