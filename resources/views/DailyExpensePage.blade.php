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

        <div class="row">
            <div class="col">
                <h1 align="center">User's Daily Expenses</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form role="form" action="{{action('ExpenseController@getDailyExpense')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="morningBusFair">Morning Bus fair</label>
                        <input type="text" class="form-control" name="morningBusFair" id="morningBusFair" value="7">
                    </div>
                    <div class="form-group">
                        <label for="morningShopping">Morning Shopping</label>
                        <input type="text" class="form-control" name="morningShopping" id="morningShopping">
                    </div>
                    <div class="form-group">
                        <label for="eveningBusFair">Evening Bus fair</label>
                        <input type="text" class="form-control" name="eveningBusFair" id="eveningBusFair" value="7">
                    </div>
                    <div class="form-group">
                        <label for="eveningShopping">Evening Shopping</label>
                        <input type="text" class="form-control" name="eveningShopping" id="eveningShopping">
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
