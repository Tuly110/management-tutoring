@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
        <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Add new Subject</a>
      </div> 
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Subject list</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
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
                      <td>{{ $value->name }}</td>
                      <td>
                        @if ($value->type == 0)
                          Theory
                        @else
                          Practical
                        @endif
                      </td>
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
                        <a href="{{ url('admin/subject/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/subject/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                      </td>   
                  </tr>
                  @endforeach 
                </tbody>
              </table>
              {{-- Phan trang --}}
              <div style="padding: 10px;" class="d-flex justify-content-center">
                {!! $getRecord->appends(\Request::except('page'))->links() !!}
              </div>
              <!-- End Table with stripped rows -->
               
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')