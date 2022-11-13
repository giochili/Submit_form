
<?php
  $conn = mysqli_connect("localhost","root","","test");

  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `table1` WHERE `id` = '$id'");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--      style      -->
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

  <!--      for    font-family     -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Form</title>
</head>

<body>

    <div class="wholeForm">
      

        <!--            whole form      -->
        <form action="connect.php" method="post" class="form">
              <!--    first Name     -->
          <div class="grid firstName-container">
            <label class="firstName-label" for="firstName" >FirstName</label>
            <input type="text"
            id="firstName" placeholder="first name" name="firstName" onkeydown="return /[a-z]/i.test(event.key)" required>
          </div>

          <!--      last name      -->
          <div class="grid lastName-container">
            <label for="LastName">LastName</label>
            <input type="text"placeholder="Lastname"
            id="LastName" name="lastName"
            onkeydown="return /[a-z]/i.test(event.key)" required>
          </div>

            <!--     address     -->
          <div class="grid address-container">
            <label for="LastName" >Address</label>
            <input type="text"              placeholder="Address" name="address" maxlength="35" required>
          </div>

            <!--    Birth Year     -->
          <div class="grid birthYear-container">
            <label for="LastName" >Birth Year</label>
            <input for="Birth" name="birthYear" 
             type="date"  maxlength="35">
          </div>
          
          
            <!--      Gennder      -->
          <div class="grid gender-container">
            <label for="Gender">Gender</label>
              <select name="gender" id="Gender"> 
                <option  value="0"
                selected hidden>Select gender</option>
                <option name="gender" value="m">Male</option>
                <option name="gender" value="f">Female</option>
              </select>
          </div>

              <!--    for Note   -->
          <div class="grid note-container">
            <label for="note">Give a Note</label>
            <textarea id="note"
            name="note"
            placeholder="Note"></textarea>
          </div>
          <div>
            <button id="foot" class="submit-btn" type="submit"
            name= "submit">Submit</button>
            <button class="reset-btn" type="reset">Reset</button>
          </div>
        </form>
        
        </div>
    
      
    </div>

    <!--        for submited information     -->
    <div class="submited">
    <table class="table" border = "1" cellpadding = "0">
      <tr class="main-tr">
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>address</th>
        <th>birthYear</th>
        <th>gender</th>
        <th>Note</th>
        <th>Operation</th>
      </tr>
      <?php
          $sql = "SELECT * FROM `table1`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
                echo  '<tr class="submit-table">
                          <td>'.$row['id']. '</td>
                          <td>'.$row['firstName']. '</td>
                          <td>'.$row['lastName']. '</td>
                          <td>'.$row['address']. '</td>
                          <td>'.$row['birthYear']. '</td>
                          <td>'.$row['gender']. '</td>
                          <td class="note-style">'.$row['Note']. '</td>
                          <td> 
                            <a href = "index.php?id='.$row['id'].'">Delete</a>
                          </td>
                        </tr>';
                        }
         ?>
      
    </table>
  </div>
</body>
</html>