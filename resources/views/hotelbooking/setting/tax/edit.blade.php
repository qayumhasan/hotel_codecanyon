@extends('hotelbooking.master')
@section('title', 'Update Tax Setting | '.$companyinformation->company_name)
@section('content')
@php
date_default_timezone_set("asia/dhaka");
$current = date("Y/m/d");
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-header d-flex justify-content-between bg-header">
                                <div class="header-title">
                                    <h4 class="card-title">Updated Tax Setting</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.tax.update',$tax->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Date: *</label>
                                                <input id="datepicker" type="text" class="form-control form-control-sm" name="tax_date" value="{{$tax->date}}" required />
                                                @error('tax_date')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Tax Description: *</label>
                                                <textarea class="form-control form-control-sm" name="tax_description" required>{{$tax->tax_description}}</textarea>
                                                @error('tax_description')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Calculation: *</label>
                                                <input type="text" class="form-control form-control-sm" name="calculation" value="{{$tax->calculation}}" required />
                                                @error('calculation')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Base On: *</label>
                                                <select class="form-control form-control-sm base_on" id="base_on" name="base_on">
                                                    <option @if($tax->base_on =='percentage' ) checked @endif value="percentage">Percentage</option>
                                                    <option @if($tax->base_on =='amount' ) checked @endif value="amount">Amount</option>
                                                </select>
                                                @error('base_on')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Percentage(%): *</label>
                                                <input type="number" @if($tax->base_on =='percentage' ) '' @else disabled @endif step="0.01" class="form-control form-control-sm rate" name="rate" value="{{$tax->rate}}" />
                                                @error('rate')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Amount($):*</label>
                                                <input type="number" @if($tax->base_on =='amount' ) '' @else disabled @endif step="0.01" class="form-control form-control-sm amount" name="amount" value="{{$tax->amount}}" />
                                                @error('rate')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Status: *</label>
                                                <select class="form-control form-control-sm" name="effect">
                                                    <option @if($tax->effect == "Add") selected @endif value="1">Add</option>
                                                    <option @if($tax->effect == "Deducted") selected @endif value="0">Deduct</option>
                                                </select>
                                                @error('effect')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center mt-4">
                                            <div id="file-upload-form" class="uploader-file ml-auto d-block">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between bg-header">
                                                <div class="header-title">
                                                    <h4 class="card-title">Tax Settings</h4>
                                                </div>
                                                <span class="float-right mr-2">
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="datatable" class="table data-table table-striped table-bordered">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Description</th>
                                                                <th>Calculation</th>
                                                                <th>Rate/Amount</th>
                                                                <th>Effect</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach($taxes as $row)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td data-toggle="tooltip" data-placement="bottom" title="{{$row->tax_description}}">{{Str::limit($row->tax_description,10)}}</td>
                                                                <td>{{$row->calculation}}</td>
                                                                @if($row->base_on == "percentage")
                                                                <td>{{$row->rate}} %</td>
                                                                @elseif($row->base_on == "amount")
                                                                <td>$ {{$row->amount}}</td>
                                                                @endif
                                                                <td>{{$row->effect}}</td>
                                                                <td>
                                                                    @if($row->is_active == 1)
                                                                        <span class="btn btn-success btn-sm">Active<span>
                                                                    @else
                                                                        <span class="btn btn-danger btn-sm">Deactive<span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($row->is_active == 1)
                                                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.taxsetting.status',$row->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                                                    @else <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.taxsetting.status',$row->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                                                    @endif
                                                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.taxsetting.edit',$row->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>

                                                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.taxsetting.delete',$row->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        var baseOn = (function() {
            return {
                baseon: document.querySelectorAll(".base_on"),
                rate: document.querySelector(".rate"),
                amount: document.querySelector(".amount"),
            }
        })();
        var controller = (function(baseon) {
            var eventhandeler = function() {
                baseon.baseon[0].addEventListener('change', function(e) {
                    if (e.target.value == 'percentage') {
                        baseon.rate.required = true;
                        baseon.amount.required = false;
                        baseon.rate.disabled = false;
                        baseon.amount.disabled = true;
                        baseon.amount.value = '';
                        baseon.rate.focus();
                    } else if (e.target.value == 'amount') {
                        baseon.rate.disabled = true;
                        baseon.amount.disabled = false;
                        baseon.amount.required = true;
                        baseon.rate.required = false;
                        baseon.amount.focus();
                        baseon.rate.value = '';
                    }
                });
            }
            return {
                init: function() {
                    return eventhandeler();
                }
            }
        })(baseOn);
        controller.init();
    </script>
    <script>
        $('body').on('keydown', 'input,select,textarea', function(e) {
            var self = $(this),
                form = self.parents('form:eq(0)'),
                focusable, next;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this) + 1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
            }
        });
    </script>
    @endsection