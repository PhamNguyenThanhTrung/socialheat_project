<?php 
// app/Controllers/Auth.php

namespace App\Controllers\backendPages;

use App\Models\ImportHistoryModel;
use League\Csv\Writer;
use League\Csv\Reader;  
use SplTempFileObject;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        $data = [];
    
        // Nếu form được submit
        if ($this->request->getMethod() === 'post') {
            // Kiểm tra dữ liệu từ form
            $validationRules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ];
    
            // Kiểm tra dữ liệu hợp lệ
            if ($this->validate($validationRules)) {
                // Dữ liệu hợp lệ, xử lý đăng nhập ở đây
                // Lấy dữ liệu từ form
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
    
                // Thực hiện logic đăng nhập, ví dụ:
                $model = new UserModel();
                $user = $model->where('email', $email)->first();
    
                if ($user && password_verify($password, $user['password'])) {
                    // Đăng nhập thành công, lấy thông tin người dùng từ cơ sở dữ liệu
                    $userData = $model->find($user['id']);
    
                    // Đặt session với thông tin người dùng
                    session()->set('user', $userData);
    
                    // Chuyển hướng hoặc thực hiện các thao tác khác
                    return redirect()->to('/dashboard');
                } else {
                    // Đăng nhập thất bại, hiển thị thông báo lỗi
                    $data['error'] = 'Email hoặc mật khẩu không đúng.';
                }
            } else {
                // Dữ liệu không hợp lệ, hiển thị thông báo lỗi
                $data['validation'] = $this->validator;
            }
        }
    
        return view('backendPages/login', $data);
    }
    
    public function logout()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (session()->has('user')) {
            // Nếu đã đăng nhập, thực hiện đăng xuất
            session()->destroy();
            return redirect()->to('/login');
        } else {
            // Nếu chưa đăng nhập, có thể chuyển hướng hoặc xử lý theo nhu cầu của bạn
            return redirect()->to('/login');
        }
    }
  

    
public function viewHome(): string
{
    return view('home');
}
    
    // Trong Controller
public function adminList()
{
    // Load model
    $UserModel = new UserModel();

    // Số lượng dòng hiển thị trên mỗi trang
    $perPage = $this->request->getVar('quantity') ?? 2;
    $data['users'] = $UserModel->findAll();
    // Truy vấn dữ liệu từ model với phân trang
    $data['users'] = $UserModel->paginate($perPage);
    $data['pager'] = $UserModel->pager;

    
    // Load view và truyền dữ liệu vào view
    return view('pages/adminList', $data);
}


public function getChartData()
{
    $sku = $this->request->getPost('sku');

    // Load model
    $importHistoryModel = new ImportHistoryModel();
    $importHistory = $importHistoryModel->where('sku', $sku)->findAll();

    $importedStockValues = [];
    $importDates = [];

    foreach ($importHistory as $history) {
        $importedStockValues[] = $history['imported_stock'];
        $importDates[] = $history['import_date'];
    }

    $response = [
        'importedStockValues' => $importedStockValues,
        'importDates' => $importDates,
    ];

    return $this->response->setJSON($response);
}

