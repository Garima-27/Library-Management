<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.navbar{margin-bottom: 0px; }
  	.navbar a{font-size: 18px}
  	.navbar .icon{display: none}
    .a{padding-top: 50px;}
  	@media screen and (max-width: 600px) {
  .navbar a:not(:first-child) {display: none;}
  .navbar .icon {display: block;}
}
</style>
</head>
<body style="background-image: url(1.jpg); ; background-repeat: no-repeat center center ; background-size: cover;
 overflow: hidden
">
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/E:/Library/home.html">eLibrary</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="/E:/Library/home.html">Home</a></li>
      <li><a href="/E:/Library/add_librarian.html">Add Librarian</a></li>
      <li><a href="#">View Librarian</a></li>
      <li><a href="/E:/Library/home.html">Logout</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="" class="icon" onclick=""><i class="fa fa-bars" ></i></a></li>
    </ul>
  </div>
</nav>
<div class="container a ">          
  <table class="table" style="background-color: sandybrown;border-radius: 25px;" id="1">
    <thead>
      <tr>
        <th><font color="black", size="5" style="font-family: ComicSans">Id</font></th>
        <th><font color="black", size="5" style="font-family: ComicSans">Name</font></th>
        <th><font color="black", size="5" style="font-family: ComicSans">Email Address</font></th>
        <th><font color="black", size="5" style="font-family: ComicSans">Mobile Number</font></th>
        <th><font color="black", size="5" style="font-family: ComicSans">Password</font></th>
      </tr>
    </thead>
      <?php
      $conn = new mysqli('localhost','root','','library');
      if(mysqli_connect_error()){
      die('Connection Failed :'.mysqli_connect_error());}

      

      if(isset($_POST['save']))
      {  
        $full_name = $_POST['fullname'];
        $e = $_POST['email'];
        $phn = $_POST['phone'];
        $pwd = $_POST['pswd'];
        $flag=0;

        if(strlen($phn)!=10)
          {
            $flag=1;
            echo "<script>alert('Mobile number should be of 10 digits')</script>";
          }
        $sq= "SELECT * FROM librarian";
        $result = $conn->query($sq);
        if ($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc())
          {
            if($full_name==$row["Name"] && $e==$row["Email"] && $phn==$row["Phone"] && $pwd==$row["UserPassword"])
            {
              $flag=1;
              echo "<script>alert('Record already exist')</script>";
              break;
            }
            if($pwd==$row["UserPassword"])
            {
              $flag=1;
              echo "<script>alert('This password is already given to another person. Please choose another one.')</script>";
              break;
            }
            if($e==$row["Email"])
            {
              $flag=1;
              echo "<script>alert('This email already exist')</script>";
              break;
            }
          }
        }

        if($flag==0)
        {
          $sql = "INSERT INTO librarian(Name,Email,Phone,UserPassword) VALUES ('$full_name','$e','$phn','$pwd')";
          if (mysqli_query($conn, $sql)) {echo "<script>alert('New Record created successfully!!!!')</script>";}
          else 
          {
            echo "Error: " . $sql . "
            " . mysqli_error($conn);
          }
        }
        
      }


      $sq = "SELECT * FROM librarian  ORDER BY Id";
      $result = $conn->query($sq);
      if ($result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc())
        {
          echo "<tr><td><font color=black size=4>" . $row["Id"] . "</font></td><td><font color=black size=4>" . $row["Name"]. "</font></td><td><font color=black size=4>" . $row["Email"] . "</font></td><td><font color=black size=4>". $row["Phone"]. "</font></td><td><font color=black size=4>". $row["UserPassword"]."</font></td></tr>";}
            echo "</table>";
        } 
      else { echo "0 results"; }
      mysqli_close($conn);
?>
  </table>
</div>
</body>
</html>

