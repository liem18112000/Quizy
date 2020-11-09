@extends('layouts.student')

@section('content')
    <h1 style='padding-left: 40px;'>Course Enrollment</h1>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Creator</th>
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
                            style='height: 100px; width: 100px; object-fit: cover'>
                    @else
                        <img
                            src="{{$course->image}}" alt=""
                            class='img-responsive img-rounded'
                            style='height: 100px; width: 100px; object-fit: cover'>
                    @endif
                </td>
                <td style='padding-top: 15px;'>{{$course->name}}</td>
                <td style='padding-top: 15px;'><a href="#">{{Auth::user()->name}}</a></td>
                <td class='text-center' style='padding-top: 10px;'>

                    @if($course->hasStudent->first() && $course->hasStudent->first()->enrollBy->user->find(Auth::user()->id))
                        <a class="btn btn-info btn-block" href="{{ route('student.course.exam', $course)}}" role="button"> View Exams</a>
                    @else
                        <form action='{{ route('course.enroll', $course)}}' method='POST'>
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">Enroll Course</button>
                        </form>
                    @endif

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
