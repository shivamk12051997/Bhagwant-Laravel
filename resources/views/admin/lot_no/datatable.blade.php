<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th># <input type="checkbox" class="form-check-input" id="select_all" onchange="check_all()"></th>
                <th>Lot No.</th>
                <th>Color</th>
                <th>Size</th>
                <th>PCS</th>
                <th>Status</th>
                {{-- <th>Per Price</th> --}}
                <th>Gender</th>
                <th>Press</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lot_no as $key => $item)
            <tr id="lot_no_id_tr{{ $item->id }}">
                <td>{{ $lot_no->firstItem() + $loop->index }} <input type="checkbox" class="form-check-input" name="lot_no_id[]" value="{{ $item->id }}" id=""></td>
                <td>{{ $item->lot_no ?? 'N/A' }}</td>
                <td>{{ $item->color->name ?? 'N/A' }}</td>
                <td>{{ $item->size->name ?? 'N/A' }}</td>
                <td>{{ $item->pcs ?? 'N/A' }}</td>
                <td class="status">
                    @if (($item->is_complete ?? '') == '1' || ($item->last_activity->action ?? '') == 'Send To Party')
                    <span class="badge badge-{{ ($item->is_complete ?? '') == 1 ? 'success':'primary' }}">{{ $item->last_activity->action ?? 'N/A' }}</span>
                    @else
                    <span class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_lot_activity_modal({{ $item->id }}, 0)">{{ $item->last_activity->action ?? 'N/A' }}</span>
                    @endif
                </td>
                {{-- <td>{{ $item->price ?? 'N/A' }}</td> --}}
                <td>{{ $item->gender ?? 'N/A' }}</td>
                <td>{{ $item->press ?? 'N/A' }}</td>
                <td>
                    <a href="{{route('lot_no.show',$item->id)}}" class="text-primary p-1 f-22" data-toggle="tooltip" title="View">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="text-warning p-1 f-22" data-toggle="tooltip" title="Edit" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $item->id }})">
                        <i class="fa fa-edit"></i>
                    </a>
                    @if (auth()->user()->role_as == 'Admin')
                    <a id="Delete-{{$item->id}}" class="text-danger pointer p-1 f-22" data-toggle="tooltip" title="Delete">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    <script>
                        $('#Delete-{{$item->id}}').click(function(){
                            swal({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location.href = "{{ route('lot_no.delete',$item->id)}}";
                                }
                            })
                        });
                    </script>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-danger btn-sm" onclick="delete_lots()">Delete Selected</button>
    <button type="button" class="btn btn-primary btn-sm" onclick="challan_out_lots()" data-bs-toggle="modal" data-bs-target="#edit_modal" >Challan Out Selected</button>
    {{-- <button type="button" class="btn btn-primary btn-sm" onclick="challan_in_lots()" data-bs-toggle="modal" data-bs-target="#edit_modal" >Challan In Selected</button> --}}
</div>

<div>
    {{$lot_no->links()}}
</div>

<script>
    function challan_out_lots(){
        var lot_no_id = $('input[name="lot_no_id[]"]:checkbox:checked').map(function() { return $(this).val(); }).get();
        var in_out = 'Out';
        var id = 0;
        $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
        $.get('{{ url('challan/edit') }}/'+id, { in_out:in_out, lot_no_id:lot_no_id }, function(data){
            $('#ajax_html').removeClass();
            $('#ajax_html').addClass('modal-dialog modal-lg');
            $('#ajax_html').html(data);
        });
    }
    // function challan_in_lots(){
    //     var lot_no_id = $('input[name="lot_no_id[]"]:checkbox:checked').map(function() { return $(this).val(); }).get();
    //     var in_out = 'In';
    //     var id = 0;
    //     $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
    //     $.get('{{ url('challan/edit') }}/'+id, { in_out:in_out, lot_no_id:lot_no_id }, function(data){
    //         $('#ajax_html').removeClass();
    //         $('#ajax_html').addClass('modal-dialog modal-xl');
    //         $('#ajax_html').html(data);
    //     });
    // }
    function delete_lots(){
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var lot_no_id = $('input[name="lot_no_id[]"]:checkbox:checked').map(function() { return $(this).val(); }).get();
                $.post('{{ route('lot_no.multiple_delete') }}',{lot_no_id:lot_no_id, _token: "{{ csrf_token() }}"}, function(data){
                    get_datatable();
                });
            }
        })
    }

    function check_all(){
        if($('#select_all').is(':checked')){
            $('.form-check-input').prop('checked',true);
        }else{
            $('.form-check-input').prop('checked',false);
        }
    }
</script>
