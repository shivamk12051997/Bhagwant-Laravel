<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $lot_activity->id ?? 0 }}">
    <input type="hidden" name="lot_no_id" id="lot_no_id" value="{{ $lot_no->id ?? 0 }}">
    <input type="hidden" name="form_name" id="form_name" value="Lot Activity">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($lot_activity->id ?? 0) != 0 ? 'Edit':'Add' }} Lot Activity </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-12 form-group mb-3">
                <h6>Lot No. <span>*</span></h6>
                <input type="text" class="form-control" name="" id="lot_no" value="{{ $lot_no->lot_no ?? '' }}" disabled required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Action <span>*</span></h6>
                @php
                if(($lot_activity->action ?? '') != ''){
                    $action = $lot_activity->action;
                }else{
                    if(($lot_no->status ?? '') == 'Cutting'){
                        $action = 'Printing/Embroidery';
                    }
                    elseif(($lot_no->status ?? '') == 'Printing/Embroidery'){
                        $action = 'Sewing Machine';
                    }
                    elseif(($lot_no->status ?? '') == 'Send To Party'){
                        $action = 'Received From Party';
                    }
                    elseif(($lot_no->status ?? '') == 'Sewing Machine'){
                        $action = 'Overlock';
                    }
                    elseif(($lot_no->status ?? '') == 'Overlock' || ($lot_no->status ?? '') == 'Linking'){
                        $action = 'Kaj Button';
                    }
                    elseif(($lot_no->status ?? '') == 'Kaj Button'){
                        $action = 'Thread Cutting';
                    }
                    elseif(($lot_no->status ?? '') == 'Thread Cutting' && ($lot_no->press ?? 'No') == 'Yes'){
                        $action = 'Press';
                    }
                    elseif(($lot_no->status ?? '') == 'Press' || ($lot_no->press ?? 'No') == 'No'){
                        $action = 'Packing';
                    }
                }
                @endphp
                <input type="text" class="form-control" name="action" id="action" value="{{ $action ?? '' }}" readonly required>
            </div>
            <div class="col-md-12 form-group">
                @if (($action ?? '') == 'Printing/Embroidery' || ($action ?? '') == 'Send To Party' || ($lot_no->status ?? '') == 'Cutting')
                    <div class="form-check-size rtl-input" onchange="action_change()">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input me-2" id="embroidery" type="radio" name="action_change" value="Printing/Embroidery" checked="">
                            <label class="form-check-label" for="embroidery">Printing/Embroidery</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input me-2" id="sewing_mech" type="radio" name="action_change" value="Sewing Machine" {{ ($action ?? '') == 'Sewing Machine' ? 'checked':'' }}>
                            <label class="form-check-label" for="sewing_mech">Sewing Machine</label>
                        </div>
                    </div>
                    <div class="form-check-size rtl-input" id="embroidery_box" onchange="embroidery_action()">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input me-2" id="in_source" type="radio" name="embroidery_action" value="In Source" checked="">
                            <label class="form-check-label" for="in_source">In Source</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input me-2" id="out_source" type="radio" name="embroidery_action" value="Out Source" {{ ($lot_activity->embroidery_action ?? '') == 'Out Source' ? 'checked':'' }}>
                            <label class="form-check-label" for="out_source">Out Source</label>
                        </div>
                    </div>
                    <div id="out_source_box" style="display: {{ ($lot_activity->embroidery_action ?? '') == 'Out Source' ? 'block':'none' }}">
                        <div class="form-group mb-3">
                            <h6>Party Name <span>*</span></h6>
                            <input type="text" class="form-control" name="party_name" id="" value="{{ $lot_activity->party_name ?? '' }}">
                        </div>
                    </div>
                @endif
                @if(($action ?? '') == 'Received From Party')
                    <div class="form-group mb-3">
                        <h6>Party Name <span>*</span></h6>
                        <input type="text" class="form-control" name="party_name" id="" value="{{ $lot_no->last_activity->party_name ?? '' }}" readonly>
                    </div>
                @endif
                @if (($action ?? '') == 'Overlock' || ($action ?? '') == 'Linking')
                <div class="form-check-size rtl-input" onchange="action_change()">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input me-2" id="overlock" type="radio" name="action_change" value="Overlock" checked="">
                        <label class="form-check-label" for="overlock">Overlock</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input me-2" id="linking" type="radio" name="action_change" value="Linking" {{ ($action ?? '') == 'Linking' ? 'checked':'' }}>
                        <label class="form-check-label" for="linking">Linking</label>
                    </div>
                </div>
                @endif
                @if (($action ?? '') == 'Kaj Button' && ($lot_no->gender ?? '') == 'Male')
                <div class="form-check-size rtl-input" onchange="action_change()">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input me-2" id="kaj_button" type="radio" name="action_change" value="Kaj Button" checked="">
                        <label class="form-check-label" for="kaj_button">Kaj Button</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input me-2" id="thread_cutting" type="radio" name="action_change" value="Thread Cutting" {{ ($action ?? '') == 'Thread Cutting' ? 'checked':'' }}>
                        <label class="form-check-label" for="thread_cutting">Thread Cutting</label>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-12 form-group mb-3" id="in_source_box" style="display: {{ ($action ?? '') == 'Send To Party' || ($action ?? '') == 'Received From Party' ? 'none':'block' }}">
                <h6><span class="text-dark" id="action_text">{{ ($action ?? '') }}</span> Master <span>*</span></h6>
                <select class="form-select js-example-basic-single" name="worker_id" id="worker_id" {{ ($action ?? '') == 'Send To Party' || ($action ?? '') == 'Received From Party' ? '':'required' }}>
                    <option value="" selected disabled>Select Option...</option>
                    @foreach (App\Models\Worker::whereJsonContains('role',($action ?? ''))->where('status',1)->latest()->get() as $worker)
                    <option value="{{ $worker->id }}" {{ ($lot_activity->worker_id ?? '') == $worker->id ? 'selected':'' }}>{{ $worker->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6> <span class="text-dark" id="price_text">{{ ($action ?? '') == 'Send To Party' ? 'Total Cost':'Per Price' }}</span> <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="price" id="price" value="{{ $lot_activity->price ?? 0 }}" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                <h6>Date <span>*</span></h6>
                <input type="date" class="form-control" name="date" id="" value="{{ $lot_no->lot_activities[0]->date ?? date('Y-m-d') }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Remarks</small> <span>*</span></h6>
                <textarea class="form-control" name="remarks" id="" cols="30" rows="3">{{ $lot_activity->remarks ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        get_worker_price();
    })
    function get_worker_price(){
        var action = $('#action').val();
        var lot_no = $('#lot_no').val();
        $('#price').attr('disabled',true);
        var worker_id = $('#worker_id').val();
        $.get('{{ url('get_worker_price') }}',{ action:action, lot_no:lot_no }, function(data){
            $('#price').val(data);
            $('#price').attr('disabled',false);
        });
    }
    function get_worker(){
        var action = $('input[name="action"]').val();
        $('#price').val('');
        $('#worker_id').attr('disabled',true);
        $.get('{{ url('get_worker') }}',{action:action}, function(data){
            $('#worker_id').html(data);
            $('#worker_id').attr('disabled',false);
        });
    }
    function embroidery_action(){
        if($('input[name="embroidery_action"]:checked').val() == 'Out Source'){
            $('#out_source_box').show(300);
            $('#in_source_box').hide(300);
            $('#price_text').text('Total Cost');
            $('#worker_id').attr('required',false);
            $('#action').val('Send To Party');
        }else{
            $('#out_source_box').hide(300);
            $('#in_source_box').show(300);
            $('#price_text').text('Per Price');
            $('#worker_id').attr('required',true);
            $('#action').val('Printing/Embroidery');
        }
    }
    function action_change(){
        var action_change = $('input[name="action_change"]:checked').val();
        if(action_change == 'Printing/Embroidery'){
            $('#embroidery_box').show(300);
            embroidery_action();
        }
        if(action_change == 'Sewing Machine'){
            $('#embroidery_box').hide(300);
            $('#out_source_box').hide(300);
            $('#in_source_box').show(300);
            $('#price_text').text('Per Price');
            $('#worker_id').attr('required',true);
        }
        $('#action_text').text(action_change);
        $('input[name="action"]').val(action_change);
        get_worker_price();
        get_worker();
    }
</script>
