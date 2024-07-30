@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>My account</h1>
    </div><!-- End Page Title -->
    @include('_message')

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
                        <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" id="inputNanme4" name="first_name" required>
                        <div class="text-danger"><b>{{ $errors->first('first_name') }}</b></div>
                      </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Last Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name', $getRecord->last_name) }}" id="inputNanme4" name="last_name" required>
                        <div class="text-danger"><b>{{ $errors->first('last_name') }}</b></div>
                    </div> 
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <label class="form-label">Profile pic<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="profile_pic" >
                        <div class="text-danger"><b>{{ $errors->first('profile_pic') }}</b></div>
                        @if (!empty($getRecord->getProfile()))
                          <img src="{{ $getRecord->getProfile() }}" alt="" style="width: 100px">
                        @endif
                    </div>
                  <div class="col-6 form-group">
                    <label class="form-label">Gender<span style="color: red">*</span></label>
                    <select class="form-control" name="gender" id="" required> 
                      <option value="">Select gender</option>
                      <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''  }} value="Male">Male</option>
                      <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''  }} value="Female">Female</option>
                      <option {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''  }} value="Other">Other</option>
                    </select>
                    <div class="text-danger"><b>{{ $errors->first('gender') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Date of birth<span style="color: red">*</span></label>
                    <input type="date" class="form-control" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth" required>
                    <div class="text-danger"><b>{{ $errors->first('date_of_birth') }}</b></div>
                    
                  </div>
                  <div class="col-6">
                    <label class="form-label">Caste<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('caste', $getRecord->caste) }}" name="caste" required>
                    <div class="text-danger"><b>{{ $errors->first('caste') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Religion<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('religion', $getRecord->	religion) }}" name="religion" required>
                    <div class="text-danger"><b>{{ $errors->first('religion') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Blood group<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('blood_group', $getRecord->blood_group) }}" name="blood_group" required>
                    <div class="text-danger"><b>{{ $errors->first('blood_group') }}</b></div>

                  </div>
                  <div class="col-6">
                    <label class="form-label">Height<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('height',$getRecord->height )}}" name="height" required>
                    <div class="text-danger"><b>{{ $errors->first('height') }}</b></div>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Weight<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('weight', $getRecord->weight )}}" name="weight" required>
                    <div class="text-danger"><b>{{ $errors->first('weight') }}</b></div>

                  </div>
                </div>  
                <div class="col-12">
                  <label class="form-label">Email<span style="color: red">*</span></label>
                  <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" name="email" required>
                  <div class="text-danger"><b>{{ $errors->first('email') }}</b></div>
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