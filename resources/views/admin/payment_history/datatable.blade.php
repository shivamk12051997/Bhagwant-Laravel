<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover Datatable nowrap" id="datatable-excel_payment_history">
        <thead>
            <tr>
              <th>#</th>
              <th>Payment Date</th>
              <th>Payment Mode</th>
              <th>Amount</th>
              <th>Created Date</th>
              <th>Options</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($payment_history as $item)
            <tr>
              <td>{{ $payment_history->firstItem() + $loop->index }}</td>
              <td>{{ ($item->payment_date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->payment_date)) }}</td>
              <td>{{ $item->payment_mode ?? 'N/A' }}</td>
              <td>{{ $item->amount ?? 'N/A' }}</td>
              <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
              <td>
                <a href="javascript:void({{ $item->id }})" class="text-warning p-1 f-22" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_payment_modal({{ $item->id }}, 'Party')" data-toggle="tooltip" title="Edit">
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
                                window.location.href = "{{ route('payment_history.delete',$item->id)}}";
                            }
                        })
                    });
                </script>
                @endif
              </td>
            </tr>
          @endforeach
          <tr>
            <th></th>
            <th></th>
            <th class="text-end">Paid Amount:</th>
            <th>{{ $payment_history->sum('amount') ?? 0 }}</th>
            <th></th>
            <th></th>
          </tr>
        </tbody>
    </table>
  </div>

<div>
    {{$payment_history->links()}}
</div>
  <script>
    $(document).ready(function() {
      var title = "{{ $title ?? 'N/A' }}";
  
      $('#datatable-excel_payment_history').DataTable({
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
            customize: function (win) {
              $(win.document.body).find('h1').css('font-size', '25px');
            }
          }
        ],
      });
    });
  </script>