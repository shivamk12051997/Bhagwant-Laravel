<option value="" selected disabled>Select Option...</option>
@foreach (App\Models\Worker::whereJsonContains('role',$request->action)->where('status',1)->latest()->get() as $worker)
<option value="{{ $worker->id }}">{{ $worker->name }}</option>
@endforeach