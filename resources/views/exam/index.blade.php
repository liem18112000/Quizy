<<<<<<< HEAD
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
                        <p>Home<span>/</span>Exams</p>
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>$433,060</td>
                    </tr>
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

=======
@extends('layouts.app')


@section('content')
    <div class='container'>
		<div class='row'>
			<div class='col-lg-3 col-md-3 col-sm-12'>
				<img src='quiz-neon-sign.jpg' style="width: 100%">
				<div class='row'>
					<div class="col-lg-12 mt-4">
						<div class="card">
							<div class="card-header">
								<b>Nội dung</b>
							</div>
							<div class="card-body">
								<h6 class="card-title">1.Đề thi 1</h6>
								<h6 class="card-title">2.Đề thi 2</h6>
								<h6 class="card-title">3.Đề thi 3</h6>
								<h6 class="card-title">4.Đề thi 4</h6>
							</div>
							<div class="card-footer text-muted">
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class='col-lg-9 col-md-9 col-sm-12'>
				<div class="card">
					<div class="card-body">
						<div class='row'>
							<div class='col-lg-6 col-md-6 col-sm-6'>
								<br><b>Đề thi trắc nghiệm môn hóa học năm 2020</b></br>
								<br>Trạng thái: Đang diễn ra</br>
								<br>Thời gian: 60 phút</br>
							</div>
							<div class='col-lg-6 col-md-6 col-sm-6'>
								<br>Số câu: 60 câu</br>
								<br>Lớp: 12</br>
								<br> Môn học: Hóa học</br>
								<a name="" id="" class="btn btn-primary" href="#" role="button">Làm bài</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class='row'>
							<div class='col-lg-6 col-md-6 col-sm-6'>

							</div>
							<div class='col-lg-6 col-md-6 col-sm-6'>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
>>>>>>> main
