<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\Expense;
use App\Models\Subcategory;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function diagram(Request $request)
    {
        $result = DB::select(DB::raw("select income_amount,
        income_title from Incomes"));
        $chartData ="";
        foreach($result as $list){
            $chartData="['".$list->income_title."',   ".$list->income_amount."],";
        }
        $arr['chartData']=rtrim($chartData.",");

        $incomeData = Incomes::select('income_title',DB::raw("COUNT(*) as count"))
        ->whereYear("income_date",date('Y'))
        ->groupBy(DB::raw("Month(income_date)"))
        ->groupBy('income_title')
        ->get();

        $expenseData = Expense::select('category_id',DB::raw("COUNT(*) as ex"))
        ->whereYear("expense_date",date('Y'))
        ->groupBy(DB::raw("Month(expense_date)"))
        ->groupBy('category_id')
        ->get();
        
        $billData = Bill::select('bills_title',DB::raw("COUNT(*) as bl"))
        ->groupBy('bills_title')
        ->get();

        return view('diagram.diagram',compact('chartData','incomeData','expenseData'));
        
    }
}