public function product()
{
    // Load model
    $ProductModel = new ProductModel();
// Ví dụ: Lấy dữ liệu từ cơ sở dữ liệu (sử dụng mô hình ImportHistoryModel)
$importHistoryModel = new ImportHistoryModel();
$importHistory = $importHistoryModel->findAll();
// Mảng chứa các giá trị SKU
$skuValues = [];

// Mảng chứa các giá trị imported_stock
$importedStockValues = [];

// Lặp qua dữ liệu để điền vào mảng
foreach ($importHistory as $history) {
    $skuValues[] = $history['sku'];
    $importdates[] = $history['import_date'];
    $importedStockValues[] = $history['imported_stock'];
}

    // Lấy danh sách danh mục không trùng lặp
    $uniqueCategories = $ProductModel->groupBy('category')->findAll();
    $uniqueSubCategories = $ProductModel->groupBy('sub_category')->findAll();

    // Số sản phẩm hiển thị trên mỗi trang
    $perPage = $this->request->getVar('quantity') ?? 7;

    // Lấy dữ liệu từ yêu cầu tìm kiếm (nếu có)
 // Lấy dữ liệu từ yêu cầu tìm kiếm (nếu có)
$StockFrom = $this->request->getVar('Stock_from');
$StockTo = $this->request->getVar('Stock_to');
$searchName = $this->request->getVar('searchItem');
$priceFrom = $this->request->getVar('price_from');
$priceTo = $this->request->getVar('price_to');
$price = $this->request->getVar('price');
$vendor = $this->request->getVar('vendor');
$category = $this->request->getVar('category');
$Shipping_feeFrom = $this->request->getVar('shipping_fee_from');
$Shipping_feeTo = $this->request->getVar('shipping_fee_to');
$sub_category = $this->request->getVar('sub_category');

// Combine giá từ và giá đến thành một giá kết hợp
$filters = [
    // 'searchName' => $searchName,
    'searchName' => [
        'name' => $searchName,
        'sku' => $searchName,
        'upc' => $searchName,
        'id' => $searchName,
    ],
    'vendor' => $vendor,
    'category' => $category,
    'sub_category' => $sub_category,
    'price' => [
        'from' => $priceFrom,
        'to' => $priceTo,
    ],
    'stock' => [
        'from' => $StockFrom,
        'to' => $StockTo,
    ],
];

// Kiểm tra nếu có giá trị tìm kiếm, thì sử dụng like trong truy vấn
if ($searchName !== null) {
    $ProductModel->groupStart()
        ->orLike('name', $searchName)
        ->orLike('sku', $searchName)
        ->orLike('upc', $searchName)
        ->orLike('id', $searchName)
        ->groupEnd();
}

// Kiểm tra và sắp xếp theo giá nếu có tham số sort trong URL
$sortColumn = $this->request->getVar('column');
$sort = $this->request->getVar('sort');

if ($sortColumn !== null && in_array($sortColumn, ['msrp', 'price', 'id', 'shipping_fee', 'msrp', 'sale_price_1', 'sale_price_2', 'profit', 'weight', 'lenght', 'width', 'depth', 'height', 'package_weight', 'package_lenght', 'package_height']) && in_array(strtolower($sort), ['asc', 'desc'])) {
    $ProductModel->orderBy($sortColumn, strtoupper($sort));
}

// Áp dụng điều kiện lọc theo nhà cung cấp nếu có giá trị nhà cung cấp
if ($vendor !== null) {
    $ProductModel->where('vendor', $vendor);
}

// Áp dụng điều kiện lọc theo danh mục nếu có giá trị danh mục
if ($category !== null) {
    $ProductModel->where('category', $category);
}
if ($sub_category !== null) {
    $ProductModel->where('sub_category', $sub_category);
}

// Áp dụng điều kiện lọc theo giá nếu có giá trị giá từ và giá đến
if (isset($filters['price']['from'], $filters['price']['to'])) {
    $ProductModel->where('price BETWEEN ' . $filters['price']['from'] . ' AND ' . $filters['price']['to']);
} elseif (isset($filters['price']['from'])) {
    $ProductModel->where('price >=', $filters['price']['from']);
} elseif (isset($filters['price']['to'])) {
    $ProductModel->where('price <=', $filters['price']['to']);
}

// Áp dụng điều kiện lọc theo kho nếu có giá trị kho từ và kho đến
elseif (isset($filters['stock']['from'], $filters['stock']['to'])) {
    $ProductModel->where('stock BETWEEN ' . $filters['stock']['from'] . ' AND ' . $filters['stock']['to']);
} elseif (isset($filters['stock']['from'])) {
    $ProductModel->where('stock >=', $filters['stock']['from']);
} elseif (isset($filters['stock']['to'])) {
    $ProductModel->where('stock <=', $filters['stock']['to']);
}
// Áp dụng điều kiện lọc theo phí vận chuyển nếu có giá trị phí từ và phí đến
if (isset($filters['shipping_fee']['from'], $filters['shipping_fee']['to'])) {
    $ProductModel->where('shipping_fee BETWEEN ' . $filters['shipping_fee']['from'] . ' AND ' . $filters['shipping_fee']['to']);
} elseif (isset($filters['shipping_fee']['from'])) {
    $ProductModel->where('shipping_fee >=', $filters['shipping_fee']['from']);
} elseif (isset($filters['shipping_fee']['to'])) {
    $ProductModel->where('shipping_fee <=', $filters['shipping_fee']['to']);
}

// Lấy dữ liệu phân trang từ model
$data['products'] = $ProductModel->paginate($perPage);
$data['pager'] = $ProductModel->pager;
$data['perPage'] = $perPage;
$data['priceFrom'] = $priceFrom;
$data['priceTo'] = $priceTo;
$data['searchName'] = $searchName;
$data['vendor'] = $vendor;
$data['category'] = $category;
$data['sub_category'] = $sub_category;
$data['uniqueCategories'] = $uniqueCategories;
$data['uniqueSubCategories'] = $uniqueSubCategories;
$data['Shipping_feeFrom'] = $Shipping_feeFrom;
$data['Shipping_feeTo'] = $Shipping_feeTo;
$data['StockFrom'] = $StockFrom;
$data['StockTo'] = $StockTo;
$data['Shipping_feeFrom'] = $Shipping_feeFrom;
$data['Shipping_feeTo'] = $Shipping_feeTo;
// $data['skuValues'] = json_encode($skuValues);
// $data['importedStockValues'] = json_encode($importedStockValues);

// $data['importdates'] = json_encode($importdates);
// Lưu điều kiện lọc vào session
session()->set('filters', $filters);
// var_dump( json_encode($skuValues));
    // Load view và truyền dữ liệu vào view
    return view('pages/product', $data);
}

