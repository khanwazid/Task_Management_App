<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash - Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <link rel="stylesheet" href="css/register.css">
   
        
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
   <!-- Custom JS -->
   <script src="js/register.js"></script>
    
    
</body>
</html>