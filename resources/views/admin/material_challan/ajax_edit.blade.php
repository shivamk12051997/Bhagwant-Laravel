<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" value="{{ $material_challan->id ?? 0 }}">
   
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($material_challan->id ?? 0) != 0 ? 'Edit':'Add' }} Material Challan </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <h6>Challan No. <span>*</span></h6>
                <input type="text" class="form-control" name="challan_no" id="" value="{{ $material_challan->challan_no ?? '' }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Send Date <span>*</span></h6>
                <input type="date" class="form-control" name="send_date" id="" value="{{ $material_challan->send_date ?? '' }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Party <span>*</span></h6>
                <select class="form-select js-example-basic-single" name="party_id" id="" required>
                    <option value="" selected disabled>Select Option...</option>
                    @foreach (App\Models\Party::where('status',1)->latest()->get() as $party)
                        <option value="{{ $party->id }}" {{ ($material_challan->party_id ?? '') == $party->id ? 'selected':'' }}>{{ $party->name }} / {{ $party->phone }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Material Item <span>*</span></h6>
                <select class="form-select js-example-basic-single" name="material_item_id" id="" onchange="get_material_item()" required>
                    <option value="" selected disabled>Select Option...</option>
                    @foreach (App\Models\MaterialItem::where('status',1)->latest()->get() as $material)
                        <option value="{{ $material->id }}" {{ ($material_challan->material_item_id ?? '') == $material->id ? 'selected':'' }}>{{ $material->name }} ({{ $material->unit }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Per Unit Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="per_unit_price" id="" value="{{ $material_challan->per_unit_price ?? '' }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>QTY <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="qty" id="" value="{{ $material_challan->qty ?? '' }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Total Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="total_price" id="" value="{{ $material_challan->total_price ?? '' }}" readonly required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Is Paid? <span>*</span></h6>
                <div class="form-check-size rtl-input">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="Paid" type="radio" name="is_paid" value="Paid" checked="">
                      <label class="form-check-label" for="Paid">Paid</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="Unpaid" type="radio" name="is_paid" value="Unpaid">
                      <label class="form-check-label" for="Unpaid">Unpaid</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Remarks</h6>
                <textarea class="form-control" name="remarks" id="" cols="30" rows="3">{{ $material_challan->remarks ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $('.js-example-basic-single').select2();
    $(document).on('change input', 'form', function(){
        var qty = $('input[name="qty"]').val();
        var per_unit_price = $('input[name="per_unit_price"]').val();
        var total_price = qty * per_unit_price;
        $('input[name="total_price"]').val(total_price);
    })

    function get_material_item(){
        var material_item_id = $('select[name="material_item_id"]').val();
        $.get('{{ url('get_material_item') }}',{ material_item_id:material_item_id }, function(data){
            $('input[name="per_unit_price"]').val(data.price);
        });
    }
</script>