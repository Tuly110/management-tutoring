@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
        <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add new Admin</a>
      </div> 
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admin list</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create-at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                  <tr>    
                      <th>{{ $value->id }}</th>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->created_at }}</td>    
                      <td>
                        <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                      </td>   
                  </tr>
                  @endforeach 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
               
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')