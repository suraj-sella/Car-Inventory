<?php
  
  class Database{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "inventory";
    
    public function connect(){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      if ($conn->connect_error) {
        //die("Connection failed: " . $conn->connect_error);
        return 0;
      }else{
        //die("Connection Successful!");
        return $conn;
      }
    }

    public function addMan($name){
      $sql = "INSERT INTO manufacturers (name, quantity) VALUES ('$name', 1)";
      $sqlcheck = "SELECT * FROM manufacturers WHERE name = '$name'";
      $conn = $this->connect();
      $res = $conn->query($sqlcheck);
      if ($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
          $quantity=$row['quantity'];
          $quantity++;
            $sqlupdate = "UPDATE  manufacturers SET quantity = $quantity WHERE name = '$name'";
            if($conn->query($sqlupdate) === TRUE){
              echo 1;
            }else{
              echo "Error: " . $sqlupdate . "<br>" . $conn->error;
            }
        }
      }else{
        if($conn->query($sql) === TRUE){
          echo 0;
        }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      } 
    }

    public function AddMod($manufacturer, $model){
      $sql = "INSERT INTO models (name, manufacturer, count) VALUES ('$model', '$manufacturer', 1)";
      $sqlcheck = "SELECT * FROM models WHERE name = '$model' AND manufacturer = '$manufacturer'";
      $conn = $this->connect();
      $res = $conn->query($sqlcheck);
      if ($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
          $count=$row['count'];
          $count++;
          $sqlupdate = "UPDATE  models SET count = $count WHERE name = '$model' AND manufacturer = '$manufacturer'";
          if($conn->query($sqlupdate) === TRUE){
            echo "New record created successfully";
          }else{
            echo "Error: " . $sqlupdate . "<br>" . $conn->error;
          }  
        }
      }else{
        if($conn->query($sql) === TRUE){
          echo "New record created successfully";
        }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }

    public function delMod($manufacturer, $model){
      $sqlupdate = "DELETE FROM models WHERE name = '$model' AND manufacturer = '$manufacturer'";
      $conn = $this->connect();
      if($conn->query($sqlupdate) === TRUE){
          echo "New record created successfully";
      }else{
          echo "Error: " . $sqlupdate . "<br>" . $conn->error;
      }
    }

    public function redMod($manufacturer, $model){
      $sqlupdate = "UPDATE  models SET count = count-1 WHERE name = '$model' AND manufacturer = '$manufacturer'";
      $conn = $this->connect();
      if($conn->query($sqlupdate) === TRUE){
          echo "New record created successfully";
      }else{
          echo "Error: " . $sqlupdate . "<br>" . $conn->error;
      }
    }

  }

  class Manufacturer{

    public function addManufacturer($name){
      $db = new Database();
      $db->addMan($name);  
    }
  }

  class Model{
    
    public function addModel($manufacturer, $model){
      $db = new Database();
      $db->addMod($manufacturer, $model);  
    }

    public function deleteModel($manufacturer, $model){
      $db = new Database();
      $db->delMod($manufacturer, $model);  
    }

    public function reduceModel($manufacturer, $model){
      $db = new Database();
      $db->redMod($manufacturer, $model);  
    }

  }

  if($_POST['operation']==1){
    $man = new Manufacturer();
    $man->addManufacturer($_POST['manufacturer']);
  }elseif($_POST['operation']==2){
    $mod = new Model();
    $mod->addModel($_POST['select_manufacturer'], $_POST['model']);
  }elseif($_POST['operation']==3){
    $mod = new Model();
    $mod->addModel($_POST['manufacturer'], $_POST['model']);
  }elseif($_POST['operation']==4){
    $mod = new Model();
    $mod->deleteModel($_POST['manufacturer'], $_POST['model']);
  }elseif($_POST['operation']==5){
    $mod = new Model();
    $mod->reduceModel($_POST['manufacturer'], $_POST['model']);
  }

?>