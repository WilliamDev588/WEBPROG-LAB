<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Furniture;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartPage(){
        return view('cart')->with('total', $this->total());
    }
    public function checkoutPage(){
        return view('checkout')->with('total', $this->total());
    }
    public function addCart($id)
    {
        $furniture = Furniture::find($id);
        if(!$furniture) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first furniture
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => Auth::user()->id,
                    "furnitureName" => $furniture->furnitureName,
                    "quantity" => 1,
                    "furniturePrice" => $furniture->furniturePrice,
                    "furnitureImage" => $furniture->furnitureImage,

                ]
            ];
        
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'furniture added to cart successfully!');
        }
        // if cart not empty then check if this furniture exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'furniture added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => Auth::user()->id,
            "furnitureName" => $furniture->furnitureName,
            "furniturePrice" => $furniture->furniturePrice,
            "furnitureImage" => $furniture->furnitureImage,

            "quantity" => 1,
        ];
        
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'furniture added to cart successfully!');
    }
    public function addToCart($id)
    {
        $furniture = Furniture::find($id);
        if(!$furniture) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first furniture
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => Auth::user()->id,
                    "furnitureName" => $furniture->furnitureName,
                    "quantity" => 1,
                    "furniturePrice" => $furniture->furniturePrice,
                    "furnitureImage" => $furniture->furnitureImage,

                ]
            ];
        
            session()->put('cart', $cart);
            return redirect()->route('all.cart')->with('success', 'furniture added to cart successfully!');
        }
        // if cart not empty then check if this furniture exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->route('all.cart')->with('success', 'furniture added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => Auth::user()->id,
            "furnitureName" => $furniture->furnitureName,
            "furniturePrice" => $furniture->furniturePrice,
            "furnitureImage" => $furniture->furnitureImage,

            "quantity" => 1,
        ];
        
        
        session()->put('cart', $cart);
        
        return redirect()->route('all.cart')->with('success', 'furniture added to cart successfully!');
    }
    public function minusToCart($id)
    {
        $furniture = Furniture::find($id);
        if(!$furniture) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first furniture
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => Auth::user()->id,
                    "furnitureName" => $furniture->furnitureName,
                    "quantity" => 1,
                    "furniturePrice" => $furniture->furniturePrice,
                    "furnitureImage" => $furniture->furnitureImage,

                ]
            ];
        
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'furniture added to cart successfully!');
        }
        // if cart not empty then check if this furniture exist then DECREMENT quantity
        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] == 1){
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                
                session()->flash('success', 'furniture removed successfully');
                // return redirect()->back()->with('total', $this->total());

                return redirect()->back()->with('success', 'furniture added to cart successfully!');

            }
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'furniture added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => Auth::user()->id,
            "furnitureName" => $furniture->furnitureName,
            "furniturePrice" => $furniture->furniturePrice,
            "furnitureImage" => $furniture->furnitureImage,

            "quantity" => 1,
        ];
        
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'furniture added to cart successfully!');
    }
    public function total(){
        $total = 0;
        $cart = session()->get('cart');
        if($cart)
            foreach($cart as $cart){
                $subtotal = $cart['quantity'] * $cart['furniturePrice'];
                $total += $subtotal;
            }
        return $total;
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'furniture removed successfully');
        return redirect()->back()->with('total', $this->total());
    }
    public function increaseQuantity($id){
        // $cart = Cart::get($id);
        // $quantity = $cart->qty + 1;
        // // Cart::update($rowId,$quantity);
        // Furniture::find($id)->update([
        //     'quantity'=> $quantity,

        // ]);
        
    }
    public function decreaseQuantity($id){
        $cart = Cart::get($id);
        $quantity = $cart->qty - 1;
        Furniture::find($id)->update([
            'quantity'=> $quantity,

        ]);    }
    public function plusminus($id, Request $request){
        $cart = Cart::findOrFail($id);
    $cart->update([
        'quantity'    => $request->quantity,
        'furniturePrice' => $cart['furniturePrice'] * $request->quantity,

    ]);
    }
}
