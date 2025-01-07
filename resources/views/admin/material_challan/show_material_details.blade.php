<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">Material Challan Details</h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="dt-ext table-responsive">
            <table class="table table-striped table-hover nowrap Datatable table-bordered" id="datatable-excel-1">
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
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_qty = 0;
                        $total_price = 0;
                        $total_paid_amount = 0;
                        $total_unpaid_amount = 0;
                    @endphp
                    @foreach ($material_challan as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->challan_no ?? 'N/A' }}</td>
                        <td><a href="{{route('party_salary.show',$item->party->id)}}" target="_blank">{{ $item->party->name ?? 'N/A' }} <small>({{ $item->party->party_code ?? 'N/A' }})</small></a></td>
                        <td>{{ $item->material_item->name ?? 'N/A' }}</td>
                        <td>{{ $item->material_item->unit ?? 'N/A' }}</td>
                        <td>{{ $item->per_unit_price ?? 'N/A' }}</td>
                        <td>{{ $item->qty ?? 'N/A' }}</td>
                        <td>{{ $item->total_price ?? 'N/A' }}</td>
                        <td>{{ date('d M,Y',strtotime($item->send_date)) }}</td>
                        <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
                        <td>{{ $item->remarks ?? 'N/A' }}</td>
                    </tr>
                    @php
                        $total_qty += $item->qty;
                        $total_price += $item->total_price;
                        if($item->is_paid == 'Paid'){
                            $total_paid_amount += $item->total_price;
                        }else{
                            $total_unpaid_amount += $item->total_price;
                        }
                    @endphp
                    @endforeach
                    <tr>
                        <th></th>
                        <th>Total QTY:</th>
                        <th>{{ $total_qty ?? 0 }}</th>
                        <th>Total Price: </th>
                        <th>{{ $total_price ?? 0 }}</th>
                        <th>Total Paid Amount:</th>
                        <th>{{ $total_paid_amount ?? 0 }}</th>
                        <th>Total Unpaid Amount:</th>
                        <th>{{ $total_unpaid_amount ?? 0 }}</th>
                        <th>Balance Amount:</th>
                        <th>{{ $total_price - $total_paid_amount }}</th>
                    </tr>
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
        
        
        
    </div>
</div>

<script>
    $(document).ready(function() {
        
    var title = '{{ $party->name }} - {{ $material_item->name }}';

    $('#datatable-excel-1').DataTable({
        lengthMenu: [
            [10, 25, 50, -1], // Added options for 10, 25, 50, and all entries
            [10, 25, 50, "All"] // Display labels for the options
        ],
        dom: "lBfrtip",
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