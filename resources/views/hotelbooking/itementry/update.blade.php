@extends('inventory.master')
@section('title', 'Update Item|'.$companyinformation->company_name)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="card m-0">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Update Item</h4>
                        </div>
                        <a href="{{route('admin.itementry.index')}}"><button class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">All Item</span></i></button></a>
                    </div>
                </div>
                <form action="{{route('admin.itementry.update')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-sm shadow-showcase">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Item Name: *</label>
                                                <input type="text" class="form-control" id="fname" name="item_name" placeholder="Item Name" value="{{$edit->item_name}}" />
                                                <input type="hidden" name="id" value="{{$edit->id}}" />
                                                @error('item_name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Short Name: *</label>
                                                <input type="text" class="form-control" id="fname" name="short_name" placeholder="Short Name" value="{{$edit->short_name}}" />
                                                @error('branch_id')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Category Name: </label>
                                                <select name="category_name" class="form-control" id="category_name">
                                                    <option value="">--Select--</option>
                                                    @foreach($category as $cate)
                                                    <option value="{{$cate->id}}" @if($edit->category_name == $cate->id) selected @endif>{{$cate->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('room_type')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Unit Name: </label>
                                                <select name="unit_name" class="form-control floor" id="unit_name">
                                                    <option value="">--Select--</option>
                                                    @foreach($unit as $allunit)
                                                    <option value="{{$allunit->id}}" @if($edit->unit_name == $allunit->id) selected @endif>{{$allunit->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('unit')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Rate:</label>
                                                <input type="text" class="form-control" id="fname" name="rate" placeholder="Rate" value="{{$edit->rate}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Minimum Level:</label>
                                                <Input type="text" name="min_level" class="form-control" value="{{$edit->min_level}}">

                                            </div>
                                        </div>
                                        <div class="col-md-6 p-4">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="" {{$edit->is_stock == 1 ?'checked':''}} name="direct_stock">
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Is Direct Stock Deduct?
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 p-4">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="" {{$edit->is_vat == 1 ?'checked':''}} name="add_vat">
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Vat Added On Bill
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="card-title">Menu Type</h4>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control">
                                                <input type="radio" name="menu_type" id="customRadio-1" class="custom-control-input bg-primary" value="Food" @if($edit->menu_item == 'Food') checked @endif>
                                                <label class="custom-control-label" for="customRadio-1"> Food </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                                <input type="radio" name="menu_type" id="customRadio-2" class="custom-control-input bg-primary" value="Beverage" @if($edit->menu_item == 'Beverage') checked @endif>
                                                <label class="custom-control-label" for="customRadio-2"> Beverage </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                                <input type="radio" name="menu_type" id="customRadio-3" class="custom-control-input bg-primary" value="Cigarette" @if($edit->menu_item == 'Cigarette') checked @endif>
                                                <label class="custom-control-label" for="customRadio-3"> Cigarette </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                                <input type="radio" name="menu_type" id="customRadio-4" class="custom-control-input bg-primary" value="Banquet" @if($edit->menu_item == 'Banquet') checked @endif>
                                                <label class="custom-control-label" for="customRadio-4"> Banquet </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                                <input type="radio" name="menu_type" id="customRadio-5" class="custom-control-input bg-primary" value="House_kipping" @if($edit->menu_item == 'House_kipping') checked @endif>
                                                <label class="custom-control-label" for="customRadio-5"> House-kipping </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="card-title">Publish</h4>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control">
                                                <input type="radio" name="is_active" id="customRadio-8" class="custom-control-input bg-primary" value="1" @if($edit->is_active == 1) checked @endif>
                                                <label class="custom-control-label" for="customRadio-8"> Active </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                                <input type="radio" name="is_active" id="customRadio-9" name="customRadio-10" class="custom-control-input bg-warning" value="0" @if($edit->is_active == 0) checked @endif>
                                                <label class="custom-control-label" for="customRadio-9"> Deactive </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="item_name"]').on('change', function() {
            var newname = $(this).val();
            //alert(newname);
            if (newname) {
                $('.short_name').val(newname);
            }


        });
    });
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