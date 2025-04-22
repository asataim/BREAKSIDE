<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserApiController extends Controller
{
    protected $adminApiUrl;

    public function __construct()
    {
        $this->adminApiUrl = env('ADMIN_API_URL', 'http://localhost:8000/api');
    }

    public function getAdminProducts()
    {
        $response = Http::get($this->adminApiUrl . '/produk');
        return response()->json($response->json());
    }

    public function getAdminProduct($id)
    {
        $response = Http::get($this->adminApiUrl . '/produk/' . $id);
        return response()->json($response->json());
    }

    public function getAdminOrders()
    {
        $response = Http::get($this->adminApiUrl . '/orders');
        return response()->json($response->json());
    }

    public function getAdminOrder($id)
    {
        $response = Http::get($this->adminApiUrl . '/orders/' . $id);
        return response()->json($response->json());
    }
} 