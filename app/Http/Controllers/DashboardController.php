<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // RINGKASAN DASHBOARD
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalStock = (int) Product::sum('stock');

        // PRODUK DENGAN STOK MENIPIS
        $lowStockProducts = Product::where('stock', '<=', 5)->count();

        // ESTIMASI NILAI PERSEDIAAN
        $inventoryValue = (float) Product::selectRaw(
            'COALESCE(SUM(price * stock), 0) as total'
        )->value('total');

        // KOMPOSISI KONDISI STOK
        $stockStatus = [
            'low' => Product::where('stock', '<=', 5)->count(),

            'medium' => Product::whereBetween('stock', [6, 20])->count(),

            'high' => Product::where('stock', '>', 20)->count(),
        ];

        // DATA PRODUK DAN TOTAL STOK PER KATEGORI
        $categoryStats = Category::query()
            ->leftJoin(
                'products',
                'categories.id',
                '=',
                'products.category_id'
            )
            ->select(
                'categories.id',
                'categories.name',
                DB::raw('COUNT(products.id) as product_count'),
                DB::raw('COALESCE(SUM(products.stock), 0) as stock_total')
            )
            ->groupBy(
                'categories.id',
                'categories.name'
            )
            ->orderBy('categories.id', 'asc')
            ->get();

        // PRODUK TERBARU
        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        // TAMPILKAN DASHBOARD
        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'lowStockProducts',
            'inventoryValue',
            'stockStatus',
            'categoryStats',
            'latestProducts'
        ));
    }
}
