@extends('admin.layout')

@section('main')


{{-- //https://adminlte.io/themes/v3/ --}}

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
            <div class="col-12">



                @include('admin.inc.messages')


                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">About</h3>

                        <div class="card-tools">

                         {{--}} <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>--}}



                            {{-- //Add New either will destinate us to a form in new page or make it a modal destinate us to the same page  --}}

                            {{-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                                Add New
                            </button> --}}


                            {{-- we will not make it a button (just a hyper link) as it will destinate us to a separated page --}}
{{--                            <a href="{{url("dashboard/news/create")}}" class="btn btn-sm btn-primary">--}}
{{--                                Add New--}}
{{--                            </a>--}}




                        </div>


                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>

                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($about as $about)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td >{{ $about->title}}</td>
                                <td >{{ $about->body}}</td>

                                <td >
                                    <img src="{{ asset("uploads/$about->image")}}" height="50px">
                                </td>

{{--                                <td >{{ $contact->address }}</td>--}}





                                <td>


{{--                                    <a class="btn btn-sm btn-primary "  href="{{url("dashboard/news/show/$news->id")}}" >--}}

{{--                                        <i class="fas fa-eye"></i>--}}

{{--                                    </a>--}}





                                    <a class="btn btn-sm btn-info "  href="{{url("dashboard/about/edit/$about->id")}}" >

                                        <i class="fas fa-edit"></i>

                                    </a>




{{--                                    <a class="btn btn-sm btn-danger" href="{{url("dashboard/news/delete/$news->id")}}">--}}
{{--                                        <i class="fas fa-trash"></i>--}}
{{--                                    </a>--}}




                                </td>
                            </tr>


                        @endforeach

                        </tbody>

                      </table>


                      <div class="d-flex my-3 justify-content-center">
{{--                        {{ $contacts->links() }}--}}
                      </div>


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







@endsection



@section('scripts')

    <script>


    </script>

@endsection
