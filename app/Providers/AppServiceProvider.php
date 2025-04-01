<?php

namespace App\Providers;

use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\UnitMeasureRepository;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\SupplierService;
use App\Services\UnitMeasureService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService(
                new ProductRepository(),
                new CategoryRepository(),
                new SupplierRepository(),
                new UnitMeasureRepository()
            );
        });

        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService(new CategoryRepository());
        });

        $this->app->bind(SupplierService::class, function ($app) {
            return new SupplierService(new SupplierRepository());
        });

        $this->app->bind(UnitMeasureService::class, function ($app) {
            return new UnitMeasureService(new UnitMeasureRepository());
        });
    }

    public function boot(): void
    {
        //
    }
}
