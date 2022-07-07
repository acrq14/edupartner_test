<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "edupartner_test";

$conn = mysqli_connect($host,$user,$password,$db);
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle,1000,";"))
   {
        $item1 = mysqli_real_escape_string($conn, $data[0]);  
        $item2 = mysqli_real_escape_string($conn, $data[1]);
        $query = "INSERT into words(eng, rus) values('$item1','$item2')";
        mysqli_query($conn, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Ввод с файла .csv</title>
  <link rel="stylesheet" href="style.css">
 </head>  
 <body>  
    <br>
  <h3 align="center">Или вставьте файл формата csv</h3><br>
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label><br><br>
    <input type="file" name="file"><br>
    <br>
    <input class="input" style="padding:20px; border-radius: 12px;" type="submit" name="submit" value="Import" class="btn btn-info">
   </div>
  </form>
 </body>  
</html>