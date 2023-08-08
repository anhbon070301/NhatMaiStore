<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CartServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        dd(Session::get('test'));

        return $this->apiResponse($this->cartServiceInterface->list($id));
    }

    public function store(Request $request)
    {
        Session::push('test', '11111');

        return $this->handleResponse($this->cartServiceInterface->create($request->all())->toArray());
    }
}
