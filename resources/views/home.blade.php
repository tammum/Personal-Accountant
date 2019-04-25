@extends('layouts.app')

@section('title','Personal Accountant Application')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total Credit</th>
                                <th>Expense</th>
                                <th>Remaining Credit</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>{{$today}}</td>
                                <td>{{$totalCredit}}</td>
                                <td>{{$totalExpense}}</td>
                                <td>{{$remainingCredit}}</td>
                            </tr>



                            </tbody>
                        </table>

                    </div>
                    <div>
                        <a class="btn btn-info" href="{{url('/daily_expense')}}">Daily Expense</a>
                        <a class="btn btn-success" href="{{url('/monthly_expense')}}">Monthly Expense</a>
                        <a class="btn btn-danger" href="{{url('/update_credit')}}">Update Credit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
