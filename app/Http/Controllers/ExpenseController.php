<?php

namespace App\Http\Controllers;

use App\Credit;
use App\MonthlyExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DailyExpense;

class ExpenseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDailyExpensePage()
    {
        return view('DailyExpensePage');
    }

    //getting daily expense  from the form
    public function getDailyExpense(Request $request)
    {
        //$dailyExpenseTableData = DailyExpense::find(Auth::id());
        $dailyExpenseTableData = new DailyExpense;
        $dailyExpenseTableData->id = Auth::id();
        $dailyExpenseTableData->date = Carbon::now();
        $dailyExpenseTableData->morning_bus_fair = $request->morningBusFair;
        $dailyExpenseTableData->morning_shopping = $request->morningShopping;
        $dailyExpenseTableData->evening_bus_fair = $request->eveningBusFair;
        $dailyExpenseTableData->evening_shopping = $request->eveningShopping;
        $dailyExpenseTableData->mobile_expense = $request->mobileExpense;
        $dailyExpenseTableData->other_expense = $request->otherExpenses;
        $dailyExpenseTableData -> save();
        return redirect()->back()->with('message', 'Data has been inserted successfully!!');


    }
    public function showMonthlyExpensePage()
    {
        return view('MonthlyExpensePage');
    }

    //getting monthly expenses
    public function getMonthlyExpense(Request $request)
    {
        $monthlyExpenseTableData = new MonthlyExpense;
        $monthlyExpenseTableData->id = Auth::id();
        $monthlyExpenseTableData->date = Carbon::now();
        $monthlyExpenseTableData->house_rent = $request->houseRent;
        $monthlyExpenseTableData->electricity_bill = $request->electricityBill;
        $monthlyExpenseTableData->balance_transfer = $request->balaceTransfer;
        $monthlyExpenseTableData->repay_loan = $request->repayLoan;
        $monthlyExpenseTableData->mobile_expense = $request->mobileExpense;
        $monthlyExpenseTableData->other_expense = $request->otherExpenses;
        $monthlyExpenseTableData -> save();
        return redirect()->back()->with('message', 'Data has been inserted successfully!!');

    }
    //credit update page
    public function showUpdateCreditPage()
    {
        return view('UpdateCreditPage');
    }
    public function getUpdateCreditPage(Request $request)
    {
        $creditTableData = new Credit;
        $creditTableData->id = Auth::id();
        $creditTableData->date = Carbon::now();;
        $creditTableData->salary = $request->addToSalary;
        $creditTableData->bonus = $request->bonus;
        $creditTableData->loan = $request->loanTaken;
        $creditTableData -> save();
        return redirect()->back()->with('message', 'Data has been inserted successfully!!');

    }

}
