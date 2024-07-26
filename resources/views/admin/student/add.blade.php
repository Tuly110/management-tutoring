@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add new Student</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              {{-- <h5 class="card-title">Add Form</h5> --}}
              
              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}  
                <div class="row mt-4">
                    <div class="form-group col-md-6">
                        <label class="form-label">First Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="inputNanme4" name="first_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Last Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="inputNanme4" name="last_name" required>
                    </div> 
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Admission number<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('admission_number') }}" id="inputEmail4" name="admission_number" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Roll numer<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('roll_numer') }}" id="inputEmail4" name="roll_numer" required>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Class<span style="color: red">*</span></label>
                    <select class="form-control" name="class_id" id="" required>
                      <option value="">Select class</option>
                      @foreach ($getClass_assign as $class )
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6 form-group">
                    <label class="form-label">Gender<span style="color: red">*</span></label>
                    <select class="form-control" name="gender" id="" required> 
                      <option value="">Select gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Date of birth<span style="color: red">*</span></label>
                    <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Caste<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('caste') }}" name="caste" required>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Religion<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('religion') }}" name="religion" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Mobile number<span style="color: red">*</span></label>
                    <input type="number" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" required>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Admission date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Profile pic<span style="color: red">*</span></label>
                    <input type="file" class="form-control" value="{{ old('profile_pic') }}" name="profile_pic" required>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Blood group<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('blood_group') }}" name="blood_group" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Height<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('height') }}" name="height" required>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Weight<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('weight') }}" name="weight" required>
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="0">Active</option>
                        <option value="1">InActive</option>
                    </select>
                </div>
                </div>  
                <div class="col-12">
                  <label class="form-label">Email<span style="color: red">*</span></label>
                  <input type="email" class="form-control" value="{{ old('email') }}" name="email" required>
                  <div class="text-danger"><b>{{ $errors->first('email') }}</b></div>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password<span style="color: red">*</span></label>
                  <input type="password" class="form-control" id="inputPassword4" name="password" required>
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