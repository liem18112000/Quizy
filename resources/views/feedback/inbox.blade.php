@extends('layouts.'.$layout)

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
@endsection('styles')

@section('content')
    <div style='display: flex; justify-content: space-between; padding-bottom: 0'>
        <div>
            <h1>Inbox</h1>
        </div>

        <div>
            <form action='{{ route('feedback.inbox.readAll', $layout)}}' method='post'>
                @csrf
                <button type="submit" class="btn btn-primary">Mask as read all</button>
            </form>
        </div>
    </div>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
        <tr class='text-center'>
            <th>Name</th>
            <th>Content</th>
            <th>Sender</th>
            <th>Date sent</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inboxes as $inbox)
            <tr class='text-center'>
                <td>{{$inbox->type}}</td>
                <td></td>
                <td>Admin</td>
                <td>{{$inbox->created_at}}</td>
                <td class='text-center' style='padding: 2px;'><a class="btn btn-info" href="{{route('feedback.read', $inbox->id)}}" role="button">Read</a></td>
            </tr>

        @endforeach
        </tbody>
        <tfoot class='text-center'>
        <tr class='text-center'>
            <th>Name</th>
            <th>Content</th>
            <th>Sender</th>
            <th>Date sent</th>
            <th>&nbsp;</th>
        </tr>
        </tfoot>
    </table>
@endsection


@section('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection

