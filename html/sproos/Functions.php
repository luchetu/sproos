<?php

require_once 'DBOperations.php';

class Functions{

private $db;

public function __construct() {

      $this -> db = new DBOperations();

}
public function loginUser($username, $password, $user_type) {

  $db = $this -> db;

  if (!empty($username) && !empty($password)) {

    if ($db -> dbCheckUserExistInBuyersOrSellers($username, $user_type)) {

       $result =  $db -> dbCheckLogin($username, $password, $user_type);


       if(!$result) {

        $response["success"] = 0;
        $response["message"] = "Invaild Login Credentials";
        return json_encode($response);

       } else {

        $response["success"] = 1;
        $response["message"] = "Login Successful";
        $response["user"] = $result;
        return json_encode($response);

       }

    } else {

      $response["success"] = 0;
      $response["message"] = "No Such ".($user_type==1 ? "Seller" : "Buyer")." Found";
      return json_encode($response);

    }
  } else {

      return $this -> getMsgParamNotEmpty();
    }

}
public function signupUser($email, $username, $password, $user_type) {

  $db = $this -> db;

  if (!empty($email) && !empty($username) && !empty($password)) {

    if (!($db -> dbCheckUserEmailExist($email, $user_type) ||  $db -> dbCheckUserUsernameExist($username, $user_type))) {

       $result =  $db -> dbInsertUser($email, $username, $password, $user_type);


       if($result) {
		$response["success"] = 1;
        $response["message"] = "User Registration Successful";
        return json_encode($response);

       } else {

        $response["success"] = 0;
        $response["message"] = "User Registration Failed";
        return json_encode($response);

       }
	   

    } else {

      $response["success"] = 0;
      $response["message"] = "".($user_type==1 ? "Seller" : "Buyer")." Already Exists";
      return json_encode($response);

    }
  } else {

      return $this -> getMsgParamNotEmpty();
    }

}
public function editUser($data) {
    $db = $this -> db;

	$id = $data -> id;
	$user_type = $data -> user_type;
	$phone = $data -> phone;
	$full_name = $data -> full_name;
	$city = $data -> city;
	$country = $data -> country;
    $latitude = $data -> latitude;
    $longitude= $data -> longitude;
    $image = $data -> base64;
	$image = base64_decode($image);
	$upload_image_status = false;
	$image_path = '';
	
	if(isset($image) && $image!='')
	{
		$unique_image_id = $this -> getRandomString(10);
		$image_path = "images/uploads/profiles/".$unique_image_id.".png";
        $status = file_put_contents($image_path, $image);
		$upload_image_status = $status;
	}
	$unique_location_id = $this -> getRandomString(20);
    //$result = $db -> dbSaveLocation($unique_location_id,$latitude,$longitude);
    $result = true;
    {
        if ($result)
        {
            $result = $db -> dbUpdateUser($id, $phone, $full_name, $city, $unique_location_id, $country, $image_path, $upload_image_status, $user_type,$latitude,$longitude);

            if(!$result) {

                $response["success"] = 0;
                $response["message"] = "Update Profile Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Update Profile Successful";
                $response["user"] = $result;
                return json_encode($response);

            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Location Not Saved";
            return json_encode($response);
        }
    }
}
public function editUser2($data,$picture)
{
	$db = $this -> db;

	$id = $data -> id;
	$user_type = $data -> user_type;
	$phone = $data -> phone;
	$full_name = $data -> full_name;
	$city = $data -> city;
	$country = $data -> country;
    $latitude = $data -> latitude;
    $longitude= $data -> longitude;
	$target_dir = "images/uploads/profiles/";
	$target_file_name = $target_dir .basename($picture["name"]);
	$upload_image_status = false;
	$unique_location_id = $this -> getRandomString(20);
	if (move_uploaded_file($picture["tmp_name"], $target_file_name)) {
		$upload_image_status= true;
	}
	else {
		$upload_image_status = false;
	}
	if ($upload_image_status)
        {
            $result = $db -> dbUpdateUser($id, $phone, $full_name, $city, $unique_location_id, $country, $target_file_name, $upload_image_status, $user_type,$latitude,$longitude);

            if(!$result) {

                $response["success"] = 0;
                $response["message"] = "Update Profile Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Update Profile Successful";
                $response["user"] = $result;
                return json_encode($response);

            }
        }
	else 
	   {
		  $response["success"] = 0;
          $response["message"] = "Error while uploading".$picture["error"];
          return json_encode($response);
	   }
}
public function changePassword($id, $user_type, $old_password, $new_password) {

        $db = $this -> db;

        if (!empty($id) && !empty($old_password) && !empty($new_password)) {

            if(!($db -> dbCheckLoginWithId($id, $user_type, $old_password))){

                $response["success"] = 0;
                $response["message"] = 'Invalid Old Password';
                return json_encode($response);

            } else {


                $result = $db -> dbChangePassword($id, $user_type, $db -> enc ->getEncryptedPassword($new_password));

                if($result) {

                    $response["success"] = 1;
                    $response["message"] = "Password Changed Successfully";
                    return json_encode($response);

                } else {

                    $response["success"] = 0;
                    $response["message"] = 'Error Updating Password';
                    return json_encode($response);

                }

            }
        } else {

            return $this -> getMsgParamNotEmpty();
        }

}
public function fetchAllProducts()
{
    $db = $this -> db;

    if($db -> dbCheckProductsExist())
    {
        $result =  $db -> dbFetchProducts();

        if(!$result) {

            $response["success"] = 0;
            $response["message"] = "Products Fetch Failed";
            return json_encode($response);

        } else {

            $response["success"] = 1;
            $response["message"] = "Products Fetched Successfully";
            $response["array"] = $result;
            return json_encode($response);

        }
    }
    else{
        $response["success"] = 0;
        $response["message"] = "No Products Found";
        return json_encode($response);
    }
}
public function fetchFeaturedProducts()
{
	$db = $this -> db;

    if($db -> dbCheckFeaturedProductsExist())
	{
		$result =  $db -> dbFetchFeaturedProducts();

        if(!$result) {

            $response["success"] = 0;
            $response["message"] = "Featured Products Fetch Failed";
            return json_encode($response);

        } else {

            $response["success"] = 1;
            $response["message"] = "Featured Products Fetched Successfully";
            $response["array"] = $result;
            return json_encode($response);

        }
	}
	else{
        $response["success"] = 0;
        $response["message"] = "No Products Found";
        return json_encode($response);
    }
}
public function fetchMyProducts($id)
{
        $db = $this -> db;

        if($db -> dbCheckProductsExistMine($id))
        {
            $result =  $db -> dbFetchProductsMine($id);

            if(!$result) {

                $response["success"] = 0;
                $response["message"] = "Products Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Products Fetched Successfully";
                $response["productArray"] = $result;
                return json_encode($response);

            }
        }
        else{
            $response["success"] = 0;
            $response["message"] = "No Products Found";
            return json_encode($response);
        }
}
public function fetchCategoryProducts($category)
{
    $db = $this -> db;

    if($db -> dbCheckProductsExistInCategory($category))
    {
        $result =  $db -> dbFetchProductsInCategory($category);

        if(!$result) {

            $response["success"] = 0;
            $response["message"] = "Products Fetch Failed";
            return json_encode($response);

        } else {

            $response["success"] = 1;
            $response["message"] = "Products Fetched Successfully";
            $response["productArray"] = $result;
            return json_encode($response);

        }
    }
    else{
        $response["success"] = 0;
        $response["message"] = "No Products Found";
        return json_encode($response);
    }
}
public function addCountToCart($cart_id, $user_id, $cart_count)
{
    $db = $this -> db;

    if (!empty($cart_id) && !empty($user_id) && !empty($cart_count)) {

        $result = $db -> dbAddCountToCart($cart_id, $user_id, $cart_count);

        if($result) {

            $response["success"] = 1;
            $response["message"] = "Products in Cart Changed Successfully";
            return json_encode($response);

        } else {

            $response["success"] = 0;
            $response["message"] = 'Error Updating Cart Products';
            return json_encode($response);

        }
    } else {

        return $this -> getMsgParamNotEmpty();
    }
}
public function addProduct($data)
{
    $db = $this -> db;

    $id =  $data -> id;
    $product_name = $data -> name;
    $product_description = $data -> description;
    $product_cost =  $data -> cost;
    $product_size = $data -> size;
    $product_quantity = $data -> quantity;
    $product_color =  $data -> color;
    $product_material =  $data -> material;
    $product_category= $data -> category;
    $product_type= $data -> type;
    $product_img1 = base64_decode($data -> base64_1);
    $product_img2 = base64_decode($data -> base64_2);
    $product_img3 = base64_decode($data -> base64_3);
    $image_path_one = '';
    $image_path_two = '';
    $image_path_three = '';
    $status_one = $status_two = $status_three = false;

    if(isset($product_img1) && $product_img1!='')
    {
        $unique_image_id = $this -> getRandomString(10);
        $image_path_one = "images/uploads/products/".$unique_image_id.".png";
        $status_one = file_put_contents($image_path_one, $product_img1);
    }
    if(isset($product_img2) && $product_img2!='')
    {
        $unique_image_id = $this -> getRandomString(10);
        $image_path_two = "images/uploads/products/".$unique_image_id.".png";
        $status_two = file_put_contents($image_path_two, $product_img2);
    }
    if(isset($product_img3) && $product_img3!='')
    {
        $unique_image_id = $this -> getRandomString(10);
        $image_path_three = "images/uploads/products/".$unique_image_id.".png";
        $status_three = file_put_contents($image_path_three, $product_img3);
    }
    if(!((!($status_one) || !($status_two) || !($status_three))))
    {
        $response["success"] = 0;
        $response["message"] = "Failed To Add Product Images";
        return json_encode($response);
    }
    else
    {
        $result =  $db -> dbAddProduct($id, $product_name, $product_description, $product_cost, $product_size, $product_quantity,
            $product_color, $product_material, $product_category, $product_type, $image_path_one, $image_path_two, $image_path_three);

        if($result) {
            $response["success"] = 1;
            $response["message"] = "Add Product Successful";
            return json_encode($response);

        } else {

            $response["success"] = 0;
            $response["message"] = "Add Product Failed";
            return json_encode($response);

        }

    }

}
public function addProduct2($data,$picture1,$picture2,$picture3){
	$db = $this -> db;

    $id =  $data -> id;
    $product_name = $data -> name;
    $product_description = $data -> description;
    $product_cost =  $data -> cost;
    $product_size = $data -> size;
    $product_quantity = $data -> quantity;
    $product_color =  $data -> color;
    $product_material =  $data -> material;
    $product_category= $data -> category;
    $product_type= $data -> type;
	$target_dir = "images/uploads/products/";
    $image_path_one = $target_dir .basename($picture1["name"]);
    $image_path_two = $target_dir .basename($picture2["name"]);
    $image_path_three = $target_dir .basename($picture3["name"]);
    $status_one = move_uploaded_file($picture1["tmp_name"], $image_path_one);
	$status_two =	move_uploaded_file($picture2["tmp_name"], $image_path_two);
	$status_three = move_uploaded_file($picture3["tmp_name"], $image_path_three);
	if(!($status_one) || (!$status_two) || !($status_three))
    {
        $response["success"] = 0;
        $response["message"] = "Failed To Add Product Images";
        return json_encode($response);
    }
    else
    {
        $result =  $db -> dbAddProduct($id, $product_name, $product_description, $product_cost, $product_size, $product_quantity,
        $product_color, $product_material, $product_category, $product_type, $image_path_one, $image_path_two, $image_path_three);

        if($result) {
            $response["success"] = 1;
            $response["message"] = "Add Product Successful";
            return json_encode($response);

        } else {

            $response["success"] = 0;
            $response["message"] = "Add Product Failed";
            return json_encode($response);

        }

    }
	
}
public function editProduct($data)
{
    $db = $this -> db;
    $product_id = $data -> id;
    $user_id = $data -> user_id;
    if(!empty($user_id) && !empty($product_id)) {
        if($db -> dbCheckUserExistWithId($user_id,1))
        {
            if($db -> dbCheckProductExistsById($product_id)) {
                $product_name = $data -> name;
                $product_description = $data -> description;
                $product_cost =  $data -> cost;
                $product_size = $data -> size;
                $product_quantity = $data -> quantity;
                $product_color =  $data -> color;
                $product_material =  $data -> material;
                $product_category= $data -> category;
                $product_type= $data -> type;
                $product_img1 = base64_decode($data -> base64_1);
                $product_img2 = base64_decode($data -> base64_2);
                $product_img3 = base64_decode($data -> base64_3);

                $product = $db -> dbFetchProduct($product_id);
                $image_path_one = $product -> image;
                $image_path_two = $product -> image2;
                $image_path_three = $product -> image3;
                $status_one = $status_two = $status_three = false;

                if(isset($product_img1) && $product_img1!='')
                {
                    $unique_image_id = $this -> getRandomString(10);
                    $image_path_one = "images/uploads/products/".$unique_image_id.".png";
                    $status_one = file_put_contents($image_path_one, $product_img1);
                }
                if(isset($product_img2) && $product_img2!='')
                {
                    $unique_image_id = $this -> getRandomString(10);
                    $image_path_two = "images/uploads/products/".$unique_image_id.".png";
                    $status_two = file_put_contents($image_path_two, $product_img2);
                }
                if(isset($product_img3) && $product_img3!='')
                {
                    $unique_image_id = $this -> getRandomString(10);
                    $image_path_three = "images/uploads/products/".$unique_image_id.".png";
                    $status_three = file_put_contents($image_path_three, $product_img3);
                }
                if($status_one || $status_two || $status_three){}

                $result =  $db -> dbEditProduct($product_id, $product_name, $product_description, $product_cost, $product_size, $product_quantity,
                    $product_color, $product_material, $product_category, $product_type, $image_path_one, $image_path_two, $image_path_three);

                if($result) {
                    $response["success"] = 1;
                    $response["message"] = "Edit Product Successful";
                    return json_encode($response);

                } else {

                    $response["success"] = 0;
                    $response["message"] = "Edit Product Failed";
                    return json_encode($response);

                }

            }
            else
            {
                $response["success"] = 0;
                $response["message"] = "Product Not Found";
                return json_encode($response);
            }
        }
        else {
            $response["success"] = 0;
            $response["message"] = "User Not Found";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function addToCart($user_id, $product_id)
{
    $db = $this -> db;
    if($db -> dbCheckSingleProductExists($product_id))
    {
        if(!($db -> dbCheckSingleProductExistsInCart($user_id, $product_id)))
        {
            $result =  $db -> dbAddToCart($user_id, $product_id);


            if($result) {
                $response["success"] = 1;
                $response["message"] = "Add To Cart Succesful";
                return json_encode($response);

            } else {

                $response["success"] = 0;
                $response["message"] = "Add To Cart Failed";
                return json_encode($response);

            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Product Already In Cart";
            return json_encode($response);
        }

    }
    else
    {
        $response["success"] = 0;
        $response["message"] = "Product Not Found";
        return json_encode($response);
    }
}
public function saveRating($user_id, $rating)
{
    $db = $this -> db;

    if (!empty($user_id) && !empty($rating)) {
        if($db -> dbCheckUserExistWithId($user_id,1))
        {
            $result = $db -> dbSaveRating($user_id, $rating);

            if($result) {

                $response["success"] = 1;
                $response["message"] = "Seller Rated Successfully";
                return json_encode($response);

            } else {

                $response["success"] = 0;
                $response["message"] = 'Seller Rating Failed';
                return json_encode($response);

            }
        }
        else{
            $response["success"] = 0;
            $response["message"] = 'Seller Not Found';
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function removeFromCart($user_id, $cart_id)
{
    $db = $this -> db;

    if($db -> dbCheckCartItemExists($cart_id))
    {
        $result = $db -> dbRemoveFromCart($cart_id);

        if($result) {

            $response["success"] = 1;
            $response["message"] = "Remove From Cart Successfull";
            return json_encode($response);

        } else {

            $response["success"] = 0;
            $response["message"] = 'Remove From Cart Failed';
            return json_encode($response);

        }
    }
    else{
        $response["success"] = 0;
        $response["message"] = "No Such Product In Cart";
        return json_encode($response);
    }
}
public function saveOrder($user_id)
{
    $db = $this -> db;

    if(!empty($user_id))
    {
        if($db -> dbCheckCartItemExistsByUserId($user_id))
        {
            $unique_order_id = $this -> getRandomString(10);
            $result = $db -> dbSaveOrder($user_id,$unique_order_id);

            if(!$result) {

                $response["success"] = 0;
                $response["message"] = 'Save Order Failed';
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["order"] = $result;
                $response["message"] = "Save Order Successfull";
                return json_encode($response);
            }

        }
        else{
            $response["success"] = 0;
            $response["message"] = "No Product In Cart";
            return json_encode($response);
        }

    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function fetchOrders($id)
{
    $db = $this -> db;

    if(!empty($id))
    {
        if($db -> dbCheckOrdersExistMine($id))
        {
            $result = $db->dbFetchOrders($id);

            if (!$result) {

                $response["success"] = 0;
                $response["message"] = "Orders Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Orders Fetched Successfully";
                $response["orderArray"] = $result;
                return json_encode($response);

            }
        }
        else{
            $response["success"] = 0;
            $response["message"] = "No Orders Found";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function fetchCompletedOrders($id)
{
        $db = $this -> db;

        if(!empty($id))
        {
            if($db -> dbCheckCompletedOrdersExistMine($id))
            {
                $result = $db->dbFetchCompletedOrders($id);

                if (!$result) {

                    $response["success"] = 0;
                    $response["message"] = "Orders Fetch Failed";
                    return json_encode($response);

                } else {

                    $response["success"] = 1;
                    $response["message"] = "Orders Fetched Successfully";
                    $response["orderArray"] = $result;
                    return json_encode($response);

                }
            }
            else{
                $response["success"] = 0;
                $response["message"] = "No Completed Orders Found";
                return json_encode($response);
            }
        }
        else{
            return $this -> getMsgParamNotEmpty();
        }
}
public function fetchSellers($order_id)
{
    $db = $this -> db;

    if(!empty($order_id))
    {
        if($db -> dbCheckOrderExists($order_id))
        {
            $result = $db->dbFetchSellers($order_id);

            if (!$result) {

                $response["success"] = 0;
                $response["message"] = "Sellers Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Sellers Fetched Successfully";
                $response["sellerArray"] = $result;
                return json_encode($response);

            }
    }
        else
        {
            $response["success"] = 0;
            $response["message"] = "No Sellers Found In Order";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }

}
public function fetchOrderDetails($order_id)
{
    $db = $this -> db;

    if(!empty($order_id))
    {
        if($db -> dbCheckOrderExists($order_id))
        {
            $result = $db->dbFetchOrderDetails($order_id);

            if (!$result) {

                $response["success"] = 0;
                $response["message"] = "Order Products Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Order Products Fetched Successfully";
                $response["orderDetailsArray"] = $result;
                return json_encode($response);

            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "No Products Found In Order";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function fetchActivity($id)
{
    $db = $this -> db;

    if(!empty($id))
    {
        if($db -> dbCheckActivitiesExists($id))
        {
            $result = $db->dbFetchActivities($id);

            if (!$result) {

                $response["success"] = 0;
                $response["message"] = "Activities Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Activities Fetched Successfully";
                $response["activityArray"] = $result;
                return json_encode($response);

            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "No Activity Found";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function addToDiscounts($data)
{
    $db = $this -> db;

    if(!(empty($data -> user_id) || empty($data -> product_id) || empty($data -> discount_price) || empty($data -> start_time) || empty($data ->end_time)))
    {
        $user_id = $data -> user_id;
        $product_id = $data -> product_id;
        $discount_price = $data -> discount_price;
        $start_time = $data -> start_time;
        $end_time = $data ->end_time;
        if($db -> dbCheckProductExistsById($product_id))
        {

            if(!($db -> dbCheckIfProductAlreadyDiscounted($product_id, $start_time, $end_time)))
            {
                $result = $db->dbAddToDiscounts($discount_price, $product_id, $start_time, $end_time);

                if ($result) {

                    $response["success"] = 1;
                    $response["message"] = "Discount Added Successfully";
                    return json_encode($response);

                } else {

                    $response["success"] = 0;
                    $response["message"] = "Add Discount Failed";
                    return json_encode($response);

                }
            }
            else
            {
                $response["success"] = 0;
                $response["message"] = "Product Already Discounted";
                return json_encode($response);
            }
        }
        else{
            $response["success"] = 0;
            $response["message"] = "Product Not Found";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function fetchDiscounts()
{
    $db = $this -> db;

    if($db -> dbCheckDiscountsExist())
    {
        $result = $db->dbFetchDiscounts();

        if (!$result) {

            $response["success"] = 0;
            $response["message"] = "Discounts Fetch Failed";
            return json_encode($response);

        } else {

            $response["success"] = 1;
            $response["message"] = "Discounts Fetched Successfully";
            $response["discountArray"] = $result;
            return json_encode($response);

        }
    }
    else
    {
        $response["success"] = 0;
        $response["message"] = "No Discount Found";
        return json_encode($response);
    }
}
public function confirmReceipt($unique_order_id, $user_id)
{
    $db = $this -> db;

    if(!empty($unique_order_id) && !empty($user_id))
    {
        if($db -> dbCheckOrderExistsByUniqueId($unique_order_id))
        {
            $result = $db->dbConfirmReceipt($unique_order_id);

            if ($result) {

                $response["success"] = 1;
                $response["message"] = "Order Receipt Confirmed";
                return json_encode($response);

            } else {

                $response["success"] = 0;
                $response["message"] = "Order Receipt Failed";
                return json_encode($response);

            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Order Not Found";
            return json_encode($response);
        }
    }
    else
    {
        return $this -> getMsgParamNotEmpty();
    }
}
public function deleteAllUserProducts($user_id)
{
    $db = $this -> db;
    if(!empty($user_id)) {
        if ($db->dbCheckProductsExistMine($user_id)) {
            $result = $db->dbDeleteProductsMine($user_id);

            if ($result) {

                $response["success"] = 1;
                $response["message"] = "Delete Products Successful";
                return json_encode($response);

            } else {

                $response["success"] = 0;
                $response["message"] = "Delete Products Failed";
                return json_encode($response);
            }
        } else {
            $response["success"] = 0;
            $response["message"] = "No Products Found";
            return json_encode($response);
        }
    }
    else
    {
        return $this -> getMsgParamNotEmpty();
    }
}
public function deleteProduct($user_id, $product_id)
{
    $db = $this -> db;
    if(!empty($user_id) && !empty($product_id)) {
        if($db -> dbCheckProductExistsById($product_id))
        {
            $result = $db->dbDeleteProduct($product_id);

            if ($result) {

                $response["success"] = 1;
                $response["message"] = "Delete Product Successful";
                return json_encode($response);

            } else {

                $response["success"] = 0;
                $response["message"] = "Delete Product Failed";
                return json_encode($response);
            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Product Not Found";
            return json_encode($response);
        }
    }
    else
    {
        return $this -> getMsgParamNotEmpty();
    }
}
public function deliverProduct($user_id, $delivery_id)
{
    $db = $this -> db;
    if(!empty($user_id) && !empty($delivery_id)) {
        if($db -> dbCheckDeliveryExistsById($delivery_id))
        {
            $result = $db->dbDeliverProduct($delivery_id);

            if ($result) {

                $response["success"] = 1;
                $response["message"] = "Product Delivery Successful";
                return json_encode($response);

            } else {

                $response["success"] = 0;
                $response["message"] = "Product Delivery Failed";
                return json_encode($response);
            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Delivery Not Found";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function fetchCartCount($user_id)
{
    $db = $this -> db;
    if(!empty($user_id)) {
        if($db -> dbCheckUserExistWithId($user_id))
        {
            $result = $db->dbFetchCartCount($user_id);

            if ($result==false) {


                $response["success"] = 0;
                $response["message"] = "No Item Found In Cart";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Fetch Cart Count Successful";
                $response["int"] = $result;
                return json_encode($response);

            }
        }
        else{
            $response["success"] = 0;
            $response["message"] = "User Not Found ".$user_id;
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function facebookLogin($data)
{
    $db = $this -> db;
    $email = $data -> email;
    $full_name=$data -> full_name;
    $user_type = $data -> user_type;
    $image = base64_decode($data -> base64);
    $image_path = '';

    if(!empty($email))
    {
        if($db -> dbCheckUserExistInBuyersOrSellers($email, $user_type))
        {
            $result = $db -> dbCheckLoginFacebook($email, $user_type);
            if(!$result)
            {
                $response["success"] = 0;
                $response["message"] = "Facebook Login Not Succesfull";
                return json_encode($response);
            }
            else
            {
                $response["success"] = 1;
                $response["user"] = $result;
                $response["message"] = "Facebook Login Succesfull";
                return json_encode($response);
            }
        }
        else
        {
            if(isset($image) && $image!='')
            {
                $unique_image_id = $this -> getRandomString(10);
                $image_path = "images/uploads/profiles/".$unique_image_id.".png";
                $status = file_put_contents($image_path, $image);
            }
            $result = $db -> dbSignupFacebook($email,$full_name,$image_path,$user_type);
            if(!$result)
            {
                $response["success"] = 0;
                $response["message"] = "Facebook Login Not Succesful";
                return json_encode($response);
            }
            else
            {
                $response["success"] = 1;
                $response["user"] = $result;
                $response["message"] = "Facebook Login Succesful";
                return json_encode($response);
            }
        }
    }
    else
    {
        return $this -> getMsgParamNotEmpty();
    }

}
    public function gPlusLogin($data)
    {
        $db = $this -> db;
        $email = $data -> email;
        $full_name=$data -> full_name;
        $user_type = $data -> user_type;
        $image = base64_decode($data -> base64);
        $image_path = '';

        if(!empty($email))
        {
            if($db -> dbCheckUserExistInBuyersOrSellers($email, $user_type))
            {
                $result = $db -> dbCheckLoginFacebook($email, $user_type);
                if(!$result)
                {
                    $response["success"] = 0;
                    $response["message"] = "Google + Login Not Succesfull";
                    return json_encode($response);
                }
                else
                {
                    $response["success"] = 1;
                    $response["user"] = $result;
                    $response["message"] = "Google + Login Succesfull";
                    return json_encode($response);
                }
            }
            else
            {
                if(isset($image) && $image!='')
                {
                    $unique_image_id = $this -> getRandomString(10);
                    $image_path = "images/uploads/profiles/".$unique_image_id.".png";
                    $status = file_put_contents($image_path, $image);
                }
                $result = $db -> dbSignupFacebook($email,$full_name,$image_path,$user_type);
                if(!$result)
                {
                    $response["success"] = 0;
                    $response["message"] = "Google + Login Not Succesful";
                    return json_encode($response);
                }
                else
                {
                    $response["success"] = 1;
                    $response["user"] = $result;
                    $response["message"] = "Google + Login Succesful";
                    return json_encode($response);
                }
            }
        }
        else
        {
            return $this -> getMsgParamNotEmpty();
        }

    }
public function getRandomString($length)
{
	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$random_string = '';
	$max = strlen($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
			$random_string .= $characters[mt_rand(0, $max)];
	}
	return strtoupper($random_string);
}
public function fetchCart($id)
{
    $db = $this -> db;

    if(!empty($id))
    {
        if($db -> dbCheckCartItemExistsByUserId($id))
        {
            $result = $db->dbFetchCart($id);
            return $result;
            /*if (!$result) {

                $response["success"] = 0;
                $response["message"] = "Cart Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Cart Fetched Successfully";
                $response["cartArray"] = $result;
                return json_encode($response);

            }*/
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "No Products Found In Cart";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function fetchDeliveries($id, $delivered)
{
    $db = $this -> db;

    if(!empty($id))
    {
        if($db -> dbCheckDeliveriesExistsByUserId($id,$delivered))
        {
            $result = $db->dbFetchDeliveries($id,$delivered);

            if (!$result) {

                $response["success"] = 0;
                $response["message"] = "Deliveries Fetch Failed";
                return json_encode($response);

            } else {

                $response["success"] = 1;
                $response["message"] = "Deliveries Fetched Successfully";
                $response["deliveriesArray"] = $result;
                return json_encode($response);

            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "No Delivery Found";
            return json_encode($response);
        }
    }
    else{
        return $this -> getMsgParamNotEmpty();
    }
}
public function saveShipmentCost($id, $order_id, $shipment_cost)
{
    $db = $this -> db;
    if(!empty($id) && !empty($order_id) && !empty($shipment_cost))
    {
        if($db -> dbCheckOrderExists($order_id))
        {
            $result = $db -> saveShipmentCostToOrders($order_id,$shipment_cost);
            if($result)
            {
                $response["success"] = 1;
                $response["message"] = "Shipment Cost Saved";
                return json_encode($response);
            }
            else
            {
                $response["success"] = 0;
                $response["message"] = "Saving Shipment Cost Failed";
                return json_encode($response);
            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Order Not Found";
            return json_encode($response);
        }
    }
    else {

        return $this -> getMsgParamNotEmpty();
    }

}
public function saveAddPress($data)
{
	$db = $this -> db;
	
	$id = $data -> id;
    $order_id = $data -> order_id;
    $latitude = $data -> latitude;
    $longitude = $data -> longitude;
	$shipment_cost = $data -> shipment_cost;
	
	if(!empty($id) && !empty($order_id) && !empty($latitude) && !empty($longitude) && !empty($shipment_cost))
	{
		$unique_location_id = $this -> getRandomString(10);
		$result = $db -> addLocation($unique_location_id,$latitude,$longitude);
		if($result)
		{
			$result = $db -> saveLocationToOrders($unique_location_id,$order_id,$shipment_cost);
			if($result)
			{
				$response["success"] = 1;
				$response["message"] = "Delivery Address Confirmed";
				return json_encode($response);
			}
			else
			{
				$response["success"] = 0;
				$response["message"] = "Save Delivery Address Failed";
				return json_encode($response);
			}
		}
		else
		{
			$response["success"] = 0;
            $response["message"] = "Save Delivery Address Failed";
            return json_encode($response);
		}
	}
	else {

        return $this -> getMsgParamNotEmpty();	
	}
	
}
public function validatePaypalPayment($buyer_email, $transaction_id, $unique_paypal_id, $res)
{
    $db = $this -> db;

    if(!empty($buyer_email) && !empty($transaction_id))
    {
        if(!($db -> dbCheckPaypalPaymentExistsByOrderId($transaction_id)))
        {
            $id = $db -> dbGetUserIdFromOrderUniqueId($transaction_id);

            $result = $db -> dbSavePaypalPayment($id, $transaction_id, $unique_paypal_id, 0, $res);

            if($result) {
                if (strcmp($res, "VERIFIED") == 0) {

                    $result = $db->dbSavePaypalPaymentToOrders($transaction_id, 3, $unique_paypal_id, 2);

                    if ($result) {
                        $this -> createPaymentConfirmationMessage($transaction_id,2);
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            $result = $db -> dbUpdatePaypalPayment($transaction_id, $res);

            if($result)
            {
                if (strcmp ($res, "VERIFIED") == 0) {

                    $result = $db->dbSavePaypalPaymentToOrders($transaction_id, 3, $unique_paypal_id, 2);

                    if ($result) {
                        $this -> createPaymentConfirmationMessage($transaction_id,2);
                        return true;
                    } else {
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
    }
    else {

        return false;
    }

}
public function savePaypal($data)
{
	$db = $this -> db;
	
	$id = $data -> id;
    $order_id = $data -> order_id;
	$payment_method = $data -> payment_method;
	$paypal_create_time = $data -> create_time;
	$paypal_unique_id = $data -> paypal_unique_id;
	$paypal_state = $data -> state;
	$status=3;

    if(!empty($id) && !empty($order_id) && !empty($payment_method) && !empty($paypal_create_time) && !empty($paypal_unique_id) && !empty($paypal_state))
    {
        if(!($db -> dbCheckPaypalPaymentExists($paypal_unique_id)))
        {
            $result = $db -> dbSavePaypalPayment($id, $order_id, $paypal_unique_id, $paypal_create_time, $paypal_state);

            if($result)
            {
                $result = $db -> dbSavePaypalPaymentToOrders($order_id, $status, $paypal_unique_id, $payment_method);
                $result = true;

                if($result)
                {
                    $response["success"] = 1;
                    $response["message"] = "Payment Saved Succesfully";
                    return json_encode($response);
                }
                else
                {
                    $response["success"] = 0;
                    $response["message"] = "Save Payment Failed";
                    return json_encode($response);
                }
            }
            else
            {
                $response["success"] = 0;
                $response["message"] = "Save Payment Failed";
                return json_encode($response);
            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Payment Already Saved";
            return json_encode($response);
        }
    }
    else {

        return $this -> getMsgParamNotEmpty();
    }
}
public function initiateDelivery($id, $order_id)
{
    $db = $this -> db;

    if(!empty($id) && !empty($order_id))
    {
        if($db -> dbCheckUserExistWithId($id) && $db -> dbCheckOrderExists($order_id))
        {
            $result = $db -> dbInitiateDelivery($id, $order_id);

            if ($result)
            {
                $response["success"] = 1;
                $response["message"] = "Delivery Initiated Successfully";
                return json_encode($response);
            }
            else
            {
                $response["success"] = 0;
                $response["message"] = "Delivery Initiation Failed";
                return json_encode($response);
            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Order Not Found";
            return json_encode($response);
        }
    }
    else {

        return $this -> getMsgParamNotEmpty();
    }
}
public function savePesapalPayment($reference, $pesapal_tracking_id)
{
    $db = $this -> db;

    if(!empty($reference) && !empty($pesapal_tracking_id))
    {
        if(!($db -> dbCheckPesapalPaymentExists($reference, $pesapal_tracking_id)))
        {
            $pesapal_unique_id = "PESA-".($this -> getRandomString(10));
            $result = $db -> dbSavePesapalPayment($pesapal_unique_id, $reference, $pesapal_tracking_id);

            if($result)
            {
                $response["success"] = 1;
                $response["message"] = "Pesapal Payment Saved Succesfully";
                return json_encode($response);
            }
            else
            {
                $response["success"] = 0;
                $response["message"] = "Pesapal Payment Saving Failed";
                return json_encode($response);
            }
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Pesapal Payment Already Saved";
            return json_encode($response);
        }

    }
    else {

        return $this -> getMsgParamNotEmpty();
    }

}
public function updatePesapalPayment($status,$pesapal_merchant_reference)
{
    $db = $this -> db;

    if(!empty($status) && !empty($pesapal_merchant_reference))
    {
        $result = $db -> dbUpdatePesapalPayment($status,$pesapal_merchant_reference);

        if($result)
    {
        $this -> createPaymentConfirmationMessage($pesapal_merchant_reference,1);
    }

        return $result;
    }
    else {

    return $this -> getMsgParamNotEmpty();
    }
}
public function updateOrderPaymentFromPesapalIpn($status, $pesapalTrackingId, $pesapal_merchant_reference)
{

    $db = $this -> db;

    if(!empty($status) && !empty($pesapalTrackingId) && !empty($pesapal_merchant_reference))
    {
        return $db -> dbUpdateOrderPaymentFromPesapalIpn($status, $pesapalTrackingId, $pesapal_merchant_reference);
    }
    else {

        return $this -> getMsgParamNotEmpty();
    }
}
public function sendMail($mail_To, $mail_Subject, $mail_message)
{
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= "From: info@sproos.co.ke";
    mail($mail_To, $mail_Subject, $mail_message, $headers);
}
public function createPaymentConfirmationMessage($order_id,$payment_method)
{
    $db = $this -> db;

    $user = $db -> dbGetUserFromOrderUniqueId($order_id);

    $payment_method_str = ($payment_method==1)?'Pesapal':'Paypal';
    $mail_message = "<html><head></head><body style=\"font-family:Arial,Helvetica,sans-serif;font-size:12pt\"><p>Dear ".$user->full_name."</p>";
    $mail_message .= "<p> Your ".$payment_method_str." payment for Order Id: ".$order_id." has been confirmed</p>";
    $mail_message .= "<p>Thank you for your shopping with us.</p>";
    $mail_message .= "<p>Regards<br/>Sproos Shopping Platform</p>";
    $mail_message .= "<p><link>www.sproos.co.ke</link></p> </body></html>";

    $this -> sendMail($user -> email, "Payment Confirmation",$mail_message);
}
public function isEmailValid($email){

  return filter_var($email, FILTER_VALIDATE_EMAIL);
}
public function getMsgParamNotEmpty(){

  $response["success"] = 0;
  $response["message"] = "Parameters should not be empty !";
  return json_encode($response);

}

public function getMsgInvalidParam(){

  $response["success"] = 0;
  $response["message"] = "Invalid Parameters";
  return json_encode($response);

}

public function getMsgInvalidEmail(){

  $response["success"] = 0;
  $response["message"] = "Invalid Email";
  return json_encode($response);

}
}