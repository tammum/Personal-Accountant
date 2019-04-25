@extends('layouts.app')

@section('title','User Update Credit Page')

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
        <div class="row">
            <div class="col">
                <h1 align="center">User's Monthly Expenses</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form method="post" action="{{action('ExpenseController@getMonthlyExpense')}}">
                    @csrf
                    <div class="form-group">
                        <label for="houseRent">House Rent</label>
                        <input type="text" class="form-control" name="houseRent" id="houseRent">
                    </div>
                    <div class="form-group">
                        <label for="electricityBill">Electricity Bill</label>
                        <input type="text" class="form-control" name="electricityBill" id="electricityBill">
                    </div>
                    <div class="form-group">
                        <label for="balaceTransfer">Balane Transfer</label>
                        <input type="text" class="form-control" name="balaceTransfer" id="balaceTransfer">
                    </div>
                    <div class="form-group">
                        <label for="repayLoan">Repay Loan</label>
                        <input type="text" class="form-control" name="repayLoan" id="repayLoan">
                    </div>
                    <div class="form-group">
                        <label for="mobileExpense">Mobile Expense</label>
                        <input type="text" class="form-control" name="mobileExpense" id="mobileExpense">
                    </div>
                    <div class="form-group">
                        <label for="otherExpenses">Other Expenses</label>
                        <input type="text" class="form-control" name="otherExpenses" id="otherExpenses">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Save</button>
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
        $(houseRent).val("");
        $(electricityBill).val("");
        $(balaceTransfer).val("");
        $(repayLoan).val("");
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