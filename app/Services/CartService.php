<?php

namespace App\Services;

use App\Exceptions\CartException;
use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Contracts\ProductReponsitoryInterface;
use App\Services\Contracts\CartServiceInterface;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
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
        return Session::get('cart-' . $id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        Cart::destroy();
        $result = false;
        $user_id = auth()->user()->id ?? 0;
        $product = $this->productReponsitoryInterface->find($attributes['product_id']);
        if ($product->amount < (int)$attributes['quantity']) {
            throw new CartException();
        } else {
            $carts = Session::get('cart-' . $user_id) ?? [];
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
    
                Session::push('cart-' . $user_id, $dataCart);
            } else {
                $cartUpdate = array_map(function ($item) use ($attributes) {
                    if ((int)$item['id'] === (int)$attributes['product_id']) {
                        (int)$item['qty'] +=  (int)$attributes['quantity'];
                    }
                    return $item;
                }, $carts);
                Session::put('cart-' . $user_id, $cartUpdate);
            }

            $newAmount = $product->amount - $attributes['quantity'];

            $result = (boolean)$product->update(['amount' => $newAmount]);
        }

        return [
            'created' => $result
        ];
    }

    /**
     * @param array $dataCart
     * @param int $id
     * @return mixed
     */
    public function update(array $request, int $id)
    {
        $result = true;
        DB::beginTransaction();
        try {
            if (!empty($request['products'])) {
                foreach ($request['products'] as $value) {
                    $newAmount = 0;
                    $product = $this->productReponsitoryInterface->find($value['id']);

                    if (!empty($product)) {
                        if ($product['amount'] < ($value['qty'])) {
                            $result = false;
                            throw new CartException();
                        }

                        $newAmount = $product['amount'] - ($value['qty']);

                        $result = (boolean)$product->update(['amount' => $newAmount]);
                    }

                    if (!$result) {
                        break;
                    }
                }
            }

            if (!$result) {
                DB::rollBack();
                return false;
            } else {
                DB::commit();
                Session::put('cart-' . $id, $request['data']);
                return true;
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return false;
        }
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
