<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Backpack\MenuCRUD\app\Models\MenuItem;
use App\Models\CustomPage;
use App\Models\Feature;
use App\Models\Price;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Form;



class HomeController extends Controller
{
    public function index(): JsonResponse
    {
        $menu = MenuItem::getTree();

        return response()->json($menu, 200);
    }

    public function home(): JsonResponse
    {
        return response()->json(CustomPage::findBySlug('/')->toArray(), 200);
    }

    public function features(): JsonResponse
    {
        return response()->json(Feature::all()->toArray(), 200);
    }

    public function prices(): JsonResponse
    {
        return response()->json(Price::all()->toArray(), 200);
    }

    public function services():JsonResponse
    {
        return response()->json(Service::all()->toArray(), 200);
    }

    public function portfolios():JsonResponse
    {
        return response()->json(Portfolio::all()->toArray(), 200);
    }

    public function form(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:500',
        ]);

        Form::create($validated);

        return response()->json(['message' => 'Form submitted successfully'], 201);
    }
}
