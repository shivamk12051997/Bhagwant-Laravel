<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $lot_no->id ?? 0 }}">
    <input type="hidden" name="form_name" id="form_name" value="Lot No.">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($lot_no->id ?? 0) != 0 ? 'Edit':'Add' }} Lot No. </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-4 form-group mb-3">
                <h6>Lot No. <span>*</span></h6>
                <input type="number" class="form-control" name="lot_no" id="lot_no" value="{{ $lot_no->lot_no ?? '' }}" oninput="$('#error_box').hide(200); $('#lot_no').removeClass('is-invalid'); get_master_lot_details();" required>
                <div class="txt-danger" style="display: none;" id="error_box">Lot No Has Already Added...</div>
            </div>
            <div class="col-md-4 form-group mb-3">
                <h6>Color <span>*</span></h6>
                <select class="form-select js-example-basic-single" name="color_id" id="color_id" required>
                    <option value="" selected disabled>Select Option...</option>
                    @foreach (App\Models\Color::where('status',1)->latest()->get() as $color)
                        <option value="{{ $color->id }}" {{ ($lot_no->color_id ?? '') == $color->id ? 'selected':'' }}>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 form-group mb-3">
                <h6>PCS <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="pcs" id="" value="{{ $lot_no->pcs ?? '' }}" required>
            </div>
            <div class="col-md-12">
                <div class="row" id="ajax_get_master_lot_details">
                    @if($lot_no->id ?? 0 != 0) 
                        @php
                            $master_lot = App\Models\MasterLot::where('from', '<=', $lot_no->lot_no)->where('to', '>=', $lot_no->lot_no)->where('deleted_at', null)->first();
                        @endphp
                        <div class="col-md-6 form-group mb-3">
                            <h6>Size <span>*</span></h6>
                            <select class="form-select js-example-basic-single" name="size_id" id="size_id" required>
                                <option value="" selected disabled>Select Option...</option>
                                @foreach (App\Models\Size::whereIn('id', (json_decode($master_lot->size_ids ?? '[]') ?? []))->get() as $size)
                                    <option value="{{ $size->id }}" {{ ($lot_no->size_id ?? '') == $size->id ? 'selected':'' }}>{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <h6>Cutting Master <span>*</span></h6>
                            <select class="form-select js-example-basic-single" name="worker_id" id="worker_id" required>
                                <option value="" selected disabled>Select Option...</option>
                                @foreach (App\Models\Worker::whereJsonContains('role','Cutting')->where('status',1)->latest()->get() as $worker)
                                    <option value="{{ $worker->id }}" {{ ($lot_no->lot_activities[0]->worker_id ?? '') == $worker->id ? 'selected':'' }}>{{ $worker->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <h6>Per Price <span>*</span></h6>
                            <input type="number" step="any" class="form-control" name="price" id="price" value="{{ $lot_no->lot_activities[0]->price ?? '' }}" required>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <h6>Date <span>*</span></h6>
                            <input type="date" class="form-control" name="date" id="" value="{{ $lot_no->lot_activities[0]->date ?? date('Y-m-d') }}" required>
                        </div>
                        @if (($master_lot->show_gender ?? '') == 'Yes')
                        <div class="col-md-3 form-group mb-3">
                            <h6>Gender <span>*</span></h6>
                            <div class="form-check-size rtl-input">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input me-2" id="Male" type="radio" name="gender" value="Male" checked="">
                                <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input me-2" id="Female" type="radio" name="gender" value="Female" {{ ($lot_no->gender ?? '') == 'Female' ? 'checked':'' }}>
                                <label class="form-check-label" for="Female">Female</label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (($master_lot->show_press ?? '') == 'Yes')
                        <div class="col-md-3 form-group mb-3">
                            <h6>Press <span>*</span></h6>
                            <div class="form-check-size rtl-input">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input me-2" id="Yes" type="radio" name="press" value="Yes" checked="">
                                <label class="form-check-label" for="Yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input me-2" id="No" type="radio" name="press" value="No" {{ ($lot_no->press ?? '') == 'No' ? 'checked':'' }}>
                                <label class="form-check-label" for="No">No</label>
                                </div>
                            </div>
                        </div>
                        @endif
                    @else
                        <h5 class="p-5 text-center">Please Enter Lot Number...</h5>
                    @endif
                </div>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Remarks <small>(for Cutting Master)</small> <span>*</span></h6>
                <textarea class="form-control" name="remarks" id="" cols="30" rows="3">{{ $lot_no->lot_activities[0]->remarks ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $('.js-example-basic-single').select2();
    function get_master_lot_details(id){
        $('#ajax_get_master_lot_details').html('<div class="loader-box"><div class="loader-37"></div></div>');
        var lot_no = $('#lot_no').val();
        $.get('{{ url('get_master_lot_details') }}',{lot_no:lot_no}, function(data){
            $('#ajax_get_master_lot_details').html(data);
            $('.js-example-basic-single').select2();
        });
    }
</script>