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

        $publicPages = ['login'];
        $service = service('router');

        if (!session()->has('user') && !in_array($service->methodName(), $publicPages)) {
            return redirect()->to('/login');
        }

    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
