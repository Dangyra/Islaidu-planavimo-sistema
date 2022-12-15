<?php 

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Expense;
use Illuminate\Support\Carbon;
use App\Models\Incomes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function report(Request $request)
    {
        $data['incomes'] = Incomes::select('incomes.*')->where('user_id', Auth::User()->id)->whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
        $data['expenses'] = Expense::where('user_id', Auth::User()->id)->whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
        $data['bills'] = Bill::where('user_id', Auth::User()->id)->whereYear('bills_date', Carbon::now()->year)->whereMonth('bills_date', Carbon::now()->month)->sum('bills_amount');
        $data['balance'] = $data['incomes'] - $data['expenses']- $data['bills'];
        
        return view("report.report", $data);
    }
}