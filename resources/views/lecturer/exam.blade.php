@extends('layouts.lecturer')

@section('content')
    <h1 style='padding-left: 40px;'>Course : {{ $course->name}}</h1>

    <h2 style='padding-left: 40px;'>Exam Management</h2>

    <hr/>
    <!-- Button trigger modal -->
    <div style='padding-left: 40px;'>
        <a name="" id="" class="btn btn-secondary" href="{{ route('lecturer.course')}}" role="button">Back</a>
    </div>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Allow time</th>
                <th>Duration</th>
                <th>Question</th>
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
                <td></td>
                <td>{{$exam->allow_time}}</td>
                <td>{{$exam->duration_min}}</td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="{{ route('lecturer.course.exam.question', [$course, $exam])}}" role="button">
                        Question Count : {{$exam->questions->count()}}
                    </a>
                </td>
                <td class='text-center' style='padding-top: 10px;'>
                    <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Disable</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Allow time</th>
                <th>Duration</th>
                <th>Question</th>
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
