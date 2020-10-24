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
                        <h2>Course List</h2>
                        <p>Home<span>/</span>Course<span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6" >
                    <div class="section_tittle text-center">
                    <br>
                        <h2>Course</h2>
                    </div>
                </div>
            </div>
        </div>

<div class='container mt-4' style="margin-bottom: 15px" >
    <div class='card'>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead class='thead-dark'>
                    <tr>
                        <th>UID</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Lecturer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->created_at}}</td>
                        <td></td>
                        <td>
                            <a name="" id="" class="btn btn-primary btn-lg" href="{{route('exam.index', $course)}}" role="button"> Join In</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

