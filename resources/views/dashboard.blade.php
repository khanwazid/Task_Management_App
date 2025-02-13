<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


  <style>
   
   .fade-out {
    opacity: 0;
    transition: opacity 0.3s ease-out; /* Smoothly reduce opacity over 0.3 seconds */
}

   .strikethrough {
    text-decoration: line-through;
    color: #6c757d; 
    opacity: 0.7;
}
    .modal-content {
    border-radius: 16px;
    overflow: hidden;
}

.modal-header-custom {
    background: linear-gradient(135deg, #0061f2 0%, #6900f2 100%);
}

.form-control {
    border-radius: 8px;
    border: 1px solid #e0e0e0;
}

.form-control:read-only {
    background-color: #f8f9fa !important;
}

.btn {
    border-radius: 8px;
    padding: 8px 20px;
}

.btn-primary {
    background: linear-gradient(135deg, #0061f2 0%, #6900f2 100%);
    border: none;
}

@media (max-width: 768px) {
    .modal-dialog {
        margin: 0.5rem;
    }
}

    .modal-content {
    border-radius: 16px;
    overflow: hidden;
}

.bg-gradient-blue {
    background: linear-gradient(135deg, #0061f2 0%, #6900f2 100%);
}

.modal-header-custom {
    position: relative;
    overflow: hidden;
}

.modal-header-custom::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
    pointer-events: none;
}

.modal-header-custom h4 {
    font-weight: 600;
    letter-spacing: 0.5px;
}

.modal-header-custom p {
    opacity: 0.9;
    font-size: 0.95rem;
}

    .modal-content {
    border-radius: 16px;
    overflow: hidden;
}

.bg-danger {
    background: linear-gradient(135deg, #dc3545, #c82333) !important;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #dee2e6;
}

.btn {
    border-radius: 8px;
    padding: 10px 24px;
    transition: all 0.3s ease;
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    border: none;
}

.btn-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
}

    .modal-content {
    border-radius: 16px;
    overflow: hidden;
}

.modal-side {
    background: linear-gradient(135deg, #dc3545, #c82333);
}

.form-control {
    border-radius: 8px;
    border: 1px solid #dee2e6;
}

.form-control:read-only {
    background-color: #f8f9fa !important;
}

.btn {
    border-radius: 8px;
    padding: 10px 24px;
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    border: none;
}

@media (max-width: 992px) {
    .modal-content {
        flex-direction: column !important;
    }
    
    .modal-side {
        width: 100% !important;
        padding: 2rem !important;
    }
}

    /* Custom styles for the task modal */
.modal-content {
    border-radius: 16px;
}

.form-floating > .form-control,
.form-floating > .form-select {
    border-radius: 10px;
    border: 1.5px solid #e0e0e0;
}

.form-floating > .form-control:focus,
.form-floating > .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
}

.btn {
    border-radius: 10px;
    padding: 12px 24px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(45deg, #0d6efd, #0a58ca);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(45deg, #0a58ca, #084298);
    transform: translateY(-1px);
}

.btn-light {
    background: #f8f9fa;
    border: 1.5px solid #e0e0e0;
}

.btn-light:hover {
    background: #e9ecef;
}

    .modal-xl {
    max-width: 90%;
}

.modal-body .form-group {
    margin-bottom: 1.5rem;
}

.modal-body textarea {
    min-height: 100px;
}

    .task-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.04);
    transition: all 0.3s ease;
}

.task-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.08);
}

.icon-wrapper {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: rgba(var(--bs-primary-rgb), 0.1);
}

.task-title {
    font-size: 1.1rem;
    line-height: 1.5;
    color: #2c3e50;
    white-space: pre-line;
}

.task-description {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #64748b;
    white-space: pre-line;
}

.status-badge {
    padding: 0.5em 1em;
    font-weight: 500;
}

