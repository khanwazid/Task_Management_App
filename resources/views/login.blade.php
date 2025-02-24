<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

 

</head>

<body>
    <div class="skeleton-loader">
        <div class="container-scroller p-0">
            <div class="page-body-wrapper full-page-wrapper p-0">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <!-- Skeleton Elements -->
                                <div class="skeleton skeleton-logo"></div>
                                <div class="skeleton skeleton-text heading"></div>
                                <div class="skeleton skeleton-text subheading"></div>
                                <div class="skeleton skeleton-input"></div>
                                <div class="skeleton skeleton-input"></div>
                                <div class="skeleton skeleton-button"></div>
                                <div class="skeleton skeleton-link"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-loaded">
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


<div class="container-scroller p-0">
    <div class="page-body-wrapper full-page-wrapper p-0">

      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">

            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="POST" action="{{ route('login.authenticate') }}" id="loginForm" autocomplete="off">
                @csrf
            
                <div class="form-group">
                    <input type="email" 
                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                           name="email" 
                           id="loginEmail"
                           placeholder="Email Address" 
                           value="{{ old('email') }}"
                           autocomplete="off">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <input type="password" 
                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                           name="password" 
                           id="loginPassword"
                           placeholder="Password" 
                           autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                    <!-- Add a div for client-side validation errors -->
                    <div class="password-error"></div>
                </div>
            
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-lg font-weight-medium auth-form-btn" 
        style="background-color: #4b49ac; border-color: #4b49ac; color: white;">
    SIGN IN
</button>

                </div>
            
               
                <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
   <!-- Custom JS -->
   <script src="js/scripts.js"></script>
 
</body>

</html>