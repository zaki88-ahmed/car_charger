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
            <h1 class="m-0 text-dark">Our Projects</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Our Projects</li>
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
                @include('admin.inc.errors')


                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Our Projects</h3>

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
                            <a href="{{url("dashboard/projects/create")}}" class="btn btn-sm btn-primary">
                                Add New
                            </a>




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

                        @foreach ($projects as $project)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td >{{ $project->title}}</td>
                                <td >{{ $project->body}}</td>

                                <td >
                                    <img src="{{ asset("uploads/$project->image")}}" height="50px">
                                </td>

{{--                                <td >{{ $contact->address }}</td>--}}





                                <td>


                                    <a class="btn btn-sm btn-primary "  href="{{url("dashboard/projects/show/$project->id")}}" >

                                        <i class="fas fa-eye"></i>

                                    </a>





                                    <a class="btn btn-sm btn-info "  href="{{url("dashboard/projects/edit/$project->id")}}" >

                                        <i class="fas fa-edit"></i>

                                    </a>




                                    <a class="btn btn-sm btn-danger" href="{{url("dashboard/projects/delete/$project->id")}}">
                                        <i class="fas fa-trash"></i>
                                    </a>




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




    {{-- <div class="modal fade" id="add-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">

            @include('admin.inc.errors')

                <form method="POST" action="{{url("dashboard/contacts/store")}}" id="add-form" enctype="multipart/form-data">

                      @csrf


                       <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label >Name (en)</label>
                                    <input type="text" name = "name_en" class="form-control" >
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label >Name (ar)</label>
                                    <input type="text" name = "name_ar" class="form-control" >
                                </div>
                            </div>

                      </div>

                      <div class="row">

                       <div class="col-6">
                            <div class="form-group">
                              <label>Category</label>
                              <select class="custom-select form-control" name="cat_id">
                                @foreach($abouts as $cat)

                                    <option value="{{$cat->id}}">{{$cat->name('en')}}</option>

                                @endforeach

                              </select>
                            </div>
                        </div>

                        <div class="col-6">
                           <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>

                                </div>
                            </div>
                        </div>



                      </div>


                </form>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" form="add-form" class="btn btn-primary">Submit</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}



  {{--   <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">

             @include('admin.inc.errors')

                <form method="POST" action="{{url("dashboard/contacts/update")}}" id="edit-form" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" id="edit-form-id">

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label >Name (en)</label>
                                <input type="text" name = "name_en" class="form-control" id="edit-form-name-en">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label >Name (ar)</label>
                                <input type="text" name = "name_ar" class="form-control" id="edit-form-name-ar">
                            </div>
                        </div>

                    </div>



                    <div class="row">

                       <div class="col-6">
                            <div class="form-group">
                              <label>Category</label>
                              <select class="custom-select form-control" name="cat_id" id="edit-form-cat-id">
                                @foreach($abouts as $cat)

                                    <option value="{{$cat->id}}">{{$cat->name('en')}}</option>


                                @endforeach

                              </select>
                            </div>
                        </div>

                        <div class="col-6">
                           <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>

                                </div>
                            </div>
                        </div>


                </form>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}










@endsection



@section('scripts')

    <script>


    </script>

@endsection