.action-buttons .btn {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.action-buttons .btn:hover {
    transform: scale(1.1);
    background: rgba(var(--bs-primary-rgb), 0.1);
}

.date-badge {
    font-size: 0.9rem;
    padding: 0.4em 0.8em;
    background: rgba(var(--bs-primary-rgb), 0.1);
    border-radius: 20px;
}

    .pagination {
    margin-bottom: 0;
}

.page-item.active .page-link {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    border-color: transparent;
}

.page-link {
    border-radius: 50% !important;
    margin: 0 3px;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #4e73df;
    border: none;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.page-link:hover {
    background: rgba(78, 115, 223, 0.1);
    color: #4e73df;
    transform: translateY(-1px);
}

.page-item.disabled .page-link {
    background: #f8f9fa;
    color: #6c757d;
}


    .profile-placeholder {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    transition: all 0.3s ease;
}

.profile-placeholder .fa-user-circle {
    font-size: 4rem;
    color: rgba(255, 255, 255, 0.9);
}

.profile-placeholder:hover {
    opacity: 0.9;
}

.badge.badge-primary {
    transition: transform 0.2s ease;
}

.badge.badge-primary:hover {
    transform: scale(1.1);
}

    .profile-placeholder {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    transition: all 0.3s ease;
}

.profile-placeholder .fa-user-circle {
    font-size: 4rem;
    color: rgba(255, 255, 255, 0.9);
}

.profile-placeholder:hover {
    opacity: 0.9;
    cursor: pointer;
}


.badge.badge-primary {
    cursor: pointer;
    transition: transform 0.2s ease;
    bottom: 10px !important;
    right: 10px !important;
}


.badge.badge-primary:hover {
    transform: scale(1.1);
}

  .nav-profile .profile-image,
    .nav-profile .no-profile-image {
        width: 40px !important;
        height: 40px !important;
        min-width: 40px;
        min-height: 40px;
    }
    
   
    
    
    .no-profile-image .fa-user-circle {
    position: absolute;
    font-size: 24px;
    color: rgba(255, 255, 255, 0.9);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
    .no-profile-image {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
}

    
    
    .upload-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 2;
}
    .upload-overlay .fa-camera {
        color: white;
        font-size: 0.8rem;
    }
    
    .upload-text {
        color: white;
        font-size: 0.6rem;
        font-weight: 500;
    }
    
    .no-profile-image:hover .upload-overlay {
        opacity: 1;
    }
    
    .text-gradient-primary {
    background: linear-gradient(45deg, #4e73df);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.welcome-animation {
    animation: float 3s ease-in-out infinite;
}

.step-number {
    width: 30px;
    height: 30px;
    background: linear-gradient(45deg, #4e73df);
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.create-task-btn {
    transition: all 0.3s ease;
    background: linear-gradient(45deg, #4e73df);
    border: none;
}

.create-task-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

.getting-started-steps {
    background: rgba(78, 115, 223, 0.05);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 25px;
}

    .text-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.welcome-animation {
    animation: float 3s ease-in-out infinite;
}

.step-number {
    width: 30px;
    height: 30px;
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.create-task-btn {
    transition: all 0.3s ease;
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    border: none;
}

.create-task-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

.getting-started-steps {
    background: rgba(78, 115, 223, 0.05);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 25px;
}

   .title-cell {
    position: relative;
    max-height: 48px;
    overflow: hidden;
    transition: max-height 0.3s ease;
    line-height: 1.5;
    padding-right: 25px;
}

.title-cell.expanded {
    max-height: 1000px;
}

.title-overlay {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.title-show-more-btn {
    width: 18px;
    height: 18px;
    padding: 0;
    border-radius: 50%;
    font-size: 10px;
    background: #4e73df;
    color: white;
    border: none;
    box-shadow: 0 2px 4px rgba(78, 115, 223, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
}

.title-show-more-btn:hover {
    background: #2e59d9;
    transform: translateY(-1px);
}

.title-show-more-btn i {
    transition: transform 0.3s ease;
    font-size: 8px;
}

.title-cell.expanded .title-show-more-btn i {
    transform: rotate(180deg);
}

.description-cell {
    position: relative;
    max-height: 48px;
    overflow: hidden;
    transition: max-height 0.3s ease;
    line-height: 1.5;
    padding-right: 25px; /* Space for button */
}

.description-cell.expanded {
    max-height: 1000px;
}

.description-overlay {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.show-more-btn {
    width: 18px;
    height: 18px;
    padding: 0;
    border-radius: 50%;
    font-size: 10px;
    background: #4e73df;
    color: white;
    border: none;
    box-shadow: 0 2px 4px rgba(78, 115, 223, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
}

.show-more-btn:hover {
    background: #2e59d9;
    transform: translateY(-1px);
}

.show-more-btn i {
    transition: transform 0.3s ease;
    font-size: 8px;
}

.description-cell.expanded .show-more-btn i {
    transform: rotate(180deg);
}



    .task-title h6 {
    font-size: 0.95rem;
    line-height: 1.4;
}

.description-wrapper {
    position: relative;
    max-height: 3.6em;
    overflow: hidden;
}

.description-wrapper p {
    font-size: 0.9rem;
    line-height: 1.5;
}

.read-more {
    position: absolute;
    bottom: 0;
    right: 0;
    background: linear-gradient(90deg, transparent, white 20%);
    padding-left: 20px;
    text-decoration: none;
}

.action-buttons .btn {
    width: 35px;
    height: 35px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s;
}

.action-buttons .btn:hover {
    transform: translateY(-2px);
}

.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
}

.badge i {
    font-size: 0.8rem;
}

.table thead {
    background: linear-gradient(45deg, #4e73df, #224abe);
}

.table td {
    padding: 1rem 0.75rem;
}

.table {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.table thead th {
    border: none;
    padding: 15px;
    font-weight: 500;
}

.table tbody td {
    padding: 15px;
    vertical-align: middle;
    border-color: #f3f3f3;
}

.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
}

.badge-pill {
    border-radius: 30px;
}

.btn-group .btn {
    margin: 0 2px;
    border-radius: 4px !important;
    transition: all 0.3s ease;
}

.btn-group .btn:hover {
    transform: translateY(-2px);
}

.text-wrap {
    line-height: 1.5;
    max-height: 100px;
    overflow-y: auto;
}

/* Custom scrollbar for text-wrap */
.text-wrap::-webkit-scrollbar {
    width: 4px;
}

.text-wrap::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.text-wrap::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

.text-wrap::-webkit-scrollbar-thumb:hover {
    background: #555;
}
    .alert {
    margin-bottom: 1rem;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    animation: slideIn 0.3s ease-out;
}

.alert.fade-out {
    animation: slideOut 0.3s ease-in;
}

.bg-gradient-success {
    background: linear-gradient(45deg, #28a745, #34ce57);
}

.bg-gradient-danger {
    background: linear-gradient(45deg, #dc3545, #ef5462);
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

    .alert {
    margin-bottom: 1rem;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    animation: slideIn 0.3s ease-out;
}

.alert.fade-out {
    animation: slideOut 0.3s ease-in;
}

@keyframes slideIn {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateY(0);
        opacity: 1;
    }
    to {
        transform: translateY(-100%);
        opacity: 0;
    }
}

    .is-valid {
    border-color: #28a745 !important; /* Green border for valid fields */
}

.is-invalid {
    border-color: #dc3545 !important; /* Red border for invalid fields */
}

.invalid-feedback {
    color: #dc3545; /* Red color for error messages */
}
    .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.bg-gradient-danger {
    background: linear-gradient(to right, #ff4747, #ff7676);
}

.form-control[readonly] {
    background-color: #fff !important;
    border: 1px solid #e9ecef;
}

.btn-outline-secondary {
    transition: all 0.3s ease;
}

.btn-danger {
    background: #ff4747;
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: #ff3333;
    transform: translateY(-1px);
}

.btn {
    padding: 8px 20px;
    font-weight: 500;
}
    .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.form-control[readonly] {
    background-color: #fff !important;
    border: 1px solid #e9ecef;
    cursor: default;
}

.btn-outline-primary {
    color: #4B49AC;
    border-color: #4B49AC;
    background-color: transparent;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #4B49AC;
    border-color: #4B49AC;
}

.btn {
    padding: 8px 20px;
    font-weight: 500;
}
    .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.form-control:focus {
    border-color: #4B49AC;
    box-shadow: 0 0 0 0.2rem rgba(75, 73, 172, 0.25);
}

.btn-outline-primary {
    color: #4B49AC;
    border-color: #4B49AC;
    background-color: transparent;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #4B49AC;
    border-color: #4B49AC;
}

.btn {
    padding: 8px 20px;
    font-weight: 500;
}
    .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.btn-outline-primary {
    color: #4B49AC;
    border-color: #4B49AC;
    background-color: transparent;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #4B49AC;
    border-color: #4B49AC;
}

.btn {
    padding: 8px 20px;
    font-weight: 500;
}

select.form-control {
    height: calc(1.5em + 0.75rem + 2px);
}
    .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.btn-outline-primary {
    color: #4B49AC;
    border-color: #4B49AC;
    background-color: transparent;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #4B49AC;
    border-color: #4B49AC;
}

.btn {
    padding: 8px 20px;
    font-weight: 500;
}
    .btn-outline-primary {
    color: #4B49AC;
    border-color: #4B49AC;
    background-color: transparent;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #4B49AC;
    border-color: #4B49AC;
}

.btn {
    padding: 8px 20px;
    font-weight: 500;
}
    /* Add these styles */
    .nav-profile .dropdown-menu {
    transition: opacity 0.2s ease-in-out;
}

.nav-profile .dropdown-menu.show {
    opacity: 1;
}

body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.footer {
    margin-top: auto;
    padding: 20px 0;
    width: 100%;
    background: #fff;
    border-top: 1px solid #e7e7e7;
}
.content-wrapper {
    padding: 80px 20px 20px 20px; /* Top padding to account for fixed navbar */
    min-height: calc(100vh - 60px); /* Adjust height to account for footer */
}

.card {
    margin-top: 60px;
}

.navbar {
    z-index: 1000;
}

.task-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}
.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.modal-header {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.modal-footer {
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.form-control[readonly] {
    border: 1px solid #e9ecef;
    cursor: default;
}

.badge {
    padding: 8px;
    border-radius: 50%;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
    padding: 8px 20px;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
  </style>
</head>
<body>
    <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo"><img src="images/logo.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav navbar-nav-right">


                <li class="nav-item nav-profile dropdown">
                    
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        @if(auth()->user()->image && Storage::disk('public')->exists(auth()->user()->image))
                            <img src="{{ Storage::url(auth()->user()->image) }}"  
                                 class="rounded-circle" 
                                 style="width: 40px; height: 40px; object-fit: cover;"
                                 alt="Profile Photo">
                        @else
                            <div class="no-profile-image rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px;"
                                 data-bs-toggle="tooltip" 
                                 data-bs-placement="bottom" 
                                 title="Upload a profile picture">
                                <i class="fas fa-user-circle"></i>
                                <div class="upload-overlay">
                                    <i class="fas fa-camera"></i>
                                    <span class="upload-text">Add Photo</span>
                                </div>
                            </div>
                        @endif
                    </a>
                    
                    
                    
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#viewProfileModal">
                            <i class="ti-user text-primary"></i>
                            View Profile
                        </a>
                       
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProfileModal">
                            <i class="ti-settings text-primary"></i>
                            Edit Profile
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal">
                            <i class="ti-lock text-primary"></i>
                            Change Password
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </form>
                    </div>
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
        
 <!-- For New Task  -->
 @if(!auth()->user()->isAdmin())
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
             
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">My Tasks</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTaskModal">
                        <i class="ti-plus"></i> Create New Task
                    </button>
                </div>
                @endif
               


                <div class="row">
                    @if(!auth()->user()->isAdmin() && $tasks->isEmpty())
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                @if(auth()->user()->created_at->diffInMinutes() < 30)
                                    <!-- New User Welcome -->
                                    <div class="text-center py-5">
                                        <div class="welcome-animation mb-4">
                                            <i class="fas fa-rocket fa-4x text-gradient-primary"></i>
                                        </div>
                                        <h3 class="text-gradient-primary mb-3">Welcome to Task Manager!</h3>
                                        <p class="text-muted mb-4">Let's get started by creating your first task. We'll help you stay organized and productive.</p>
                                        <div class="getting-started-steps text-start mx-auto" style="max-width: 400px;">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="step-number">1</div>
                                                <div class="ms-3">Click the "Create New Task" button above right top</div>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="step-number">2</div>
                                                <div class="ms-3">Fill in your task details</div>
                                            </div>
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="step-number">3</div>
                                                <div class="ms-3">Start tracking your progress</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Regular Empty State -->
                                    <div class="text-center py-5">
                                        <div class="mb-4">
                                            <i class="fas fa-tasks fa-4x text-gradient-primary opacity-50"></i>
                                        </div>
                                        <h4 class="text-gradient-primary mb-3">No Tasks Available</h4>
                                        <p class="text-muted mb-4">Ready to boost your productivity? Create your first task now!</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <!-- High Priority Tasks -->
                    @if(!auth()->user()->isAdmin())
                    <div class="col-md-4">
                       
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-danger text-white">
                       <h5 class="mb-0">
    <i class="fas fa-bolt text-warning fa-pulse"></i> High Priority
</h5>
                            </div>
                            <div class="card-body">
                                @php
                                $highPriorityTasks = $tasks->where('priority', 'high');
                                $startingNumber = ($tasks->currentPage() - 1) * $tasks->perPage();
                            @endphp
                            
                            @forelse($highPriorityTasks as $index => $task)
                                <div class="task-card mb-3 p-3 border rounded hover-shadow">
                                    <div class="serial-number mb-2">
                                        <span class="badge bg-secondary rounded-pill">
                                            <i class="fas fa-hashtag me-1"></i>
                                            {{ $startingNumber + $index + 1 }}
                                        </span>
                                    </div>
                                    <!-- Title Section with Modern Icon -->
                                    <div class="title-section mb-3">
                                        <div class="d-flex align-items-start gap-2">
                                            <div class="icon-wrapper">
                                                <i class="fas fa-clipboard-list text-primary fs-4"></i>
                                            </div>
                                            <div class="title-content flex-grow-1">
                                               <h6 class="mb-2 task-title fw-bold text-dark {{ $task->status == 'completed' ? 'strikethrough' : '' }}">{{ $task->title }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Description Section with Modern Icon -->
                                    <div class="description-section mb-3">
                                        <div class="d-flex gap-2">
                                            <div class="icon-wrapper">
                                                <i class="fas fa-file-text text-secondary fs-5"></i>
                                            </div>
                                            <div class="description-content flex-grow-1">
                                                <p class="task-description text-secondary {{ $task->status == 'completed' ? 'strikethrough' : '' }}">{{ $task->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Meta Information -->
                                    <div class="task-meta d-flex justify-content-between align-items-center mb-3">
                                        <span class="status-badge badge bg-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'danger') }} rounded-pill">
                                            <i class="fas fa-{{ 
                                                $task->status == 'completed' ? 'check-circle' : 
                                                ($task->status == 'in_progress' ? 'clock' : 'pause-circle') 
                                            }} me-1"></i>
                                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                        
                                        <div class="date-badge">
                                            <i class="fas fa-{{ 
                                                $task->due_date->isPast() ? 'calendar-xmark' : 
                                                ($task->due_date->isToday() ? 'calendar-day' : 
                                                ($task->due_date->isTomorrow() ? 'calendar-check' : 'calendar-alt')) 
                                            }} text-{{ 
                                                $task->due_date->isPast() ? 'danger' : 
                                                ($task->due_date->isToday() ? 'warning' : 
                                                ($task->due_date->isTomorrow() ? 'info' : 'primary')) 
                                            }} me-1"></i>
                                            <span class="text-muted">{{ $task->due_date->format('M d, Y') }}</span>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="action-buttons d-flex justify-content-end gap-2">
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#viewTaskModal{{ $task->id }}" title="View Details">
                                            <i class="far fa-eye text-info"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#editTaskModal{{ $task->id }}" title="Edit Task">
                                            <i class="far fa-pen-to-square text-warning"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#deleteTaskModal{{ $task->id }}" title="Delete Task">
                                            <i class="far fa-trash-can text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                                

                                @empty
                                    <p class="text-center text-muted my-3">No high priority tasks</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                
                    <!-- Medium Priority Tasks -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-warning text-white">
                         
<h5 class="mb-0">
    <i class="fas fa-hourglass-half text-dark fa-spin"></i> Medium Priority
</h5>              
  </div>
                            <div class="card-body">
            

                                @php
                                $highPriorityTasks = $tasks->where('priority', 'medium');
                                $startingNumber = ($tasks->currentPage() - 1) * $tasks->perPage();
                            @endphp
                            
                            @forelse($highPriorityTasks as $index => $task)
                                <div class="task-card mb-3 p-3 border rounded hover-shadow">
                                    <div class="serial-number mb-2">
                                        <span class="badge bg-secondary rounded-pill">
                                            <i class="fas fa-hashtag me-1"></i>
                                            {{ $startingNumber + $index + 1 }}
                                        </span>
                                    </div>
                                    <!-- Title Section with Modern Icon -->
                                    <div class="title-section mb-3">
                                        <div class="d-flex align-items-start gap-2">
                                            <div class="icon-wrapper">
                                        
                                                <i class="fas fa-clipboard-list text-primary fs-4"></i>
                                            </div>
                                            <div class="title-content flex-grow-1">
                                                 <h6 class="mb-2 task-title fw-bold text-dark {{ $task->status == 'completed' ? 'strikethrough' : '' }}">{{ $task->title }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Description Section with Modern Icon -->
                                    <div class="description-section mb-3">
                                        <div class="d-flex gap-2">
                                            <div class="icon-wrapper">
                                                <i class="fas fa-file-text text-secondary fs-5"></i>
                                            </div>
                                            <div class="description-content flex-grow-1">
                                                <p class="task-description text-secondary {{ $task->status == 'completed' ? 'strikethrough' : '' }}">{{ $task->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Meta Information -->
                                    <div class="task-meta d-flex justify-content-between align-items-center mb-3">
                                        <span class="status-badge badge bg-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'danger') }} rounded-pill">
                                            <i class="fas fa-{{ 
                                                $task->status == 'completed' ? 'check-circle' : 
                                                ($task->status == 'in_progress' ? 'clock' : 'pause-circle') 
                                            }} me-1"></i>
                                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                        
                                        <div class="date-badge">
                                            <i class="fas fa-{{ 
                                                $task->due_date->isPast() ? 'calendar-xmark' : 
                                                ($task->due_date->isToday() ? 'calendar-day' : 
                                                ($task->due_date->isTomorrow() ? 'calendar-check' : 'calendar-alt')) 
                                            }} text-{{ 
                                                $task->due_date->isPast() ? 'danger' : 
                                                ($task->due_date->isToday() ? 'warning' : 
                                                ($task->due_date->isTomorrow() ? 'info' : 'primary')) 
                                            }} me-1"></i>
                                            <span class="text-muted">{{ $task->due_date->format('M d, Y') }}</span>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="action-buttons d-flex justify-content-end gap-2">
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#viewTaskModal{{ $task->id }}" title="View Details">
                                            <i class="far fa-eye text-info"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#editTaskModal{{ $task->id }}" title="Edit Task">
                                            <i class="far fa-pen-to-square text-warning"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#deleteTaskModal{{ $task->id }}" title="Delete Task">
                                            <i class="far fa-trash-can text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                                

                                @empty
                                    <p class="text-center text-muted my-3">No medium priority tasks</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                
                    <!-- Low Priority Tasks -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-info text-white">
                              <h5 class="mb-0">
    <i class="fas fa-clock text-secondary fa-spin"></i> Low Priority
</h5>
                            </div>
                           
                            <div class="card-body">
                               
                                @php
                                $highPriorityTasks = $tasks->where('priority', 'low');
                                $startingNumber = ($tasks->currentPage() - 1) * $tasks->perPage();
                            @endphp
                            
                            @forelse($highPriorityTasks as $index => $task)
                                <div class="task-card mb-3 p-3 border rounded hover-shadow">
                                    <div class="serial-number mb-2">
                                        <span class="badge bg-secondary rounded-pill">
                                            <i class="fas fa-hashtag me-1"></i>
                                            {{ $startingNumber + $index + 1 }}
                                        </span>
                                    </div>

                                    <!-- Title Section with Modern Icon -->
                                    <div class="title-section mb-3">
                                        <div class="d-flex align-items-start gap-2">
                                            <div class="icon-wrapper">
                                                <i class="fas fa-clipboard-list text-primary fs-4"></i>
                                            </div>
                                            <div class="title-content flex-grow-1">
                                                <h6 class="mb-2 task-title fw-bold text-dark {{ $task->status == 'completed' ? 'strikethrough' : '' }}">{{ $task->title }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Description Section with Modern Icon -->
                                    <div class="description-section mb-3">
                                        <div class="d-flex gap-2">
                                            <div class="icon-wrapper">
                                                <i class="fas fa-file-text text-secondary fs-5"></i>
                                            </div>
                                            <div class="description-content flex-grow-1">
                                                <p class="task-description text-secondary {{ $task->status == 'completed' ? 'strikethrough' : '' }}">{{ $task->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Meta Information -->
                                    <div class="task-meta d-flex justify-content-between align-items-center mb-3">
                                        <span class="status-badge badge bg-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'danger') }} rounded-pill">
                                            <i class="fas fa-{{ 
                                                $task->status == 'completed' ? 'check-circle' : 
                                                ($task->status == 'in_progress' ? 'clock' : 'pause-circle') 
                                            }} me-1"></i>
                                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                        
                                        <div class="date-badge">
                                            <i class="fas fa-{{ 
                                                $task->due_date->isPast() ? 'calendar-xmark' : 
                                                ($task->due_date->isToday() ? 'calendar-day' : 
                                                ($task->due_date->isTomorrow() ? 'calendar-check' : 'calendar-alt')) 
                                            }} text-{{ 
                                                $task->due_date->isPast() ? 'danger' : 
                                                ($task->due_date->isToday() ? 'warning' : 
                                                ($task->due_date->isTomorrow() ? 'info' : 'primary')) 
                                            }} me-1"></i>
                                            <span class="text-muted">{{ $task->due_date->format('M d, Y') }}</span>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="action-buttons d-flex justify-content-end gap-2">
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#viewTaskModal{{ $task->id }}" title="View Details">
                                            <i class="far fa-eye text-info"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#editTaskModal{{ $task->id }}" title="Edit Task">
                                            <i class="far fa-pen-to-square text-warning"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#deleteTaskModal{{ $task->id }}" title="Delete Task">
                                            <i class="far fa-trash-can text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                                

                                @empty
                                    <p class="text-center text-muted my-3">No low priority tasks</p>
                                @endforelse
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <nav>
                        <ul class="pagination pagination-rounded">
                            {{ $tasks->links() }}
                        </ul>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Create Task Modal -->
   <div class="modal fade" id="createTaskModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Top Header Section -->
            <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                <h4 class="mb-2">
                    <i class="ti-plus me-2"></i>Create New Task
                </h4>
                <p class="mb-0">Enter your task details and preferences</p>
            </div>

            <!-- Content Section -->
            <form id="createTaskForm" action="{{ route('tasks.store') }}" method="POST">
                @csrf
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Title & Description -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-agenda me-2"></i>Title
                                </label>
                                <textarea name="title" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-paragraph me-2"></i>Description
                                </label>
                                <textarea name="description" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Priority, Status, Due Date -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-flag-alt me-2"></i>Priority
                                </label>
                                <select name="priority" class="form-control" required>
                                    <option value="">Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-stats-up me-2"></i>Status
                                </label>
                                <select name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-calendar me-2"></i>Due Date
                                </label>
                                <input type="date" name="due_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 py-3">
                    <button type="button" class="btn btn-light" data-dismiss="modal">
                        <i class="ti-close me-2"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save me-2"></i>Create Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    
     <!-- View  Task  -->
    @foreach($tasks as $task)
    <div class="modal fade" id="viewTaskModal{{ $task->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Top Header Section -->
                <div class="bg-primary text-white p-4 d-flex align-items-center justify-content-center gap-4">
                    <i class="ti-eye" style="font-size: 48px;"></i>
                    <div>
                        <h4 class="mb-2">Task Details</h4>
                        <p class="mb-0">View complete task information</p>
                    </div>
                </div>
    
                <div class="d-flex flex-row">
                    <div class="flex-grow-1 p-4">
                        <div class="row g-3">
                            <!-- Title & Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-agenda me-2"></i>Title
                                    </label>
                                    <textarea class="form-control bg-light" rows="3" readonly>{{ $task->title }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-paragraph me-2"></i>Description
                                    </label>
                                    <textarea class="form-control bg-light" rows="3" readonly>{{ $task->description }}</textarea>
                                </div>
                            </div>
    
                            <!-- Priority, Status, Due Date -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-flag-alt me-2"></i>Priority
                                    </label>
                                    <input type="text" class="form-control bg-light" value="{{ ucfirst($task->priority) }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-stats-up me-2"></i>Status
                                    </label>
                                    <input type="text" class="form-control bg-light" value="{{ ucfirst(str_replace('_', ' ', $task->status)) }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-calendar me-2"></i>Due Date
                                    </label>
                                    <input type="text" class="form-control bg-light" value="{{ $task->due_date->format('M d, Y') }}" readonly>
                                </div>
                            </div>
    
                            <!-- Created & Updated -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-time me-2"></i>Created At
                                    </label>
                                    <input type="text" class="form-control bg-light" value="{{ $task->created_at->format('M d, Y H:i A') }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-reload me-2"></i>Last Updated
                                    </label>
                                    <input type="text" class="form-control bg-light" value="{{ $task->updated_at->format('M d, Y H:i A') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="modal-footer border-0 py-3">
                    <button type="button" class="btn btn-primary px-4" data-dismiss="modal">
                        <i class="ti-close me-2"></i>Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    
        <!-- Edit Modal -->
        <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <!-- Top Header Section -->
                    <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                        <h4 class="mb-2">
                            <i class="ti-pencil me-2"></i>Edit Task
                        </h4>
                        <p class="mb-0">Update your task details and preferences</p>
                    </div>
        
                    <!-- Content Section -->
                    <form id="editTaskForm{{ $task->id }}" action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="modal-body p-4">
                           
                                <div class="row g-3">
                                    <!-- Title & Description -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-agenda me-2"></i>Title
                                            </label>
                                            <textarea name="title" class="form-control" rows="3" required>{{ $task->title }}</textarea>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-paragraph me-2"></i>Description
                                            </label>
                                            <textarea name="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
                                        </div>
                                    </div>
        
                                    <!-- Priority, Status, Due Date -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-flag-alt me-2"></i>Priority
                                            </label>
                                            <select name="priority" class="form-control" required>
                                                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                                                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-stats-up me-2"></i>Status
                                            </label>
                                            <select name="status" class="form-control" required>
                                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-calendar me-2"></i>Due Date
                                            </label>
                                            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date->format('Y-m-d') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="modal-footer border-0 py-3">
                                <button type="button" class="btn btn-light" data-dismiss="modal">
                                    <i class="ti-close me-2"></i>Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save me-2"></i>Update Task
                                </button>

                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteTaskModal{{ $task->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <!-- Top Warning Section -->
                    <div class="bg-danger text-white p-4 d-flex align-items-center justify-content-center gap-4">
                        <i class="ti-alert" style="font-size: 48px;"></i>
                        <div>
                            <h4 class="mb-2">Are you sure you want to delete this task?</h4>
                            <p class="mb-0">This action cannot be undone.</p>
                        </div>
                    </div>
        
                    <!-- Content Section -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="d-flex flex-row">
                            <!-- Left Content -->
                            <div class="flex-grow-1 p-4">
                                <div class="row g-3">
                                    <!-- Title & Description -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-agenda me-2"></i>Title
                                            </label>
                                            <textarea class="form-control bg-light" rows="3" readonly>{{ $task->title }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-paragraph me-2"></i>Description
                                            </label>
                                            <textarea class="form-control bg-light" rows="3" readonly>{{ $task->description }}</textarea>
                                        </div>
                                    </div>
        
                                    <!-- Priority, Status, Due Date -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-flag-alt me-2"></i>Priority
                                            </label>
                                            <input type="text" class="form-control bg-light" value="{{ ucfirst($task->priority) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-stats-up me-2"></i>Status
                                            </label>
                                            <input type="text" class="form-control bg-light" value="{{ ucfirst(str_replace('_', ' ', $task->status)) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-calendar me-2"></i>Due Date
                                            </label>
                                            <input type="text" class="form-control bg-light" value="{{ $task->due_date->format('M d, Y') }}" readonly>
                                        </div>
                                    </div>
        
                                    <!-- Created & Updated -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-time me-2"></i>Created At
                                            </label>
                                            <input type="text" class="form-control bg-light" value="{{ $task->created_at->format('M d, Y H:i A') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti-reload me-2"></i>Last Updated
                                            </label>
                                            <input type="text" class="form-control bg-light" value="{{ $task->updated_at->format('M d, Y H:i A') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="modal-footer border-0 py-3">
                            <button type="button" class="btn btn-light px-4" data-dismiss="modal">
                                <i class="ti-close me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-danger px-4">
                                <i class="ti-trash me-2"></i>Delete Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        
    @endforeach

    
<!-- Profile-Details Section Start -->

<div class="modal fade" id="viewProfileModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title">
                    <i class="ti-user mr-2"></i>My Profile
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Profile Image Section -->
                <div class="text-center mb-4">
                    <div class="position-relative d-inline-block">
                        @if(auth()->user()->image && Storage::disk('public')->exists(auth()->user()->image))
                        <img src="{{ Storage::url(auth()->user()->image) }}"  
                                 class="rounded-circle border shadow"
                                 style="width: 150px; height: 150px; object-fit: cover;"
                                 alt="Profile Photo">
                        @else
                            <div class="profile-placeholder rounded-circle border shadow d-flex align-items-center justify-content-center"
                                 style="width: 150px; height: 150px;">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        @endif
                        <div class="badge badge-primary position-absolute bottom-0 right-0">
                            <i class="ti-camera"></i>
                        </div>
                    </div>
                </div>
                

                <!-- Profile Details Section -->
                <div class="bg-light p-4 rounded">
                    <div class="form-group">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-user mr-2"></i>Full Name
                        </label>
                        <input type="text" class="form-control bg-white" value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-id-badge mr-2"></i>Username
                        </label>
                        <input type="text" class="form-control bg-white" value="{{ auth()->user()->username }}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-email mr-2"></i>Email Address
                        </label>
                        <input type="email" class="form-control bg-white" value="{{ auth()->user()->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-shield mr-2"></i>Role
                        </label>
                        <input type="text" class="form-control bg-white" value="{{ ucfirst(auth()->user()->role ?? 'User') }}" readonly>
                    </div>

                    <div class="form-group mb-0">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-calendar mr-2"></i>Member Since
                        </label>
                        <input type="text" class="form-control bg-white" value="{{ auth()->user()->created_at->format('F d, Y') }}" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="ti-close mr-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="editProfileForm">
                @csrf
                @method('PUT')
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title">
                        <i class="ti-pencil mr-2"></i>Edit Profile
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <!-- Profile Image Section -->
                    <div class="text-center mb-4">
                        <div class="position-relative d-inline-block">
                            @if(auth()->user()->image && Storage::disk('public')->exists(auth()->user()->image))
                            <img src="{{ Storage::url(auth()->user()->image) }}"  
                                     id="imagePreview"
                                     class="rounded-circle border shadow"
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     alt="Profile Photo">

                                     <button type="button" 
                                     class="badge badge-danger position-absolute" 
                                     style="bottom: 15px; left: 10px; cursor: pointer; border: none;"
                                     onclick="deleteProfileImage()">
                                 <i class="ti-trash"></i>
                             </button>
                            @else
                                <div id="imagePreview" class="profile-placeholder rounded-circle border shadow d-flex align-items-center justify-content-center"
                                     style="width: 150px; height: 150px;">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                            @endif
                            
                            <label for="image" class="badge badge-primary position-absolute" style="bottom: 15px; right: 10px; cursor: pointer;">
                                <i class="ti-camera"></i>
                            </label>
                            <input type="file" 
                                   id="image" 
                                   name="image" 
                                   class="d-none" 
                                   accept=".jpeg,.jpg,.png,.gif">
                                   <input type="hidden" name="delete_image" id="delete_image" value="0">
                        </div>
                        <small class="text-muted d-block mt-2">Click camera icon to upload profile photo</small>
                    </div>
                    

                    <!-- Profile Details Section -->
                    <div class="bg-light p-4 rounded">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-user mr-2"></i>Full Name
                            </label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control" 
                                   value="{{ auth()->user()->name }}" 
                                   required 
                                   minlength="3" 
                                   maxlength="255">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-id-badge mr-2"></i>Username
                            </label>
                            <input type="text" 
                                   name="username" 
                                   class="form-control" 
                                   value="{{ auth()->user()->username }}" 
                                   required 
                                   minlength="3" 
                                   maxlength="255">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-email mr-2"></i>Email Address
                            </label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="{{ auth()->user()->email }}" 
                                   required>
                        </div>

                        
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                        <i class="ti-close mr-2"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save mr-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Password Modal -->

<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('password.update') }}" method="POST" id="changePasswordForm">
                @csrf
                @method('PUT')
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title">
                        <i class="ti-lock mr-2"></i>Change Password
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="bg-light p-4 rounded">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-key mr-2"></i>Current Password
                            </label>
                            <input type="password" 
                                   name="current_password" 
                                   class="form-control" 
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-lock mr-2"></i>New Password
                            </label>
                            <input type="password" 
                                   name="new_password" 
                                   class="form-control" 
                                   required 
                                   minlength="8">
                            <small class="text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-check mr-2"></i>Confirm New Password
                            </label>
                            <input type="password" 
                                   name="new_password_confirmation" 
                                   class="form-control" 
                                   required 
                                   minlength="8">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                        <i class="ti-close mr-2"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save mr-2"></i>Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script>$(document).ready(function() {
    $("#createTaskForm").validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
            description: {
                required: true,
                minlength: 5,
                maxlength: 500
            },
            priority: {
                required: true,
                valueNotEquals: ""
            },
            status: {
                required: true,
                valueNotEquals: ""
            },
            due_date: {
                required: true,
                date: true
            }
        },
        messages: {
            title: {
                required: "Please enter a task title",
                minlength: "Title must be at least 5 character long",
                maxlength: "Title cannot exceed 255 characters"
            },
            description: {
                required: "Please enter a task description",
                minlength: "Description must be at least 5 character long",
                maxlength: "Description cannot exceed 500 characters"
            },
            priority: {
                required: "Please select a priority level",
                valueNotEquals: "Please select a priority level"
            },
            status: {
                required: "Please select a status",
                valueNotEquals: "Please select a status"
            },
            due_date: {
                required: "Please select a due date",
                date: "Please enter a valid date"
            }
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        // Add this to properly validate select elements
        ignore: []
    });

    // Custom method for select validation
    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    });

    // Reset form when modal closes
    $('#createTaskModal').on('hidden.bs.modal', function () {
        $('#createTaskForm').trigger('reset');
        $('#createTaskForm').validate().resetForm();
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
    });
});

</script>

<script>
    $(document).ready(function() {
    $("form[id^='editTaskForm']").each(function() {
        $(this).validate({
            rules: {
                title: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                description: {
                    required: true,
                    minlength: 5,
                    maxlength: 500
                },
                priority: {
                    required: true,
                    valueNotEquals: ""
                },
                status: {
                    required: true,
                    valueNotEquals: ""
                },
                due_date: {
                    required: true,
                    date: true
                }
            },
            messages: {
                title: {
                    required: "Please enter a task title",
                    minlength: "Title must be at least 5 character long",
                    maxlength: "Title cannot exceed 255 characters"
                },
                description: {
                    required: "Please enter a task description",
                    minlength: "Description must be at least 5 character long",
                    maxlength: "Description cannot exceed 500 characters"
                },
                priority: {
                    required: "Please select a priority level",
                    valueNotEquals: "Please select a priority level"
                },
                status: {
                    required: "Please select a status",
                    valueNotEquals: "Please select a status"
                },
                due_date: {
                    required: "Please select a due date",
                    date: "Please enter a valid date"
                }
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            ignore: []
        });
    });

   
  // Enhanced reset when modal closes
  $('[id^="editTaskModal"]').on('hidden.bs.modal', function () {
        let formId = $(this).find('form').attr('id');
        let form = $('#' + formId);
        
        // Reset the validation state
        form.validate().resetForm();
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
        
        // Reset form to original values
        form[0].reset();
        
        // Restore original values from data attributes
        form.find('input, textarea, select').each(function() {
            let originalValue = $(this).data('original-value');
            if (originalValue !== undefined) {
                $(this).val(originalValue);
            }
        });
    });

    // Store original values when page loads
    $("form[id^='editTaskForm']").each(function() {
        $(this).find('input, textarea, select').each(function() {
            $(this).data('original-value', $(this).val());
        });
    });
});

</script>
<script>
    $(document).ready(function() {
    // Initialize Bootstrap dropdowns
    $('.dropdown-toggle').dropdown();
    
    // Optional: Add click handler for profile image
    $('.nav-profile').click(function(e) {
        e.preventDefault();
        $(this).find('.dropdown-menu').toggleClass('show');
    });
});

</script>
<script>
    $(document).ready(function() {
    // Initialize dropdown with specific configuration
    $('.nav-profile .dropdown-toggle').dropdown({
        autoClose: false
    });

    // Handle modal triggers with smooth transition
    $('.nav-profile .dropdown-item[data-toggle="modal"]').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const $dropdownMenu = $(this).closest('.dropdown-menu');
        const modalTarget = $(this).data('target');
        
        $(modalTarget).one('show.bs.modal', function() {
            $dropdownMenu.css('opacity', '1');
        }).modal('show');
        
        setTimeout(function() {
            $dropdownMenu.removeClass('show');
        }, 100);
    });

    // Handle outside clicks
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.nav-profile').length) {
            $('.nav-profile .dropdown-menu').removeClass('show');
        }
    });
});

</script>

<script>
    // Image preview functionality
    document.getElementById('image').onchange = function() {
        const file = this.files[0];
        if (file) {
            document.getElementById('imagePreview').src = URL.createObjectURL(file);
        }
    };
    
    // Reset form when modal is closed
    $('#editProfileModal').on('hidden.bs.modal', function () {
        $('#editProfileForm')[0].reset();
        $('#imagePreview').attr('src', "{{ asset('storage/' . auth()->user()->image) }}");
    });
    </script>
    
    <script>
        // Reset form when modal is closed
        $('#changePasswordModal').on('hidden.bs.modal', function () {
            $('#changePasswordForm')[0].reset();
        });
        </script>

        <script>
            $(document).ready(function() {
    $("#editProfileForm").validate({
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
                email: true
            },
            image: {
                extension: "jpg|jpeg|png|gif",
                filesize: 2097152 // 2MB
            }
        },
        messages: {
            name: {
                required: "Please enter your full name",
                minlength: "Name must be at least 3 characters long",
                maxlength: "Name cannot exceed 255 characters"
            },
            username: {
                required: "Please enter your username",
                minlength: "Username must be at least 3 characters long",
                maxlength: "Username cannot exceed 255 characters"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            image: {
                extension: "Please upload a valid image file (jpg, jpeg, png, gif)",
                filesize: "Image size must not exceed 2MB"
            }
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });

    // Custom method for file extension validation
    $.validator.addMethod("extension", function(value, element, param) {
        param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
        return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
    });

    // Custom method for file size validation
    $.validator.addMethod("filesize", function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param);
    });

    $("#image").change(function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Remove placeholder if it exists
            if ($("#imagePreview").hasClass('profile-placeholder')) {
                $("#imagePreview").replaceWith(
                    `<img src="${e.target.result}"
                         id="imagePreview"
                         class="rounded-circle border shadow"
                         style="width: 150px; height: 150px; object-fit: cover;"
                         alt="Profile Photo">`
                );
            } else {
                // Update existing image
                $("#imagePreview").attr("src", e.target.result);
            }
        };
        reader.readAsDataURL(this.files[0]);
    }
});

    // Store original image source
    var originalImageSrc = $("#imagePreview").attr("src");

    // Reset form when modal closes
    $('#editProfileModal').on('hidden.bs.modal', function () {
        $('#editProfileForm').trigger('reset');
        $('#editProfileForm').validate().resetForm();
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
        $("#imagePreview").attr("src", originalImageSrc);
    });
});
        </script>

      <script>
