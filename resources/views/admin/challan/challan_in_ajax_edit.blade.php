<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $challan->id ?? 0 }}">
    <input type="hidden" name="in_out" id="in_out" value="{{ request()->in_out ?? '-' }}">
    <input type="hidden" name="form_name" id="form_name" value="Challan In">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($challan->id ?? 0) != 0 ? 'Edit':'Add' }} Challan {{ request()->in_out ?? '-' }} </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <h6>Challan Out No. <span>*</span></h6>
                <input type="text" class="form-control" name="challan_no" value="{{ $challan->challan_no ?? '' }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Date <span>*</span></h6>
                <input type="date" class="form-control" name="date" value="{{ $challan->date ?? date('Y-m-d') }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Party  <span>*</span></h6>
                <select class="form-select js-example-basic-single" name="party_id" id="party_id" onchange="get_party_details()" required>
                    <option value="" selected disabled>Select Option...</option>
                    @foreach (App\Models\Party::where('status',1)->latest()->get() as $party)
                        <option value="{{ $party->id }}" {{ ($challan->party_id ?? '') == $party->id ? 'selected':'' }}>{{ $party->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="price" value="{{ $challan->price ?? '' }}" oninput="calculate_total_amount()" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Lot No. <span>*</span></h6>
                <select class="form-select js-example-basic-multiple" name="lot_no_ids[]" id="lot_no_ids" multiple onchange=" get_all_lot_no_pcs()" required>
                    @php
                    if(($challan->id ?? 0) == 0){
                        $lot_nos = App\Models\LotNo::whereIn('status', ['Send To Party','Received From Party'])->where('is_complete', null)->latest()->get();
                    }else{
                        $lot_nos = App\Models\LotNo::whereIn('status', ['Received From Party','Packing'])->latest()->get();
                    }
                    if(($challan->lot_activities ?? '') != ''){
                        $lot_activities_ids = $challan->lot_activities->pluck('lot_no_id')->toArray();
                        $sent_pcs = $challan->lot_activities->sum('pcs');
                    }
                    @endphp
                    @foreach ($lot_nos as $lot_no)
                        <option value="{{ $lot_no->id }}" {{ in_array($lot_no->id, (request()->lot_no_id ?? ($lot_activities_ids ?? []))) == true ? 'selected':'' }}>{{ $lot_no->lot_no }} - ({{ $lot_no->status }}) - ({{ $lot_no->pcs }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 form-group mb-3" oninput="calculate_total_amount()">
                <div class="row" id="lot_no_pcs">
                </div>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Received PCs <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="received_pcs" value="{{ $challan->received_pcs ?? '' }}" readonly required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Total Amount<span>*</span></h6>
                <input type="number" step="any" class="form-control" name="total_amount" value="{{ $challan->total_amount ?? '' }}" readonly required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Remarks <span>*</span></h6>
                <textarea class="form-control" name="remarks" id="" cols="30" rows="3">{{ $challan->remarks ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>



<script>
    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();
    function get_party_details(){
        var party_id = $('#party_id').val();
        $('input[name="price"]').prop("disabled", true);
        $.get('{{ url('get_party_details') }}',{party_id:party_id}, function(data){
            $('input[name="price"]').val(data.price);
            $('input[name="price"]').prop("disabled", false);
            calculate_total_amount();
        });
    }
    // function get_all_lot_no_pcs(){
    //     var lot_no_ids = $('#lot_no_ids').val();
    //     $('input[name="sent_pcs"]').prop("disabled", true);
    //     $.get('{{ url('get_all_lot_no_pcs') }}',{lot_no_ids:lot_no_ids}, function(data){
    //         data.forEach(element => {
    //             if($('#lot_no_id_'+element.lot_no_id).length <= 0){
    //                 addRow = '<div class="col-md-3" id="lot_no_id_'+element.lot_no_id+'"><div class="input-group"><span class="input-group-text">'+element.lot_no+' - ('+element.net_pcs+')</span><input type="number" class="form-control" placeholder="Enter PCS" max="'+element.net_pcs+'" required></div></div>';
    //                 $('#lot_no_pcs').append(addRow);
    //             }
    //         });
    //         calculate_total_amount();
    //     });
    // }
    get_all_lot_no_pcs();
    function get_all_lot_no_pcs(){
        var lot_no_ids = $('#lot_no_ids').val();

        // Remove elements that are not in the selected lot_no_ids
        $('#lot_no_pcs .col-md-3').each(function() {
            var elementId = $(this).attr('id').replace('lot_no_id_', '');
            if (!lot_no_ids.includes(elementId)) {
                $(this).remove();
            }
        });

        $.get('{{ url('get_all_lot_no_pcs') }}',{lot_no_ids:lot_no_ids}, function(data){
            data.forEach(element => {
                if($('#lot_no_id_'+element.lot_no_id).length <= 0){
                    addRow = '<div class="col-md-3" id="lot_no_id_'+element.lot_no_id+'"><input type="hidden" name="lot_no['+element.lot_no_id+'][lot_no_id]" value="'+element.lot_no_id+'" id="" required><div class="input-group"><span class="input-group-text">'+element.lot_no+' - <small>('+element.sent_pcs+')</small></span><input type="number" class="form-control received_pcs" name="lot_no['+element.lot_no_id+'][received_pcs]" placeholder="Enter PCS" value="'+element.remain_pcs+'" max="'+element.remain_pcs+'" min="0" required></div></div>';
                    $('#lot_no_pcs').append(addRow);
                }
            });
            calculate_total_amount();
        });
    }
    function calculate_total_amount(){
        var total_received_pcs = 0;
        $('.received_pcs').each(function() {
            total_received_pcs += Number($(this).val()); // Corrected operator
        });
        $('input[name="received_pcs"]').val(total_received_pcs);
        var price = Number($('input[name="price"]').val());
        $('input[name="total_amount"]').val(total_received_pcs * price); // Ensure multiplication
    }

    function store_form(event){
        var form = event.target;
        var form_data = $(form).serializeArray();
        var form_name = $('#form_name').val();
        if(form_name == 'Challan In'){
            $.post('{{ route('challan_in.insert') }}', form_data, function(data){
                if(data != 0){
                    $.notify({ title:'Success', message:'Challan In Saved Successfully' }, { type:'success', });
                    get_datatable(1);
                    $('#edit_modal').modal('hide');
                    $('input.form-control').val('');
                }else{
                    $('button[type="submit"]').removeClass('disabled',false);
                    $('button[type="submit"]').text('Save');
                }
            });
        }
    }
</script>