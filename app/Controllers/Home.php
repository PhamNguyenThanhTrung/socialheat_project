<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{

    public function index(): string
    {
        return view('welcome_message');
    }
    public function viewproductImport(): string
    {

        return view('pages/productImport');
    }
    public function viewProduct(): string
    {
        return view('pages/product');
    }

    public function login(): string
    {
        return view('backendPages/auth');
    }
    public function adminList(): string
    {
        $data['codeigniter_version'] = defined('CI_VERSION') ? CI_VERSION : 'CodeIgniter không được cài đặt.';
        return view('pages/adminList', $data);
    }
    public function viewDashboard(): string
    {
        $productModel = new ProductModel();
        $perPage = 10; 
        $data['products'] = $productModel->paginate($perPage);

   
        $pager = $productModel->pager;
        $data['pager'] = $pager;
        $totalSupplier = 0;
        foreach ($data['products'] as $product) { 
            if (isset($product['supplier']) && $product['supplier'] !== null) {
                $totalSupplier += $product['supplier'];
            }
        }
        $data['totalSupplier'] = $totalSupplier;
        $data['totalProducts'] = $pager->getDetails()['total'];

        return view('pages/dashboard', $data);
    }



    public function productExport(): string
    {
        return view('pages/productExport');
    }
    public function productManager(): string
    {
        return view('pages/productManager');
    }
    public function store(): string
    {
        return view('pages/store');
    }
    public function productQuantity(): string
    {
        return view('pages/productQuantity');
    }
    public function supplier(): string
    {
        return view('pages/supplier');
    }

    public function admin(): string
    {
        return view('layout/admin');
    }
}
