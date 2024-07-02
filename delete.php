<?php   
 include 'config.php';  

session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="admin-container" style="font-size: 25px; border:solid 1px; padding:30px;">
    <h3>Welcome admin! <br> you can view all user data here:</h3><br>
<?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form`") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['id'] == ''){
            echo 'id';
         }else{
         }

        $sql = "SELECT * FROM user_form ";
        $result = $conn->query($sql);
         if($fetch['id']){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   
                    echo  
                    "id: " . $row["id"]. " |
                     name: " . $row["name"]." | 
                     email: " . $row["email"]. " | 
                     rights: " . $row["user_type"].
                    "<br><br>";
                  
                }
            } else {
                echo "0 results";
            };
         }
      ?>
      <a href="home.php"><button class="btn">go back</button></a>
   </div>
</div>
</body>
</html>




