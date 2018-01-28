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
       public function update($product_ID,$product_name,$price,$category,$image,$status){
         global  $conn;
          $query = "UPDATE product
           SET product_name ='$product_name' ,price ='$price',category='$category',image='$image' , status='$status'
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
        $query="DELETE FROM product WHERE product_ID='$product_ID' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);
        return true;
        }


      }



//how to use function

/*$p = new product(); //create object of class
// loop for all column in table
foreach($p->showData() as $value){
 extract($value);


echo "<br> no:".$product_ID;
echo "<br> name:".$product_name;
echo "<br> price:".$price;
echo "<br> category:".$category;

}

//get product by id
extract($p->getById(1));
echo "<br><br> specific product ";
echo "<br> no:".$product_ID;
echo "<br> name:".$product_name;
echo "<br> price:".$price;
echo "<br> category:".$category;*/



 ?>