public function exportSelectedCSV()
{
    // Lấy danh sách các sản phẩm được chọn từ form (dựa trên checkbox)
    $selectedProducts = $this->request->getPost('selectedProducts');

    // Kiểm tra nếu có sản phẩm được chọn
    if (!empty($selectedProducts)) {
        // Load model
        $ProductModel = new ProductModel();

        // Lấy dữ liệu các sản phẩm được chọn từ database
        $filteredProducts = $ProductModel->whereIn('id', $selectedProducts)->findAll();

        // Tạo một đối tượng CSV
        $csv = Writer::createFromFileObject(new SplTempFileObject());

        // Xác định ký tự phân cách
        $csv->setDelimiter(',');

        // Đưa dữ liệu vào file CSV với tên cột
        $csv->insertOne(['sku;upc;stock']);

        foreach ($filteredProducts as $product) {
            $csv->insertOne([$product['sku'].';'.$product['upc'].';'.$product['stock']]);
        }

        // Thiết lập header để tải xuống file CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export_selected.csv"');

        // Ghi dữ liệu vào đầu ra (output)
        $csv->output();

        exit();
    } else {
        // Nếu không có sản phẩm nào được chọn, xử lý theo ý của bạn (hiển thị thông báo, chuyển hướng, v.v.)
        echo 'Không có sản phẩm được chọn.';
    }
}
public function exportCSV()
{
    // Load model
    $ProductModel = new ProductModel();

    // Lấy danh sách các sản phẩm được chọn từ form (dựa trên checkbox)
    $selectedProducts = $this->request->getPost('selectedProducts');

    // Kiểm tra nếu có sản phẩm được chọn
    if (!empty($selectedProducts)) {
        // Lấy dữ liệu các sản phẩm được chọn từ database
        $filteredProducts = $ProductModel->whereIn('id', $selectedProducts)->findAll();

        // Gọi hàm thực hiện export
        $this->performExport($filteredProducts, 'export_selected.csv');
    } else {
        // Áp dụng điều kiện lọc từ session nếu không có sản phẩm nào được chọn
        $filters = session()->get('filters') ?? [];

        // Áp dụng điều kiện lọc từ session
        foreach ($filters as $key => $value) {
            if ($value !== null) {
                if ($key === 'price' && isset($value['from'], $value['to'])) {
                    $ProductModel->where("price BETWEEN {$value['from']} AND {$value['to']}", null, false);
                } elseif ($key === 'stock' && isset($value['from'], $value['to'])) {
                    $ProductModel->where("stock BETWEEN {$value['from']} AND {$value['to']}", null, false);
                } elseif ($key === 'searchName' && is_array($value)) {
                    $conditionAdded = false;
                    foreach ($value as $field => $searchValue) {
                        if ($searchValue !== null) {
                            if (!$conditionAdded) {
                                $ProductModel->groupStart();
                                $conditionAdded = true;
                            }
                            $ProductModel->orLike($field, $searchValue);
                        }
                    }
                    if ($conditionAdded) {
                        $ProductModel->groupEnd();
                    }
                } elseif (!is_array($value)) {
                    $ProductModel->where($key, $value);
                }
            }
        }

        // Lấy dữ liệu đã lọc từ model
        $filteredProducts = $ProductModel->findAll();

        // Gọi hàm thực hiện export
        $this->performExport($filteredProducts, 'export.csv');
        
    }
}

// Hàm thực hiện export




