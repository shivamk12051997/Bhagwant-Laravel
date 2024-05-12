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
                <h6>Worker Code/ID <span>*</span></h6>
                <input type="text" class="form-control" name="worker_code" id="" value="{{ $worker->worker_code ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Worker Role <small class="text-muted">(Multiple)</small> <span>*</span></h6>
                <select class="form-select js-example-basic-multiple" name="role[]" multiple id="" required>
                    <option value="Cutting" {{ in_array('Cutting', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Cutting</option>
                    <option value="Printing/Embroidery" {{ in_array('Printing/Embroidery', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Printing/Embroidery</option>
                    <option value="Sewing Machine" {{ in_array('Sewing Machine', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Sewing Machine</option>
                    <option value="Overlock" {{ in_array('Overlock', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Overlock</option>
                    <option value="Linking" {{ in_array('Linking', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Linking</option>
                    <option value="Kaj Button" {{ in_array('Kaj Button', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Kaj Button</option>
                    <option value="Thread Cutting" {{ in_array('Thread Cutting', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Thread Cutting</option>
                    <option value="Press" {{ in_array('Press', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Press</option>
                    <option value="Packing" {{ in_array('Packing', (json_decode($worker->role ?? '[]') ?? [])) ? 'selected':'' }}>Packing</option>
                </select>
            </div>
            {{-- <div class="col-md-12 form-group mb-3">
                <h6>Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="price" id="price" value="{{ $worker->price ?? '' }}" required>
            </div> --}}
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

<script>
    $('.js-example-basic-multiple').select2();
</script>