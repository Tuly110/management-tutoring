@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add new Parent</h1>
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
                        <label class="form-label">Teacher Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('teacher_name') }}" id="inputNanme4" name="teacher_name" required>
                        <div class="text-danger"><b>{{ $errors->first('teacher_name') }}</b></div>
                      </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Mobile Number <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" id="inputNanme4" name="mobile_number" required>
                        <div class="text-danger"><b>{{ $errors->first('mobile_number') }}</b></div>
                    </div> 
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Marital status<span style="color: red">*</span></label>
                    <select class="form-control" name="marital_status" id="" required> 
                        <option value="">Select marital status</option>
                        <option {{ (old('marital_status') == 'No') ? 'selected' : ''  }} value="No">No</option>
                        <option {{ (old('marital_status') == 'Yes') ? 'selected' : ''  }} value="Yes">Yes</option>
                        <option {{ (old('marital_status') == 'Other') ? 'selected' : ''  }} value="Other">Other</option>
                      </select>
                    <div class="text-danger"><b>{{ $errors->first('marital_status') }}</b></div>
                  </div>
                  <div class="col-6">
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
                      <label class="form-label">Qualification<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('qualification') }}" id="inputEmail4" name="qualification" required>
                      <div class="text-danger"><b>{{ $errors->first('qualification') }}</b></div>
                    </div>
                    <div class="col-6">
                      <label class="form-label">Address<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('address') }}" id="inputEmail4" name="address" required>
                      <div class="text-danger"><b>{{ $errors->first('address') }}</b></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                      <label class="form-label">Work experience<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('work_experience') }}" id="inputEmail4" name="work_experience" required>
                      <div class="text-danger"><b>{{ $errors->first('work_experience') }}</b></div>
                    </div>
                    <div class="col-6">
                      <label class="form-label">Date of birth<span style="color: red">*</span></label>
                      <input type="date" class="form-control" value="{{ old('date_of_birth') }}" id="inputEmail4" name="date_of_birth" required>
                      <div class="text-danger"><b>{{ $errors->first('date_of_birth') }}</b></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">Date of joining<span style="color: red">*</label>
                        <input type="date" class="form-control" value="{{ old('date_of_join') }}" name="date_of_join" required>
                        <div class="text-danger"><b>{{ $errors->first('date_of_join') }}</b></div>

                    </div>
                    <div class="col-6">
                        <label class="form-label">Note<span style="color: red">*</span></label>
                        <br>
                        <textarea name="note" id="" cols="60" rows="2" required>
                          {{ old('note') }}
                        </textarea>
                        <div class="text-danger"><b>{{ $errors->first('note') }}</b></div>
                    </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                        <option {{ (old('status') == 0) ? 'selected' : ''  }} value="0">Active</option>
                        <option {{ (old('status') == 1) ? 'selected' : ''  }} value="1">InActive</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Profile pic<span style="color: red">*</span></label>
                    <input type="file" class="form-control" value="{{ old('profile_pic') }}" name="profile_pic" required>
                    <div class="text-danger"><b>{{ $errors->first('profile_pic') }}</b></div>
                  </div>
              </div>>
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