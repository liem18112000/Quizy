@extends('layouts.student')

@section('content')
    <h1 style='padding-left: 40px;'>Course : {{ $course->name}}</h1>

    <h2 style='padding-left: 40px;'>Exam Management</h2>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Exam Type</th>
                <th>Duration</th>
                <th>Complete</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr class='text-center'>
                <td>{{$exam->id}}</td>
                <td>
                    {{$exam->title}}
                </td>
                <td>{{$exam->examType->name}}</td>
                <td>{{$exam->duration_min}}</td>
                <td>
                    @if(Auth::user()->roles->where('role_type_id', '1')->first()->enrollCourse->where('course_id', $course->id)->first()->exams->where('exam_id', $exam->id)->count() == 0)
                    <a name="" id="" class="btn btn-outline-warning" role="button">
                        Not Available
                    </a>
                    @else
                    <a name="" id="" class="btn btn-outline-success" role="button">
                        Exam Complete
                    </a>
                    @endif
                </td>
                <td class='text-center' style='padding-top: 10px;'>
                    <a name="" id="" class="btn btn-primary btn-block" href="{{route('exam.show', [$exam->course, $exam])}}" role="button">Take exam</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Exam Type</th>
                <th>Duration</th>
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
