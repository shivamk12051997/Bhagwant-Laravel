<div class="dt-ext table-responsive">
    <table class="display nowrap" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Lot Range</th>
                <th>Show Gender</th>
                <th>Show Press</th>
                <th>Sizes</th>
                <th>Cutting Price</th>
                <th>Printing/Embroidery Price</th>
                <th>Sewing Machine Price</th>
                <th>Overlock Price</th>
                <th>Linking Price</th>
                <th>Kaj Button Price</th>
                <th>Thread Cutting Price</th>
                <th>Press Price</th>
                <th>Packing Price</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($master_lot as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->from ?? 'N/A' }} - {{ $item->to ?? 'N/A' }}</td>
                <td>{{ $item->show_gender ?? 'N/A' }}</td>
                <td>{{ $item->show_press ?? 'N/A' }}</td>
                <td>
                    @foreach (App\Models\Size::whereIn('id', (json_decode($item->size_ids ?? '[]') ?? []))->get() as $size)
                        <span class="badge badge-primary ">{{ $size->name }}</span>
                    @endforeach
                </td>
                <td>{{ $item->cutting_price ?? 'N/A' }}</td>
                <td>{{ $item->printing_price ?? 'N/A' }}</td>
                <td>{{ $item->sewing_machine_price ?? 'N/A' }}</td>
                <td>{{ $item->overlock_price ?? 'N/A' }}</td>
                <td>{{ $item->linking_price ?? 'N/A' }}</td>
                <td>{{ $item->kaj_button_price ?? 'N/A' }}</td>
                <td>{{ $item->thread_cutting_price ?? 'N/A' }}</td>
                <td>{{ $item->press_price ?? 'N/A' }}</td>
                <td>{{ $item->packing_price ?? 'N/A' }}</td>
                <td>
                    <a href="#" class="text-warning p-1 f-22" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $item->id }})" data-toggle="tooltip" title="Edit">
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
                                    window.location.href = "{{ route('master.worker.delete',$item->id)}}";
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

<script>
    $('#datatable').DataTable();
</script>
