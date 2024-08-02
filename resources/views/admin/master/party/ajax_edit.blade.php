<form class="modal-content" action="{{ route('master.party.insert') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $party->id ?? 0 }}">
    <input type="hidden" name="form_name" id="form_name" value="Worker Master">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($party->id ?? 0) != 0 ? 'Edit':'Add' }} Party </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-12 form-group mb-3">
                <h6>Name <span>*</span></h6>
                <input type="text" class="form-control" name="name" id="" value="{{ $party->name ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Phone Number <span>*</span></h6>
                <input type="text" class="form-control" name="phone" id="" value="{{ $party->phone ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="price" id="" value="{{ $party->price ?? '' }}" required>
            </div>
            {{-- <div class="col-md-12 form-group mb-3">
                <h6>Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="price" id="price" value="{{ $party->price ?? '' }}" required>
            </div> --}}
            <div class="col-md-12 form-group">
                <h6>Status</h6>
                <label class="switch">
                    <input type="checkbox"  name="status" value="1" {{ ($party->status ?? 1) == 1 ? 'checked':'' }}><span class="switch-state"></span>
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