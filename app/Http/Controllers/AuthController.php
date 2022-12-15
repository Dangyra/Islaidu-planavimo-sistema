<?php 

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Incomes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    // public function login()
    // {
    //     return view("auth.login");
    // }
    // public function registration()
    // {
    //     return view("auth.registration");
    // }
    // public function registerUser(Request $request)
    // {
    //     $request->validate([
    //             'name' => 'required|min:3',
    //             'surname' => 'required|min:3',
    //             'email' => 'required|min:8|email|unique:users',
    //             'password' => 'required|min:5|max:225',
    //     ]);
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->surname = $request->surname;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $res = $user->save();
    //     if ($res){
    //         return back()->with('success',"Jūs užsiregistravote sėkmingai");
    //     } else {
    //         return back()->with('fail','Kažkas įvyko blogai');
    //     }
    // }
    // public function loginUser(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|min:8|email',
    //         'password' => 'required|min:5|max:225',
    // ]);
    // $user = User::where('email', '=', $request->email)->first();
    // if ($user) {
    //     if (Hash::check($request->password, $user->password)) {
    //         $request->session()->put('loginId', $user->id);
    //         return redirect('dashboard');
    //     } else {
    //         return back()->with('fail','Neteisingas slaptažodis');
    //     }
    // } else {
    //     return back()->with('fail','El. paštas neegzistuoja');
    // }
    // }
    // public function dashboard(Request $request)
    // {
    //     $data = array();

    //     $data['incomes'] = Incomes::where('user_id')->whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
    //     $data['expenses'] = Expense::where('user_id')->whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
    //     $data['balance'] = $data['incomes'] - $data['expenses'];

        // $incomes = Incomes::where('user_id', Auth::User()->id)->get()->toArray();
        // $expenses = Expense::where('user_id', Auth::User()->id)->get()->toArray();
        // foreach ($incomes as $key => $value) {
        //     $incomes[$key]['type'] = 'income';
        // }

        // foreach ($expenses as $key => $value) {
        //     $expenses[$key]['type'] = 'expense';
        // }

        // $data['results'] = array_merge($incomes, $expenses);
        // $data['incomes'] = Incomes::where('user_id', Auth::User()->id)->sum('income_amount');
        // $data['expenses'] = Expense::where('user_id', Auth::User()->id)->sum('expense_amount');
        // $data['balance'] = $data['total_income'] - $data['total_expense'];
    //     if ($request->session()->has('loginId')){
    //         $data = User::where('id', '=', $request->session()->get('loginId'))->first();
    //     }
    //     return view('dashboard', compact('data'));
    // }
    // public function logout(Request $request)
    // {
    //     if ($request->session()->has('loginId')){
    //         $request->session()->pull('loginId');
    //         return redirect('login');
    //     }
    // }
}