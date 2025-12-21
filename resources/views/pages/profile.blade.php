@extends('layouts.app')
@section('contant')

<div id="profile">
    <h2 class="mb-4">My Profile</h2>
    <div class="row">

        <!-- LEFT PROFILE CARD -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="profile-photo-upload mb-3">
                        <img
                            src="{{ $student->profile_image
                                ? asset('storage/'.$student->profile_image)
                                : 'https://ui-avatars.com/api/?name='.$student->first_name.'+'.$student->last_name }}"
                            id="profileImg"
                            alt="Profile"
                        >

                        <label for="photoUpload">
                            <i class="fas fa-camera"></i>
                        </label>

                        <input type="file" name="profile_image" id="photoUpload"
                               accept="image/*">
                    </div>

                    <h4>{{ $student->first_name }} {{ $student->last_name }}</h4>
                    <p class="text-muted">Student ID: {{ $student->id }}</p>

                    <div class="d-grid gap-2 mt-4">
                        <span class="badge bg-primary badge-custom">Student</span>
                        <span class="badge bg-success badge-custom">{{ ucfirst($student->status) }}</span>
                    </div>
                </div>
            </div>
             <div class="card">
                <div class="card-body text-start">
                   <p><b>Roll No: </b> {{ $studentAcadmicDetails->roll_number ?? 'N/L'}}</p>
                   <p><b>Class: </b> {{ $studentAcadmicDetails->class->name ?? 'N/L'}}</p>
                   <p><b>Class Code: </b> {{ $studentAcadmicDetails->class->code ?? 'N/L'}}</p>
                   <p><b>Section: </b> {{ ucfirst($studentAcadmicDetails->section->name) ?? 'N/L'}}</p>
                   <p><b>Status: </b> {{ ucfirst($studentAcadmicDetails->class->status) ?? 'N/L'}}</p>
                </div>  
            </div>
        </div>

        <!-- RIGHT FORM -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Update Profile Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('student.profile.update') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name"
                                       class="form-control"
                                       value="{{ old('first_name', $student->first_name) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name"
                                       class="form-control"
                                       value="{{ old('last_name', $student->last_name) }}">
                            </div>
                        
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">Select</option>
                                    <option value="Male" {{ old('gender',$student->gender)=='Male'?'selected':'' }}>Male</option>
                                    <option value="Female" {{ old('gender',$student->gender)=='Female'?'selected':'' }}>Female</option>
                                    <option value="Other" {{ old('gender',$student->gender)=='Other'?'selected':'' }}>Other</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email"
                                    class="form-control"
                                    value="{{ old('email', $student->email) }}">
                            </div>
                        </div>

                       

                        <div class="row mb-3">
                         <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone"
                                class="form-control"
                                value="{{ old('phone', $student->phone) }}"
                                pattern="[0-9]{10}"
                                maxlength="10"
                                minlength="10"
                                required
                                title="Enter 10 digit phone number">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Alternate Phone</label>
                            <input type="tel" name="alternate_phone"
                                class="form-control"
                                value="{{ old('alternate_phone', $student->alternate_phone) }}"
                                pattern="[0-9]{10}"
                                maxlength="10"
                                minlength="10"
                                title="Enter 10 digit phone number">
                        </div>


                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth"
                                       class="form-control"
                                       value="{{ old('date_of_birth', $student->date_of_birth) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Height</label>
                                <input type="number"
                                    name="height"
                                    class="form-control"
                                    step="0.01"
                                    value="{{ old('height', $student->height) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Weight</label>
                                <input type="number"
                                    name="weight"
                                    class="form-control"
                                    step="0.01"
                                    value="{{ old('weight', $student->weight) }}">
                            </div>


                             <div class="col-md-6">
                                <label class="form-label">Blood Group</label>
                                <input type="text" name="blood_group"
                                    class="form-control"
                                    value="{{ old('blood_group', $student->blood_group) }}">
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control"
                                    value="{{ old('city', $student->city) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control"
                                    value="{{ old('state', $student->state) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control"
                                    value="{{ old('country', $student->country) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Postal Code</label>
                                <input type="text" name="postal_code"
                                    class="form-control"
                                    value="{{ old('postal_code', $student->postal_code) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ old('address', $student->address) }}</textarea>
                            </div>
                        </div>
                   

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Father Name</label>
                                <input type="text" name="father_name"
                                    class="form-control"
                                    value="{{ old('father_name', $student->father_name) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Mother Name</label>
                                <input type="text" name="mother_name"
                                    class="form-control"
                                    value="{{ old('mother_name', $student->mother_name) }}">
                            </div>
                       
                            <div class="col-md-6">
                                <label class="form-label">Guardian Name</label>
                                <input type="text" name="guardian_name"
                                    class="form-control"
                                    value="{{ old('guardian_name', $student->guardian_name) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Guardian Phone</label>
                                <input type="text" name="guardian_phone"
                                    class="form-control"
                                    value="{{ old('guardian_phone', $student->guardian_phone) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Guardian Email</label>
                                <input type="email" name="guardian_email"
                                    class="form-control"
                                    value="{{ old('guardian_email', $student->guardian_email) }}">
                            </div>
                         </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
$(document).ready(function () {

    $('#photoUpload').on('change', function () {

        let file = this.files[0];
        if (!file) return;

        // Preview image
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#profileImg').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);

        // Upload image via AJAX
        let formData = new FormData();
        formData.append('profile_image', file);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            url: "{{ route('student.profile.image.upload') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log('Image uploaded successfully');
                console.log(res);
            },
            error: function (xhr) {
                // Laravel validation error (422)
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';

                    $.each(errors, function (key, value) {
                        errorMsg += value[0] + '\n';
                    });

                    alert(errorMsg);
                }
                // Unauthorized / CSRF error
                else if (xhr.status === 419) {
                    alert('Session expired. Please refresh the page.');
                }
                // Other server errors
                else {
                    alert(xhr.responseJSON?.message || 'Something went wrong!');
                }

                console.error(xhr);
            }
        });

    });

});
</script>
@endsection



