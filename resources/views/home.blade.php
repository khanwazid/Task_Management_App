<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Welcome - Skydash</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->

  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <style>



    .welcome-hero {
      background: linear-gradient(120deg, #4B49AC, #98BDFF);
      height: 100vh;
      display: flex;
      align-items: center;
      color: white;
    }
    .welcome-content {
      text-align: center;
      padding: 2rem;
    }
    .welcome-title {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }
    .welcome-subtitle {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }
    .auth-buttons .btn {
      margin: 0 10px;
      padding: 12px 30px;
      font-weight: 600;
    }
  </style>
</head>

<body>
 


  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5">
          <img src="images/logo.svg" class="mr-2" alt="logo"/>
        </a>
        <a class="navbar-brand brand-logo-mini">
          <img src="images/logo-mini.svg" alt="logo"/>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        
        <ul class="navbar-nav navbar-nav-right">
          <!-- Login and Register Links -->
          <li class="nav-item">
            <a class="nav-link"href="{{ route('login') }}">
              <i class="ti-user"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
              <i class="ti-plus"></i> Register
            </a>
          </li>
        </ul>
      </div>
    </nav>

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
   

    <!-- Welcome Hero Section -->
    <div class="welcome-hero">
      <div class="container">
        <div class="welcome-content">
          <h1 class="welcome-title">Welcome to Skydash</h1>
          <p class="welcome-subtitle">A powerful  template with countless features and functionalities</p>
          
        </div>
      </div>
    </div>

    
    

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <!-- endinject -->
  
</body>
</html>
