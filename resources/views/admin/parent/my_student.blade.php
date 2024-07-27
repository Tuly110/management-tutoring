@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables ({{$getParent->name}}{{ $getParent->last_name }})</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
        <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add new Parent</a>
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
                            <input class="form-control me-2" value="{{ Request::get('student_id') }}" type="search" placeholder="Student id" aria-label="Search" name="student_id">
                            <input class="form-control me-2" value="{{ Request::get('first_name') }}" type="search" placeholder="First Name" aria-label="Search" name="name">
                            <input class="form-control me-2" value="{{ Request::get('last_name') }}" type="search" placeholder="Last Name" aria-label="Search" name="last_name">
                            <input class="form-control me-2" value="{{ Request::get('email') }}" type="search" placeholder="email" aria-label="Search" name="email">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <a href="{{ url('admin/parent/my_student/'.$parent_id) }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            @if (!empty($getSearchStudent))
                <div class="card">
                    <div class="card-body">   
                        <h5 class="card-title">Student List </h5>
                    <!-- Dark Table -->
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Profile pic</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Parent Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Create-at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getSearchStudent as $value )
                                    <tr>    
                                        <th>{{ $value->id }}</th>
                                        <th>
                                        @if (!empty($value->getProfile()))
                                            <img src="{{ $value->getProfile() }}" alt="" style="width: 50px; height: 50px; border-radius: 30px">
                                            
                                        @endif
                                        </th>
                                        <td>{{ $value->name }}{{ $value->last_name }}</td>
                                        <td>{{ $value->parent_name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->created_at }}</td>   
                                        <td>
                                            <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm">Add student to parent</a>
                                        </td> 
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table> 
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Parent student List </h5>
                  <!-- Dark Table -->
                  <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Profile pic</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Parent Name</th>
                            <th scope="col">Email</th>
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
                                <td>{{ $value->name }}{{ $value->last_name }}</td>
                                <td>{{ $value->parent_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->created_at }}</td>   
                                <td>
                                    <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td> 
                            </tr>
                        @endforeach 
                    </tbody>
                </table> 
                </div>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')