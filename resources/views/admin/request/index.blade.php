@extends('layouts.admin')



@section('content')
    <h1 style='padding-left: 40px;'>Request Management</h1>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>User</th>
                <th>Description</th>
                <th>Data</th>
                <th>Created at</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr class='text-center'>
                <td>{{$request->id}}</td>
                <td>
                    {{$request->requestType->name}}
                </td>
                <td>{{$request->user->name}}</td>
                <td>{{$request->description}}</td>
                <td>{{$request->data}}</td>
                <td>
                    {{$request->created_at}}
                </td>
                <td>
                    {{$request->request_status}}
                </td>
                <td>
                    @if($request->request_status == 'pending')
                    <div class="row">

                        <div class='col-6'>
                            <form action='{{ route('admin.request.verify', $request)}}' method='post'>
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-primary btn-block">Verified</button>
                            </form>
                        </div>

                        <div class='col-6'>
                            <form action='{{ route('admin.request.deny', $request)}}' method='post'>
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger btn-block">Deny</button>
                            </form>
                        </div>

                    </div>
                    @else

                    <a name="" id="" class="btn btn-outline-info btn-block" role="button" disabled>{{$request->request_status}}</a>

                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>User</th>
                <th>Description</th>
                <th>Data</th>
                <th>Created at</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
