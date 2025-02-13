<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin - Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../../images/favicon.png" />
    
    <style>
         .fade-out {
    opacity: 0;
    transition: opacity 0.3s ease-out; /* Smoothly reduce opacity over 0.3 seconds */
}
        
      .custom-file {
    width: 100%;
}

.custom-file-input {
    height: calc(2.875rem + 2px); /* Match other input fields */
    opacity: 0; /* Hide the default file input */
    position: absolute; /* Position it over the label */
    z-index: 2; /* Ensure it's clickable */
    width: 100%; /* Full width */
    cursor: pointer; /* Show pointer cursor */
}

.custom-file-label {
    height: calc(2.875rem + 2px); /* Match other input fields */
    line-height: 2.5rem; /* Center text vertically */
    padding: 0 15px; /* Add padding for better alignment */
    font-weight: 450; /* Same as other input fields */
    font-size: 0.895rem; /* Same as other input fields */
    color: #6C7293; /* Same as placeholder color */
    font-family: "Nunito", sans-serif; /* Match form font */
    border: 1px solid #ced4da; /* Match other input fields */
    border-radius: 4px; /* Match other input fields */
    background-color: #fff; /* Match other input fields */
    display: flex;
    align-items: center; /* Center text vertically */
    justify-content: flex-start; /* Align text to the left */
}

.custom-file-label::after {
    height: calc(2.875rem + 2px); /* Match other input fields */
    line-height: 2.5rem; /* Center text vertically */
    padding: 0 1rem; /* Add padding for better alignment */
    background-color: #4B49AC; /* Custom button color */
    color: #ffffff; /* White text color */
    font-weight: 400; /* Same as other input fields */
    font-size: 0.875rem; /* Same as other input fields */
    content: "Browse"; /* Change the text to "Browse" */
    border-left: 1px solid #ced4da; /* Add a border */
    border-radius: 0 4px 4px 0; /* Match other input fields */
    display: flex;
    align-items: center; /* Center text vertically */
    justify-content: center; /* Center text horizontally */
}

        .form-control.is-valid {
            border-color: #28a745 !important;
            padding-right: 2.25rem !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") !important;
            background-repeat: no-repeat !important;
            background-position: center right calc(0.375em + 0.1875rem) !important;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem) !important;
        }
        
        .invalid-feedback {
            display: block !important;
        }
        .custom-file {
    width: 100%;
}

.custom-file-input {
    height: calc(2.875rem + 2px); /* Adjust to match other input fields */
}

.custom-file-label {
    height: calc(2.875rem + 2px); /* Match other input fields */
    line-height: 2.5rem; /* Center text vertically */
    padding: 0 15px;
}

        </style>
        
</head>

<body>
    <div class="alert-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        @if (session('success'))
        <div id="success-message" class="alert alert-success bg-gradient-success border-0 text-white fade show" role="alert" style="min-width: 300px; box-shadow: 0 2px 15px rgba(0,0,0,0.1);">
            <div class="d-flex align-items-center">
                <i class="ti-check mr-2"></i>
                <div>{{ session('success') }}</div>
               
            </div>
        </div>
        @endif
    
        @if ($errors->any())
        <div id="error-message" class="alert alert-danger bg-gradient-danger border-0 text-white fade show" role="alert" style="min-width: 300px; box-shadow: 0 2px 15px rgba(0,0,0,0.1);">
            <div class="d-flex align-items-center">
                <i class="ti-alert mr-2"></i>
                <div>
                    <ul class="mb-0 list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    <script>
        function fadeOutMessage(elementId, fadeDelay = 2000, fadeDuration = 300) {
            setTimeout(() => {
                const message = document.getElementById(elementId);
        
                // Check if the element exists
                if (!message) {
                    console.error(`Element with ID '${elementId}' not found.`);
                    return;
                }
        
                // Add the fade-out class
                message.classList.add('fade-out');
        
                // Hide the element after the fade-out duration
                setTimeout(() => {
                    message.style.display = 'none';
                }, fadeDuration);
            }, fadeDelay);
        }
        
        // Apply fade-out to success and error messages
        fadeOutMessage('success-message');
        fadeOutMessage('error-message');
        </script>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="../../images/logo.svg" alt="logo">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                        <form id="registerForm" class="pt-3" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data"  autocomplete="off">
                            @csrf
                            
                            <div class="form-group">
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       placeholder="Full Name" 
                                       value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <input type="text" 
                                       class="form-control @error('username') is-invalid @enderror" 
                                       name="username" 
                                       placeholder="Username" 
                                       autocomplete="new-username"
                                       value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       placeholder="Email" 
                                       autocomplete="new-email"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="Password"
                                       autocomplete="new-password"
                                       value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                placeholder="Confirm Password"
                                autocomplete="new-password">
                         
                            </div>
                        
                       {{--      <div class="form-group">
                                <select name="role" 
                                        class="form-control form-control-lg @error('role') is-invalid @enderror">
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>  --}}
                        
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" 
                                           class="custom-file-input @error('image') is-invalid @enderror" 
                                           id="customFile"
                                           name="image"
                                           accept="image/*">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        
               {{--            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" name="terms" class="form-check-input @error('terms') is-invalid @enderror">
                                        I agree to all Terms & Conditions
                                    </label>
                                    @error('terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>  --}}  
                        
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {
        $("#registerForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 255
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 255
                },
                password_confirmation: {
                    required: true,
                    equalTo: "[name='password']"
                },
                image: {
                    required: false, // Optional
                    extension: "jpg|jpeg|png|gif" // Allowed file types
                }
            },
            messages: {
                name: {
                    required: "Please enter your full name",
                    minlength: "Name must be at least 3 characters",
                    maxlength: "Name cannot exceed 255 characters"
                },
                username: {
                    required: "Please enter a username",
                    minlength: "Username must be at least 3 characters",
                    maxlength: "Username cannot exceed 255 characters"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                    maxlength: "Email cannot exceed 255 characters"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 8 characters",
                    maxlength: "Password cannot exceed 255 characters"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                image: {
                    extension: "Please upload a valid image file (jpg, jpeg, png, gif)"
                }
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                form.submit(); // Submit the form if validation passes
            }
        });

        // Update file input label
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    });
</script>
    
    
</body>
</html>