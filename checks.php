<?php include('user_class.php');
include('navbar_admin.php')?>

<!DOCTYPE html>
<html>

<head>
  <title>Font Awesome Icons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style media="screen">
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
    table,th,td{
      border: 10px solid black;
    }
  </style>
</head>

<body>


  <label for="">From</label>
  <input type="date" id='date-from' name="date_from" value="<?php echo $_GET['date_from']?>" required>
  <i class="fa fa-calendar" aria-hidden="true"></i>
  <label for="">To</label>
  <input type="date" id='date-to' name="date_to" value="<?php echo $_GET['date_to']?>" required>
  <i class="fa fa-calendar" aria-hidden="true"></i>
  <label style="color:red"><?php if (@$_GET['invalid']=="invalid_date"){echo "Invalid Date";}?></label>
  <table style="width:50%">
      <tr>
        <th>Name</th>
        <th>Total Amount</th>
      </tr>
      <?php
      $id_value;
      //$i=0;
      //$query = "SELECT user_id,sum(amount) as amount FROM orders group by user_id";
      $query = "SELECT o.user_id,u.user_name,sum(amount) as amount FROM user u, orders o where u.user_ID=o.user_id group by o.user_id";
      $statement = $conn->prepare($query);
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row);
        echo "<tr id='".$row['user_id']."'>";
        echo "<td>";
        echo "<a href='#' class='plus'><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a>"." ".$row['user_name'];
        //$id_value=$row['user_id'];
        echo "</td>";
        echo "<td>";
        echo $row['amount'];
        echo "</td>";
        echo "</tr>";
        //$i++;
      }
      ?>
  </table>

  <div id="d1" style="display:none">any content</div>
  <table id="table1" style="display:<?php if(@$_GET['table1']=='block'){echo 'block';}else{echo 'none';} ?> border: 2px solid black">
    <?php
    //echo $id_value[0];
    if(@$_GET['date_from']!="" && $_GET['date_to']!="")
    {
    //  echo $id_value;
      echo "<tr>";
      echo "<th>Oreder Date</th>";
      echo "<th>Amount</th>";
      echo "</tr>";
    $query = "SELECT order_id,user_id,date,time,amount FROM orders where user_id='".$_GET['user_id']."' and date between '".$_GET['date_from']."' and '".$_GET['date_to']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row_order = $statement->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row);
      echo "<tr id='".$row_order['order_id']."'>";
      echo "<td>";
      echo "<a href='"."'#'"." class='plus_order'><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a> ".$row_order['date']." ".$row_order['time'];;
      echo "</td>";
      echo "<td>";
      echo $row_order['amount'];
      echo "</td>";
      echo "</tr>";
    }
  }
    ?>

  </table>
  <table id="table2" style="display:<?php if(@$_GET['table2']=='block'){echo 'block';}else{echo 'none';} ?> border: 2px solid black">
    <?php
    //echo $id_value[0];
    if(@$_GET['date_from']!="" && $_GET['date_to']!="")
    {
    //  echo $id_value;
    @$query = "SELECT order_id,date,time,amount FROM orders where order_id='".$_GET['order_id']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row_order = $statement->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>";
      echo $row_order['order_id'];
      echo "</d>";
      echo "</tr>";
    }
  }
    ?>

  </table>
</body>
  <script src="js/checks.js"></script>
</html>
