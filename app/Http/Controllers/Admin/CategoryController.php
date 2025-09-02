<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public CategoryService $categoryService;

    /**
     * @param CategoryService $service
     */
    public function __construct(CategoryService $service)
    {
        $this->categoryService = $service;
    }


    /**
     * View return etmeden önce view içerisinde göndereceğimiz verileri servis sdosyasınta alarak data değişkeinin içerisine eledik. Data değişkenini viewe gönderdik
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        $data = $this->categoryService->index();
        return view('admin.categories.index')->with('data',$data);
    }


    /**
     * Gelen post verilerinin servise gönderdik ve validasyon ve db işlemleri yapıldı. sonucunda ise hata varsa witherrors yapıldı eğer hata yoksa direkt bir önceki sayfaya yönlendirildi
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $store = $this->categoryService->store($request->all());

        if (!$store['status']) {
            return redirect()->back()
                ->withErrors($store['errors'])
                ->withInput();
        }

        return redirect()->back();
    }

}
