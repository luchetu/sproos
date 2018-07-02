<?php

require_once 'Functions.php';

$fun = new Functions();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = (object) $_POST;

	if(isset($data -> operation)){

		$operation = $data -> operation;
		if(!empty($operation)){
			if($operation == 'login'){
				if(isset($data -> username) && isset($data -> password)  && isset($data -> user_type)){

					$username = $data -> username;
					$password = $data -> password;
                    $user_type = $data -> user_type;
					echo $fun -> loginUser($username, $password, $user_type);

				} else {

					echo $fun -> getMsgInvalidParam();

				}
			}
			else if($operation == 'signup'){
				if(isset($data -> email) && isset($data -> username) && isset($data -> password)  && isset($data -> user_type)){
					$email = $data -> email;
					$username = $data -> username;
					$password = $data -> password;
                    $user_type = $data -> user_type;
					echo $fun -> signupUser($email,$username, $password, $user_type);

				} else {

					echo $fun -> getMsgInvalidParam();

				}
			}
            else if ($operation == 'save_order')
            {
                if(isset($data -> id))
                {
                    $id = $data -> id;
                    echo $fun -> saveOrder($id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'add_to_discounts')
            {
                if(isset($data -> user_id) && isset($data -> product_id) && isset($data -> discount_price) && isset($data -> start_time) && isset($data ->end_time))
                {
                    echo $fun -> addToDiscounts($data);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'fetch_discounts')
            {
                echo $fun -> fetchDiscounts();
            }
            else if ($operation == 'confirm_receipt')
            {
                if(isset($data -> id) && isset($data -> user_id)){
                    $unique_order_id = $data -> id;
                    $user_id = $data -> user_id;
                    echo $fun -> confirmReceipt($unique_order_id, $user_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'change_password') {

                if(isset($data -> id) && isset($data -> user_type) && isset($data -> oldPassword) && isset($data -> newPassword)){

                    $id = $data -> id;
					$user_type = $data -> user_type;
                    $old_password = $data -> oldPassword;
                    $new_password = $data -> newPassword;

                    echo $fun -> changePassword($id, $user_type, $old_password, $new_password);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }
            }
            else if ($operation == 'add_product') {

                if(isset($data -> id)){

                    echo $fun -> addProduct($data);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }

            }
			else if ($operation == 'add_product_2') {

                if(isset($data -> id)&&isset($_FILES["picture1"])&&isset($_FILES["picture2"])&&isset($_FILES["picture3"]))
				{
                    echo $fun -> addProduct2($data,$_FILES["picture1"],$_FILES["picture2"],$_FILES["picture3"]);
					
                } else {

                    echo $fun -> getMsgInvalidParam();

                }

            }
            else if ($operation == 'add_count_to_cart') {

                if (isset($data->cart_id) && isset($data->user_id) && isset($data->cart_count)) {

                    $cart_id = $data->cart_id;
                    $user_id = $data->user_id;
                    $cart_count = $data->cart_count;

                    echo $fun->addCountToCart($cart_id, $user_id, $cart_count);

                } else {

                    echo $fun->getMsgInvalidParam();

                }
            }
            else if ($operation == 'delete_all_products')
            {
                if(isset($data -> id)){
                    $user_id = $data -> id;
                    echo $fun -> deleteAllUserProducts($user_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'edit_product')
            {
                if(isset($data -> id) && isset($data -> user_id)){

                    echo $fun -> editProduct($data);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }
            }
            else if ($operation == 'remove_from_cart')
            {
                if(isset($data -> user_id) && isset($data -> cart_id)){
                    $user_id = $data -> user_id;
                    $cart_id = $data -> cart_id;
                    echo $fun -> removeFromCart($user_id, $cart_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'fetch_all_products') {

                echo $fun -> fetchAllProducts();

            }
			else if ($operation == 'fetch_featured_products') {

                echo $fun -> fetchFeaturedProducts();

            }
            else if ($operation == 'add_to_cart') {

                if(isset($data -> user_id) && isset($data -> product_id)){

                    $user_id = $data -> user_id;
                    $product_id = $data -> product_id;
                    echo $fun -> addToCart($user_id, $product_id);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }

            }
            else if ($operation == 'fetch_my_products') {

                if(isset($data -> id)){

                    $id = $data -> id;

                    echo $fun -> fetchMyProducts($id);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }

            }
            else if ($operation == 'fetch_sellers_products') {

                if(isset($data -> id)){

                    $id = $data -> id;

                    echo $fun -> fetchMyProducts($id);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }

            }
            else if ($operation == 'save_rating')
            {
                if(isset($data -> user_id) && isset($data -> rating)){
                    $user_id = $data -> user_id;
                    $rating = $data -> rating;
                    echo $fun -> saveRating($user_id, $rating);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'delete_product')
            {
                if(isset($data -> product_id) && isset($data -> user_id)){
                    $user_id = $data -> user_id;
                    $product_id = $data -> product_id;
                    echo $fun -> deleteProduct($user_id, $product_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'delete_product')
            {
                if(isset($data -> product_id) && isset($data -> user_id)){
                    $user_id = $data -> user_id;
                    $product_id = $data -> product_id;
                    echo $fun -> deleteProduct($user_id, $product_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'deliver_product')
            {
                if(isset($data -> id) && isset($data -> user_id)){
                    $user_id = $data -> user_id;
                    $delivery_id = $data -> id;
                    echo $fun -> deliverProduct($user_id, $delivery_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if ($operation == 'fetch_cart_count')
            {
                if(isset($data -> user_id)){
                    $user_id = $data -> user_id;
                    echo $fun -> fetchCartCount($user_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
			else if($operation == 'update_profile'){
				$id = $data -> id;
				if(isset($id)){
					echo $fun -> editUser($data);

				} else {

					echo $fun -> getMsgInvalidParam();

				}
			}
			else if($operation == 'update_profile_2'){
				$id = $data -> id;
				if(isset($id)){
					if(isset($_FILES["picture"])){
						echo $fun -> editUser2($data,$_FILES["picture"]);
					}
					else{
						echo $fun -> getMsgInvalidParam();
					}

				} else {

					echo $fun -> getMsgInvalidParam();

				}
			}
            else if ($operation == 'fetch_category_products') {

                if(isset($data -> category)){

                    $category = $data -> category;

                    echo $fun -> fetchCategoryProducts($category);

                } else {

                    echo $fun -> getMsgInvalidParam();

                }

            }
            else if($operation == 'fetch_sellers')
            {
                if(isset($data -> order_id))
                {
                    $order_id = $data -> order_id;
                    echo $fun -> fetchSellers($order_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'fetch_orders')
            {
                if(isset($data -> id))
                {
                    $id = $data -> id;
                    echo $fun -> fetchOrders($id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'fetch_completed_orders')
            {
                if(isset($data -> id))
                {
                    $id = $data -> id;
                    echo $fun -> fetchCompletedOrders($id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'fetch_order_details')
            {
                if(isset($data -> order_id))
                {
                    $order_id = $data -> order_id;
                    echo $fun -> fetchOrderDetails($order_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'fetch_activity')
            {
                if(isset($data -> id))
                {
                    $id = $data -> id;
                    echo $fun -> fetchActivity($id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'facebook_login')
            {
                if(isset($data -> email)  && isset($data -> user_type))
                {
                    echo $fun -> facebookLogin($data);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'gplus_login')
            {
                if(isset($data -> email)  && isset($data -> user_type))
                {
                    echo $fun -> gPlusLogin($data);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'fetch_cart')
            {
                if(isset($data -> id))
                {
                    $id = $data -> id;
                    echo $fun -> fetchCart($id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'fetch_deliveries')
            {
                if(isset($data -> id) && isset($data -> delivered))
                {
                    $id = $data -> id;
                    $delivered = $data -> delivered;
                    echo $fun -> fetchDeliveries($id,$delivered);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
			else if($operation == 'save_address')
            {
                if((isset($data -> id)) && (isset($data -> order_id)) && (isset($data -> latitude)) &&(isset($data -> longitude)) &&(isset($data -> shipment_cost)))
                {
                    echo $fun -> saveAddress($data);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'save_shipment_cost')
            {
                if((isset($data -> id)) && (isset($data -> order_id)) && (isset($data -> shipment_cost)))
                {
                    $id = $data -> id;
                    $order_id = $data -> order_id;
                    $shipment_cost = $data -> shipment_cost;

                    echo $fun -> saveShipmentCost($id, $order_id, $shipment_cost);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
			else if($operation == 'save_paypal_payment')
            {
                if((isset($data -> id)) && (isset($data -> order_id)) && (isset($data -> payment_method)) &&(isset($data -> paypal_unique_id)))
                {
                    echo $fun -> savePaypal($data);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
            else if($operation == 'initiate_delivery')
            {
                if((isset($data -> id)) && (isset($data -> order_id)))
                {
                    $id = $data -> id;
                    $order_id = $data -> order_id;

                    echo $fun -> initiateDelivery($id, $order_id);
                }
                else{
                    echo $fun -> getMsgInvalidParam();
                }
            }
			else {

			    echo $fun -> getMsgInvalidParam();

			}

		}

		
		else{ echo $fun -> getMsgParamNotEmpty();}
		
	}
	else {echo $fun -> getMsgInvalidParam();}
}
else if ($_SERVER['REQUEST_METHOD'] == 'GET'){echo "Blaze Group: BLAZEBAY.";}