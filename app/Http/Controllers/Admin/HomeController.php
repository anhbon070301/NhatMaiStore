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
        $order = Order_item::groupBy('product_name')
                                ->groupBy('product_id')
                                ->groupBy('product_image')
                                ->select('product_name', 'product_id','product_image', Order_item::raw('sum(product_quantity) as total'))
                                ->orderBy('total', 'desc')
                                ->paginate(Common::PAGINATE_HOME);
        $orderData = $this->orderServiceInterface->list([]);
        $comment = $this->reportServiceInterface->list([]);
        
        return view('admin/home', compact('categories', 'brands', 'order', 'orderData', 'comment'));
    }
}
