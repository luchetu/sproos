<?php

require_once 'Encryption.php';
require_once 'include/dbConnect.php';

class DBOperations{

    public $enc;
	private $conn;

public function __construct() {
	
	$this -> conn = dbConnect::getInstance();
	$this -> enc = new Encryption();

}
 public function dbCheckUserExist($username){

    $sql = 'SELECT COUNT(*) from user WHERE email =:email OR username =:username';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array('email' => $username,'username' => $username));
    return $query ? ($query -> fetchColumn())==0 ? false : true : false;
 }
 public function dbCheckUserExistInBuyersOrSellers($username, $user_type){

        $sql = 'SELECT COUNT(*) from '.($user_type ==1 ? 'sellers' : 'users').' WHERE email =:email OR username =:username';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('email' => $username,'username' => $username));
        return $query ? ($query -> fetchColumn())==0 ? false : true : false;
 }
 public function dbCheckUserEmailExist($email, $user_type)
 {
     $sql = 'SELECT COUNT(*) from '.($user_type ==1 ? 'seller' : 'user').' WHERE email =:email';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array('email' => $email));
     return $query ? ($query -> fetchColumn())==0 ? false : true : false;
 }
 public function dbCheckUserUsernameExist($username, $user_type)
 {
     $sql = 'SELECT COUNT(*) from '.($user_type ==1 ? 'seller' : 'user').' WHERE username =:username';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array('username' => $username));
     return $query ? ($query -> fetchColumn())==0 ? false : true : false;
 }
 public function dbCheckUserExistWithId($id, $user_type){

        $sql = 'SELECT COUNT(*) from '.($user_type ==1 ? 'sellers' : 'users').' WHERE id =:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('id' => $id));
        return $query ? ($query -> fetchColumn())==0 ? false : true : false;
    }
    public function dbCheckUserExistInUserTypeWithId($id,$user_type){

        $sql = 'SELECT COUNT(*) from '.($user_type ==1 ? 'sellers' : 'users').' WHERE id =:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('id' => $id));
        return $query ? ($query -> fetchColumn())==0 ? false : true : false;
    }
 public function dbCheckLocationExistWithUniqueId($id){

        $sql = 'SELECT COUNT(*) from location WHERE unique_location_id =:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('id' => $id));
        return $query ? ($query -> fetchColumn())==0 ? false : true : false;
 }
 public function dbCheckSingleProductExists($id)
 {

        $sql = 'SELECT COUNT(*) from products where id=:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $id));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckCartItemExists($cart_id)
 {

        $sql = 'SELECT COUNT(*) from cart where id=:id and cancelled=:cancelled';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $cart_id,':cancelled' => 0));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckCartItemExistsByUserId($user_id)
 {
        $sql = 'SELECT COUNT(*) from cart where user_id=:id and cancelled=:cancelled';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $user_id,':cancelled' => 0));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckSingleProductExistsInCart($user_id, $product_id)
  {

        $sql = 'SELECT COUNT(*) from cart where product_id=:product_id and user_id =:user_id and cancelled=:cancelled';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':product_id' => $product_id, ':user_id' => $user_id, ':cancelled' => 0));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
  }
 public function dbCheckProductsExist()
 {
        $sql = 'SELECT COUNT(*) from products';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array());

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckFeaturedProductsExist()
 {
        $sql = 'SELECT COUNT(*) from featured where is_active=:is_active';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array("is_active" => 1));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckDiscountsExist()
 {
     $sql = 'SELECT COUNT(*) from discounts where NOW() BETWEEN start_date AND end_date';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array());

     if($query){

         $row_count = $query -> fetchColumn();

         if ($row_count == 0){

             return false;

         } else {

             return true;

         }
     } else {

         return false;
     }
 }
 public function dbCheckProductsExistMine($id)
 {
        $sql = 'SELECT COUNT(*) from products where seller_id=:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $id));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckProductExistsById($id)
    {
        $sql = 'SELECT COUNT(*) from products where id=:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $id));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
    }
 public function dbCheckActivitiesExists($id)
 {
     $sql = 'SELECT COUNT(*) from activity where id=:id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $id));

     if($query){

         $row_count = $query -> fetchColumn();

         if ($row_count == 0){

             return false;

         } else {

             return true;

         }
     } else {

         return false;
     }
 }
 public function dbCheckProductsExistInCategory($category)
 {
     $sql = 'SELECT COUNT(*) from products where category_id=:category';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':category' => $category));

     if($query){

         $row_count = $query -> fetchColumn();

         if ($row_count == 0){

             return false;

         } else {

             return true;

         }
     } else {

         return false;
     }
 }
 public function dbCheckOrderExists($order_id)
 {
        $sql = 'SELECT COUNT(*) from orders where unique_order_id=:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $order_id));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
 }
 public function dbCheckOrderExistsByUniqueId($unique_order_id)
 {
     $sql = 'SELECT COUNT(*) from orders where unique_order_id=:id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $unique_order_id));

     if($query){

         $row_count = $query -> fetchColumn();

         if ($row_count == 0){

             return false;

         } else {

             return true;

         }
     } else {

         return false;
     }
 }
 public function dbCheckCompletedOrdersExistMine($id)
    {

        $sql = 'SELECT COUNT(*) from orders where user_id=:id and status=:status';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $id,':status' => 4));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
    }
 public function dbCheckDeliveriesExistsByUserId($id,$delivered)
 {
     $sql = 'SELECT COUNT(*) from deliveries where user_id=:id and delivered=:delivered';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $id,':delivered' => $delivered));

     if($query){

         $row_count = $query -> fetchColumn();

         if ($row_count == 0){

             return false;

         } else {

             return true;

         }
     } else {

         return false;
     }
 }
 public function dbCheckOrdersExistMine($id)
    {
        $sql = 'SELECT COUNT(*) from orders where user_id=:user_id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':user_id' => $id));

        if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
    }
 public function dbCheckIfProductAlreadyDiscounted($product_id, $start_time, $end_time)
 {
     $sql = 'SELECT COUNT(*) from discounts where product_id=:product_id and NOW() BETWEEN :start_date AND :end_date ';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':product_id' => $product_id, 'start_date' => $start_time, ':end_date' => $end_time));

     if($query){

         $row_count = $query -> fetchColumn();

         if ($row_count == 0){

             return false;

         } else {

             return true;

         }
     } else {

         return false;
     }
 }
 public function dbGetUserIdFromOrderUniqueId($transaction_id)
 {
     $sql = 'SELECT * from orders where unique_order_id=:unique_order_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':unique_order_id' => $transaction_id));
     $order = $query -> fetchObject();
     return $order -> user_id;

 }
 public function dbGetUserFromOrderUniqueId($transaction_id)
 {
     $sql = 'SELECT * from orders where unique_order_id=:unique_order_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':unique_order_id' => $transaction_id));
     $order = $query -> fetchObject();
     $user_id = $order -> user_id;

     $sql = 'SELECT * from user where id=:id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $user_id));
     $user = $query -> fetchObject();
     return $user;
 }
 public function dbCheckPaypalPaymentExists($paypal_unique_id)
 {
     $sql = 'SELECT COUNT(*) from paypals where paypal_unique_id=:paypal_unique_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':paypal_unique_id' => $paypal_unique_id));
     return $query ? (($query -> fetchColumn())==0) ? false : true : false;
 }
 public function  dbCheckPaypalPaymentExistsByOrderId($transaction_id)
 {
     $sql = 'SELECT COUNT(*) from paypal where order_id=:order_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':order_id' => $transaction_id));
     return $query ? (($query -> fetchColumn())==0) ? false : true : false;
 }
 public function dbCheckDeliveryExistsById($id)
 {
        $sql = 'SELECT COUNT(*) from deliveries where id=:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':id' => $id));

        if($query){

            $row_count = $query -> fetchColumn();

            return $row_count == 0 ? false : true;

        } else {

            return false;
        }
 }
 public function  dbCheckPesapalPaymentExists($reference, $pesapal_tracking_id)
 {
     $sql = 'SELECT COUNT(*) from pesapals where order_id=:order_id and tracking_id=:tracking_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':order_id' => $reference,':tracking_id' => $pesapal_tracking_id));

     if($query){

         $row_count = $query -> fetchColumn();

         return $row_count == 0 ? false : true;

     } else {

         return false;
     }
 }
 public function dbCheckLogin($username, $password, $user_type) {

    $sql = 'SELECT * from '.($user_type ==1 ? 'sellers' : 'users').' WHERE email =:email OR username =:username';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array('email' => $username,'username' => $username));
    $data = $query -> fetchObject();
    $password_from_db = $data -> password;

    if ($this -> enc ->passwordVerify($password,$password_from_db)) {
        $latitude= $data -> latitude;
        $longitude=$data -> longitude;
        if(!empty($latitude) && !empty($longitude)) {
            $location = new stdClass();
            $location->{"latitude"} = $latitude;
            $location->{"longitude"} = $longitude;
            $data->{"location"} = $location;
        }
        else
        {
            $location = new stdClass();
            $location->{"latitude"} = 0.0;
            $location->{"longitude"} = 0.0;
            $data->{"location"} = $location;
        }
        $data->{"phone"} = $data->phonenumber;
        $data->{"full_name"} = $data->first_name." ".$data->last_name;
        $data -> {'isSeller'} = $user_type == 1 ? true : false;
        return $data;

    } else {

        return false;
    }

 }
 public function dbCheckLoginFacebook($email, $user_type) {

        $sql = 'SELECT * from '.($user_type ==1 ? 'sellers' : 'users').' WHERE email =:email';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('email' => $email));
        $data = $query -> fetchObject();
        if (isset($data)) {
            $latitude=$data->latitude;
            $longitude=$data->longitude;
            if(!empty($latitude) && !empty($longitude)) {
                $location = new stdClass();
                $location->{"latitude"} = $latitude;
                $location->{"longitude"} = $longitude;
                $data->{"location"} = $location;
            }
            else
            {
                $location = new stdClass();
                $location->{"latitude"} = 0.0;
                $location->{"longitude"} = 0.0;
                $data->{"location"} = $location;
            }

            $data->{"phone"} = $data->phonenumber;
            $data->{"full_name"} = $data->first_name.' '.$data->last_name;
            $data -> {'isSeller'} = $user_type == 1 ? true : false;
            return $data;

        } else {

            return false;
        }

 }
 public function dbCheckLoginWithId($id, $user_type, $password) {

        $sql = 'SELECT * from '.($user_type ==1 ? 'sellers' : 'users').' WHERE id =:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('id' => $id));
        $data = $query -> fetchObject();
        $password_from_db = $data -> password;

        if ($this -> enc ->passwordVerify($password,$password_from_db)) {

            $user = $data;
            return $user;

        } else {

            return false;
        }

 }
 public function dbInsertUser($email, $username, $password, $user_type)
 {
    $sql = 'INSERT INTO '.($user_type ==1 ? 'seller' : 'user').' SET username =:username,email =:email,password =:password';
	$query = $this ->conn ->prepare($sql);
 	$query->execute(array('username' => $username, ':email' => $email,':password' => $this -> enc ->getEncryptedPassword($password)));
	return $query ? true : false;
 }
 public function dbSaveLocation($unique_location_id,$latitude,$longitude)
 {
     $sql = 'INSERT INTO location SET unique_location_id =:unique_location_id,latitude =:latitude,longitude =:longitude';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('unique_location_id' => $unique_location_id, ':latitude' => $latitude,':longitude' => $longitude));
     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbSignupFacebook($email,$full_name,$image_path,$user_type)
 {
     $sql = 'INSERT INTO '.($user_type ==1 ? 'sellers' : 'users').' SET email =:email,first_name =:full_name,icon =:icon';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('email' => $email, ':full_name' => $full_name,':icon' => $image_path));
     if ($query) {

         $sql = 'SELECT * from '.($user_type ==1 ? 'sellers' : 'users').' WHERE email =:email';
         $query = $this -> conn -> prepare($sql);
         $query -> execute(array('email' => $email));
         $data = $query -> fetchObject();

         if (isset($data)) {
             $latitude=$data->latitude;
             $longitude=$data->longitude;
             if(!empty($latitude) && !empty($longitude)) {
                 $location = new stdClass();
                 $location->{"latitude"} = $latitude;
                 $location->{"longitude"} = $longitude;
                 $data->{"location"} = $location;
             }
             else
             {
                 $location = new stdClass();
                 $location->{"latitude"} = 0.0;
                 $location->{"longitude"} = 0.0;
                 $data->{"location"} = $location;
             }
             $data->{"phone"} = $data->phonenumber;
             $data->{"full_name"} = $data->first_name." ".$data->last_name;
             $data -> {'isSeller'} = $user_type == 1 ? true : false;
             return $data;

         } else {

             return false;
         }

     } else {

         return false;

     }
 }
 public function dbUpdateUser($id, $phone, $full_name, $city, $postal, $country, $image_path, $upload_image_status, $user_type,$latitude,$longitude)
 {
	$sql = $upload_image_status ?  'UPDATE '.($user_type ==1 ? 'sellers' : 'users').' SET phonenumber = :phone, first_name = :full_name,last_name = :last_name, city = :city, address = :postal, country = :country, icon = :image_path, latitude=:latitude, longitude=:longitude WHERE id = :id'
			: 'UPDATE '.($user_type ==1 ? 'sellers' : 'users').' SET phonenumber = :phone, first_name = :full_name, last_name = :last_name, city = :city, address = :postal, country = :country, latitude=:latitude, longitude=:longitude WHERE id = :id';
    $query = $this -> conn -> prepare($sql);
    $query -> execute($upload_image_status ?  array(':phone' => $phone, ':full_name' => $full_name, ':last_name' =>"", ':city' => $city, ':postal' => $postal, ':country' => $country, ':image_path' => $image_path, ':id' => $id, ':latitude' => $latitude, ':longitude' => $longitude) : array(':phone' => $phone, ':full_name' => $full_name, ':last_name' =>"", ':city' => $city, ':postal' => $postal, ':country' => $country, ':id' => $id, ':latitude' => $latitude, ':longitude' => $longitude));

    if ($query) {
        $sql = 'SELECT * from '.($user_type ==1 ? 'sellers' : 'users').' WHERE id =:id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array('id' => $id));
        $data = $query -> fetchObject();
        if(!empty($latitude) && !empty($longitude)) {
            $location = new stdClass();
            $location->{"latitude"} = $latitude;
            $location->{"longitude"} = $longitude;
            $data->{"location"} = $location;
        }
        else
        {
            $location = new stdClass();
            $location->{"latitude"} = 0.0;
            $location->{"longitude"} = 0.0;
            $data->{"location"} = $location;
        }
        $data->{"phone"} = $data->phonenumber;
        $data->{"full_name"} = $data->first_name." ".$data->last_name;
        $data -> {'isSeller'} = $user_type == 1 ? true : false;
        return $data;

    } else {

        return false;

    } 
 }
 public function dbChangePassword($id, $user_type, $password){

        $sql = 'UPDATE '.($user_type ==1 ? 'sellers' : 'users').' SET password = :password WHERE id = :id';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':password' => $password, ':id' => $id));
        return $query ? true : false;

 }
 public function dbFetchProducts()
 {
     $sql = "select * from products where deleted=:deleted ORDER BY id DESC";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':deleted' => 0));
     $data = $query -> fetchAll(PDO::FETCH_OBJ);
     if(isset($data))
     {
         foreach ($data as $key => $product)
         {
             $id=$product->seller_id;
             $sql = "select * from sellers where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $id));
             $user = $query -> fetchObject();
             if(isset($user))
             {
                 $data[$key] -> {'seller'} = $user;
             }
             $data[$key] -> {'icon'} = $product->image;
             $data[$key] -> {'icon2'} = $product->image2;
             $data[$key] -> {'icon3'} = $product->image3;
             $data[$key] -> {'cost'} = $product->price;
             $data[$key] -> {'quantity'} = $product -> stock;
         }
         return $data;
     }
     else{
         return false;
     }



 }
 public function dbFetchFeaturedProducts()
 {
	 $sql = "select * from featured where is_active=:is_active ORDER BY id DESC";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':is_active' => 1));
     $data = $query -> fetchAll(); 
	 $products = array();
	 if(isset($data))
     {
         foreach ($data as $key => $featured)
         {
             $product_id=$featured['product_id'];
			 if($this -> dbCheckSingleProductExists($product_id))
			 {
				 $sql = "select * from products where id=:id and deleted=:deleted";
				 $query = $this -> conn -> prepare($sql);
				 $query -> execute(array(':id' => $product_id,':deleted' => 1));
				 $product = $query -> fetchObject();
				 $id= $product -> user_id;
				 $sql = "select * from user where id=:id";
				 $query = $this -> conn -> prepare($sql);
				 $query -> execute(array(':id' => $id));
				 $user = $query -> fetchObject();
				 if(isset($user))
				 {
					 $product -> {'seller'} = $user;
				 }
				 array_push($products, $product);
			 }
         }


         return $products;
     }
     else{
         return false;
     }
 }
 public function dbFetchProduct($id)
 {
        $sql = "select * from products where deleted=:deleted and id=:id";
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':deleted' => 0,':id' => $id));
        $data = $query -> fetchObject();
        if(isset($data))
        {
            return $data;
        }
        else{
            return false;
        }



 }
 public function dbDeleteProductsMine($user_id)
 {
     $sql = "select * from products where deleted=:deleted and user_id=:id ORDER BY id DESC";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':deleted' => 0, ':id' => $user_id));
     $data = $query -> fetchAll();
     if(isset($data))
     {
         foreach ($data as $key => $product)
         {
             $product_id=$product['id'];
             $sql = 'UPDATE products SET deleted = :deleted WHERE id = :id';
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':deleted' => 1, ':id' => $product_id));
             if ($query) {} else {}
         }
         return true;
     }
     else{
         return false;
     }

 }
 public function dbDeleteProduct($product_id)
 {
     $sql = 'UPDATE products SET deleted = :deleted WHERE id = :id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':deleted' => 1, ':id' => $product_id));
     return $query ? true : false;
 }
 public function dbDeliverProduct($delivery_id)
 {
     $sql = 'UPDATE deliveries SET delivered = :delivered WHERE id = :id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':delivered' => 1, ':id' => $delivery_id));
     return $query ? true : false;
 }
 public function dbFetchProductsMine($id)
  {
        $sql = "select * from products where deleted=:deleted and seller_id=:id ORDER BY id DESC";
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':deleted' => 0, ':id' => $id));
        $data = $query -> fetchAll();
        if(isset($data))
        {
            foreach ($data as $key => $product)
            {
                $id=$product['seller_id'];
                $sql = "select * from sellers where id=:id";
                $query = $this -> conn -> prepare($sql);
                $query -> execute(array(':id' => $id));
                $user = $query -> fetchObject();
                if(isset($user))
                {
                    $data[$key]['seller'] = $user;
                }
                $data[$key]['icon'] = $product["image"];
                $data[$key]['icon2'] = $product["image2"];
                $data[$key]['icon3'] = $product["image3"];
                $data[$key]['cost'] = $product["price"];
                $data[$key]['quantity'] = $product["stock"];
            }


            return $data;
        }
        else{
            return false;
        }

 }
 public function dbFetchProductsInCategory($category)
 {
     $sql = "select * from products where deleted=:deleted and category_id=:category ORDER BY id DESC";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':deleted' => 0, ':category' => $category));
     $data = $query -> fetchAll(PDO::FETCH_OBJ);
     if(isset($data))
     {
         foreach ($data as $key => $product)
         {
             $id=$product -> seller_id;
             $sql = "select * from sellers where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $id));
             $user = $query -> fetchObject();
             if(isset($user))
             {
                 $product -> seller = $user;
             }
             $data[$key] -> {'icon'} = $product->image;
             $data[$key] -> {'icon2'} = $product->image2;
             $data[$key] -> {'icon3'} = $product->image3;
             $data[$key] -> {'cost'} = $product->price;
             $data[$key] -> {'quantity'} = $product -> stock;
         }


         return $data;
     }
     else{
         return false;
     }
 }
 public function dbAddCountToCart($cart_id, $user_id, $cart_count)
 {
     $sql = "UPDATE cart SET quantity=:quantity WHERE id=:cart_id";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':quantity' => $cart_count, ':cart_id' => $cart_id));

     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbAddProduct($id, $product_name, $product_description, $product_cost, $product_size, $product_quantity, $product_color, $product_material, $product_category, $product_type, $image_path_one, $image_path_two, $image_path_three)
 {
     $sql = 'INSERT INTO products SET category_id = :category_id, type_id = :type_id, seller_id = :user_id, name = :name, description= :description, image = :icon1,
              image2 = :icon2, image3 = :icon3, material = :material, color = :color, size= :size, price = :cost, stock = :quantity';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':category_id' => $product_category, ':type_id' => $product_type, ':user_id' => $id, ':name' => $product_name, ':description' => $product_description, ':icon1' => $image_path_one,
         ':icon2' => $image_path_two, ':icon3' => $image_path_three, ':material' => $product_material, ':color' => $product_color, ':size' => $product_size, ':cost' => $product_cost, ':quantity' => $product_quantity));
	 return $query ->errorInfo();
     if ($query) {
         return true;

     } else {

         return false;

     }
 }
 public function dbEditProduct($product_id, $product_name, $product_description, $product_cost, $product_size, $product_quantity, $product_color, $product_material, $product_category, $product_type, $image_path_one, $image_path_two, $image_path_three)
 {
     $sql = 'UPDATE products SET category_id = :category_id, type_id = :type_id, name = :name, description= :description, image = :icon1,
              image2 = :icon2, image3 = :icon3, material = :material, color = :color, size= :size, price = :cost, stock = :quantity where id=:id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':category_id' => $product_category, ':type_id' => $product_type, ':name' => $product_name, ':description' => $product_description, ':icon1' => $image_path_one,
         ':icon2' => $image_path_two, ':icon3' => $image_path_three, ':material' => $product_material, ':color' => $product_color, ':size' => $product_size, ':cost' => $product_cost, ':quantity' => $product_quantity, ':id' => $product_id));

     if ($query) {
         return true;

     } else {

         return false;
     }
 }
 public function dbAddToCart($user_id, $product_id)
 {
     $sql = 'INSERT INTO cart SET product_id =:product_id, user_id =:user_id, quantity =:quantity, cancelled =:cancelled';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('product_id' => $product_id, ':user_id' => $user_id,':quantity' => 1, ':cancelled' => 0));
     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbSaveRating($user_id, $rating)
 {
     $sql = 'SELECT * from sellers WHERE id =:id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $user_id));
     $data = $query -> fetchObject();
     $old_rating = $data -> rating;
     $old_num_rated = $data -> num_rated;

     $sql = 'UPDATE sellers SET rating = :rating, num_rated = :num_rated WHERE id = :id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':rating' => ((($old_rating * $old_num_rated) + $rating)/($old_num_rated +1)),':num_rated' => ($old_num_rated +1), ':id' => $user_id));

     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbRemoveFromCart($cart_id)
 {
     $sql = 'UPDATE cart SET cancelled = :cancelled WHERE id = :id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':cancelled' => 1, ':id' => $cart_id));

     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbSaveOrder($user_id,$unique_order_id)
 {
     $total_price=0;
     $total_quantity=0;
     $status=1;
     $total_discount=0;

     $sql = "select * from cart where user_id=:user_id and cancelled=:cancelled ORDER BY created_at";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':user_id' => $user_id,':cancelled' => 0));
     $data = $query -> fetchAll(PDO::FETCH_OBJ);
     foreach ($data as $key => $cartItem)
     {
         $product_id=$cartItem -> product_id;
         $quantity=$cartItem -> quantity;

         $sql = "select * from products where id=:id";
         $query = $this -> conn -> prepare($sql);
         $query -> execute(array(':id' => $product_id));

         $product = $query -> fetchObject();
         $price=($product->price) * $quantity;
         $total_quantity=$total_quantity+1;																			//Increment total quantity
         $total_price=$total_price+$price;

         $sql = "select * from discounts where product_id=:product_id AND NOW() BETWEEN start_date AND end_date ORDER BY created_at DESC";
         $query = $this -> conn -> prepare($sql);
         $query -> execute(array(':product_id' => $product_id));
         $data = $query -> fetchAll(PDO::FETCH_OBJ);

         foreach ($data as $key_inner => $discount)
         {
             $discount_price = $discount -> new_price;
             $original_price = $product -> price;
             $discount_units = $cartItem -> quantity;
             $total_discount = $total_discount + (($original_price - $discount_price) * $discount_units);
             $total_price = $total_price - (($original_price - $discount_price) * $discount_units);
         }
     }
     $sql = 'INSERT INTO orders SET unique_order_id =:unique_order_id,user_id =:user_id,total_quantity=:total_quantity,total_price =:total_price,discount =:discount,status =:status,tax =:tax';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array(':unique_order_id' => $unique_order_id, ':user_id' => $user_id,':total_quantity' => $total_quantity,':total_price' => $total_price,':discount' => $total_discount,':status' => $status,':tax' => ($total_price*0.16)));
     if ($query) {
         $sql = "select * from orders where unique_order_id=:unique_order_id";
         $query = $this -> conn -> prepare($sql);
         $query -> execute(array(':unique_order_id' => $unique_order_id));
         $order = $query -> fetchObject();
         $order_id = $order -> unique_order_id;
         $sql = "select * from cart where user_id=:user_id and cancelled=:cancelled ORDER BY created_at";
         $query = $this -> conn -> prepare($sql);
         $query -> execute(array(':user_id' => $user_id,':cancelled' => 0));
         $data = $query -> fetchAll(PDO::FETCH_OBJ);
         foreach ($data as $key => $cartItem)
         {
             $product_id=$cartItem->product_id;
             $quantity=$cartItem->quantity;
             $sql = "select * from products where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $product_id));
             $product = $query -> fetchObject();
             $price=($product->price) * $quantity;
             $sql = 'INSERT INTO order_details SET unique_order_id =:order_id,product_id =:product_id,quantity =:quantity,price =:price';
             $query = $this ->conn ->prepare($sql);
             $query->execute(array(':order_id' => $order_id, ':product_id' => $product_id,':quantity' => $quantity,':price' => $price));
             if ($query) {
                 $sql = "UPDATE cart SET cancelled=:cancelled WHERE id=:id";
                 $query = $this ->conn ->prepare($sql);
                 $query->execute(array(':cancelled' => 1, ':id' => ($cartItem -> id)));
                 if(!$query){}else{}
             }
             else{

             }
         }
         return $order;

     } else {

         return false;

     }

 }
 public function dbFetchSellers($order_id)
 {
     $sql = "select * from order_details where unique_order_id=:order_id";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':order_id' => $order_id));
     $data = $query -> fetchAll(PDO::FETCH_OBJ);
     $sellerArray = array();
     if(isset($data)) {
         foreach ($data as $key => $orderItem) {
             $product_id = $orderItem->product_id;
             $sql = "SELECT * FROM products WHERE id=:id";
             $query = $this->conn->prepare($sql);
             $query->execute(array(':id' => $product_id));
             $product = $query->fetchObject();
             $user_id = $product->seller_id;
             $sql = "SELECT * FROM sellers WHERE id=:id";
             $query = $this->conn->prepare($sql);
             $query->execute(array(':id' => $user_id));
             $seller = $query->fetchObject();
			  $location = new stdClass();
                $location->{"latitude"} = $seller-> latitude;
                $location->{"longitude"} = $seller -> longitude;
				$seller -> {"location"} = $location;
             array_push($sellerArray, $seller);

         }
         return $sellerArray;
     }
     else{
         return false;
     }
 }
 public function dbFetchOrders($id)
 {
     $sql = "select * from orders where user_id=:user_id ORDER BY created_at DESC";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':user_id' => $id));
     $data = $query -> fetchAll();
     if(isset($data))
     {
         return $data;
     }
     else{
         return false;
     }

 }
 public function dbFetchCompletedOrders($id)
 {
        $sql = "select * from orders where user_id=:user_id and status=:status ORDER BY id DESC";
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':user_id' => $id,':status' => 4));
        $data = $query -> fetchAll();
        if(isset($data))
        {
            return $data;
        }
         //ab.exe -k -c 20000 -n 20000 http://146.185.182.128:8080/ShareCab/
        else{
            return false;
        }

 }
 public function dbFetchActivities($id)
 {
     $sql = "select * from activity where user_id=:user_id ORDER BY id DESC";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':user_id' => $id));
     $data = $query -> fetchAll();
     return isset($data) ? $data : false;
 }
 public function dbFetchOrderDetails($order_id)
 {
     $sql = "select * from order_details where unique_order_id=:order_id";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':order_id' => $order_id));
     $data = $query -> fetchAll();
     if(isset($data))
     {
         foreach ($data as $key => $orderDetail)
         {
             $product_id = $orderDetail['product_id'];

             $sql = "select * from products where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $product_id));
             $product = $query -> fetchObject();
             $user_id = $product -> seller_id;

             $sql = "select * from sellers where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $user_id));
             $user = $query -> fetchObject();

            if(isset($user -> latitude) && isset($user -> longitude)) {

                $location = new stdClass();
                $location->{"latitude"} = $user-> latitude;
                $location->{"longitude"} = $user -> longitude;
            }
            else
            {
                $location = new stdClass();
                $location->{"latitude"} = 0.0;
                $location->{"longitude"} = 0.0;
            }
             $user -> {'icon'} = $product->image;
             $user -> {'icon2'} = $product->image2;
             $user -> {'icon3'} = $product->image3;
             $user -> {'cost'} = $product->price;
             $user -> {'quantity'} = $product -> stock;

             $user -> {'location'} = isset($location) ? $location : null;
             $product -> {'seller'} = isset($user) ? $user : null;
             $data[$key]['product'] = isset($product) ? $product : null;
         }

         return $data;
     }
     else{
         return false;
     }
 }
 public function dbAddToDiscounts($discount_price, $product_id, $start_time, $end_time)
 {
     $sql = 'INSERT INTO discounts SET product_id =:product_id,new_price =:new_price,start_date =:start_date,end_date =:end_date';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('product_id' => $product_id, ':new_price' => $discount_price,':start_date' => $start_time, ':end_date' => $end_time));
     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function addLocation($unique_location_id,$latitude,$longitude)
 {
	$sql = 'INSERT INTO location SET unique_location_id =:unique_location_id,latitude =:latitude,longitude =:longitude';
    $query = $this ->conn ->prepare($sql);
    $query->execute(array('unique_location_id' => $unique_location_id, ':latitude' => $latitude,':longitude' => $longitude));
    return $query ? true : false;
	
 }
 public function saveLocationToOrders($unique_location_id, $order_id, $shipment_cost)
 {
	 $sql = 'UPDATE orders SET status = :status, address = :unique_location_id, shipping_cost = :shipping_cost WHERE unique_order_id = :unique_order_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':status' => 2, ':unique_location_id' => $unique_location_id, ':shipping_cost' => $shipment_cost, ':unique_order_id' => $order_id));

     if ($query) {

         return true;

     } else {

         return false;

     } 
 }
 public function saveShipmentCostToOrders($order_id,$shipment_cost)
 {
     $sql = 'UPDATE orders SET status=:status, shipping_cost = :shipping_cost WHERE unique_order_id = :id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':status' => 2, ':shipping_cost' => $shipment_cost, ':id' => $order_id));

     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbSavePaypalPayment($id, $order_id, $paypal_unique_id, $paypal_create_time, $paypal_state)
 {
     $sql = 'INSERT INTO paypals SET user_id =:user_id,order_id =:order_id,paypal_unique_id =:paypal_unique_id, created_time =:created_time, state=:state';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('user_id' => $id, ':order_id' => $order_id,':paypal_unique_id' => $paypal_unique_id, ':created_time' => $paypal_create_time, ':state' => $paypal_state));
     return $query ? true : false;
 }
 public function dbSavePaypalPaymentToOrders($order_id, $status, $paypal_unique_id, $payment_method)
 {
     $sql = 'UPDATE orders SET status = :status, transaction_id = :payment_id WHERE unique_order_id = :unique_order_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':status' => $status, ':payment_id' => $paypal_unique_id, ':unique_order_id' => $order_id));
     return $query ? true : false;
 }
 public function dbFetchDiscounts()
 {
     $sql = 'SELECT * from discounts where NOW() BETWEEN start_date AND end_date';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array());
     $data = $query -> fetchAll();
     if (isset($data))
     {
         foreach ($data as $key => $discount)
         {
             $product_id = $discount['product_id'];
             $sql = "select * from products where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $product_id));
             $product = $query -> fetchObject();

             $user_id=$product->user_id;
             $sql = "select * from seller where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $user_id));
             $user = $query -> fetchObject();
             $product->{"seller"} = isset($user) ? $user : null;

             $data[$key]['product'] = isset($product) ? $product : null;
         }
         return $data;
     }
     else
     {
         return false;
     }
 }
 public function dbConfirmReceipt($unique_order_id)
 {
     $sql = 'UPDATE orders SET status = :status WHERE unique_order_id = :unique_order_id';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':status' => 5, ':unique_order_id' => $unique_order_id));

     if ($query) {

         return true;

     } else {

         return false;

     }
 }
 public function dbFetchCartCount($user_id)
 {
     $sql = 'SELECT COUNT(*) from cart where user_id=:id and cancelled=:cancelled';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $user_id,':cancelled' => 0));
	 if($query){

            $row_count = $query -> fetchColumn();

            if ($row_count == 0){

                return $row_count;

            } else {

                return $row_count;

            }
        } else {

            return false;
        }
 }
 public function dbFetchCart($id)
 {
     $discount=0;
     $sql = 'SELECT * from cart where user_id=:id and cancelled=:cancelled';
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $id,':cancelled' => 0));
     $data = $query -> fetchAll();
     if ($query) {

         foreach ($data as $id => $cartItem)
         {
             $product_id = $cartItem['product_id'];
             $sql = 'SELECT * from products where id=:id';
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $product_id));
             $product = $query -> fetchObject();

             $sql = "select * from discounts where product_id=:product_id AND NOW() BETWEEN start_date AND end_date ORDER BY created_at DESC";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':product_id' => $product_id));
             $discounts = $query -> fetchAll(PDO::FETCH_OBJ);
             foreach ($discounts as $index => $discountObj)
             {
                 $discount_price = $discountObj->new_price;
                 $original_price = $product->price;
                 $discount_units = $cartItem['quantity'];
                 $discount = $discount + (($original_price - $discount_price) * $discount_units);
             }
             $user_id = $product -> seller_id;
             $sql = "select * from sellers where id=:id";
             $query = $this -> conn -> prepare($sql);
             $query -> execute(array(':id' => $user_id));
             $user = $query -> fetchObject();
             $product->{"icon"} = $product -> image;
             $product->{"icon2"} = $product -> image2;
             $product->{"icon3"} = $product -> image3;
             $product->{"quantity"} = $product -> stock;
             $product->{"cost"} = $product -> price;
             $product->{"seller"} = $user;
             $data[$id]['product'] = $product;

         }

         $response["success"] = 1;
         $response["message"] = "Cart Fetched Successfully";
         $response["discount"] = $discount;
         $response["cartArray"] = $data;
         return json_encode($response);

     } else {

         $response["success"] = 0;
         $response["message"] = "Cart Fetch Failed";
         return json_encode($response);

     }
 }
 public function dbInitiateDelivery($id, $order_id)
 {
     $sql = "select * from orders where id=:id";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $order_id));
     $order = $query -> fetchObject();
     $unique_location_id = $order->address;

     $sql = "select * from order_details where order_id=:id";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':id' => $order_id));
     $order_products = $query -> fetchAll(PDO::FETCH_OBJ);

     if (isset($order_products)) {
         foreach ($order_products as $order_single_product) {
             $product_id = $order_single_product->product_id;
             $units = $order_single_product->quantity;

             $sql = "SELECT * FROM products WHERE id=:id";
             $query = $this->conn->prepare($sql);
             $query->execute(array(':id' => $product_id));
             $product = $query->fetchObject();
             $seller_id = $product -> user_id;

             $sql = 'INSERT INTO deliveries SET user_id =:user_id,buyer_id =:buyer_id,product_id =:product_id, unique_location_id =:unique_location_id, units=:units ';
             $query = $this->conn->prepare($sql);
             $query->execute(array('user_id' => $seller_id, ':buyer_id' => $id, ':product_id' => $product_id, ':unique_location_id' => $unique_location_id, ':units' => $units));

         }
         return true;
     }
     else
     {
         return false;
     }


 }
 public function dbSavePesapalPayment($pesapal_unique_id, $reference, $pesapal_tracking_id)
 {
     $sql = 'INSERT INTO pesapals SET pesapal_unique_id =:pesapal_unique_id,order_id =:order_id,tracking_id =:tracking_id';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('pesapal_unique_id' => $pesapal_unique_id, ':order_id' => $reference,':tracking_id' => $pesapal_tracking_id));
     return $query ? true : false;
 }
 public function dbUpdatePaypalPayment($transaction_id, $res)
{
    $sql = 'UPDATE paypals SET state =:state where order_id =:order_id';
    $query = $this ->conn ->prepare($sql);
    $query->execute(array('state' => $res, ':order_id' => $transaction_id));
    return $query ? true : false;
}
 public function dbUpdatePesapalPayment($status,$pesapal_merchant_reference)
 {
     $sql = 'UPDATE pesapals SET state =:state where order_id=:order_id';
     $query = $this ->conn ->prepare($sql);
     $query->execute(array('state' => $status, ':order_id' => $pesapal_merchant_reference));
     return $query ? true : false;
 }
 public function dbUpdateOrderPaymentFromPesapalIpn($status, $pesapalTrackingId, $pesapal_merchant_reference)
 {
     $sql = "select * from pesapals where order_id=:order_id";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':order_id' => $pesapal_merchant_reference));
     $pesapal_payment = $query -> fetchObject();

     if(isset($pesapal_payment) && !empty($pesapal_payment))
     {
         $pesapal_unique_id = $pesapal_payment -> pesapal_unique_id;

         $sql = 'UPDATE orders SET status =:status, payment_id=:payment_id, payment_method=:payment_method where unique_order_id=:unique_order_id';
         $query = $this ->conn ->prepnare($sql);
         $query->execute(array('status' => 3, ':payment_id' => $pesapal_unique_id, ':payment_method' => 1, ':unique_order_id' => $pesapal_unique_id));
         return $query ? true : false;
     }
     else
     {
         $pesapal_unique_id = "PESA-".($this -> getRandomString(10));

         $sql = 'INSERT INTO pesapals SET pesapal_unique_id =:pesapal_unique_id,order_id =:order_id, state=:state,tracking_id =:tracking_id';
         $query = $this ->conn ->prepare($sql);
         $query->execute(array('pesapal_unique_id' => $pesapal_unique_id, ':order_id' => $pesapal_merchant_reference,':tracking_id' => $pesapalTrackingId, ':state' => $status));

         if($query)
         {
             $sql = 'UPDATE orders SET status =:status, payment_id=:payment_id, payment_method=:payment_method where unique_order_id=:unique_order_id';
             $query = $this ->conn ->prepare($sql);
             $query->execute(array('status' => 3, ':payment_id' => $pesapal_unique_id, ':payment_method' => 1, ':unique_order_id' => $pesapal_unique_id));
             return $query ? true : false;
         }
         else
         {
             return false;
         }
     }
 }
 public function dbFetchDeliveries($id,$delivered)
 {
     $sql = "select * from deliveries where user_id=:user_id and delivered=:delivered";
     $query = $this -> conn -> prepare($sql);
     $query -> execute(array(':user_id' => $id, ':delivered' => $delivered));
     $data = $query -> fetchAll();
     return isset($data) ? $data : false;
 }
 public function getHash($password) {

     $salt = sha1(rand());
     $salt = substr($salt, 0, 10);
     $encrypted = password_hash($password.$salt, PASSWORD_DEFAULT);
     $hash = array("salt" => $salt, "encrypted" => $encrypted);

     return $hash;

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
public function verifyHash($password, $hash) {

    return password_verify ($password, $hash);
}

}