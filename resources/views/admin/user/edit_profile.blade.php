@csrf
<input type="hidden" name="action" value="{{ ($user->id ?? 0) == 0 ? 'Added':'Updated'  }}">
<div class="modal-header">
    <h4 class="modal-title" id="mySmallModalLabel">{{ ($user->id ?? '') == '' ? 'Add':'Edit'  }} Profile</h4>
    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
</div>
<div class="modal-body dark-modal">
    <div class="row">
        <div class="col-md-6 form-group mb-3">
            <h6>Name <span>*</span></h6>
            <input type="text" class="form-control" name="name" id="" value="{{ $user->name ?? '' }}" required>
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Phone Number <span>*</span></h6>
            <input type="number" class="form-control" name="phone" id="" value="{{ $user->phone ?? '' }}" required>
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Image </h6>
            <input type="file" class="form-control" name="img" id="">
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Email <span>*</span></h6>
            <input type="email" class="form-control" name="email" id="" value="{{ $user->email ?? '' }}" required>
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Password <span>*</span></h6>
            <input type="password" name="password" id="" class="form-control" placeholder="Password" {{ ($user->id ?? '') == '' ? 'required':''  }}>
            <small>Old Password: {{ $user->show_password ?? "N/A" }}</small>
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Confirm Password <span>*</span></h6>
            <input type="password" name="password_confirmation" id="" class="form-control" placeholder="Confirm Password" {{ ($user->id ?? '') == '' ? 'required':''  }}>
        </div>
        {{-- <div class="col-md-6 form-group mb-3">
            <h6>User Role <span>*</span></h6>
            @if (($user->id ?? 0) == auth()->user()->id)
                <input type="text" class="form-control" name="role_as" value="{{ $user->role_as ?? '' }}" readonly required>
            @else
                @if (auth()->user()->role_as == 'Admin')
                    <select name="role_as" id="" class="form-select disabled" required>
                        <option value="Sub Admin" {{ ($user->role_as ?? '') == 'Sub Admin' ? 'selected':'' }}>Branch Admin</option>
                    </select>
                @else
                    <select name="role_as" id="" class="form-select" required>
                        <option value="Therapist" {{ ($user->role_as ?? '') == 'Therapist' ? 'selected':'' }}>Therapist</option>
                        <option value="Reception" {{ ($user->role_as ?? '') == 'Reception' ? 'selected':'' }}>Reception</option>
                        <option value="Sales" {{ ($user->role_as ?? '') == 'Sales' ? 'selected':'' }}>Sales</option>
                    </select>
                @endif
            @endif
        </div> --}}
        {{-- <div class="col-md-6 form-group">
            <h6>Status </h6>
            <label class="switch">
                <input type="checkbox" name="status" value="1" {{ ($user->status ?? '') == 1 ? 'checked':'' }}><span class="switch-state"></span>
            </label>
        </div> --}}
    </div>
</div>
<div class="modal-footer text-end">
    <button type="submit" class="btn btn-primary">Save</button>
</div>