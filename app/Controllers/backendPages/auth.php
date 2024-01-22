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
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ];
            if ($this->validate($validationRules)) {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $model = new UserModel();
                $user = $model->where('email', $email)->first();

                if ($user && password_verify($password, $user['password'])) {
                    $userData = $model->find($user['id']);

                    session()->set('user', $userData);
                    return redirect()->to('/dashboard');
                } else {
             
                    $data['error'] = 'Email hoặc mật khẩu không đúng.';
                }
            } else {
            
                $data['validation'] = $this->validator;
            }
        }

        return view('backendPages/login', $data);
    }

    public function logout()
    {
        if (session()->has('user')) {
            session()->destroy();
            return redirect()->to('/login');
        } else {
            return redirect()->to('/login');
        }
    }





    // Trong Controller
public function adminList()
{
    $UserModel = new UserModel();
    $perPage = $this->request->getVar('quantity') ?? 2;
    $data['users'] = $UserModel->paginate($perPage);
    $data['pager'] = $UserModel->pager;
    return view('pages/adminList', $data);
}
}
 ?>
