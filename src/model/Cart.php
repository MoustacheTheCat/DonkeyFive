<?php 

namespace Application\Model;

class Cart {
    public function __construct(
        private $cartId = null,
        private $cartDatas = [],
        private $itemId = null,
        private $items = [],
        )
    {

    }

    public function getCartDatas(): array
    {
        return $this->cartDatas;
    }

    public function setCartDatas(array $cartDatas): void
    {
        $this->cartDatas = $cartDatas;
    }

    public function getCartId(): int
    {
        return $this->cartId;
    }

    public function setCartId(int $cartId): void
    {
        $this->cartId = $cartId;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public static function viewCarts(){
        if(isset($_SESSION['cart'])){
            return $_SESSION['cart'];
        }
        return false;
    }

    public static function viewCart($cartId){
        if(isset($_SESSION['cart'][$cartId])){
            return $_SESSION['cart'][$cartId];
        }
        return false;
    }

    public function addItemInCart (){
        var_dump($_POST);
        var_dump($_GET);
        die();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][$itemId] = $items;
    }

    public function editCart($itemId, $items){
        if(isset($_SESSION['cart'][$itemId])){
            $_SESSION['cart'][$itemId] = $items;
        }
    }

    public function deleteItemInCart ($itemId){
        if(isset($_SESSION['cart'][$itemId])){
            unset($_SESSION['cart'][$itemId]);
        }
    }
}