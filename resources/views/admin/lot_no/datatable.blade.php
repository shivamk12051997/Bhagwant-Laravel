<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
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
            <tr>
                <td>{{ $lot_no->firstItem() + $loop->index }}</td>
                <td>{{ $item->lot_no ?? 'N/A' }}</td>
                <td>{{ $item->color->name ?? 'N/A' }}</td>
                <td>{{ $item->size->name ?? 'N/A' }}</td>
                <td>{{ $item->pcs ?? 'N/A' }}</td>
                <td>
                    @if (($item->is_complete ?? '') == '1')
                    <span class="badge badge-success">{{ $item->status ?? 'N/A' }}</span>
                    @else
                    <span class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_lot_activity_modal({{ $item->id }}, 0)">{{ $item->status ?? 'N/A' }}</span>
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
</div>

<div>
    {{$lot_no->links()}}
</div>

