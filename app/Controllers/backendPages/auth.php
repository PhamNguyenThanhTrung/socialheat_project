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





    // Trong Controller
public function adminList()
{
    // Load model
    $UserModel = new UserModel();

    // Số lượng dòng hiển thị trên mỗi trang
    $perPage = $this->request->getVar('quantity') ?? 2;
  
    // Truy vấn dữ liệu từ model với phân trang
    $data['users'] = $UserModel->paginate($perPage);
    $data['pager'] = $UserModel->pager;


    // Load view và truyền dữ liệu vào view
    return view('pages/adminList', $data);
}








// Hàm thực hiện export






}
 ?>
