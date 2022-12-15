<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function categories(Request $request)
    { 
        $categories = Category::all();
        return view('categories.categories', compact('categories'))->with('categories',Category::all());
    }

    public function createCategory(Request $request)
    { 
        $categories = Category::all();
        return view('categories.createCategory', compact('categories'));
    }

    public function storeCategory(Request $request)
    { 
        $categories = new Category();
        $categories->category_name = $request->category_name;
        $categories->date = $request->date;
        $categories->user_id = Auth::user()->id;
        $categories->save();
       
        return redirect('categories');
    }

    public function editCategory($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('categories.editCategory', $data);
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'date' => 'required',
        ]);

        $category = Category::findOrFail($request->category_id);
        $category->category_name = $request->category_name;
        $category->date = $request->date;
        $category->update();

        return redirect('/categories')->with('message', 'Kategorija atnaujinta');
    }

    public function destroyCategory($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect('/categories')->with('success', 'Kategorija ištrinta sėkmingai');
    }
}