<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function expenses(Request $request)
    { 
        $expenses = Expense::with('category','subcategory')->get();
        return view('expenses.expenses', compact('expenses'))->with('expenses',Expense::all());
    }

    public function createExpenses(Request $request)
    { 
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('expenses.createExpenses', compact('categories','subcategories'));
    }

    public function storeExpenses(Request $request)
    {       
        $expenses = new Expense();
        $expenses->category_id = $request->category_id;
        $expenses->subcategory_id = $request->subcategory_id;
        $expenses->expense_amount = $request->expense_amount;
        $expenses->expense_date = $request->expense_date;
        $expenses->user_id = Auth::user()->id;
        $expenses->save();

        return redirect('expenses');
    }
 
    public function editExpenses($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $data['expense'] = Expense::findOrFail($id);
        return view('expenses.editExpenses', $data, compact('categories','subcategories'));
    }

    public function updateExpenses(Request $request)
    {
        $request->validate([
            'expense_amount' => 'required',
            'expense_date'=> 'required'
        ]);

        $expense = Expense::findOrFail($request->expense_id);
        $expense->category_id = $request->category_id;
        $expense->subcategory_id = $request->subcategory_id;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_date = $request->expense_date;
        $expense->update();

        return redirect('/expenses')->with('message', 'Išlaidos atnaujintos');
    }

    public function destroyExpenses($id)
    {
        $data = Expense::findOrFail($id);
        $data->delete();
        return redirect('/expenses')->with('success', 'Išlaidos ištrintos sėkmingai');
    }
}