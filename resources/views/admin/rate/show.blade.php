
@extends('admin.layout')


@section('main')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rates</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url("dashboard/rates")}}">Rates</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">


            <div class="col-md-10 offset-md-1 pb-3">

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Rates</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-lg">

                        <tbody>

                          <tr>
                            <th>Id</th>
                            <td>{{$rates->id}}</td>
                            <td>
                          </tr>
                          <tr>
                            <th>User_ID</th>
                            <td>{{$rates->RateIp->user_id}}</td>
                            <td>
                          </tr>


                          <tr>
                            <th>Rate</th>
                            <td>{{$rates->rate}}</td>
                            <td>
                          </tr>



                          <tr>
                            <th>Ip</th>
                            <td>{{$rates->RateIp->ip}}</td>
                            <td>
                          </tr>




{{--                          <tr>--}}
{{--                            <th>Image</th>--}}
{{--                            <td>--}}
{{--                              <img src="{{asset("uploads/$exam->img")}}" height="50px">--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                          </tr>--}}





                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>


                <a class="btn btn-sm btn-primary" href="{{url()->previous()}}">Back</a>

            </div>




        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection



