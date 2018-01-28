  <?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('connection.php');

class Product {

  function __construct()
  {

  }

//select all data from table product
     public function showData(){
       global  $conn;
     $query='SELECT * FROM product ';
     $stmt = $conn->query($query) or die("failed!");
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     $data[]=$row;

     }
     return $data;
     }

//get (select) specific product by product id
     public function getById($id){
       global  $conn;
     $query="SELECT * FROM product WHERE product_ID ='$id'";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     $data = $stmt->fetch(PDO::FETCH_ASSOC);
     return $data;
       }
//update specific product details by product id
       public function update($product_ID,$product_name,$price,$category,$image){
         global  $conn;
          $query = "UPDATE product
           SET product_name ='$product_name' ,price ='$price',category='$category',image='$image' , status='available'
           WHERE product_ID ='$product_ID' ";
           $stmt = $conn->prepare($query);
           $stmt->execute();
           return true;
          }

        //insert new product in table product
        public function insertData($product_name,$price,$category,$image){
         global $conn;
         /*$query = "INSERT INTO product SET product_name='$product_name', price ='$price' , category='$category', image='$image', status='available' ";*/
         $query = "INSERT INTO product SET product_name='".$product_name."',price ='".$price."',category='".$category."',image='".$image."'";

         $stmt = $conn->prepare($query);
         $stmt->execute([]);
         return true;
         }

        //delete some product of table product by product id
        public function deleteData($product_ID){
          global $conn;
        $query="DELETE FROM product WHERE product_ID='$product_ID' ";
        $stmt = $conn->prepare($query);
        $stmt->execute([]);
        return true;
        }
        //select table orders admin from user and orders
          public function select_order(){
              global  $conn;
          $query="SELECT orders.user_id,concat(orders.date ,' ',orders.time) as order_date ,user.user_name ,user.Room_no,user.Ext,orders.status FROM orders,
          user WHERE orders.user_id = user.user_ID";
          $stmt = $conn->query($query) or die("failed!");
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $data[]=$row;

          }
          return $data;

          }
          //select table product of order admin from user and orders
          public function select_product_order(){
              global  $conn;
          $query="SELECT orders.user_id,concat(orders.date ,' ',orders.time) as order_date ,user.user_name ,user.Room_no,user.Ext,orders.status FROM orders,
          user WHERE orders.user_id = user.user_ID";
          $stmt = $conn->query($query) or die("failed!");
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $data[]=$row;

          }
          return $data;

          }
        //  update specific product status
         public function update_status($product_name,$status){
           global  $conn;
            $query = "UPDATE product
            SET status='$status'
            WHERE product_name ='$product_name' ";
             $stmt = $conn->prepare($query);
             $stmt->execute();
             return true;
            }

            //select table product - order
            public function order_product($user_id){
                global  $conn;
            $query="SELECT product.image,product.product_name,order_product.Quantity,product.price,orders.amount FROM product , order_product ,orders WHERE
             order_product.product_id=product.product_ID and order_product.order_id=orders.order_id AND user_id='$user_id' ";
             $stmt = $conn->prepare($query);
             $stmt->execute();
             $data = $stmt->fetch(PDO::FETCH_ASSOC);
             return $data;
           }
  


      }







 ?>
