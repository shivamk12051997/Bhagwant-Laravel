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
                <input type="text" class="form-control" name="" id="" value="{{ $lot_no->lot_no ?? '' }}" disabled required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Action <span>*</span></h6>
                @php
                if(($lot_activity->action ?? '') != ''){
                    $action = $lot_activity->action;
                }else{
                    if(($lot_no->status ?? '') == 'Cutting'){
                        $action = 'Embroidery';
                    }
                    elseif(($lot_no->status ?? '') == 'Embroidery'){
                        $action = 'Sewing Mech.';
                    }
                    elseif(($lot_no->status ?? '') == 'Sewing Mech.'){
                        $action = 'Overlock';
                    }
                    elseif(($lot_no->status ?? '') == 'Overlock'){
                        $action = 'Kaj Button';
                    }
                    elseif(($lot_no->status ?? '') == 'Kaj Button'){
                        $action = 'Thread Cutting';
                    }
                    elseif(($lot_no->status ?? '') == 'Thread Cutting' && ($lot_no->press ?? '') == 'Yes'){
                        $action = 'Press';
                    }
                    elseif(($lot_no->status ?? '') == 'Press' || ($lot_no->press ?? '') == 'No'){
                        $action = 'Packing';
                    }
                }
                @endphp
                <input type="text" class="form-control" name="action" id="" value="{{ $action ?? '' }}" readonly required>
            </div>
            <div class="col-md-12 form-group">
                @if (($action ?? '') == 'Embroidery' && ($lot_activity->id ?? 0)  == 0)
                    <div class="form-check-size rtl-input" onchange="action_change()">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input me-2" id="embroidery" type="radio" name="action_change" value="Embroidery" checked="">
                            <label class="form-check-label" for="embroidery">Embroidery</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input me-2" id="sewing_mech" type="radio" name="action_change" value="Sewing Mech." {{ ($action ?? '') == 'Sewing Mech.' ? 'checked':'' }}>
                            <label class="form-check-label" for="sewing_mech">Sewing Mech.</label>
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
            <div class="col-md-12 form-group mb-3" id="in_source_box" style="display: {{ ($action ?? '') == 'Embroidery' ? ($lot_activity->embroidery_action ?? '') == 'Out Source' ? 'none':'block':'' }}">
                <h6><span class="text-dark" id="action_text">{{ ($action ?? '') }}</span> Master <span>*</span></h6>
                <select class="form-select js-example-basic-single" name="worker_id" id="worker_id" {{ ($action ?? '') == 'Embroidery' ? ($lot_activity->embroidery_action ?? '') == 'Out Source' ? '':'required':'required' }}>
                    <option value="" selected disabled>Select Option...</option>
                    @foreach (App\Models\Worker::where('role',$action)->where('status',1)->latest()->get() as $worker)
                    <option value="{{ $worker->id }}" {{ ($lot_activity->worker_id ?? '') == $worker->id ? 'selected':'' }}>{{ $worker->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6> <span class="text-dark" id="price_text">Per Price</span> <span>*</span></h6>
                <input type="number" class="form-control" name="price" id="" value="{{ $lot_activity->price ?? '' }}" required>
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
    function get_worker(){
        var action = $('input[name="action"]').val();
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
        }else{
            $('#out_source_box').hide(300);
            $('#in_source_box').show(300);
            $('#price_text').text('Per Price');
            $('#worker_id').attr('required',true);
        }
    }
    function action_change(){
        var action_change = $('input[name="action_change"]:checked').val();
        if(action_change == 'Embroidery'){
            $('#embroidery_box').show(300);
            embroidery_action();
        }
        if(action_change == 'Sewing Mech.'){
            $('#embroidery_box').hide(300);
            $('#out_source_box').hide(300);
            $('#in_source_box').show(300);
            $('#price_text').text('Per Price');
            $('#worker_id').attr('required',true);
        }
        $('#action_text').text(action_change);
        $('input[name="action"]').val(action_change);
        get_worker();
    }
</script>
