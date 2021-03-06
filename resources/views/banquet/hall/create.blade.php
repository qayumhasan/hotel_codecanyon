@extends('banquet.master')
@section('title', 'Add Venue | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="card m-0">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Add Venue</h4>
                        </div>
                        <a href="{{route('admin.hall.index')}}"><button class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">All Item</span></i></button></a>
                    </div>
                </div>
                <form action="{{route('admin.hall.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-sm shadow-showcase">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Venue Name: *</label>
                                                <input type="text" class="form-control" name="venue_name" placeholder="Venue Name" />
                                                @error('venue_name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Mobile : </label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" />
                                                @error('mobile')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Email: </label>
                                                <input type="text" class="form-control" name="email" placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Facebook Link:</label>
                                                <input type="text" class="form-control" id="fname" name="facebook_link" placeholder="Facebook Link" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Address:</label>
                                                <textarea name="address" class="form-control" placeholder="Address"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Google map:</label>
                                                <textarea name="google_map" class="form-control" placeholder="Google map"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                        <h4 class="card-title mt-4">Publish</h4>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control">
                                                <input type="radio" name="is_active" id="customRadio-8" class="custom-control-input bg-primary" value="1" checked>
                                                <label class="custom-control-label" for="customRadio-8"> Active </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                                <input type="radio" name="is_active" id="customRadio-9" name="customRadio-10" class="custom-control-input bg-warning" value="0">
                                                <label class="custom-control-label" for="customRadio-9"> Deactive </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-primary">Add Venue</button>
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