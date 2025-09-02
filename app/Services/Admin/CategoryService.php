<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryService
{
    public CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): array
    {
        $categories =  $this->categoryRepository->all();
        return [
            'categories' => $categories,
        ];
    }

    public function store(array $data)
    {
        // Validasyon
        $validation = Validator::make($data, [
            'name' => 'required|min:3|max:100',
        ]);

        if ($validation->fails()) {
            return [
                'status' => false,
                'errors' => $validation->errors()
            ];
        }


        $this->categoryRepository->create([
            'parent_id' => $data['parent_id'] ?? 0,
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);


        return [
            'status' => true,
        ];

    }
}
