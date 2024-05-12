<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $master_lot->id ?? 0 }}">
    <input type="hidden" name="form_name" id="form_name" value="Master Lot">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($master_lot->id ?? 0) != 0 ? 'Edit':'Add' }} Worker Master </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-3 form-group mb-3">
                <h6>From <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="from" id="" value="{{ $master_lot->from ?? '' }}" placeholder="Enter From Number" required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>To <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="to" id="" value="{{ $master_lot->to ?? '' }}" placeholder="Enter To Number" required>
            </div>
            <div class="col-md-2 form-group mb-3">
                <h6>Show Gender <span>*</span></h6>
                <div class="form-check-size rtl-input">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="Yes" type="radio" name="show_gender" value="Yes" checked="">
                      <label class="form-check-label" for="Yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="No" type="radio" name="show_gender" value="No" {{ ($master_lot->show_gender ?? '') == 'No' ? 'checked':'' }}>
                      <label class="form-check-label" for="No">No</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2 form-group mb-3">
                <h6>Show Press <span>*</span></h6>
                <div class="form-check-size rtl-input">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="Yes" type="radio" name="show_press" value="Yes" checked="">
                      <label class="form-check-label" for="Yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="No" type="radio" name="show_press" value="No" {{ ($master_lot->show_press ?? '') == 'No' ? 'checked':'' }}>
                      <label class="form-check-label" for="No">No</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Size <small class="text-muted">(Multiple)</small> <span>*</span></h6>
                <select class="form-select js-example-basic-multiple" name="size_ids[]" multiple id="" required>
                    @foreach (App\Models\Size::where('status',1)->orderBy('name','asc')->get() as $size)
                    <option value="{{ $size->id }}" {{ in_array($size->id, (json_decode($master_lot->size_ids ?? '[]') ?? [])) ? 'selected':'' }}>{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Cutting Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="cutting_price" id="" value="{{ $master_lot->cutting_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Printing/Embroidery Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="printing_price" id="" value="{{ $master_lot->printing_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Sewing Machine Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="sewing_machine_price" id="" value="{{ $master_lot->sewing_machine_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Overlock Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="overlock_price" id="" value="{{ $master_lot->overlock_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Linking Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="linking_price" id="" value="{{ $master_lot->linking_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Kaj Button Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="kaj_button_price" id="" value="{{ $master_lot->kaj_button_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Thread Cutting Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="thread_cutting_price" id="" value="{{ $master_lot->thread_cutting_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Press Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="press_price" id="" value="{{ $master_lot->press_price ?? '' }}" placeholder="Enter Price"  required>
            </div>
            <div class="col-md-3 form-group mb-3">
                <h6>Packing Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="packing_price" id="" value="{{ $master_lot->packing_price ?? '' }}" placeholder="Enter Price"  required>
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