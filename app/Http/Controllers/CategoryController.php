<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::latest()->paginate(6)->withQueryString(),
            'title' => 'Kategori'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'title' => 'Tambah Categoy'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category' => 'required'
        ]);
        Category::create($validatedData);

        return redirect('/admin/category')->with('success', 'Kategori Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.category.edit', [
            'tite' => 'Update Category',
            // 'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category->id_category);
        return view('admin.category.edit', [
            'title' => 'Update Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->name_category);
        $validatedData = $request->validate([
            'name_category' => 'required'
        ]);
        
        // Category::where('id_category', $category->id_category)->update($validatedData);
        DB::table('categories')
            ->where('id_category', $category->id_category)
            ->update($validatedData);

        return redirect('/admin/category')->with('success', 'Kategori Berhasil diUpdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id_category);
        return redirect('/admin/category')->with('success', 'Data Kategori Berhasil diHapus!');
    }
}
