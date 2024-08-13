<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover nowrap Datatable table-bordered" id="datatable-excel">
        <thead>
            <tr>
                <th>#</th>
                <th>Challan No.</th>
                <th>Party Name</th>
                <th>Material Name</th>
                <th>Material Unit</th>
                <th>Price</th>
                <th>QTY</th>
                <th>Total Price</th>
                <th>Send Date</th>
                <th>Created At</th>
                <th>Remarks</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($material_challan as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->challan_no ?? 'N/A' }}</td>
                <td><a href="{{route('party_salary.show',$item->party->id)}}" target="_blank" rel="noopener noreferrer">{{ $item->party->name ?? 'N/A' }} <small>({{ $item->party->party_code ?? 'N/A' }})</small></a></td>
                <td>{{ $item->material_item->name ?? 'N/A' }}</td>
                <td>{{ $item->material_item->unit ?? 'N/A' }}</td>
                <td>{{ $item->per_unit_price ?? 'N/A' }}</td>
                <td>{{ $item->qty ?? 'N/A' }}</td>
                <td>{{ $item->total_price ?? 'N/A' }}</td>
                <td>{{ date('d M,Y',strtotime($item->send_date)) }}</td>
                <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
                <td>{{ $item->remarks ?? 'N/A' }}</td>
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
                                    window.location.href = "{{ route('material_challan.delete',$item->id)}}";
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

@php
if(request()->from_date && request()->to_date){
    $title = "Material Challan - ".date('d M, Y', strtotime(request()->from_date)). ' - '.date('d M, Y', strtotime(request()->to_date));
}else{
    $title = "Material Challan";
}
@endphp

<script>
    $(document).ready(function() {
        
    var title = '{{ $title }}';

    $('#datatable-excel').DataTable({
      lengthMenu: [
        [-1]
      ],
      dom: "Brt",
      ordering: false,
      buttons: [
        'copy',
        'excelHtml5',
        'csvHtml5',
        {
          extend: 'pdfHtml5',
          title: title,
          footer: true, // Include the footer
        },
        {
          extend: 'print',
          title: title,
          footer: true, // Include the footer
        }
      ],
    });
  });
</script>
