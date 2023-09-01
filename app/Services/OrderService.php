<?php

namespace App\Services;

use App\Constants\Common;
use App\Repositories\Contracts\OrderItemsRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Services\Contracts\OrderServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    protected $orderRepository;
    protected $orderItemsRepositoryInterface;

    /**
     * @param OrderRepositoryInterface $orderRepositoryInterface
     */
    public function __construct(
        OrderRepositoryInterface $orderRepositoryInterface,
        OrderItemsRepositoryInterface $orderItemsRepositoryInterface

    ) {
        $this->orderItemsRepositoryInterface = $orderItemsRepositoryInterface;
        $this->orderRepository               = $orderRepositoryInterface;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function list(array $attributes)
    {
        $attributes = [
            ["customer_name", "LIKE",  Arr::get($attributes, "inputName")],
            ["customer_phone", "LIKE", Arr::get($attributes, "inputPhone")],
            ["customer_email", "LIKE", Arr::get($attributes, "inputEmail")],
        ];

        return $this->orderRepository->list(condition($attributes));
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();
        try {
            $province  = DB::table('provinces')->find($attributes['provinces']);
            $districts = DB::table('districts')->find($attributes['districts']);
            $wards     = DB::table('wards')->find($attributes['wards']);

            $attribute = [
                'user_id'        => auth()->user()->id ?? null,
                'customer_name'  => $attributes['customer_name'] ?? null,
                'customer_phone' => $attributes['customer_phone'] ?? null,
                'customer_email' => $attributes['customer_email'] ?? null,
                'status'         => Common::IN_ACTIVE ?? 0,
                'address'        => ($wards->name ?? '').' - '. ($districts->name ?? '') . ' - '. ($province->name ?? ''),
                'total_money'    => array_reduce($attributes['total_money'], function ($carry, $item) {
                    return $carry + $item;
                }),
                'total_products' => array_reduce($attributes['total_products'], function ($carry, $item) {
                    return $carry + $item;
                })
            ];
            
            $order = $this->orderRepository->create($attribute);
            $items = [];
            if ($order) {
                foreach ($attributes['items'] as $key => $value) {
                   $items[] = [
                     'order_id'         => $order->id,
                     'product_id'       => $value['product_id'],
                     'product_name'     => $value['product_name'],
                     'product_image'    => $value['product_image'],
                     'product_price'    => $value['product_price'],
                     'product_quantity' => $value['product_quantity'],
                   ];
                }

                $result = $this->orderItemsRepositoryInterface->insertOrUpdateBatch($items);

                if ($result) {
                    DB::commit();
                    return $result;
                } else {
                    DB::rollBack();
                    return null;
                }
            }
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();
            return null;
        }
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, int $id)
    {
        return $this->orderRepository->update($attributes, $id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->orderRepository->delete($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function detail(int $id)
    {
        return $this->orderRepository->find($id);
    }

    public function updateActive(array $attribute)
    {
        $value = [
            "active" => $attribute['status']
        ];

        return $this->orderRepository->updateActive($attribute['id'], $value);
    }

    public function count()
    {
        $month = Carbon::now()->month;
        $result = DB::table("orders")
            ->whereMonth('created_at', '=', 10)
            ->whereYear('created_at', '=', 2022)
            ->selectRaw('SUM(total_products) as total_products, SUM(total_money) as total_money')
            ->get();
        return $result->first();
    }

    public function listItem()
    {
        $result = DB::table('order_items')
            ->groupBy('product_name')
            ->groupBy('product_id')
            ->groupBy('product_image')
            ->select('product_name', DB::raw('SUM(product_quantity) as total'))
            ->orderBy('total', 'desc')
            ->paginate(Common::PAGINATE_HOME);

        return $result;
    }

    public function getOrder()
    {
        return $this->orderRepository->getOrder();
    }

    public function showListItem(mixed $order)
    {
        $result = DB::select("SELECT * FROM orders join order_items on orders.id = order_items.order_id WHERE orders.customer_email like '%" . $order->customer_email . "%' and orders.id =" . $order->id);

        return $result;
    }

    public function select_delivery(array $data)
    {
        $output = "";
        if ($data['action']) {
            if ($data['action'] == 'provinces') {
                $huyen = DB::table("districts")->where('province_id', $data['id'])->get();
                $output .= '<option value="">---Select districts---</option>';
                foreach ($huyen as $h) {
                    $output .= '<option value="' . $h->id . '">' . $h->name . '</option>';
                }
            } else {
                $xa = DB::table("wards")->where('district_id', $data['id'])->get();
                $output .= '<option value="">---Select wards---</option>';
                foreach ($xa as $x) {
                    $output .= '<option value="' . $x->id . '">' . $x->name . '</option>';
                }
            }
        }

        return $output;
    }
}
