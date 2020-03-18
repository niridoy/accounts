@extends('layouts.master')

@push('styles')

@endpush

@section('content')

<div class="page-heading">
    <h1 class="page-title">Basic Form</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Basic Form</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Horizontal Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                        <form class="form-horizontal" action="{{ route('chart-of-accounts.store') }}" method="POST">
                            @csrf
                        <div class="form-group row  @error('name') has-error @enderror ">
                            <label class="col-sm-4 col-form-label">Name Of Accounts</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="name" placeholder="Name Of Accounts">
                                @error('name')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  @error('parent_id') has-error @enderror ">
                            <label class="col-sm-4 col-form-label">Under Account</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name="parent_id" id="">
                                    @foreach ($CostCenterAccountList as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  @error('is_cost_center') has-error @enderror">
                            <label class="col-sm-4 col-form-label">Cost Center</label>
                            <div class="col-sm-8">
                                <label class="ui-radio ui-radio-inline">
                                    <input type="radio" name="is_cost_center" checked="true" value="0">
                                    <span class="input-span"></span>No</label>
                                <label class="ui-radio ui-radio-inline">
                                    <input type="radio" name="is_cost_center" value="1">
                                    <span class="input-span"></span>Yes</label>
                                    @error('is_cost_center')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 ml-sm-auto">
                                <button class="btn btn-info btn-block" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Fullscreen option</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    @foreach ($AccountList as $item)
                        {{ $item->name }} /  {{ $item->cost_center }}<br>
                        @if ($item->cost_center == 1)
                            @foreach ($item->childs as $item)
                                {{ $item->name }} /  {{ $item->cost_center }}<br>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@push('styles')

@endpush



