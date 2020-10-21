@extends('layouts.app')

@section('styles')
    <style>
        .float-panel{
            position: fixed;
            width: 20%;
            top: 15vh;
            left: 5%;
        }
    </style>
@endsection


@section('content')

    <div class="container-fluid" style='margin-top:15vh'>
        <div class="row">

            <div class="col-lg-3">
                <div class='float-panel'>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Câu hỏi</h4>
                                    <div style='display:flex; justify-content: space-evenly;'>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">1</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">2</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">3</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">4</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">5</a>

                                    </div>

                                    <div class='mt-2' style='display:flex; justify-content: space-evenly;'>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">6</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">7</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">8</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">9</a>
                                        <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">10</a>

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 btn-block">Nộp Bài</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card text-center" >
                            <div class="card-body">
                                <h4 class="card-title">Đề thi môn hóa học năm 2020</h4>
                                <p class="card-text">Tên thí sinh: Liêm béo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                <div class="row mt-4"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi 1</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Đánh dấu
                                      </label>
                                    </div>
                                </div>
                                <p class="card-text">Con gì to nhất ?</p>
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample1">Voi</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
            </div>
        </div>
    </div>

@endsection
