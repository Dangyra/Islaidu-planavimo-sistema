<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function subcategories(Request $request)
    { 
        $subcategories = Subcategory::all();
        return view('subcategories.subcategories', compact('subcategories'))->with('subcategories',Subcategory::all());
    }

    public function createSubcategory(Request $request)
    { 
        $subcategories = Subcategory::all();
        return view('subcategories.createSubcategory', compact('subcategories'));
    }

    public function storeSubcategory(Request $request)
    {       
        $subcategories = new Subcategory();
        $subcategories->subcategory_name = $request->subcategory_name;
        $subcategories->date = $request->date;
        $subcategories->user_id = Auth::user()->id;
        $subcategories->save();

        return redirect('subcategories');
    }

    public function editSubcategory($id)
    {
        $data['subcategory'] = Subcategory::findOrFail($id);
        return view('subcategories.editSubcategory', $data);
    }

    public function updateSubcategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'date' => 'required',
        ]);

        $subcategory = Subcategory::findOrFail($request->subcategory_id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->date = $request->date;
        $subcategory->update();

        return redirect('/subcategories')->with('message', 'Subkategorija atnaujinta');
    }

    public function destroySubcategory($id)
    {
        $data = Subcategory::findOrFail($id);
        $data->delete();
        return redirect('/subcategories')->with('success', 'Subkategorija ištrinta sėkmingai');
    }
}