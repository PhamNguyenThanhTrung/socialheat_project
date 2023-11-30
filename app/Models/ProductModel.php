<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'tbl_product_acme';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'sku',
        'vendor',
        'upc',
        'name',
        'short_description',
        'description',
        'price',
        'shipping_fee',
        'msrp',
        'sale_price_1',
        'sale_price_2',
        'profit',
        'weight',
        'lenght',
        'width',
        'depth',
        'height',
        'package_weight',
        'package_lenght',
        'package_height',
        'category',
        'sub_category',
        'material',
        'color',
        'shipping_type',
        'stock',
        'product_url',
        'images',
        'users_input',
        'create_date',
        'bucket_images',
        'error_images',
        'is_shopify',
    ];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function getProductDetails($productId)
    {
        return $this->find($productId);
    }
}
