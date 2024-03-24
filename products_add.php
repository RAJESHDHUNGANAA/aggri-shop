<?php
	/* ************************************************************
	*************** - CPanel*******************
	***************************************************************
	********************** Product Add *****************************
	***************************************************************/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';
	
// connecting to db

$data = json_decode(file_get_contents("php://input"));
$get_email =  ($data->email);
$get_pname =  ($data->pname);
$get_price = ($data->price);
$get_desc = ($data->description);
$get_size = ($data->size);
$get_stock_1 = ($data->stock );
$get_stock = substr ($get_stock_1, 0, 10); 

$get_speci =  ($data->specification );
$get_ship_days = ($data->shipping_days );
$get_ship_charge = ($data->shipping_charge );
$get_category1 = ($data->category1);
$get_category2 =($data->category2);
$get_crea_date = date('Y-M-D');
$get_tax_amount  = "0";

if(empty($get_email) || empty($get_pname)|| empty($get_price)|| empty($get_ship_days)|| empty($get_ship_charge)  )
{
	$response["success"] = 2;
	echo json_encode($response);
}
elseif (strlen($get_category2) != 10) 
{
	$response["success"] = 3;
	echo json_encode($response);
}
else {
	
	$result = mysqli_query($conn,"INSERT INTO product_list
					(pname, description, price, size, stock, specification, 
					shipping_days,shipping_charge, category_name, category2,category3,tax_amount ,created_date) 
			VALUES('$get_pname', '$get_desc', '$get_price','$get_size', '$get_stock', 
			'$get_speci', '$get_ship_days', '$get_ship_charge', 
			'$get_category1', '$get_category2', '$get_email','$get_tax_amount', '$get_crea_date')");
		
		if($result)
		{
			$response["success"] = 1;
			echo json_encode($response);
		}
		else
		{
			$response["success"] = 0;
			echo json_encode($response);
		}
}

?>