<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Danh sách các trang không yêu cầu đăng nhập
        $publicPages = ['login'];
        $service = service('router');

        if (!session()->has('user') && !in_array($service->methodName(), $publicPages)) {
            return redirect()->to('/login');
        }
        // Kiểm tra nếu người dùng chưa đăng nhập và trang hiện tại không thuộc danh sách trang không yêu cầu đăng nhập
//        if (!session()->has('user') && !in_array($request->uri->getSegment(1), $publicPages)) {
//            return redirect()->to('/login');
//        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Không cần xử lý sau khi điều hướng
    }
}
