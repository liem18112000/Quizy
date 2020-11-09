@extends('layouts.student')

@section('content')
    <h1 style='padding-left: 40px;'>Result Board</h1>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>Exam</th>
                <th>Time eslasped</th>
                <th>Right answers</th>
                <th>Grade</th>
                <th>Time taken</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr class='text-center'>
                <td>{{$result->id}}</td>
                <td>
                    {{$result->course->name}}
                </td>
                <td>{{$result->exam->title}}</td>
                <td>{{floor($result->remain_time / 60)}} minutes {{$result->remain_time % 60}} seconds / {{$result->exam->duration_min}} minutes</td>
                <td>{{$result->grade}} / {{count($result->exam->questions)}}</td>
                <td>
                    {{100 * $result->grade / count($result->exam->questions)}} points
                </td>
                <td>{{$result->created_at}}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('student.course.exam.preview', [$result->course, $result->exam])}}" role="button">Preview Results</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>Exam</th>
                <th>Time eslasped</th>
                <th>Right answers</th>
                <th>Grade</th>
                <th>Time taken</th>
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
