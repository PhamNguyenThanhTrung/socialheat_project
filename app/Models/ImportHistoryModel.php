<?php

namespace App\Models;

use CodeIgniter\Model;

class ImportHistoryModel extends Model
{
    protected $table            = 'import_history';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['file_name', 'import_date', 'imported_stock','sku'];

    // Dates
    protected $useTimestamps = false; // Đặt giá trị này là true nếu bạn muốn sử dụng timestamps
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    // public function getImportedStockData()
    // {
    //     // Thực hiện truy vấn để lấy dữ liệu từ cơ sở dữ liệu
    //     $query = $this->select('SUM(imported_stock) AS total_imported_stock, DATE(import_date) AS date')
    //         ->groupBy('DATE(import_date)')
    //         ->orderBy('date', 'ASC')
    //         ->get();

    //     return $query->getResultArray();
    // }
    // public function getTotalUpdatedStock()
    // {
    //     // Sử dụng Query Builder để tính tổng số lượng stock đã được cập nhật từ bảng import_history
    //     $builder = $this->db->table('import_history');
    //     $builder->selectSum('imported_stock', 'total_updated_stock');
    //     $query = $builder->get();

      
    // }
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

    // Thêm dữ liệu
    public function addImportHistory($data)
    {
        // Sử dụng phương thức insert để thêm dữ liệu
        return $this->insert($data);
    }
}
