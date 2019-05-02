@extends('layouts.app')

@section('title','User Monthly Expense Page')


@section('content')
    <div class="container">
        <!--success message code-->
        @if(session()->has('message'))
            <div class="alert alert-success" id="dataInsertSuccessMessage">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <!--error message code-->
        @if(session()->has('error'))
            <div class="alert alert-danger" id="dataInsertDangerMessage">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col">
                <h1 align="center">User's Monthly Expenses Update </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <!--
                <form action="action('ExpenseController@doUpdateDailyExpense', [$dailyExpenseData->id])" method="post">-->
                <form action="{{route('doUpdateMonthlyExpense', $monthlyExpenseData->monthly_expense_id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="morningBusFair">House Rent</label>
                        <input type="text" class="form-control" name="houseRent" id="houseRent" value="{{$monthlyExpenseData->house_rent}}">
                    </div>
                    <div class="form-group">
                        <label for="morningShopping">Electricity Bill</label>
                        <input type="text" class="form-control" name="electricityBill" id="electricityBill" value="{{$monthlyExpenseData->electricity_bill}}">
                    </div>
                    <div class="form-group">
                        <label for="eveningBusFair">Balance Transfer</label>
                        <input type="text" class="form-control" name="balanceTransfer" id="balanceTransfer" value="{{$monthlyExpenseData->balance_transfer}}">
                    </div>
                    <div class="form-group">
                        <label for="eveningShopping">Repay Loan</label>
                        <input type="text" class="form-control" name="repayLoan" id="repayLoan" value="{{$monthlyExpenseData->repay_loan}}">
                    </div>
                    <div class="form-group">
                        <label for="mobileExpense">Mobile Expense</label>
                        <input type="text" class="form-control" name="mobileExpense" id="mobileExpense" value="{{$monthlyExpenseData->mobile_expense}}">
                    </div>
                    <div class="form-group">
                        <label for="otherExpenses">Other Expenses</label>
                        <input type="text" class="form-control" name="otherExpenses" id="otherExpenses" value="{{$monthlyExpenseData->other_expense}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <button type="reset" class="btn btn-danger" onclick="clearAllFields()">Clear</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

<script>
    function clearAllFields(){
        $(morningBusFair).val("");
        $(morningShopping).val("");
        $(eveningBusFair).val("");
        $(eveningShopping).val("");
        $(mobileExpense).val("");
        $(otherExpenses).val("");
    }
    //for the notification box
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>
