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
                <h1 align="center">User's Credit Update Page</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form method="post" action="{{action('ExpenseController@getUpdateCreditPage')}}">
                    @csrf
                    <div class="form-group">
                        <label for="addToSalary">Add To Salary</label>
                        <input type="text" class="form-control" name="addToSalary" id="addToSalary">
                    </div>
                    <div class="form-group">
                        <label for="bonus">Bonus Payment</label>
                        <input type="text" class="form-control" name="bonus" id="bonus">
                    </div>
                    <div class="form-group">
                        <label for="loanTaken">Took Loan</label>
                        <input type="text" class="form-control" name="loanTaken" id="loanTaken">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update</button>
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
        $(userName).val("");
        $(userEmail).val("");
        $(monthlySalary).val("");
        $(monthlySalary).val("");
        $(currencySelect).val("");
    }
    //for the notification box
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>