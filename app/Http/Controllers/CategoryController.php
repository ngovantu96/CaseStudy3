<?php

namespace App\Http\Controllers;
use App\Http\Repo\CategoryRepo\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequets;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function  __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        $categories = $this->categoryRepository->getAll();
        dd($categories);
        return view('admin.category.list',compact('categories'));
    }
    public function store(CategoryRequets $requets){
        $this->categoryRepository->create($requets);
        $message = [
            'message'=>'Thêm mới thành công',
            'alert-type'=>'thành công'
        ];
        return redirect()->route('category.list')->with($message);
    }
    public function edit($id){
        $category = $this->categoryRepository->findById($id);
        return view('category.edit',compact('category'));
    }
    public function update(CategoryRequets $requets, $id){
        $category = $this->categoryRepository->findById($id);
        $this->categoryRepository->update($requets, $category);
        $message = [
            'message'=>'Cập nhật thành công',
            'alert-type'=>'Thành công'
        ];
        return redirect()->route('admin.category.list')->with($message);
    }
    public function delete($id){
        $category = $this->categoryRepository->findById($id);
        $this->categoryRepository->delete($category);
        $notification = [
            'message'=>'Xóa thành công',
            'alert-type'=>'Thành công'
        ];
        return redirect()->route('category.list')->with($notification);
    }
}
