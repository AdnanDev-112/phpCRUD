<!DOCTYPE html>

<?php
//include the php file
include 'process.php'

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>

<div class="container">

<button type="submit" class="btn btn-primary my-5"><a href="index.php" class="text-light">Add Data</a></button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Operations</th>
    
    </tr>
  </thead>
  <tbody>
<?php


//apply the select query

$sql = "Select * from data";
$result = mysqli_query($conn,$sql);



//use the while loop only to display data as and how much it is on the database
if($result)
{
 while($row = mysqli_fetch_assoc($result)){
//id of the database
    $id = $row['Id'];
    $Fname = $row['name'];
    $Location = $row['location'];
    echo '<tr>
    <th >'.$id.'</th>
    <td>'.$Fname.'</td>
    <td>'.$Location.'</td>
    
    
    
    
    
    <td>
    <button class="btn- btn-primary "><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
    <button class="btn- btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
    
    </td>
  </tr>';
 }

}


?>




    
  </tbody>
</table>

</div>
    
</body>
</html>