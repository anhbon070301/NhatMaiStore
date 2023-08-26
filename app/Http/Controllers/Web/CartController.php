<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CartServiceInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartServiceInterface;

    /**
     * @param BannerServiceInterface $bannerServiceInterface
     */
    public function __construct(
        CartServiceInterface  $cartServiceInterface
    ) {
        $this->cartServiceInterface = $cartServiceInterface;
    }

    public function index($id)
    {
        $carts = $this->cartServiceInterface->list($id);
        return view('web.cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $this->cartServiceInterface->create($request->all());
        return redirect()->route('cart', auth()->user()->id ?? 0);
    }

    public function update(Request $request)
    {
        $carts  = $request->all();
        $result = $this->cartServiceInterface->update($request->all(), $carts['cart_id']);
        return $this->response($result);
    }
}
