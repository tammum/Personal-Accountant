<?php

namespace App\Http\Controllers;

use App\DailyExpense;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
//        $totalDailyExpenseCurrentDay = 0;
       $currentDate = Carbon::now();
       $today = $currentDate->toDateString();
       $firstDayOfCurrentMonth = $currentDate->startOfMonth()->toDateString();
        $lastDayOfCurrentMonth = $currentDate->lastOfMonth()->toDateString();
//       $firstDayOfPreviousMonth = $today->subMonth()->startOfMonth()->toDateString();
//       $LastDayOfPreviousMonth = $today->subMonth()->lastOfMonth()->toDateString();
//       $dailyExpenseTableData = DailyExpense::whereDate('date', '=', $param)
//           ->where('id', Auth::id())
//           ->get();
//       foreach ($dailyExpenseTableData as $items)
//        $totalDailyExpenseCurrentDay = $totalDailyExpenseCurrentDay + $items->morning_bus_fair + $items->morning_shopping + $items->evening_bus_fair
//                                        + $items->evening_shopping + $items->mobile_expense + $items->other_expense;
////       return  $totalDailyExpenseCurrentDay;

        $dailyExpenseData = User::find(Auth::id())->DailyExpense->where('date', '>=', $firstDayOfCurrentMonth)
            ->where('date', '<=', $lastDayOfCurrentMonth)->sum( function($row)
        {
            return $row->morning_bus_fair + $row->morning_shopping + $row->evening_bus_fair + $row->evening_shopping
                    + $row->mobile_expense + $row->other_expense;
        });
        $monthlyExpenseData = User::find(Auth::id())->MonthlyExpense->where('date', '>=', $firstDayOfCurrentMonth)
            ->where('date', '<=', $lastDayOfCurrentMonth)->sum( function($row)
        {
            return $row->house_rent + $row->electricity_bill + $row->balance_transfer + $row->repay_loan
                + $row->mobile_expense + $row->other_expense;
        });
        $totalExpense = $dailyExpenseData + $monthlyExpenseData;
        $totalCredit = User::find(Auth::id())->Credit->where('date', '>=', $firstDayOfCurrentMonth)
            ->where('date', '<=', $lastDayOfCurrentMonth)->sum( function($row)
        {
           return $row->salary + $row->bonus + $row->loan;
        });
        $remainingCredit = $totalCredit - $totalExpense;

        return view('home', compact('totalExpense', 'remainingCredit', 'totalCredit', 'today'));
    }
}
