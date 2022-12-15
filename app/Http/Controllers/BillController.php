<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MassDestroyBillRequest;
use massDestroy;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bills(Request $request)
    { 
        $bills = Bill::all();
        $data = array();
        if ($request->session()->has('loginId')){
            $data = User::where('id', '=', $request->session()->get('loginId'))->first();
        }
        return view('bills.bills', compact('bills','data'))->with('bills',Bill::all());
    }
    public function createBills(Request $request)
    { 
        $data = array();
        if ($request->session()->has('loginId')){
            $data = User::where('id', '=', $request->session()->get('loginId'))->first();
        }
        $bills = Bill::all();
        return view('bills.createBills', compact('data','bills'));
    }

    //public function store(CreateCategoryRequest $request)
    public function storeBills(Request $request)
    { 
        $bills = new Bill();
        $bills->bills_title = $request->bills_title;
        $bills->bills_amount = $request->bills_amount;
        $bills->bills_date = $request->bills_date;
        $bills->user_id = Auth::user()->id;
        $bills->save();

        return redirect('bills');
    }

    public function editBills($id)
    {
        $data['bill'] = Bill::findOrFail($id);
        return view('bills.editBills', $data);
    }

    public function updateBills(Request $request)
    {
        $request->validate([
            'bills_title' => 'required',
            'bills_amount' => 'required',
            'bills_date'=> 'required'
        ]);

        $bill = Bill::findOrFail($request->bill_id);
        $bill->bills_title = $request->bills_title;
        $bill->bills_amount = $request->bills_amount;
        $bill->bills_date = $request->bills_date;
        $bill->update();

        return redirect('/bills')->with('message', 'Mokesčiai atnaujinti');
    }

    public function destroyBills($id)
    {
        $data = Bill::findOrFail($id);
        $data->delete();
        return redirect('/bills')->with('success', 'Mokesčiai ištrinti sėkmingai');
    }
}