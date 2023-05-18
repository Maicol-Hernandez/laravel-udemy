<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{

    protected string $cookieName = 'cart';
    protected $cookieExpiration = 0.0;


    public function __construct()
    {
        $this->cookieName = config('cart.cookie.name');
        $this->cookieExpiration = config('cart.cookie.expiration');
    }

    /**
     * Get from Cookie or create.
     * 
     * @return Cart $cart
     */
    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);

        $cart = Cart::find($cartId);

        return $cart;
    }

    /**
     * Get from Cookie or create.
     * 
     * @return Cart $cart
     */
    public function getFromCookieOrCreate(): Cart
    {
        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }

    /**
     * make cookie.
     * 
     * @param Cart $cart
     * @return \Symfony\Component\HttpFoundation\Cookie $cookie
     */
    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, $this->cookieExpiration);
    }

    /**
     * 
     */
    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if (!is_null($cart)) {
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }
}
