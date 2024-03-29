@extends('layouts.admin.app')

@section('title', Route::is('employee.add') ? 'Add Employee':'Edit Employee')

@section('css')
   asdads
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Manage Employees</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{Route::is('employee.add') ? 'Add':'Edit'}} Employee Details</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.insert') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->id ?? ''}}">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <div class="row mb-3 form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $employee->name ?? ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $employee->email ?? ''}}" required autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="phone" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $employee->phone ?? ''}}" required autocomplete="off">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="password_box">
                            <div class="row mb-3 form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') ?? $employee->show_password ?? ''}}" autocomplete="off">
                                        <span class="input-group-text text-dark pointer" id="eye_pass">Show</span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 form-group">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') ?? $employee->show_password ?? ''}}" autocomplete="off">
                                        <span class="input-group-text text-dark pointer" id="eye_c_pass">Show</span>
                                    </div>
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>  
                        @if (Auth::user()->role_as == 'Admin')
                        <div class="role_box">
                            <div class="row mb-3 form-group">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><span>* </span>User Role</label>
                                <div class="col-md-6">
                                    <select class="form-control js-example-basic-single" name="role_as" id="role">
                                        <option selected disabled value="">Please Select...</option>
                                        {{-- @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ (old('role_as') ?? $employee->role_as ?? '') == $role->id ? 'selected':''}}>{{$role->name}}</option>
                                        @endforeach --}}
                                        <option value="Sale" {{ (old('role_as') ?? $employee->role_as ?? '') == 'Sale' ? 'selected':''}}>Sale</option>
                                        <option value="Purchase" {{ (old('role_as') ?? $employee->role_as ?? '') == 'Purchase' ? 'selected':''}}>Purchase</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- <div class="row mb-3 form-group">
                            <label class="col-md-4 col-form-label text-md-end"><span>* </span> Status</label>
                            <div class="col-md-6 m-checkbox-inline radio-animated d-flex align-items-end">
                                <label class="d-block" for="edo-ani">
                                    <input class="radio_animated" id="edo-ani" type="radio" name="status" checked
                                        value="1" {{ (old('status') ?? $employee->status ?? '') == '1' ? 'checked':''}}>
                                    Enable
                                </label>
                                <label class="d-block" for="edo-ani1">
                                    <input class="radio_animated" id="edo-ani1" type="radio" name="status"
                                        value="0" {{ (old('status') ?? $employee->status ?? '') == '0' ? 'checked':''}}>
                                    Disable
                                </label>
                            </div>
                        </div> --}}
                 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#eye_pass').click(function(){
        if ($('#password').attr('type') == 'text') {
            $('#password').attr('type', 'password');
            $(this).html('Show');
        } else {
            $('#password').attr('type', 'text');
            $(this).html('Hide');
        }
    });
    $('#eye_c_pass').click(function(){
        if ($('#password-confirm').attr('type') == 'text') {
            $('#password-confirm').attr('type', 'password');
            $(this).html('Show');
        } else {
            $('#password-confirm').attr('type', 'text');
            $(this).html('Hide');
        }
    });
   
</script>
@endsection
