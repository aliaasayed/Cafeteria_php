<?php include('connection.php');
include('navbar_user.php');?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
      .date{
        margin-left: 20px;
      }
      table,th,td{
        border: black solid 5px;
        padding: 10px;
        width: 100%;
      }
    </style>
    <title></title>
  </head>
  <body>
    <div class="date">
      <h1>My Oreder</h1>
      <label for="">From</label>
      <input type="date" id="date-from" name="date-from" value="<?php echo $_GET['date_from']?>">
      <i class="fa fa-calendar" aria-hidden="true"></i>
      <label for="">To</label>
      <input type="date" id="date-to" name="date-to" value="<?php echo $_GET['date_to']?>">
      <i class="fa fa-calendar" aria-hidden="true"></i>
      <input type="button" id='confirm' name="button" value="confirm">
    </div>
    <table>
      <tr>
        <th>Order Date</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Action</th>
      </tr>

    <?php
    @$query = "SELECT order_id,date,time,amount,status FROM orders where user_id='2' and date between '".$_GET['date_from']."' and '".$_GET['date_to']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row_order = $statement->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row);
      echo "<tr id='".$row_order['order_id']."'>";
      echo "<td>";
      echo "<a href='"."'#'"." class='plus_order'><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a>"." ".$row_order['date']." ".$row_order['time'];
      echo "</td>";
      echo "<td>";
      echo $row_order['amount'];
      echo "</td>";
      echo "<td>";
      echo $row_order['status'];
      echo "</td>";
      echo "<td>";
      if($row_order['status']=='processing')
      {
        echo "<a>cancel</a>";
      }
      else {
        echo "";
      }
      echo "</td>";
      echo "</tr>";
    }

    ?>

  </table>
  <table id="table2" style="display:<?php if(@$_GET['table2']=='block'){echo 'block';}else{echo 'none';} ?>">
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
  <script src="js/user_orders.js">

  </script>
</html>
