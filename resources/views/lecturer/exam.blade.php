@extends('layouts.lecturer')

@section('content')
    <h1 style='padding-left: 40px;'>Course : {{ $course->name}}</h1>

    <h2 style='padding-left: 40px;'>Exam Management</h2>

   <hr/>
    <!-- Button trigger modal -->
    <div style='padding-left: 40px;'>

        <form action="{{ route('exam.import', $course) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" id="file" required="required">
            <button class='btn btn-info' type="submit">Exam import</button>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Create exam
            </button>
            <a id="" class="btn btn-secondary" href="{{ route('lecturer.course')}}" role="button">Back</a>
        </form>
    </div>

    <!-- Modal -->
    <form method="POST" action="{{ route('lecturer.exam.store', $course)}}" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Exam Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter exam name" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Exam Type</label>
                            <select class="form-control" name="exam_type_id">
                                @foreach($examTypes as $examType)
                                <option value='{{$examType->id}}'>{{$examType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time">Deadline</label>
                            <input type="date" name="allow_time" id="time" class="form-control" placeholder="Enter exam deadline" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="time">Duration</label>
                            <input type="number" name="duration" id="duration" class="form-control" value='60' min='60' max='240' step='5' aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid">
                            <div class='row'>
                                <div class='col-6'>
                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                </div>
                                <div class='col-6'>
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Exam Type</th>
                <th>Deadline</th>
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
                <td>{{$exam->examType->name}}</td>
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
                <th>Exam Type</th>
                <th>Deadline</th>
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
