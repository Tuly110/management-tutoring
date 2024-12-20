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
                        <div class="text-danger"><b>{{ $errors->first('first_name') }}</b></div>
                      </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Last Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="inputNanme4" name="last_name" required>
                        <div class="text-danger"><b>{{ $errors->first('last_name') }}</b></div>
                    </div> 
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Admission number<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('admission_number') }}" id="inputEmail4" name="admission_number" required>
                    <div class="text-danger"><b>{{ $errors->first('admission_number') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label class="form-label">Roll numer<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('roll_numer') }}" id="inputEmail4" name="roll_numer" required>
                    <div class="text-danger"><b>{{ $errors->first('roll_numer') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Class<span style="color: red">*</span></label>
                    <select class="form-control" name="class_id" id="" required>
                      <option value="">Select class</option>
                      @foreach ($getClass_assign as $class )
                        <option {{ (old('class') == $class->id) ? 'selected' : ''  }}  value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                    <div class="text-danger"><b>{{ $errors->first('class_id') }}</b></div>

                  </div>
                  <div class="col-6 form-group">
                    <label class="form-label">Gender<span style="color: red">*</span></label>
                    <select class="form-control" name="gender" id="" required> 
                      <option value="">Select gender</option>
                      <option {{ (old('gender') == 'Male') ? 'selected' : ''  }} value="Male">Male</option>
                      <option {{ (old('gender') == 'Female') ? 'selected' : ''  }} value="Female">Female</option>
                      <option {{ (old('gender') == 'Other') ? 'selected' : ''  }} value="Other">Other</option>
                    </select>
                    <div class="text-danger"><b>{{ $errors->first('gender') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Date of birth<span style="color: red">*</span></label>
                    <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
                    <div class="text-danger"><b>{{ $errors->first('date_of_birth') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label class="form-label">Caste<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('caste') }}" name="caste" required>
                    <div class="text-danger"><b>{{ $errors->first('caste') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Religion<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('religion') }}" name="religion" required>
                    <div class="text-danger"><b>{{ $errors->first('religion') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label class="form-label">Mobile number<span style="color: red">*</span></label>
                    <input type="number" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" required>
                    <div class="text-danger"><b>{{ $errors->first('mobile_number') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Admission date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required>
                    <div class="text-danger"><b>{{ $errors->first('admission_date') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label class="form-label">Profile pic<span style="color: red">*</span></label>
                    <input type="file" class="form-control" value="{{ old('profile_pic') }}" name="profile_pic" required>
                    <div class="text-danger"><b>{{ $errors->first('profile_pic') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Blood group<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('blood_group') }}" name="blood_group" required>
                    <div class="text-danger"><b>{{ $errors->first('blood_group') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label class="form-label">Height<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('height') }}" name="height" required>
                    <div class="text-danger"><b>{{ $errors->first('height') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Weight<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('weight') }}" name="weight" required>
                    <div class="text-danger"><b>{{ $errors->first('weight') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                        <option {{ (old('status') == 0) ? 'selected' : ''  }} value="0">Active</option>
                        <option {{ (old('status') == 1) ? 'selected' : ''  }} value="1">InActive</option>
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