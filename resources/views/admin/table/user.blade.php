@extends('layouts.admin')

@section('content')
    <h1 style='padding-left: 40px;'>User Management</h1>
    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
            <tr class='text-center'>
                <th>UID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Provider</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class='text-center'>
                <td>{{$user->id}}</td>
                <td style='padding: 0;'><img src='@if($user->profile){{$user->profile->profile_image}}@endif' class='img-responsive img-rounded' style='height: 150px; width: 150px; object-fit: cover'></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->provider}}</td>
                <td class='text-center' style='padding-top: 10px; width: 170px'><a class="btn btn-info" href="@if($user->profile){{route('profile.show', $user->profile)}}@endif" role="button">Profile</a>  <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Diables</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>UID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Provider</th>
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
