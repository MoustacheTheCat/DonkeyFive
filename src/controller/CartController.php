<?php

namespace Application\Controller;

require_once('src/model/Cart.php');
require_once('src/model/FieldsOptions.php');
require_once('src/model/Rental.php');

use Application\Model\Cart;
use Application\Model\FieldsOptions;
use Application\Model\Rental;

class CartController
{
    public static function viewCarts()
    {
        $cart = new Cart();
        $cartDatas = $cart->getCartDatas();
        $pageTitle = "Cart";
        require_once('src/template/Cart.php');
    }

    public static function viewOneCart($cartId)
    {
        $cart = new Cart();
        $cart = $cart->getOneCart($cartId);
        $pageTitle = "Cart";
        require_once('src/template/Cart.php');
    }

    public static function addCheck()
    {
        $cart = new Cart();
        $res = $cart->addItemInCart();
        if ($res) {
            $pageTitle = "Select Time ";
            require_once('src/template/SelectTime.php');
        } else {
            $error = "cart not created";
            return $error;
        }
    }

    public static function timeCheck()
    {
        $cart = new Cart();
        $res = $cart->addSelectTime();
        if ($res) {
            $result = "cart created";
            header('Location: /');
        } else {
            $error = "cart not created";
            return $error;
        }
    }

    public static function displayCarts()
    {
        $cart = new Cart();
        $res = $cart->displayCarts();
        if (!$res) {
            $error = "le pannier est vide !!!!";
            
        }
        $pageTitle = "Carts";
        require_once('src/template/Cart.php');
    }

    public static function displayCartDetails()
    {
        $pageTitle = "Carts";
        require_once('src/template/CartDetails.php');
    }

    public static function edit()
    {
        $pageTitle = "Carts";
        $data = new FieldsOptions();
        $datasFieldOptions = $data-> getFieldsOptionsByFieldId();
        require_once('src/template/EditCart.php');
    }

    public static function deleteCheck()
    {
        $id =$_GET['id'];
        $cart = new Cart();
        $res = $cart->deleteItemInCart($id);
        if ($res) {
            $result = "cart deleted";
            header('Location: /carts');
            return $result;
        } 
        $error = "cart not deleted";
        header('Location: /carts');
        return $error;
    }

    public function deleteOptions()
    {
        $ct = new Cart();
        $res = $ct->deleteOptions();
        if($res){
            $result = "Option deleted";
            self::edit();
        }
    }

    public static function addOptions()
    {
        $ct = new Cart();
        $res = $ct->addOptions();
        if($res){
            $result = "Option added";
            self::edit();
        }
    }

    public static function updateCheck()
    {
        $cart = new Cart();
        $res = $cart->updateCart();
        if ($res) {
            $result = "cart updated";
            return $result;
        } else {
            $error = "cart not updated";
            return $error;
        }
    }
}
