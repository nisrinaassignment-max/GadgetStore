
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-heading', 'Dashboard Gadget Store')

@push('styles')
<style>
    .dashboard-intro {
        color: #858796;
        font-size: 14px;
    }

    .summary-card {
        border-left: 4px solid;
        border-radius: 8px;
        transition: .2s;
    }

    .summary-card:hover {
        transform: translateY(-3px);
    }

    .summary-card.primary { border-left-color: #4e73df; }
    .summary-card.success { border-left-color: #1cc88a; }
    .summary-card.info { border-left-color: #36b9cc; }
    .summary-card.warning { border-left-color: #f6c23e; }

    .summary-icon {
        font-size: 30px;
        opacity: .65;
    }

    .dashboard-box {
        border: 0;
        border-radius: 9px;
        box-shadow: 0 2px 10px rgba(0,0,0,.05);
    }

    .dashboard-box .card-header {
        background: white;
        border-bottom: 1px solid #eaecf4;
        padding: 16px 20px;
    }

    .dashboard-box .card-body {
        padding: 20px;
    }

    .category-progress {
        height: 9px;
        border-radius: 10px;
    }

    .product-image {
        width: 42px;
        height: 42px;
        object-fit: cover;
        border-radius: 6px;
    }

    .small-muted {
        font-size: 12px;
        color: #858796;
    }
</style>
@endpush

@section('content')

<div class="mb-4">
    <h5 class="font-weight-bold text-gray-800 mb-1">
        Selamat Datang di Gadget Store!
    </h5>
    <p class="dashboard-intro mb-0">
        Berikut ringkasan data produk dan persediaan toko kamu.
    </p>
</div>

{{-- KARTU RINGKASAN --}}
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card summary-card primary shadow-sm h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="small font-weight-bold text-primary text-uppercase mb-1">
                            Total Produk
                        </div>
                        <div class="h4 font-weight-bold text-gray-800 mb-0">
                            {{ number_format($totalProducts) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-mobile-alt summary-icon text-primary"></i>
                    </div>
                </div>
                <div class="small-muted mt-3">Jumlah produk terdaftar</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card summary-card success shadow-sm h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="small font-weight-bold text-success text-uppercase mb-1">
                            Total Kategori
                        </div>
                        <div class="h4 font-weight-bold text-gray-800 mb-0">
                            {{ number_format($totalCategories) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tags summary-icon text-success"></i>
                    </div>
                </div>
                <div class="small-muted mt-3">Kategori produk tersedia</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card summary-card info shadow-sm h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="small font-weight-bold text-info text-uppercase mb-1">
                            Total Unit Stok
                        </div>
                        <div class="h4 font-weight-bold text-gray-800 mb-0">
                            {{ number_format($totalStock) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes summary-icon text-info"></i>
                    </div>
                </div>
                <div class="small-muted mt-3">Jumlah seluruh persediaan</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card summary-card warning shadow-sm h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="small font-weight-bold text-warning text-uppercase mb-1">
                            Stok Menipis
                        </div>
                        <div class="h4 font-weight-bold text-gray-800 mb-0">
                            {{ number_format($lowStockProducts) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle summary-icon text-warning"></i>
                    </div>
                </div>
                <div class="small-muted mt-3">Produk dengan stok maksimal 5</div>
            </div>
        </div>
    </div>

</div>

{{-- NILAI PERSEDIAAN DAN PINTASAN --}}
<div class="row mb-4">

    <div class="col-lg-7 mb-3">
        <div class="card dashboard-box h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                            Estimasi Nilai Persediaan
                        </div>
                        <h3 class="font-weight-bold text-gray-800 mb-1">
                            Rp {{ number_format($inventoryValue, 0, ',', '.') }}
                        </h3>
                        <div class="small-muted">
                            Total harga produk dikalikan jumlah stok.
                        </div>
                    </div>
                    <i class="fas fa-wallet fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 mb-3">
        <div class="card dashboard-box h-100">
            <div class="card-body">
                <div class="font-weight-bold text-gray-800 mb-3">
                    Pintasan Menu
                </div>
                <div class="d-flex flex-wrap">
                    <a href="{{ route('products.create') }}"
                       class="btn btn-primary btn-sm mr-2 mb-2">
                        <i class="fas fa-plus mr-1"></i> Tambah Produk
                    </a>

                    <a href="{{ route('categories.create') }}"
                       class="btn btn-outline-primary btn-sm mb-2">
                        <i class="fas fa-tag mr-1"></i> Tambah Kategori
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- GRAFIK --}}
<div class="row mb-4">

    <div class="col-lg-8 mb-4">
        <div class="card dashboard-box h-100">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mb-0">
                    <i class="fas fa-chart-bar mr-2"></i>
                    Jumlah Produk per Kategori
                </h6>
            </div>
            <div class="card-body">
                <div style="height:280px">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card dashboard-box h-100">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mb-0">
                    <i class="fas fa-chart-pie mr-2"></i>
                    Kondisi Stok
                </h6>
            </div>
            <div class="card-body">
                <div style="height:220px">
                    <canvas id="stockChart"></canvas>
                </div>

                <div class="small text-secondary mt-3">
                    <div class="mb-1">
                        <span class="text-danger">●</span>
                        Menipis (0–5 unit):
                        <strong>{{ $stockStatus['low'] }}</strong>
                    </div>
                    <div class="mb-1">
                        <span class="text-warning">●</span>
                        Cukup (6–20 unit):
                        <strong>{{ $stockStatus['medium'] }}</strong>
                    </div>
                    <div>
                        <span class="text-success">●</span>
                        Banyak (>20 unit):
                        <strong>{{ $stockStatus['high'] }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- RINGKASAN KATEGORI --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card dashboard-box">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mb-0">
                    <i class="fas fa-layer-group mr-2"></i>
                    Ringkasan Persediaan per Kategori
                </h6>
            </div>

            <div class="card-body">
                @forelse($categoryStats as $category)
                    @php
                        $percentage = $totalStock > 0
                            ? ($category->stock_total / $totalStock) * 100
                            : 0;
                    @endphp

                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="font-weight-bold text-gray-800">
                                {{ $category->name }}
                            </div>
                            <div class="small text-secondary">
                                {{ $category->product_count }} produk •
                                {{ $category->stock_total }} unit
                            </div>
                        </div>

                        <div class="progress category-progress">
                            <div class="progress-bar bg-primary"
                                 role="progressbar"
                                 style="width: {{ $percentage }}%">
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-secondary mb-0">Belum ada kategori.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- PRODUK TERBARU --}}
<div class="card dashboard-box mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bold text-primary mb-0">
            <i class="fas fa-clock mr-2"></i>
            Produk Terbaru
        </h6>

        <a href="{{ route('products.index') }}"
           class="btn btn-sm btn-outline-primary">
            Lihat Semua
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestProducts as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         class="product-image"
                                         alt="{{ $product->name }}">
                                @else
                                    <div class="product-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-mobile-alt text-secondary"></i>
                                    </div>
                                @endif
                            </td>

                            <td>{{ $product->product_code }}</td>
                            <td class="font-weight-bold">{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
                            <td>
                                @if($product->stock <= 5)
                                    <span class="badge badge-danger">
                                        {{ $product->stock }} unit
                                    </span>
                                @elseif($product->stock <= 20)
                                    <span class="badge badge-warning">
                                        {{ $product->stock }} unit
                                    </span>
                                @else
                                    <span class="badge badge-success">
                                        {{ $product->stock }} unit
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">
                                Belum ada produk. Silakan tambahkan produk terlebih dahulu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const categoryLabels = @json($categoryStats->pluck('name')->values());
    const productCounts = @json($categoryStats->pluck('product_count')->values());

    const stockStatusData = @json([
        $stockStatus['low'],
        $stockStatus['medium'],
        $stockStatus['high']
    ]);

    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Jumlah Produk',
                data: productCounts,
                backgroundColor: '#4e73df',
                borderRadius: 5,
                barThickness: 35
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    new Chart(document.getElementById('stockChart'), {
        type: 'doughnut',
        data: {
            labels: ['Menipis', 'Cukup', 'Banyak'],
            datasets: [{
                data: stockStatusData,
                backgroundColor: ['#e74a3b', '#f6c23e', '#1cc88a'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 65,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endpush
