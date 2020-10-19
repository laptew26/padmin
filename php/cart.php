<?php

class Cart
{

    public $cart;
    private $expired;

    public function __construct()
    {
        $this->getCart();
        $this->expired = time() + 60 * 60 * 60;
    }

    private function getCart()
    {
        if (!isset($_COOKIE['cart'])) {
            $this->saveCart();
        }
        $this->cart = json_decode($_COOKIE['cart'], true);
    }

    private function saveCart($cart = null)
    {
        setcookie('cart', json_encode($cart ?? $this->cart), $this->expired);
    }

    public function addProduct($id, $count = 1)
    {
        $this->cart[$id] = ($this->cart[$id] ?? 0) + $count;
        $this->saveCart();
    }

    public function delProduct($id, $count = 1)
    {
        $this->cart[$id] = ($this->cart[$id] ?? 0) - $count;
        if ($this->cart[$id] < 1) {
            unset($this->cart[$id]);
        }
        $this->saveCart();
    }

}

?>