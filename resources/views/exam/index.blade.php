@extends('layouts.exam')


@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

@endsection


@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Exam List</h2>
                        <p>Home<span>/</span>Course<span>/</span>Exams</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<div class='container mt-4'>
    <div class='card'>
        <div class="card-header" style='display:flex; justify-content: space-between;'>
            <h3 class="card-title">Course : {{$course->name}}</h3>

            <div class="card-tools">
                <a class="btn btn-info btn-lg" href="javascript:;" data-toggle="modal"
                    data-target="#myModal">Add New Exam</a>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead class='thead-dark'>
                    <tr align="center">
                        <th>UID</th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Allowed time</th>
                        <th>Update at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr align="center">
                        <td>{{$exam->id}}</td>
                        <td>{{$exam->title}}</td>
                        <td>{{$exam->duration_min}}</td>
                        <td>{{$exam->allow_time}}</td>
                        <td>{{$exam->updated_at}}</td>
                        <td>
                            <a name="" id="" class="btn btn-primary btn-lg" href="{{route('exam.show', [$exam->course, $exam])}}" role="button"> Take exam</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="database_operation">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Enter Category Name</label>

                                <input type="text" required="required" name="name" placeholder="Enter Category Name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection


@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- DataTable script --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
$('#example').DataTable();
</script>

@endsection

