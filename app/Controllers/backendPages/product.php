<?php

namespace App\Controllers\backendPages;

use App\Models\ImportHistoryModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;
use League\Csv\Reader;
use League\Csv\Writer;
use SplTempFileObject;
class Product extends Controller
{
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

        $importHistoryModel = new ImportHistoryModel();
        $importHistory = $importHistoryModel
    ->select('sku, import_date, imported_stock')
    ->findAll();

        $skuValues = [];


        $importedStockValues = [];

        foreach ($importHistory as $history) {
            $skuValues[] = $history['sku'];
            $importdates[] = $history['import_date'];
            $importedStockValues[] = $history['imported_stock'];
        }

$uniqueCategories = $ProductModel->getUniqueCategories(false);
$uniqueSubCategories = $ProductModel->getUniqueCategories(true);

    
 
        $perPage = $this->request->getVar('quantity') ?? 7;

    
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


        $filters = [
          
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
        if ($vendor !== null) {
            $ProductModel->where('vendor', $vendor);
        }

        if ($searchName !== null) {
            $ProductModel->groupStart()
                ->orLike('name', $searchName)
                ->orLike('sku', $searchName)
                ->orLike('upc', $searchName)
                ->orLike('id', $searchName)
                ->groupEnd();
        }


        $sortColumn = $this->request->getVar('column');
        $sort = $this->request->getVar('sort');

        if ($sortColumn !== null && in_array($sortColumn, ['msrp', 'price', 'id', 'shipping_fee', 'msrp', 'sale_price_1', 'sale_price_2', 'profit', 'weight', 'lenght', 'width', 'depth', 'height', 'package_weight', 'package_lenght', 'package_height']) && in_array(strtolower($sort), ['asc', 'desc'])) {
            $ProductModel->orderBy($sortColumn, strtoupper($sort));
        }


        if ($vendor !== null) {
            $ProductModel->where('vendor', $vendor);
        }


$category = $this->request->getVar('category');
if ($category !== null) {
    $category = urldecode($category);
    $ProductModel->where('category', $category);
}

        $sub_category = $this->request->getVar('sub_category');
        if ($sub_category !== null) {
            $sub_category = urldecode($sub_category);
            $ProductModel->where('sub_category', $sub_category);
        }
        
        


        if (isset($filters['price']['from'], $filters['price']['to'])) {
            $ProductModel->where('price BETWEEN ' . $filters['price']['from'] . ' AND ' . $filters['price']['to']);
        } elseif (isset($filters['price']['from'])) {
            $ProductModel->where('price >=', $filters['price']['from']);
        } elseif (isset($filters['price']['to'])) {
            $ProductModel->where('price <=', $filters['price']['to']);
        } 
        elseif (isset($filters['stock']['from'], $filters['stock']['to'])) {
            $ProductModel->where('stock BETWEEN ' . $filters['stock']['from'] . ' AND ' . $filters['stock']['to']);
        } elseif (isset($filters['stock']['from'])) {
            $ProductModel->where('stock >=', $filters['stock']['from']);
        } elseif (isset($filters['stock']['to'])) {
            $ProductModel->where('stock <=', $filters['stock']['to']);
        }

        if (isset($filters['shipping_fee']['from'], $filters['shipping_fee']['to'])) {
            $ProductModel->where('shipping_fee BETWEEN ' . $filters['shipping_fee']['from'] . ' AND ' . $filters['shipping_fee']['to']);
        } elseif (isset($filters['shipping_fee']['from'])) {
            $ProductModel->where('shipping_fee >=', $filters['shipping_fee']['from']);
        } elseif (isset($filters['shipping_fee']['to'])) {
            $ProductModel->where('shipping_fee <=', $filters['shipping_fee']['to']);
        }


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



        session()->set('filters', $filters);


        return view('pages/product', $data);
    }

    public function exportSelectedCSV()
    {
       
        $selectedProducts = $this->session->get('selectedProducts');

        if (!empty($selectedProducts)) {
        
            $ProductModel = new ProductModel();
        
           
            $filteredProducts = $ProductModel->whereIn('id', $selectedProducts)->findAll();
        
   
            $csv = Writer::createFromFileObject(new SplTempFileObject());

       
            $csv->setDelimiter(',');

        
            $csv->insertOne(['sku;upc;stock']);

            foreach ($filteredProducts as $product) {
                $csv->insertOne([$product['sku'] . ';' . $product['upc'] . ';' . $product['stock']]);
            }    
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="export_selected.csv"');
            $csv->output();

            exit();
        } else {
            echo 'Không có sản phẩm được chọn.';
        }
    }

    public function exportCSV()
    {
        $ProductModel = new ProductModel();
        $selectedProducts = $this->request->getPost('selectedProducts');

        if (!empty($selectedProducts)) {
            $filteredProducts = $ProductModel->whereIn('id', $selectedProducts)->findAll();

            $this->performExport($filteredProducts, 'export_selected.csv');
        } else {
            $filters = session()->get('filters') ?? [];
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

            $filteredProducts = $ProductModel->findAll();
            $this->performExport($filteredProducts, 'export.csv');

        }
    }



    public function importCSVAndUpdate()
    {
        if ($this->request->getFile('file')) {
            $tempFilePath = $this->request->getFile('file')->getTempName();
            $csv = Reader::createFromPath($tempFilePath, 'r');
            $csv->setHeaderOffset(0); 
            $csv->setDelimiter(';');
            $records = $csv->getRecords();

            // Load model
            $productModel = new ProductModel();
            $importHistoryModel = new ImportHistoryModel();

            $importedStockTotal = 0; 

            foreach ($records as $record) {

                $productInfo = [
                    'sku' => $record['sku'],
                    'upc' => $record['upc'],
                    'stock' => $record['stock'],
                ];
                $productSku = $record['sku'];
                $product = $productModel->where('sku', $productSku)->first();

                if ($product) {
                    $product['upc'] = $record['upc'];
                    $product['stock'] = $record['stock'];
                    $productModel->update($product['id'], $product);
                    $importHistoryModel->addImportHistory([
                        'file_name' => 'example.csv', 
                        'import_date' => date('Y-m-d H:i:s'),
                        'imported_stock' => $record['stock'],
                        'sku' => $record['sku'],
                    ]);
                } else {
                    $errorMessage = "Không tìm thấy sản phẩm với SKU: $productSku";
                    session()->setFlashdata('error', $errorMessage);
                    return redirect()->to('productExport'); 
                }
            }
            unlink($tempFilePath);
            return redirect()->to('product'); 
        } else {
        }
    }

// Trong BackendPages\Auth.php controller

    protected function performExport($filteredProducts, $filename)
    {
        $csv = Writer::createFromFileObject(new SplTempFileObject());

        $csv->setDelimiter(',');
        $csv->insertOne(['sku;upc;stock']);

        foreach ($filteredProducts as $product) {
            $csv->insertOne([$product['sku'] . ';' . $product['upc'] . ';' . $product['stock']]);
        }
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $csv->output();

        exit();
    }


    public function productDetails($productId)
    {
        $productModel = new ProductModel();
        $productDetails = $productModel->getProductDetails($productId);
        return view('pages/productDetails', ['productDetails' => $productDetails]);
    }


    public function downloadTemplate()
    {
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->setDelimiter(';');
        $csv->insertOne(['sku', 'upc', 'stock']);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="template.csv"');
        $csv->output();

        exit();
    }
}










