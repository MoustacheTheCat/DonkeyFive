<?php

namespace Application\Controller;

require_once('src/model/Cart.php');

use Application\Model\Cart;

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
        // // $cart = new Cart();
        // // $res = $cart->displayCartDetails();
        // // if ($res) {
        $pageTitle = "Carts";
        require_once('src/template/CartDetails.php');
        // } else {
        //     $error = "cart not created";
        //     return $error;
        // }

    }

    public static function deleteCheck()
    {
        $id = $_GET['id'];
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
