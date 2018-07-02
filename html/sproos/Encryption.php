<?php
/**
 * Created by PhpStorm.
 * User: mayore
 * Date: 9/12/2017
 * Time: 2:00 PM
 */

class Encryption
{
    public function passwordVerify($password, $password_from_db)
    {
        return strcmp ($this -> getEncryptedPassword($password), $password_from_db) === 0;
    }

    public function getEncryptedPassword($password)
    {
        return MD5(hash('sha256',$password));
    }

}