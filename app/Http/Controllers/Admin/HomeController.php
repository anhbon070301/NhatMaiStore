<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Common;
use App\Http\Controllers\Controller;
use App\Models\Order_item;
use App\Services\Contracts\BrandServiceInterface;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\OrderServiceInterface;
use App\Services\Contracts\ReportServiceInterface;

class HomeController extends Controller
{
    protected $brandServiceInterface;
    protected $categoryServiceInterface;
    protected $orderServiceInterface;
    protected $reportServiceInterface;

    /**
     * @param BannerServiceInterface $bannerServiceInterface
     */
    public function __construct(
        BrandServiceInterface    $brandServiceInterface,
        CategoryServiceInterface $categoryServiceInterface,
        OrderServiceInterface    $orderServiceInterface,
        ReportServiceInterface   $reportServiceInterface,
    ) {
        $this->brandServiceInterface    = $brandServiceInterface;
        $this->categoryServiceInterface = $categoryServiceInterface;
        $this->orderServiceInterface    = $orderServiceInterface;
        $this->reportServiceInterface   = $reportServiceInterface;
    }
    
    public function home()
    {
        $categories = $this->categoryServiceInterface->getAll();
        $brands = $this->brandServiceInterface->getAll();
        $order = $this->orderServiceInterface->listItem();
        $orderData = $this->orderServiceInterface->list([]);
        $comment = $this->reportServiceInterface->list([]);
        $array = $this->orderServiceInterface->count();

        return view('admin/home', compact('categories', 'brands', 'order', 'orderData', 'comment', 'array'));
    }
}