$(document).ready(function() {
    // Setup CSRF token for all AJAX requests
    $.validator.addMethod("validateCurrentPassword", function(value, element) {
            let isValid = false;
    
            $.ajax({
                url: '/validate-current-password',
                type: 'POST',
                async: false, // Synchronous request (can be improved)
                data: {
                    current_password: value,
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    isValid = response.valid; // Expecting { valid: true/false }
                }
            });
    
            return isValid;
        }, "Current password is incorrect");
   

    $.validator.addMethod("notSameAsCurrentPassword", function(value, element) {
    let currentPassword = $('input[name="current_password"]').val();
    return value !== currentPassword;
}, "New password must be different from current password");

    // Initialize the form validation
    $("#changePasswordForm").validate({
        rules: {
            current_password: {
                required: true,
                minlength: 8,
                validateCurrentPassword: true
            },
            new_password: {
                required: true,
                minlength: 8,
                notSameAsCurrentPassword: true  
            },
            new_password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "input[name='new_password']"
            }
        },
        messages: {
            current_password: {
                required: "Current password is required",
                minlength: "Password must be at least 8 characters",
                validateCurrentPassword: "Current password is incorrect"
            },
            new_password: {
                required: "Please enter a new password",
                minlength: "Password must be at least 8 characters",
                notSameAsCurrentPassword: "New password cannot be the same as current password"
            },
            new_password_confirmation: {
                required: "Please confirm your new password",
                minlength: "Password must be at least 8 characters",
                equalTo: "Passwords do not match"
            }
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback").insertAfter(element);
            $(element).addClass("is-invalid");
        },
        success: function(label, element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });

    // Reset form when modal closes
    $('#changePasswordModal').on('hidden.bs.modal', function() {
        resetForm();
    });

    function resetForm() {
        $('#changePasswordForm')[0].reset();
        $('#changePasswordForm').validate().resetForm();
        $('.form-control').removeClass('is-invalid is-valid');
        $('.invalid-feedback').empty();
    }
});
</script>

<script>
function showFullDescription(button) {
    const cell = button.closest('.description-cell');
    cell.classList.toggle('expanded');
}

</script>
<script>
    function showFullTitle(button) {
    const cell = button.closest('.title-cell');
    cell.classList.toggle('expanded');
}

</script>
<script>
    function deleteProfileImage() {
    if (confirm('Are you sure you want to delete your profile picture?')) {
        document.getElementById('delete_image').value = '1';
        document.getElementById('imagePreview').src = '';
        document.getElementById('imagePreview').innerHTML = '<i class="fas fa-user-circle"></i>';
        document.getElementById('imagePreview').className = 'profile-placeholder rounded-circle border shadow d-flex align-items-center justify-content-center';
    }
}

</script>
</body>

</html>

