@extends('layouts.app')

@section('title','User Daily Expense Page')


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
                <h1 align="center">User's Daily Expenses Update </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <!--
                <form action="action('ExpenseController@doUpdateDailyExpense', [$dailyExpenseData->id])" method="post">-->
                    <form action="{{route('doUpdateDailyExpense', $dailyExpenseData->daily_expense_id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="morningBusFair">Morning Bus fair</label>
                        <input type="text" class="form-control" name="morningBusFair" id="morningBusFair" value="{{$dailyExpenseData->morning_bus_fair}}">
                    </div>
                    <div class="form-group">
                        <label for="morningShopping">Morning Shopping</label>
                        <input type="text" class="form-control" name="morningShopping" id="morningShopping" value="{{$dailyExpenseData->morning_shopping}}">
                    </div>
                    <div class="form-group">
                        <label for="eveningBusFair">Evening Bus fair</label>
                        <input type="text" class="form-control" name="eveningBusFair" id="eveningBusFair" value="{{$dailyExpenseData->evening_bus_fair}}">
                    </div>
                    <div class="form-group">
                        <label for="eveningShopping">Evening Shopping</label>
                        <input type="text" class="form-control" name="eveningShopping" id="eveningShopping" value="{{$dailyExpenseData->evening_shopping}}">
                    </div>
                    <div class="form-group">
                        <label for="mobileExpense">Mobile Expense</label>
                        <input type="text" class="form-control" name="mobileExpense" id="mobileExpense" value="{{$dailyExpenseData->mobile_expense}}">
                    </div>
                    <div class="form-group">
                        <label for="otherExpenses">Other Expenses</label>
                        <input type="text" class="form-control" name="otherExpenses" id="otherExpenses" value="{{$dailyExpenseData->other_expense}}">
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
