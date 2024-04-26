<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        // Adicionar o produto ao carrinho na sessão
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $productId => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1
                ]
            ];
            session()->put('cart', $cart);
        } else {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho.');
    }
}
