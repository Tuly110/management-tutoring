@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add new Assign Class Teacher</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              {{-- <h5 class="card-title">Add Form</h5> --}}
              
              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="">
                {{ csrf_field() }}
                <div class="col-12">
                    <label for="inputNanme4" class="form-label p-2">Class Name</label>
                    <select class="form-control" name="class_id">
                      <option value="0">Select Class</option>
                      @foreach ($getClass as $class )
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach    
                    </select>
                  </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label p-2">Teacher Name</label>
                    @foreach ($getTeacher as $teacher )
                        <div>
                            <input type="checkbox" value="{{ $teacher->id }}" name="teacher_id[]">{{ $teacher->name }}{{ $teacher->lastname }}</input>  
                        </div>
                    @endforeach    
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="0">Active</option>
                        <option value="1">InActive</option>
                    </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add" >Submit</button>
                  <button type="reset" class="btn btn-secondary" name="reset ">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')