@php($path = asset('/'))


@extends('layouts.master')

@section('title', 'Welcome')

@section('styles')
<style>
    /* Start Page Styling here */
</style>
@endsection

@section('content')

<div class="row">
    <!-- User Sidebar -->
    <div class="col-md-12 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-6">
            <div class="card-body pt-12">
                <div class="row ">
                    <div class="col-md-2 ">
                        <h5 class="card-title mb-0">Manage Profile Detail </h5>
                        <div class="d-flex flex-column align-items-center gap-3">
                            <label for="upload" class="btn btn-sm me-2 " tabindex="0">
                                <img
                                    alt="user-avatar"
                                    class="d-block w-px-100 h-px-100 rounded"
                                    id="profile_dp"
                                    @if(isset($user->image))
                                src="{{ EH::getFile($user->image) }}"
                                @else
                                src="{{ $path }}assets/img/avatars/1.png"

                                @endif
                                />
                                <input
                                    name="image"
                                    type="file"
                                    id="upload"
                                    class="account-file-input"
                                    hidden
                                    accept="image/png, image/jpeg" onchange="uploadImage(this,'{{ $user->id }}','#profile_dp')" />
                            </label>
                            <div class="small text-muted text-center">@lang('employees.Allowed JPG, GIF or PNG. Max size of 2MB')</div>
                        </div>

                    </div>
                    <div class="col-md-10 border rounded">
                        <form action="{{ route('profile.update') }}" method="post" id="form_update_employee" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-4  mb-3">
                                    <label for="name" class="form-label">@lang('employees.Name') <i class="text-danger asteric">*</i></label>
                                    <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control cls_required" placeholder="Mr. John" />
                                    <small class="form-errors pull-right text-danger req" value="*"></small>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4  mb-3">
                                    <label for="email" class="form-label">@lang('employees.Email') <i class="text-danger asteric">*</i></label>
                                    <input type="text" value="{{ $user->email }}" name="email" id="email" class="form-control cls_email cls_required" placeholder="john@xyz.com">
                                    <small class="form-errors pull-right text-danger req" value="*"></small>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4  mb-3">
                                    <label for="mobile" class="form-label">@lang('employees.Mobile') <i class="text-danger asteric">*</i></label>
                                    <input type="text" value="{{ $user->mobile }}" name="mobile" class="form-control cls_required" placeholder="0xxxxxxxxxx">
                                    <small class="form-errors pull-right text-danger req" value="*"></small>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4  mb-3">
                                    <label for="password" class="form-label">@lang('employees.Password') <i class="text-danger asteric"></i></label>
                                    <div class="input-group">
                                        <input type="text" name="password" class="form-control password cls_required" id="password" placeholder="Recipient's password" aria-label="Recipient's password" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2" onclick="generatePassword(12,'#password')">@lang('employees.Generate')</button>
                                    </div>
                                    <small class="form-errors pull-right text-danger req" value=""></small>
                                </div>
                                {{--<div class="col-md-6 col-sm-12 col-lg-4  mb-3">
                                    <label for="role" class="form-label">@lang('employees.Roles') <i class="text-danger asteric"></i></label>
                                    <input type="text" value="{{ $role->name }}" name="role" id="role" class="form-control" placeholder="HR" disabled>
                                <input type="hidden" name="role" value="{{ $role->id }}">

                                <small class="form-errors pull-right text-danger req" value="*"></small>
                            </div>--}}
                            <div class="col-md-6 col-sm-12 col-lg-4 change_lg mb-3">
                                <label for="is_push_on_zoho" class="form-label">@lang('employees.Send Emial') ?<i class="text-danger"></i></label>
                                <div class="form-check form-switch mt-2">
                                    <label class="form-check-label pr-4 mr-4 form-label" for="send_credentials">@lang('employees.Are You Need Login credentials on Your Email')? </label>
                                    <input class="form-check-input ml-4" name="send_credentials" type="checkbox" id="send_credentials">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end p-4">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button class="btn btn-primary btn-next waves-effect waves-light" id="submit" onclick="formSubmit(event, this, '#form_update_employee', false)" content="update Profile">
                                    @lang('general.Submit') </button>
                            </div>
                    </div>
                    </form>
                </div>



            </div>

        </div>
    </div>
    <!-- /User Card -->

</div>
<!--/ User Sidebar -->


</div>

@endsection

@section('modals')
<!-- Include Bootstrap Modals Here -->
@endsection

@section('scripts')
@include('profile.scripts.profile_script')
@endsection
