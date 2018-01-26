<?php include('user_class.php');?>

<!DOCTYPE html>
<html>

<head>
  <title>Font Awesome Icons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    td {
      vertical-align: top;
    }

    #table1,
    #table2,
    #table3,
    #table4,
    #d1 {


    }
  </style>
</head>

<body>


  <label for="">From</label>
  <input type="date" id='date-from' name="date_from" value="" required>
  <i class="fa fa-calendar" aria-hidden="true"></i>
  <label for="">To</label>
  <input type="date" id='date-to' name="date_to" value="" required>
  <i class="fa fa-calendar" aria-hidden="true"></i>
  <label style="color:red"><?php if (@$_GET['invalid']=="invalid_date"){echo "Invalid Date";}?></label>
  <table style="width:50%">
      <tr>
        <th>Name</th>
        <th>Total Amount</th>
      </tr>
      <?php
      $query = "SELECT user_id,sum(amount) as amount FROM orders group by user_id";
      $statement = $conn->prepare($query);
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row);
        echo "<tr>";
        echo "<td>";
        echo "<a href='#' class='plus'><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a></td>";
        echo "</td>";
        echo "<td>";
        echo $row['user_id'];
        echo "</td>";
        echo "<td>";
        echo $row['amount'];
        echo "</td>";
        echo "</tr>";
      }
      ?>
  </table>

  <div id="d1" style="display:none">any content</div>

  <table id="table1" style="display:<?php if(@$_GET['msg']=='block'){echo 'block';}else{echo 'none';} ?> border: 2px solid black">
    <?php
    if(@$_GET['date_from']!="" && $_GET['date_to']!="")
    {
    $query = "SELECT date,time,amount FROM orders where date between '".$_GET['date_from']."' and '".$_GET['date_to']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row);
      echo "<tr>";
      echo "<td>";
      echo "<a href='"."'#'"."><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a></td>";
      echo "</td>";
      echo "<td>";
      echo $row['date'];
      echo "</td>";
      echo "<td>";
      echo $row['time'];
      echo "</td>";
      echo "<td>";
      echo $row['amount'];
      echo "</td>";
      echo "</tr>";
    }
  }
    ?>

  </table>

</body>
  <script src="checks.js"></script>
</html>
