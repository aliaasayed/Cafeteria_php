<?php
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}


$_SESSION['order']='';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('Order_Class.php');

$Order= new Order();
$Order->insert_order($_POST['user_id'],$_POST['amount'],(int)$_POST['Room'],$_POST['Notes']);

$order_id=$Order->get_latest_order_id($_POST['user_id']);

include('Order_Product_Class.php');
$Order_product=new Order_Product();

include('product_class.php');
$product=new Product();

foreach ($_POST as $key => $value) {

	if(is_integer($key))
	{
		$data=$product->getById($key);

		if($data['status']=='unavailable')
		{
			$_SESSION['order']='fail';
			$Order->delete_order($order_id);
            header("location:Home_user.php");
		}
		else
		{    $_SESSION['order']='success';
			 $Order_product->insert_order_product($order_id,$key,$value);
		}

	}


}
 if($_POST['admin']==1)
{
  header("location:Home_admin.php");

}
else
{
	header("location:Home_user.php");
}

?>
