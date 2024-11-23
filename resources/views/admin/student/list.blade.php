@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
        <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add new Student</a>
      </div> 
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-12"> 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Search</h5>
                    <nav class="navbar navbar-light bg-light ">
                        <div class="">
                            <form class="d-flex ">
                            <input class="form-control me-2" value="{{ Request::get('name') }}" type="search" placeholder="Name" aria-label="Search" name="name">
                            <input class="form-control me-2" value="{{ Request::get('last_name') }}" type="search" placeholder="Last Name" aria-label="Search" name="last_name">
                            <input class="form-control me-2" value="{{ Request::get('email') }}" type="search" placeholder="email" aria-label="Search" name="email">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <a href="{{ url('admin/student/list/') }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
                            </form>
                        </div>
                    </nav>
                  <h5 class="card-title">Student List (Total: {{ $getRecord->total() }})</h5>
                  <!-- Dark Table -->
                    <table class="table ">
                        <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Profile pic</th>
                              <th scope="col">Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Class</th>
                              <th scope="col">Parent Name</th>
                              <th scope="col">Create-at</th>
                              <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value )
                            <tr>    
                                <th>{{ $value->id }}</th>
                                <th>
                                  @if (!empty($value->getProfile()))
                                    <img src="{{ $value->getProfile() }}" alt="" style="width: 50px; height: 50px; border-radius: 30px">
                                    
                                  @endif
                                </th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->class_name }}</td>
                                <td>{{ $value->parent_name }}{{ $value->parent_last_name }}</td>
                                <td>{{ $value->created_at }}</td>    
                                <td>
                                    <a href="{{ url('admin/student/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('admin/student/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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