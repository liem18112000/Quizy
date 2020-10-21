@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')
 <!-- breadcrumb start-->
 <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>About Us</h2>
                            <p>Home<span>/</span>About Us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categoory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <td></td></td>
                    <td></td>
                    <td><input class="category_status"  type="checkbox" name="status"></td>
                    <td>
                      <a  class="btn btn-info">Edit</a>
                      <a  class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
             
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
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
      <form  class="database_operation">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Category Name</label>
            
            <input type="text" required="required" name="name" placeholder="Enter Category Name" class="form-control">
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
