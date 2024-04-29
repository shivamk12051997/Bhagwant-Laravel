<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $worker->id ?? 0 }}">
    <input type="hidden" name="form_name" id="form_name" value="Worker Master">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($worker->id ?? 0) != 0 ? 'Edit':'Add' }} Worker Master </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-12 form-group mb-3">
                <h6>Name <span>*</span></h6>
                <input type="text" class="form-control" name="name" id="" value="{{ $worker->name ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Phone Number <span>*</span></h6>
                <input type="text" class="form-control" name="phone" id="" value="{{ $worker->phone ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Worker Role <span>*</span></h6>
                <select class="form-select" name="role" id="" required>
                    <option value="" selected disabled>Select Option...</option>
                    <option value="Cutting" {{ ($worker->role ?? '') == 'Cutting' ? 'selected':'' }}>Cutting</option>
                    <option value="Embroidery" {{ ($worker->role ?? '') == 'Embroidery' ? 'selected':'' }}>Embroidery</option>
                    <option value="Sewing Machine" {{ ($worker->role ?? '') == 'Sewing Machine' ? 'selected':'' }}>Sewing Machine</option>
                    <option value="Overlock" {{ ($worker->role ?? '') == 'Overlock' ? 'selected':'' }}>Overlock</option>
                    <option value="Kaj Button" {{ ($worker->role ?? '') == 'Kaj Button' ? 'selected':'' }}>Kaj Button</option>
                    <option value="Thread Cutting" {{ ($worker->role ?? '') == 'Thread Cutting' ? 'selected':'' }}>Thread Cutting</option>
                    <option value="Press" {{ ($worker->role ?? '') == 'Press' ? 'selected':'' }}>Press</option>
                    <option value="Packing" {{ ($worker->role ?? '') == 'Packing' ? 'selected':'' }}>Packing</option>
                </select>
            </div>
            <div class="col-md-12 form-group">
                <h6>Status</h6>
                <label class="switch">
                    <input type="checkbox"  name="status" value="1" {{ ($worker->status ?? 1) == 1 ? 'checked':'' }}><span class="switch-state"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>