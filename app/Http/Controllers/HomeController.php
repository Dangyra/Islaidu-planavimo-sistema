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

class HomeController extends Controller
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
    public function index(Request $request)
    {
        //$data = array();

        $data['incomes'] = Incomes::where('user_id', Auth::User()->id)->whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
        $data['expenses'] = Expense::where('user_id', Auth::User()->id)->whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
        $data['bills'] = Bill::where('user_id', Auth::User()->id)->whereYear('bills_date', Carbon::now()->year)->whereMonth('bills_date', Carbon::now()->month)->sum('bills_amount');
        $data['balance'] = $data['incomes'] - $data['expenses'] - $data['bills'];

        // if ($request->session()->has('loginId')){
        //     $data = User::where('id', '=', $request->session()->get('loginId'))->first();
        // }
        
        return view('dashboard', compact('data'));
    }

    public function summary(Request $request)
    {
        // $incomes = Incomes::where('user_id', Auth::User()->id)->get()->toArray();
        // //$expenses = Expense::where('user_id', Auth::User()->id)->get()->toArray();
        // $bills = Bill::where('user_id', Auth::User()->id)->get()->toArray();
        // //$subcategories = Subcategory::where('user_id', Auth::User()->id)->get()->toArray();

        // foreach ($incomes as $key => $value) {
        //     $incomes[$key]['type'] = 'income';
        // }

        // // foreach ($expenses as $key => $value) {
        // //     $expenses[$key]['type'] = 'expense';
        // // }

        // foreach ($bills as $key => $value) {
        //     $bills[$key]['type'] = 'bill';
        // }

        // $data['results'] = array_merge($incomes, $bills);
        // $data['total_income'] = Incomes::where('user_id', Auth::User()->id)->sum('income_amount');
        // //$data['total_expense'] = Expense::where('user_id', Auth::User()->id)->sum('expense_amount');
        // //$data['balance'] = $data['total_income'] - $data['total_expense'];

        // $data['total_bill'] = Bill::where('user_id', Auth::User()->id)->sum('bills_amount');
        // $data['balance'] = $data['total_income'] - $data['total_bill'];

        //return view("summary.summary", $data);

        $from    = Carbon::parse(sprintf(
            '%s-%s-01',
            $request->query('y', Carbon::now()->year),
            $request->query('m', Carbon::now()->month)
        ));
        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $exp_q = Expense::with('subcategory')->whereBetween('expense_date', [$from, $to]);

        $inc_q = Incomes::whereBetween('income_date', [$from, $to]);

        $bll_q = Bill::whereBetween('bills_date', [$from, $to]);

        $exp_group = $exp_q->orderBy('expense_amount', 'desc')->get()->groupBy('subcategory_id');
        $inc_group = $inc_q->orderBy('income_amount', 'desc')->get()->groupBy('income_tilte');
        $bll_group = $bll_q->orderBy('bills_amount', 'desc')->get()->groupBy('bills_tilte');
        $exp_total = $exp_q->sum('expense_amount');
        $inc_total = $inc_q->sum('income_amount');
        $bll_total = $bll_q->sum('bills_amount');
        $profit    = $inc_total - $exp_total - $bll_total;

        $exp_summary = [];
        foreach ($exp_group as $exp) {
            foreach ($exp as $line) {
                if (!isset($exp_summary[$line->subcategory->subcategory_name])) {
                    $exp_summary[$line->subcategory->subcategory_name] = [
                        'name'   => $line->subcategory->subcategory_name,
                        'expense_amount' => 0,
                    ];
                }
                $exp_summary[$line->subcategory->subcategory_name]['expense_amount'] += $line->expense_amount;
            }
        }

        $inc_summary = [];
        foreach ($inc_group as $inc) {
            foreach ($inc as $line) {
                if (!isset($inc_summary[$line->income_title])) {
                    $inc_summary[$line->income_title] = [
                        'name'   => $line->income_title,
                        'income_amount' => 0,
                    ];
                }
                $inc_summary[$line->income_title]['income_amount'] += $line->income_amount;
            }
        }

        $bll_summary = [];
        foreach ($bll_group as $bll) {
            foreach ($bll as $line) {
                if (!isset($bll_summary[$line->bills_title])) {
                    $bll_summary[$line->bills_title] = [
                        'name'   => $line->bills_title,
                        'bills_amount' => 0,
                    ];
                }
                $bll_summary[$line->bills_title]['bills_amount'] += $line->bills_amount;
            }
        }

        return view('summary.summary', compact(
            'exp_summary',
            'inc_summary',
            'bll_summary',
            'exp_total',
            'inc_total',
            'bll_total',
            'profit'
        ));
    }
    
}
