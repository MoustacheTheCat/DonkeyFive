<?php

namespace Application\Controller;

require_once('src/model/Cart.php');

use Application\Model\Cart;

class CartController {
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
        $res = $cart->addCart();
        if($res){
            $result = "cart created";
            return $result;
        }else{
            $error = "cart not created";
            return $error;
        }
    }

    public static function deleteCheck()
    {
        $cart = new Cart();
        $res = $cart->deleteCart();
        if($res){
            $result = "cart deleted";
            return $result;
        }else{
            $error = "cart not deleted";
            return $error;
        }
    }

    public static function updateCheck()
    {
        $cart = new Cart();
        $res = $cart->updateCart();
        if($res){
            $result = "cart updated";
            return $result;
        }else{
            $error = "cart not updated";
            return $error;
        }
    }
}