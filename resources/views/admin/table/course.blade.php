@extends('layouts.admin')

@section('content')
    <h1 style='padding-left: 40px;'>Course Management</h1>
    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Enroll</th>
                <th>Complete</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr class='text-center'>
                <td style='padding-top: 15px;'>{{$course->id}}</td>
                <td style='padding: 0; width: 60px;'>
                    @if($course->image == 'untitled')
                        <img
                            src="https://wallpaperplay.com/walls/full/1/3/2/296805.jpg" alt=""
                            class='img-responsive img-rounded'
                            style='height: 150px; width: 150px; object-fit: cover'>
                    @else
                        <img
                            src="{{$course->image}}" alt=""
                            class='img-responsive img-rounded'
                            style='height: 150px; width: 150px; object-fit: cover'>
                    @endif
                </td>
                <td style='padding-top: 15px;'>{{$course->name}}</td>
                <td style='padding-top: 15px;'><a href="#">liem</a></td>
                <td><b></b></td>
                <td><b></b></td>
                <td class='text-center' style='padding-top: 10px;'>
                    <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Disable</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Enroll</th>
                <th>Complete</th>
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
