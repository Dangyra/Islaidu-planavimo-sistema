<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Incomes;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class IncomesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function incomes(Request $request)
    { 
        $incomes = Incomes::all();
        return view('incomes.incomes', compact('incomes'))->with('incomes',Incomes::all());
    }

    public function createIncomes(Request $request)
    { 
        $incomes = Incomes::whereNull('income_title')->with(['user'])->get();
        return view('incomes.createIncomes', compact('incomes'));
    }

    public function store(Request $request)
    { 
        $incomes = new Incomes();
        $incomes->income_title = $request->income_title;
        $incomes->income_amount = $request->income_amount;
        $incomes->income_date = $request->income_date;
        $incomes->user_id = Auth::user()->id;
        $incomes->save();

        return redirect('incomes');
    }

    public function editIncomes($id)
    {
        $data['income'] = Incomes::findOrFail($id);
        return view('incomes.editIncomes', $data);
    }

    public function updateIncomes(Request $request)
    {
        $request->validate([
            'income_title' => 'required',
            'income_amount' => 'required',
            'income_date'=> 'required'
        ]);

        $income = Incomes::findOrFail($request->income_id);
        $income->income_title = $request->income_title;
        $income->income_amount = $request->income_amount;
        $income->income_date = $request->income_date;
        $income->update();

        return redirect('/incomes')->with('message', 'Pajamos atnaujintos');
    }

    public function destroyIncomes($id)
    {
        $data = Incomes::findOrFail($id);
        $data->delete();
        return redirect('/incomes')->with('success', 'Pajamos ištrintos sėkmingai');
    }
}