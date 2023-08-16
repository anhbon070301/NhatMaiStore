<?php

namespace App\Services;

use App\Exceptions\CartException;
use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Contracts\ProductReponsitoryInterface;
use App\Services\Contracts\CartServiceInterface;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class CartService implements CartServiceInterface
{
    protected $bannerRepository;
    protected $productReponsitoryInterface;

    /**
     * @param BannerRepositoryInterface $bannerRepository
     */
    public function __construct(
        BannerRepositoryInterface    $bannerRepository,
        ProductReponsitoryInterface  $productReponsitoryInterface
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->productReponsitoryInterface = $productReponsitoryInterface;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function list(int $id)
    {
        // $carts = Session::get('cart-' . auth()->user()->id ?? 0);
        
        // dd(Session::get('cart-' . auth()->user()->id ?? 0));
        return Session::get('cart-' . auth()->user()->id ?? 0);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        Cart::destroy();
        $result = false;
        $product = $this->productReponsitoryInterface->find($attributes['product_id']);
        if ($product->amount < (int)$attributes['quantity']) {
            throw new CartException();
        } else {
            $carts = Session::get('cart-' . auth()->user()->id ?? 0) ?? [];
            $cartFilter = array_filter($carts, function($item) use ($attributes) {
                return (int)$item['id'] === (int)$attributes['product_id'];
            });

            if (count($cartFilter) === 0) {
                $dataCart = [
                    'id'      => (int)$attributes['product_id'],
                    'qty'     => (int)$attributes['quantity'],
                    'name'    => $attributes['product_name'],
                    'price'   => $attributes['product_price'],
                    'weight'  => '12',
                    'options' => [
                        'image' => $attributes['product_image'],
                    ],
                ];
    
                Session::push('cart-' . auth()->user()->id ?? '', $dataCart);
            } else {
                $cartUpdate = array_map(function ($item) use ($attributes) {
                    if ((int)$item['id'] === (int)$attributes['product_id']) {
                        (int)$item['qty'] +=  (int)$attributes['quantity'];
                    }
                    return $item;
                }, $carts);
                Session::put('cart-' . auth()->user()->id ?? 0, $cartUpdate);
            }

            $newAmount = $product->amount - $attributes['quantity'];

            $result = (boolean)$product->update(['amount' => $newAmount]);
        }

        return [
            'created' => $result
        ];
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, int $id)
    {
        if (isset($attributes['image_url'])) {
            $image = $attributes['image_url'];

            $attributes['image_url'] = handleImage($image);
        } else {
            $attributes['image_url'] = $attributes['imageOld'];
        }

        return $this->bannerRepository->update($attributes, $id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->bannerRepository->delete($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function detail(int $id)
    {
        return $this->bannerRepository->find($id);
    }

    public function updateActive(array $attribute)
    {
        $value = [
            "active" => $attribute['status']
        ];

        return $this->bannerRepository->updateActive($attribute['id'], $value);
    }
}
