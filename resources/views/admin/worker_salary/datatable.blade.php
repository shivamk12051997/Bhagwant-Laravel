<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Worker Code/ID</th>
                <th>Worker Role</th>
                <th>Total QTY</th>
                <th>Total Earnings</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($worker as $key => $item)
            <tr>
                <td>{{ $worker->firstItem() + $loop->index }}</td>
                <td>{{ $item->name ?? 'N/A' }}</td>
                <td>{{ $item->worker_code ?? 'N/A' }}</td>
                <td>
                    @foreach ((json_decode($item->role ?? '[]') ?? []) as $role)
                        <span class="badge badge-primary ">{{ $role }}</span>
                    @endforeach
                </td>
                <td>{{ $item->lot_activities()->whereDate('date','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('date','<=',($request->to_date ?? date('Y-m-d')))->sum('pcs') ?? 0 }}</td>
                {{-- <td>
                    {{ ($item->lot_activities()->whereDate('date','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('date','<=',($request->to_date ?? date('Y-m-d')))->sum('price') ?? 0) * $pcs }}
                </td> --}}
                <td>{{ optional($item->lot_activities()->whereDate('date','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('date','<=',($request->to_date ?? date('Y-m-d')))->selectRaw('SUM(pcs * price) AS total')->first())->total ?? '-' }}</td>
                <td>
                    <a href="{{route('worker_salary.show',$item->id)}}?from_date={{$request->from_date}}&to_date={{$request->to_date}}" class="text-primary p-1 f-22" data-toggle="tooltip" title="Show">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div>
    {{$worker->links()}}
</div>
