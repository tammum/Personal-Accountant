<?php

namespace App\Http\Controllers;

use App\Credit;
use App\MonthlyExpense;
use App\User;
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
        $dateInDatabase = User::find(Auth::id())->DailyExpense->where('date', '=', Carbon::now()->toDateString());
        if (!$dateInDatabase->isEmpty()) {
            return redirect()->back()->with('error', 'today you already entered data! Please Try Updating!');
        } else {
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
            $dailyExpenseTableData->save();
            return redirect()->back()->with('message', 'Data has been inserted successfully!!');
        }
    }
    public function updateDailyExpense($userId)
    {
        //get update page of daily expenses
        if ($userId) {
            $dailyExpenseData = User::find($userId)->DailyExpense->where('date', '=', Carbon::now()->toDateString())->first();
//            return $dailyExpenseData;
            return view('updateDailyExpensePage', compact('dailyExpenseData'));
        }

    }
    public function doUpdateDailyExpense(Request $request, $dailyExpenseId)
    {
        //updating daily expense
        $dailyExpenseTableData = DailyExpense::find($dailyExpenseId);
        $dailyExpenseTableData->morning_bus_fair = $request->get('morningBusFair');
        $dailyExpenseTableData->morning_shopping = $request->get('morningShopping');
        $dailyExpenseTableData->evening_bus_fair = $request->get('eveningBusFair');
        $dailyExpenseTableData->evening_shopping = $request->get('eveningShopping');
        $dailyExpenseTableData->mobile_expense = $request->get('mobileExpense');
        $dailyExpenseTableData->other_expense = $request->get('otherExpenses');
        $dailyExpenseTableData->save();
        return redirect('home')->with('message', 'Data has been updated successfully!!');
//        return $dailyExpenseId;
//        return $dailyExpenseTableData;
    }
    public function showMonthlyExpensePage()
    {
        return view('MonthlyExpensePage');
    }

    //getting monthly expenses
    public function getMonthlyExpense(Request $request)
    {
        $today = Carbon::now();
        $firstDayCurrentMonth = $today->startOfMonth()->toDateString();
        $lastDayCurrentMonth = $today->lastOfMonth()->toDateString();
        $monthlyExpenseTableData = User::find(Auth::id())->MonthlyExpense->where('date', '>=', $firstDayCurrentMonth)
                                    ->where('date', '<=', $lastDayCurrentMonth);
        if (!$monthlyExpenseTableData->isEmpty()) {
            return redirect()->back()->with('error', 'today you already entered monthly expense! Please Try Updating!');
        } else {
            $monthlyExpenseTableData = new MonthlyExpense;
            $monthlyExpenseTableData->id = Auth::id();
            $monthlyExpenseTableData->date = Carbon::now();
            $monthlyExpenseTableData->house_rent = $request->houseRent;
            $monthlyExpenseTableData->electricity_bill = $request->electricityBill;
            $monthlyExpenseTableData->balance_transfer = $request->balaceTransfer;
            $monthlyExpenseTableData->repay_loan = $request->repayLoan;
            $monthlyExpenseTableData->mobile_expense = $request->mobileExpense;
            $monthlyExpenseTableData->other_expense = $request->otherExpenses;
            $monthlyExpenseTableData->save();
            return redirect()->back()->with('message', 'Data has been inserted successfully!!');
//        return $monthlyExpenseTableData;
        }

    }
    public function updateMonthlyExpense($userId)
    {
        if($userId) {
            $today = Carbon::now();
            $firstDayCurrentMonth = $today->firstOfMonth()->toDateString();
            $lastDayCurrentMonth = $today->lastOfMonth()->toDateString();
            $monthlyExpenseData = User::find($userId)->MonthlyExpense->where('date', '>=', $firstDayCurrentMonth)
                                    ->where('date', '<=', $lastDayCurrentMonth)->first();
//            return $monthlyExpenseData;
            return view('UpdateMonthlyExpensePage', compact('monthlyExpenseData'));
        }
    }
    public function doUpdateMonthlyExpense(Request $request, $monthlyExpenseId)
    {
        $monthlyExpenseData = MonthlyExpense::find($monthlyExpenseId);
        $monthlyExpenseData->house_rent = $request->get('houseRent');
        $monthlyExpenseData->electricity_bill = $request->get('electricityBill');
        $monthlyExpenseData->balance_transfer = $request->get('balanceTransfer');
        $monthlyExpenseData->repay_loan = $request->get('repayLoan');
        $monthlyExpenseData->mobile_expense = $request->get('mobileExpense');
        $monthlyExpenseData->other_expense = $request->get('otherExpense');
        $monthlyExpenseData->save();
        return redirect('home')->with('message', 'Data has been updated successfully!');

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
