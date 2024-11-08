@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
        <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary">Add new assign class teacher</a>
      </div> 
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-12"> 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assign Subject Search</h5>
                    <nav class="navbar navbar-light bg-light ">
                        <div class="">
                            <form class="d-flex ">
                              <input class="form-control me-2" value="{{ Request::get('class_name') }}" type="search" placeholder="Class Name" aria-label="Search" name="class_name">
                              <input class="form-control me-2" value="{{ Request::get('teacher_name') }}" type="search" placeholder="Teacher Name" aria-label="Search" name="teacher_name">
                              <input class="form-control me-2" value="{{ Request::get('date') }}" type="date" placeholder="Date" aria-label="Search" name="date">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                              <a href="{{ url('admin/assign_class_teacher/list/') }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
                            </form>
                        </div>
                    </nav>
                  <h5 class="card-title">Assign Class Teacher List </h5>
                  <!-- Dark Table -->
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Class name</th>
                            <th scope="col">Teacher name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Create-by</th>
                            <th scope="col">Create-at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value )
                            <tr>    
                                <th>{{ $value->id }}</th>
                                <td>{{ $value->class_id_name }}</td>
                                <td>{{ $value->teacher_id_name }}</td>
                                <td>
                                  @if ($value->status == 0)
                                    Active
                                  @else
                                    InActive
                                  @endif
                                </td>
                                <td>{{ $value->created_by_name }}</td> 
                                <td>{{ $value->created_at }}</td>         
                                <td>
                                  <a href="{{ url('admin/assign_class_teacher/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                  <a href="{{ url('admin/assign_class_teacher/edit_single/'.$value->id) }}" class="btn btn-primary">Edit Single</a>
                                  <a href="{{ url('admin/assign_class_teacher/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                                </td>   
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div style="padding: 10px;" class="d-flex justify-content-center">
                        {!! $getRecord->appends(\Request::except('page'))->links() !!}
                    </div>
                  <!-- End Dark Table -->
                </div>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')