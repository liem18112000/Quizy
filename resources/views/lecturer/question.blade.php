@extends('layouts.lecturer')

@section('content')
    <h1 style='padding-left: 40px;'>Course : {{ $course->name}}</h1>

    <h2 style='padding-left: 40px;'>Exam : {{ $exam->title}}</h2>

    <h3 style='padding-left: 40px;'> Question Management</h3>

    <hr/>
    <!-- Button trigger modal -->
    <div style='padding-left: 40px;'>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add Question
        </button>
        <a name="" id="" class="btn btn-secondary" href="{{ route('lecturer.course.exam', [$course])}}" role="button">Back</a>
    </div>

    <!-- Modal -->
    <form method="POST" action="{{ route('lecturer.course.exam.question.store', [$course, $exam])}}" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Question Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="form-group">
                            <label for="description">Question</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Enter your question ..." aria-describedby="helpId">
                        </div>

                        @if($exam->examType->id == '1')
                        <hr/>
                        @for($i = 0; $i < 4; $i++)
                            <div class="form-group">
                                <label for="choice{{$i}}">Choice {{$i + 1}} : </label>
                                <input type="text" name="choice{{$i}}" id="choice{{$i}}" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        @endfor

                        <div class="form-group">
                            <label for="">Answer : </label>
                            <select class="form-control" name="answer" id="answer">
                                <option value='0'>Choice 1</option>
                                <option value='1'>Choice 2</option>
                                <option value='2'>Choice 3</option>
                                <option value='3'>Choice 4</option>
                            </select>
                        </div>
                        @elseif($exam->examType->id == '2')
                        <div class="form-group">
                            <label for="time">Marks</label>
                            <input type="number" name="mark" id="duration" class="form-control" value='1' min='1' max='10' step='0.5' aria-describedby="helpId">
                        </div>
                        @endif
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
                <th>Content</th>
                @if($exam->examType->id == '1')
                <th>Choices</th>
                @elseif($exam->examType->id == '2')
                <th>Marks</th>
                @endif
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr class='text-center'>
                <td>{{$question->id}}</td>
                <td>
                    {{$question->description}}
                </td>
                @if($exam->examType->id == '1')
                <td style='min-width: 30vw; padding: 0'>
                    <table class="table" style='margin: 0'>
                        <tbody>
                            @foreach($question->choices as $choice)
                            <tr>
                                <td scope="row">{{$choice->id}}</td>
                                @if($choice->id == $question->answer_choice_id)
                                    <td style='color:green'><b>{{$choice->description}}</b></td>
                                @else
                                    <td style='color:red'><b>{{$choice->description}}</b></td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
                @elseif($exam->examType->id == '2')
                    <td>{{$question->answer_choice_id}}</td>
                @endif
                <td class='text-center' style='padding-top: 10px;'>
                    <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Disable</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Content</th>
                 @if($exam->examType->id == '1')
                <th>Choices</th>
                @elseif($exam->examType->id == '2')
                <th>Marks</th>
                @endif
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