public function importCSVAndUpdate()
{
    // Kiểm tra xem có tệp tin được tải lên hay không
    if ($this->request->getFile('file')) {
        // Lấy đường dẫn tạm thời của tệp tin
        $tempFilePath = $this->request->getFile('file')->getTempName();

        // Sử dụng thư viện league/csv để đọc dữ liệu từ file CSV
        $csv = Reader::createFromPath($tempFilePath, 'r');
        $csv->setHeaderOffset(0); // Đặt offset của header (tên cột)
        $csv->setDelimiter(';'); 
        // Lấy dữ liệu từ file CSV
        $records = $csv->getRecords();

        // Load model
        $productModel = new ProductModel();
        $importHistoryModel = new ImportHistoryModel();

        $importedStockTotal = 0; // Tổng số lượng stock đã được cập nhật

        foreach ($records as $record) {
            // $record là một mảng chứa dữ liệu từ mỗi dòng của file CSV
            // Dựa vào tên cột,có thể truy cập dữ liệu cụ thể, ví dụ: $record['sku'], $record['upc'], $record['stock']

            // Tạo một mảng chứa thông tin sản phẩm
            $productInfo = [
                'sku' => $record['sku'],
                'upc' => $record['upc'],
                'stock' => $record['stock'],
            ];

            // Tìm sản phẩm trong cơ sở dữ liệu theo SKU
            $productSku = $record['sku'];
            $product = $productModel->where('sku', $productSku)->first();

            if ($product) {
                // Cập nhật dữ liệu từ file CSV vào cơ sở dữ liệu
                $product['upc'] = $record['upc'];
                $product['stock'] = $record['stock'];

                // Lưu thay đổi
                $productModel->update($product['id'], $product);

                // Thêm dữ liệu vào bảng import_history
                $importHistoryModel->addImportHistory([
                    'file_name' => 'example.csv', // Thay đổi tên file nếu cần thiết
                    'import_date' => date('Y-m-d H:i:s'),
                    'imported_stock' => $record['stock'],
                    'sku' => $record['sku'],
                ]);
            } else {
                // Nếu không tìm thấy sản phẩm, thông báo lỗi
                $errorMessage = "Không tìm thấy sản phẩm với SKU: $productSku";
                session()->setFlashdata('error', $errorMessage);

                // Thêm dữ liệu vào bảng import_history với thông báo lỗi
            

                // Redirect hoặc thực hiện hành động khác tùy thuộc vào yêu cầu của bạn
                return redirect()->to('productExport'); // Thực hiện redirect về trang sản phẩm
            }
        }
     
        // Thêm dữ liệu vào bảng import_history với số lượng stock đã được cập nhật
        // $importHistoryModel->addImportHistory([
        //     'file_name' => 'example.csv', // Thay đổi tên file nếu cần thiết
        //     'import_date' => date('Y-m-d H:i:s'),
        //     'imported_stock' => $importedStockTotal,
        // ]);

        // Xóa tệp tin tạm thời sau khi xử lý xong
        unlink($tempFilePath);

        // Sau khi import và cập nhật xong, bạn có thể thực hiện các công việc khác hoặc redirect về trang khác.
        // ...

        return redirect()->to('product'); // Thực hiện redirect về trang sản phẩm
    } else {
        // Nếu không có tệp tin được tải lên, xử lý lỗi hoặc thực hiện hành động khác tùy thuộc vào yêu cầu của bạn.
        // ...
    }
}

// Trong BackendPages\Auth.php controller

protected function performExport($filteredProducts, $filename)
{
    // Tạo một đối tượng CSV
    $csv = Writer::createFromFileObject(new SplTempFileObject());

    // Xác định ký tự phân cách
    $csv->setDelimiter(',');

    // Đưa dữ liệu vào file CSV với tên cột
    $csv->insertOne(['sku;upc;stock']);

    foreach ($filteredProducts as $product) {
        $csv->insertOne([$product['sku'].';'.$product['upc'].';'.$product['stock']]);
    }

    // Thiết lập header để tải xuống file CSV
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=\"$filename\"");

    // Ghi dữ liệu vào đầu ra (output)
    $csv->output();

    exit();
}


public function productDetails($productId)
{
    // Tạo một đối tượng của ProductModel
    $productModel = new ProductModel();

    // Sử dụng phương thức của model để lấy thông tin chi tiết sản phẩm
    $productDetails = $productModel->getProductDetails($productId);

    // Trả về view với dữ liệu chi tiết sản phẩm
    return view('pages/productDetails', ['productDetails' => $productDetails]);
}



public function downloadTemplate()
{
    // Tạo một đối tượng CSV
    $csv = Writer::createFromFileObject(new SplTempFileObject());

    // Xác định ký tự phân cách
    $csv->setDelimiter(';');

    // Đưa dữ liệu vào file CSV với tên cột
    $csv->insertOne(['sku', 'upc', 'stock']); // Mỗi cột là một phần tử trong mảng

    // Thiết lập header để tải xuống file CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="template.csv"');

    // Ghi dữ liệu vào đầu ra (output)
    $csv->output();

    exit();
}


}
 ?>
