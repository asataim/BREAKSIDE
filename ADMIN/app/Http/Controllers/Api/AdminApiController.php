<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminApiController extends Controller
{
    protected $userApiUrl;

    public function __construct()
    {
        $this->userApiUrl = env('USER_API_URL', 'http://localhost:8000/api');
    }

    public function getProducts()
    {
        $response = Http::get($this->userApiUrl . '/produk');
        return response()->json($response->json());
    }

    public function getProduct($id)
    {
        $response = Http::get($this->userApiUrl . '/produk/' . $id);
        return response()->json($response->json());
    }

    public function getOrders()
    {
        $response = Http::get($this->userApiUrl . '/orders');
        return response()->json($response->json());
    }

    public function getOrder($id)
    {
        $response = Http::get($this->userApiUrl . '/orders/' . $id);
        return response()->json($response->json());
    }
} 