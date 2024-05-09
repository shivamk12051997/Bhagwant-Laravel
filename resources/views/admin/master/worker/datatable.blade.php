<div class="dt-ext table-responsive">
    <table class="display nowrap" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Worker Code/ID</th>
                <th>Worker Role</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($worker as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name ?? 'N/A' }}</td>
                <td>{{ $item->worker_code ?? 'N/A' }}</td>
                <td>
                    @foreach ((json_decode($item->role ?? '[]') ?? []) as $role)
                        <span class="badge badge-primary ">{{ $role }}</span>
                    @endforeach
                </td>
                <td>{{ $item->price ?? 'N/A' }}</td>
                <td>
                    <span class="badge badge-{{ $item->status == '1' ? 'success':'danger' }} pointer" id="status_{{ $item->id }}" onclick="change_status({{ $item->id }})">{{ $item->status == '1' ? 'Active':'Inactive' }}</span>
                </td>
                <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
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
