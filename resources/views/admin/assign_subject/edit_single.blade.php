@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Single</h1>
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
                    <label for="inputNanme4" class="form-label">Class Name</label>
                    <select class="form-control" name="class_id" >
                        <option value="0">Select class</option>
                        @foreach ($getClass_assign as $class )
                            <option {{($getRecord->class_id==$class->id) ? 'selected' : ''}} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Subject Name</label>
                    <select class="form-control" name="subject_id" >
                        <option value="0">Select Subject</option>
                        @foreach ($getSubject_assign as $subject )
                            <option {{($getRecord->subject_id==$subject->id) ? 'selected' : ''}} value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Status</label>
                  <select class="form-control" name="status" >
                      <option {{old('status',  $getRecord->status)==0 ? 'selected' : ''}} value="0">Active</option>
                      <option {{old('status',  $getRecord->status)==1 ? 'selected' : ''}} value="1">InActive</option>
                  </select>
              </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add" >Update</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')