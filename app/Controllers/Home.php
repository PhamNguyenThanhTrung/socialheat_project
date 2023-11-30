<?php

namespace App\Controllers;
use App\Models\ProductModel;
// Tạo biến chứa thông tin phiên bản

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

// Truyền biến vào view


        return view('pages/adminList', $data);
    }
    public function viewDashboard(): string
{
    $productModel = new ProductModel();
    $data['products'] = $productModel->findAll();

    // Tính tổng giá trị cột 'supplier'
    $totalSupplier = 0;
    foreach ($data['products'] as $product) {
        // Kiểm tra xem giá trị của cột 'supplier' có tồn tại không
        if (isset($product['supplier']) && $product['supplier'] !== null) {
            $totalSupplier += $product['supplier'];
        }
    }
    foreach ($data['products'] as $product) {
      
        if (isset($product['supplier']) && $product['supplier'] !== null) {
            $totalSupplier += $product['supplier'];
        }
    }

    $data['totalSupplier'] = $totalSupplier;
    $data['totalProducts'] = count($data['products']);
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



