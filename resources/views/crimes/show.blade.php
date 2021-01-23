@extends('layouts.app')


@section('content')

<div class="mx-auto" style="width: 300px;">
                <h2>{{ $crime->case_name }}</h2>
</div>

    <div class="mx-auto" style="width: 200px;">
        <img src="{{ asset($crime->photo)}}" class="foto mx-auto" width="120px"/>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start Date:</strong>
                {{ $crime->start_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $crime->status }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Police ID:</strong>
                {{ $crime->user_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Police Name:</strong>
                {{ $user->name }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $crime->location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $crime->detail }}
            </div>
        </div>
    </div>
@endsection