<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash </title>
  <!-- plugins:css -->
 <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


  <style>
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    
    .bg-gradient-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }
    
    .bg-gradient-light {
        background: linear-gradient(to right, #f8f9fc, #f8f9fa);
    }
    
    .shadow-hover {
        transition: all 0.3s ease;
    }
    
    .shadow-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
    
    .btn-soft-primary {
        background-color: rgba(78,115,223,0.1);
        color: #4e73df;
    }
    
    .btn-soft-danger {
        background-color: rgba(231,74,59,0.1);
        color: #e74a3b;
    }
    
    .hover-scale {
        transition: transform 0.2s ease;
    }
    
    .hover-scale:hover {
        transform: scale(1.05);
    }
    
    .backdrop-blur {
        backdrop-filter: blur(10px);
    }
    


     .empty-state {
        background: linear-gradient(to bottom, rgba(240, 249, 255, 0.8), transparent);
        border-radius: 1rem;
        margin: 1rem;
    }
    
    .empty-state-icon {
        position: relative;
        display: inline-block;
    }
    
    .empty-state-animation {
        position: absolute;
        top: -10px;
        right: -10px;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.2); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    .empty-state:hover .empty-state-icon {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
    /* Notes Container */
.task-notes {
    background-color: #f8f9fa;
    border-radius: 1rem;
    padding: 1.5rem;
}

/* Notes Header */
.notes-header {
    position: relative;
}

.notes-icon {
    background: rgba(255, 193, 7, 0.1);
    padding: 0.5rem;
    border-radius: 50%;
}

/* Note Counter Badge */
.badge {
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
}

/* Add Note Button */
.btn-outline-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11);
    transition: all 0.3s ease;
}

/* Note Items */
.note-item {
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Note Header */
.note-header {
    background-color: rgba(0, 0, 0, 0.01);
}

/* Note Action Buttons */
.note-actions button {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.note-actions button:hover {
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Empty State */
.empty-notes {
    background: linear-gradient(to bottom, #ffffff, #f8f9fa);
    border-radius: 0.75rem;
    border: 1px dashed #dee2e6;
}

.empty-icon {
    opacity: 0.5;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.note-item {
    animation: fadeIn 0.3s ease-out;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .task-notes {
        padding: 1rem;
    }
    
    .note-item {
        margin-bottom: 1rem;
    }
}

   .modal {
    display: none; /* Ensure modal is hidden by default */
}

.modal.fade.show {
    display: block; /* Ensure modal is visible when shown */
}
.card-header-actions {
    background-color: rgba(0,0,0,0.02);
}

.search-box .input-group {
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.search-box .form-control:focus {
    box-shadow: none;
    border-color: #80bdff;
}

.form-select {
    cursor: pointer;
    transition: all 0.3s ease;
}

.form-select:hover {
    border-color: #80bdff;
}

/* Animation for task cards */
.task-card {
    transition: all 0.3s ease;
}

/* Empty state animation */
.empty-state {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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
            <a class="navbar-brand brand-logo"> <img src="{{ asset('images/logo.svg') }}" alt="logo"/></a>
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

    
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
         
           


            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Task Management</h4>
                <div class="btn btn-primary">
                    <i class="ti-list"></i> Tasks (<span id="taskCount">{{ $tasks->count() }}</span>)
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewUsersModal">
                    <i class="ti-user"></i> View All Users (<span id="userCount"></span>)
                </button>
                
            </div>


            <div class="row">
                
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="text-center py-5">
                                <div class="welcome-animation mb-4">
                                    <i class="fas fa-cogs fa-4x text-gradient-primary"></i>
                                </div>
                                
                                <h3 class="text-gradient-primary mb-3">Welcome to Admin Dashboard!</h3>
                                
                                <p class="text-muted mb-4">Manage your application efficiently with these administrative tools and features.</p>
                                
                                <div class="getting-started-steps text-start mx-auto" style="max-width: 400px;">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="step-number">1</div>
                                        <div class="ms-3">Monitor user activities and task statistics</div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="step-number">2</div>
                                        <div class="ms-3">Manage user accounts and permissions</div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="step-number">3</div>
                                        <div class="ms-3">Review and moderate task on the basis of status</div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="step-number">4</div>
                                        <div class="ms-3">Generate reports and analyze performance</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>          
           
 <!-- High Priority Tasks -->
 
 <div class="col-md-4">
    
     <div class="card shadow-sm h-100">
         <div class="card-header bg-danger text-white">
    <h5 class="mb-0">
<i class="fas fa-bolt text-warning fa-pulse"></i> High Priority
</h5>
         </div>
       
         <div class="filter-section p-3 border-bottom bg-light">
             <div class="search-wrapper mb-3">
                 <div class="input-group">
                     <span class="input-group-text border-end-0 bg-white">
                         <i class="fas fa-search text-primary"></i>
                     </span>
                     <input type="text" 
                            class="form-control border-start-0 ps-0 task-search" 
                              placeholder="Search tasks by title or description..."
                            data-priority="high"
                     >
                 </div>
             </div>
         
             <div class="d-flex gap-2 flex-wrap">
                 <div class="filter-group">
                     <select class="form-select form-select-sm status-filter" data-priority="high">
                         <option value="">All Status</option>
                         <option value="pending">Pending</option>
                         <option value="in_progress">In Progress</option>
                         <option value="completed">Completed</option>
                     </select>
                 </div>
                 <div class="filter-group">
                     <select class="form-select form-select-sm date-filter" data-priority="high">
                         <option value="">All Dates</option>
                         <option value="today">Due Today</option>
                         <option value="tomorrow">Due Tomorrow</option>
                         <option value="week">This Week</option>
                         <option value="overdue">Overdue</option>
                     </select>
                 </div>
             </div>
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
                 <div class="user-badge d-flex align-items-center gap-1 mb-3">
                    <i class="fas fa-user-edit text-primary"></i>
                    <span class="text-muted small">Created by: {{ $task->user->username }}</span>
                </div>

                <div class="user-status d-flex align-items-center gap-1 mb-3">
                    <i class="fas fa-user-shield text-info"></i>
                    <span class="text-muted small">Status:</span>
                    <span class="badge {{ $task->user->enable == 0 ? 'bg-success' : 'bg-danger' }} rounded-pill d-flex align-items-center gap-1">
                        <i class="fas fa-{{ $task->user->enable == 0 ? 'check-circle' : 'ban' }} fa-sm"></i>
                        {{ $task->user->enable == 0 ? 'Enabled' : 'Disabled' }}
                    </span>
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

                 <div class="task-notes mb-4">
                     <!-- Notes Header -->
                     <div class="notes-header d-flex justify-content-between align-items-center mb-3">
                         <div class="d-flex align-items-center gap-2">
                             <div class="notes-icon">
                                 <i class="fas fa-sticky-note text-warning fa-lg"></i>
                             </div>
                             <h6 class="mb-0 fw-bold">Task Notes</h6>
                             <span class="badge bg-light text-dark rounded-pill">
                                 {{ $task->notes->count() }}
                             </span>
                         </div>
                         
                    {{--       <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
                                 onclick="showAddNoteForm({{ $task->id }})">
                             <i class="fas fa-plus-circle"></i>
                             <span>Add Note</span>
                         </button>--}}
                     </div>
                 

                    
             
                     <!-- Notes List Container -->
                     <div class="notes-list" id="notes-list-{{ $task->id }}">
                         @forelse($task->notes as $note)
                             <div class="note-item mb-3 bg-white rounded-3 shadow-sm hover-lift">
                                 <!-- Note Header -->
                                 <div class="note-header d-flex justify-content-between align-items-center p-3 border-bottom">
                                     <div class="note-meta d-flex align-items-center gap-2">
                                         <i class="fas fa-clock text-muted"></i>
                                         <small class="text-muted">{{ $note->created_at->diffForHumans() }}</small>
                                     </div>
                                     


                                     
                                     <!-- Note Actions -->
                                     <div class="note-actions d-flex gap-2">
                                         <button class="btn btn-light btn-sm rounded-circle" 
                                                 onclick="editNote({{ $note->id }})"
                                                 title="Edit Note">
                                             <i class="fas fa-edit text-primary"></i>
                                         </button>
                                         <button class="btn btn-light btn-sm rounded-circle" 
                                                 onclick="deleteNote({{ $note->id }})"
                                                 title="Delete Note">
                                             <i class="fas fa-trash text-danger"></i>
                                         </button>
                                     </div>
                                 </div>
                                 
                                 <!-- Note Content -->
                                 <div class="note-content p-3">
                                     <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $note->content }}</p>
                                 </div>
                             </div>
                         @empty
                             <div class="empty-notes text-center py-4">
                                 <div class="empty-icon mb-3">
                                     <i class="fas fa-clipboard-list text-muted fa-2x"></i>
                                 </div>
                                 <p class="text-muted mb-0">No notes added yet By Users</p>
                                 
                                 <small class="text-muted">If it is added you see the note</small>
                             </div>
                         @endforelse
                     </div>
                 </div>
                 

                   <!-- Task Reports Section --><!-- Task Reports Section -->
<div class="task-reports mb-4">
    <!-- Header with Glassmorphism Effect -->
    <div class="notes-header d-flex justify-content-between align-items-center mb-4 p-4 bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-sm">
        <div class="d-flex align-items-center gap-4">
            <div class="notes-icon p-3 bg-warning bg-opacity-10 rounded-circle">
                <i class="fas fa-chart-line text-warning fa-lg"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold d-flex align-items-center gap-3">
                    Task Reports
                </h5>
                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-primary"></i>
                    Monitor and analyze task progress
                </p>
            </div>
        </div>
    </div>

    <!-- Reports List -->
    <div class="reports-list" id="reports-list-{{ $task->id }}">
        @forelse($task->reports as $report)
            <div class="note-item mb-3 bg-white rounded-3 shadow-sm hover-lift">
                <!-- Report Header -->
                <div class="report-header d-flex justify-content-between align-items-center p-3 border-bottom bg-gradient-light">
                    <div class="report-meta d-flex align-items-center gap-3">
                        <div class="date-badge p-2 bg-primary bg-opacity-10 rounded-circle">
                           
                            <i class="fas fa-clock text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">Report</h6>
                            <small class="text-muted">{{ $report->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="report-actions d-flex gap-2">
                        <button class="btn btn-soft-primary btn-sm rounded-pill edit-report-btn" 
                                data-report-id="{{ $report->id }}"
                                title="Edit Report">
                            <i class="fas fa-edit me-1"></i>
                            Edit
                        </button>
                        
                        <form action="{{ route('reports.destroy', $report) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-soft-danger btn-sm rounded-pill"
                                    title="Delete Report"
                                    onclick="return confirm('Are you sure you want to delete this report?')">
                                <i class="fas fa-trash-alt me-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Report Content -->
                <div class="note-content p-3">
                    <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $report->reason }}</p>
                </div>
            </div>
        @empty
            <!-- Enhanced Empty State -->
            <div class="empty-reports text-center py-5 bg-light rounded-4">
                <div class="empty-illustration mb-4">
                    <div class="d-inline-block p-4 bg-warning bg-opacity-10 rounded-circle">
                        <i class="fas fa-clipboard-list text-warning fa-3x"></i>
                    </div>
                </div>
                <h5 class="fw-bold text-dark mb-3">Start Your First Report</h5>
                <p class="text-muted mb-4 px-4">Track task progress of Users by creating detailed reports<br>Click the Create Report button to begin</p>
                <button class="btn btn-gradient-primary rounded-pill px-4 py-2"
                        onclick="showAddReportForm({{ $task->id }})">
                    <i class="fas fa-plus-circle me-2"></i>
                    Create Your Report
                </button>
            </div>
        @endforelse
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
             <div class="empty-state text-center py-5">
                <div class="empty-state-icon mb-4">
                    <i class="fas fa-tasks text-info fa-3x mb-3 opacity-50"></i>
                    <div class="empty-state-animation">
                        <i class="fas fa-plus-circle text-primary fa-2x position-absolute" style="animation: pulse 2s infinite"></i>
                    </div>
                </div>
                
                <h5 class="empty-state-title mb-3 text-secondary">No High Priority Tasks Yet Is Created By User</h5>
                
                <div class="empty-state-description mb-4">
                    <p class="text-muted mb-1">This is where a High priority tasks will appear.</p>
                    <p class="text-muted small">If it is created!</p>
                </div>
                
               
            </div>
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
<div class="filter-section p-3 border-bottom bg-light">
<div class="search-wrapper mb-3">
<div class="input-group">
<span class="input-group-text border-end-0 bg-white">
<i class="fas fa-search text-primary"></i>
</span>
<input type="text" 
class="form-control border-start-0 ps-0 task-search" 
  placeholder="Search tasks by title or description..."
data-priority="medium"
>
</div>
</div>

<div class="d-flex gap-2 flex-wrap">
<div class="filter-group">
<select class="form-select form-select-sm status-filter" data-priority="medium">
<option value="">All Status</option>
<option value="pending">Pending</option>
<option value="in_progress">In Progress</option>
<option value="completed">Completed</option>
</select>
</div>
<div class="filter-group">
<select class="form-select form-select-sm date-filter" data-priority="medium">
<option value="">All Dates</option>
<option value="today">Due Today</option>
<option value="tomorrow">Due Tomorrow</option>
<option value="week">This Week</option>
<option value="overdue">Overdue</option>
</select>
</div>
</div>
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
                 <div class="user-badge d-flex align-items-center gap-1 mb-3">
                    <i class="fas fa-user-edit text-primary"></i>
                    <span class="text-muted small">Created by: {{ $task->user->username }}</span>
                </div>
                <div class="user-status d-flex align-items-center gap-1 mb-3">
                    <i class="fas fa-user-shield text-info"></i>
                    <span class="text-muted small">Status:</span>
                    <span class="badge {{ $task->user->enable == 0 ? 'bg-success' : 'bg-danger' }} rounded-pill d-flex align-items-center gap-1">
                        <i class="fas fa-{{ $task->user->enable == 0 ? 'check-circle' : 'ban' }} fa-sm"></i>
                        {{ $task->user->enable == 0 ? 'Enabled' : 'Disabled' }}
                    </span>
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
                
                 <div class="task-notes mb-4">
                     <!-- Notes Header -->
                     <div class="notes-header d-flex justify-content-between align-items-center mb-3">
                         <div class="d-flex align-items-center gap-2">
                             <div class="notes-icon">
                                 <i class="fas fa-sticky-note text-warning fa-lg"></i>
                             </div>
                             <h6 class="mb-0 fw-bold">Task Notes</h6>
                             <span class="badge bg-light text-dark rounded-pill">
                                 {{ $task->notes->count() }}
                             </span>
                         </div>
                         
                   {{--       <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
                                 onclick="showAddNoteForm({{ $task->id }})">
                             <i class="fas fa-plus-circle"></i>
                             <span>Add Note</span>
                         </button> --}} 
                     </div>
                 

                    
             
                     <!-- Notes List Container -->
                     <div class="notes-list" id="notes-list-{{ $task->id }}">
                         @forelse($task->notes as $note)
                             <div class="note-item mb-3 bg-white rounded-3 shadow-sm hover-lift">
                                 <!-- Note Header -->
                                 <div class="note-header d-flex justify-content-between align-items-center p-3 border-bottom">
                                     <div class="note-meta d-flex align-items-center gap-2">
                                         <i class="fas fa-clock text-muted"></i>
                                         <small class="text-muted">{{ $note->created_at->diffForHumans() }}</small>
                                     </div>
                                     


                                     
                                     <!-- Note Actions -->
                                     <div class="note-actions d-flex gap-2">
                                         <button class="btn btn-light btn-sm rounded-circle" 
                                                 onclick="editNote({{ $note->id }})"
                                                 title="Edit Note">
                                             <i class="fas fa-edit text-primary"></i>
                                         </button>
                                         <button class="btn btn-light btn-sm rounded-circle" 
                                                 onclick="deleteNote({{ $note->id }})"
                                                 title="Delete Note">
                                             <i class="fas fa-trash text-danger"></i>
                                         </button>
                                     </div>
                                 </div>
                                 
                                 <!-- Note Content -->
                                 <div class="note-content p-3">
                                     <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $note->content }}</p>
                                 </div>
                             </div>
                         @empty
                         <div class="empty-notes text-center py-4">
                            <div class="empty-icon mb-3">
                                <i class="fas fa-clipboard-list text-muted fa-2x"></i>
                            </div>
                            <p class="text-muted mb-0">No notes added yet By Users</p>
                            
                            <small class="text-muted">If it is added you see the note</small>
                        </div>
                         @endforelse
                     </div>
                 </div>
                 
                 <!-- Task Reports Section -->
<div class="task-reports mb-4">
    <!-- Header with Glassmorphism Effect -->
    <div class="notes-header d-flex justify-content-between align-items-center mb-4 p-4 bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-sm">
        <div class="d-flex align-items-center gap-4">
            <div class="notes-icon p-3 bg-warning bg-opacity-10 rounded-circle">
                <i class="fas fa-chart-line text-warning fa-lg"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold d-flex align-items-center gap-3">
                    Task Reports
                </h5>
                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-primary"></i>
                    Monitor and analyze task progress
                </p>
            </div>
        </div>
    </div>

    <!-- Reports List -->
    <div class="reports-list" id="reports-list-{{ $task->id }}">
        @forelse($task->reports as $report)
            <div class="note-item mb-3 bg-white rounded-3 shadow-sm hover-lift">
                <!-- Report Header -->
                <div class="report-header d-flex justify-content-between align-items-center p-3 border-bottom bg-gradient-light">
                    <div class="report-meta d-flex align-items-center gap-3">
                        <div class="date-badge p-2 bg-primary bg-opacity-10 rounded-circle">
                           
                            <i class="fas fa-clock text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">Report</h6>
                            <small class="text-muted">{{ $report->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="report-actions d-flex gap-2">
                        <button class="btn btn-soft-primary btn-sm rounded-pill edit-report-btn" 
                                data-report-id="{{ $report->id }}"
                                title="Edit Report">
                            <i class="fas fa-edit me-1"></i>
                            Edit
                        </button>
                        
                        <form action="{{ route('reports.destroy', $report) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-soft-danger btn-sm rounded-pill"
                                    title="Delete Report"
                                    onclick="return confirm('Are you sure you want to delete this report?')">
                                <i class="fas fa-trash-alt me-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Report Content -->
                <div class="note-content p-3">
                    <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $report->reason }}</p>
                </div>
            </div>
        @empty
            <!-- Enhanced Empty State -->
            <div class="empty-reports text-center py-5 bg-light rounded-4">
                <div class="empty-illustration mb-4">
                    <div class="d-inline-block p-4 bg-warning bg-opacity-10 rounded-circle">
                        <i class="fas fa-clipboard-list text-warning fa-3x"></i>
                    </div>
                </div>
                <h5 class="fw-bold text-dark mb-3">Start Your First Report</h5>
                <p class="text-muted mb-4 px-4">Track task progress of Users by creating detailed reports<br>Click the Create Report button to begin</p>
                <button class="btn btn-gradient-primary rounded-pill px-4 py-2"
                        onclick="showAddReportForm({{ $task->id }})">
                    <i class="fas fa-plus-circle me-2"></i>
                    Create Your Report
                </button>
            </div>
        @endforelse
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
             <div class="empty-state text-center py-5">
                <div class="empty-state-icon mb-4">
                    <i class="fas fa-tasks text-info fa-3x mb-3 opacity-50"></i>
                    <div class="empty-state-animation">
                        <i class="fas fa-plus-circle text-primary fa-2x position-absolute" style="animation: pulse 2s infinite"></i>
                    </div>
                </div>
                
                <h5 class="empty-state-title mb-3 text-secondary">No Medium Priority Tasks Yet Is Created By User</h5>
                
                <div class="empty-state-description mb-4">
                    <p class="text-muted mb-1">This is where a Medium priority tasks will appear.</p>
                    <p class="text-muted small">If it is created!</p>
                </div>
                
               
            </div>
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
        
         <div class="filter-section p-3 border-bottom bg-light">
             <div class="search-wrapper mb-3">
                 <div class="input-group">
                     <span class="input-group-text border-end-0 bg-white">
                         <i class="fas fa-search text-primary"></i>
                     </span>
                     <input type="text" 
                            class="form-control border-start-0 ps-0 task-search" 
                             placeholder="Search tasks by title or description..."
                            data-priority="low"
                     >
                 </div>
             </div>
         
             <div class="d-flex gap-2 flex-wrap">
                 <div class="filter-group">
                     <select class="form-select form-select-sm status-filter" data-priority="low">
                         <option value="">All Status</option>
                         <option value="pending">Pending</option>
                         <option value="in_progress">In Progress</option>
                         <option value="completed">Completed</option>
                     </select>
                 </div>
                 <div class="filter-group">
                     <select class="form-select form-select-sm date-filter" data-priority="low">
                         <option value="">All Dates</option>
                         <option value="today">Due Today</option>
                         <option value="tomorrow">Due Tomorrow</option>
                         <option value="week">This Week</option>
                         <option value="overdue">Overdue</option>
                     </select>
                 </div>
             </div>
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
                <div class="user-badge d-flex align-items-center gap-1 mb-3">
                   <i class="fas fa-user-edit text-primary"></i>
                   <span class="text-muted small">Created by: {{ $task->user->username }}</span>
               </div>
               <div class="user-status d-flex align-items-center gap-1 mb-3">
                   <i class="fas fa-user-shield text-info"></i>
                   <span class="text-muted small">Status:</span>
                   <span class="badge {{ $task->user->enable == 0 ? 'bg-success' : 'bg-danger' }} rounded-pill d-flex align-items-center gap-1">
                       <i class="fas fa-{{ $task->user->enable == 0 ? 'check-circle' : 'ban' }} fa-sm"></i>
                       {{ $task->user->enable == 0 ? 'Enabled' : 'Disabled' }}
                   </span>
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
               
                 <div class="task-notes mb-4">
                     <!-- Notes Header -->
                     <div class="notes-header d-flex justify-content-between align-items-center mb-3">
                         <div class="d-flex align-items-center gap-2">
                             <div class="notes-icon">
                                 <i class="fas fa-sticky-note text-warning fa-lg"></i>
                             </div>
                             <h6 class="mb-0 fw-bold">Task Notes</h6>
                             <span class="badge bg-light text-dark rounded-pill">
                                 {{ $task->notes->count() }}
                             </span>
                         </div>
                         
                 {{--          <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
                                 onclick="showAddNoteForm({{ $task->id }})">
                             <i class="fas fa-plus-circle"></i>
                             <span>Add Note</span>
                         </button> --}}
                     </div>
                 

                    
             
                     <!-- Notes List Container -->
                     <div class="notes-list" id="notes-list-{{ $task->id }}">
                         @forelse($task->notes as $note)
                             <div class="note-item mb-3 bg-white rounded-3 shadow-sm hover-lift">
                                 <!-- Note Header -->
                                 <div class="note-header d-flex justify-content-between align-items-center p-3 border-bottom">
                                     <div class="note-meta d-flex align-items-center gap-2">
                                         <i class="fas fa-clock text-muted"></i>
                                         <small class="text-muted">{{ $note->created_at->diffForHumans() }}</small>
                                     </div>
                                     


                                     
                                     <!-- Note Actions -->
                                     <div class="note-actions d-flex gap-2">
                                         <button class="btn btn-light btn-sm rounded-circle" 
                                                 onclick="editNote({{ $note->id }})"
                                                 title="Edit Note">
                                             <i class="fas fa-edit text-primary"></i>
                                         </button>
                                         <button class="btn btn-light btn-sm rounded-circle" 
                                                 onclick="deleteNote({{ $note->id }})"
                                                 title="Delete Note">
                                             <i class="fas fa-trash text-danger"></i>
                                         </button>
                                     </div>
                                 </div>
                          
                                 <!-- Note Content -->
                                 <div class="note-content p-3">
                                     <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $note->content }}</p>
                                 </div>
                             </div>
                         @empty
                         <div class="empty-notes text-center py-4">
                            <div class="empty-icon mb-3">
                                <i class="fas fa-clipboard-list text-muted fa-2x"></i>
                            </div>
                            <p class="text-muted mb-0">No notes added yet By Users</p>
                            
                            <small class="text-muted">If it is added you see the note</small>
                        </div>
                         @endforelse
                     </div>
                 </div>
                 
                 



                 <!-- Action Buttons -->
                 <!-- Task Reports Section --><!-- Task Reports Section -->
<div class="task-reports mb-4">
    <!-- Header with Glassmorphism Effect -->
    <div class="notes-header d-flex justify-content-between align-items-center mb-4 p-4 bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-sm">
        <div class="d-flex align-items-center gap-4">
            <div class="notes-icon p-3 bg-warning bg-opacity-10 rounded-circle">
                <i class="fas fa-chart-line text-warning fa-lg"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold d-flex align-items-center gap-3">
                    Task Reports
                </h5>
                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-primary"></i>
                    Monitor and analyze task progress
                </p>
            </div>
        </div>
    </div>

    <!-- Reports List -->
    <div class="reports-list" id="reports-list-{{ $task->id }}">
        @forelse($task->reports as $report)
            <div class="note-item mb-3 bg-white rounded-3 shadow-sm hover-lift">
                <!-- Report Header -->
                <div class="report-header d-flex justify-content-between align-items-center p-3 border-bottom bg-gradient-light">
                    <div class="report-meta d-flex align-items-center gap-3">
                        <div class="date-badge p-2 bg-primary bg-opacity-10 rounded-circle">
                            <i class="fas fa-clock text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">Report</h6>
                            <small class="text-muted">{{ $report->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="report-actions d-flex gap-2">
                        <button class="btn btn-soft-primary btn-sm rounded-pill edit-report-btn" 
                                data-report-id="{{ $report->id }}"
                                title="Edit Report">
                            <i class="fas fa-edit me-1"></i>
                            Edit
                        </button>
                        
                        <form action="{{ route('reports.destroy', $report) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-soft-danger btn-sm rounded-pill"
                                    title="Delete Report"
                                    onclick="return confirm('Are you sure you want to delete this report?')">
                                <i class="fas fa-trash-alt me-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Report Content -->
                <div class="note-content p-3">
                    <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $report->reason }}</p>
                </div>
            </div>
        @empty
            <!-- Enhanced Empty State -->
            <div class="empty-reports text-center py-5 bg-light rounded-4">
                <div class="empty-illustration mb-4">
                    <div class="d-inline-block p-4 bg-warning bg-opacity-10 rounded-circle">
                        <i class="fas fa-clipboard-list text-warning fa-3x"></i>
                    </div>
                </div>
                <h5 class="fw-bold text-dark mb-3">Start Your First Report</h5>
                <p class="text-muted mb-4 px-4">Track task progress of Users by creating detailed reports<br>Click the Create Report button to begin</p>
                <button class="btn btn-gradient-primary rounded-pill px-4 py-2"
                        onclick="showAddReportForm({{ $task->id }})">
                    <i class="fas fa-plus-circle me-2"></i>
                    Create Your Report
                </button>
            </div>
        @endforelse
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

             

             @empty
             <div class="empty-state text-center py-5">
                <div class="empty-state-icon mb-4">
                    <i class="fas fa-tasks text-info fa-3x mb-3 opacity-50"></i>
                    <div class="empty-state-animation">
                        <i class="fas fa-plus-circle text-primary fa-2x position-absolute" style="animation: pulse 2s infinite"></i>
                    </div>
                </div>
                
                <h5 class="empty-state-title mb-3 text-secondary">No Low Priority Tasks Yet Is Created By User</h5>
                
                <div class="empty-state-description mb-4">
                    <p class="text-muted mb-1">This is where a Low priority tasks will appear.</p>
                    <p class="text-muted small">If it is created!</p>
                </div>
                
               
            </div>
             @endforelse
         </div>
     
     </div>
   
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

<!-- Add Report Modal -->
<div class="modal fade" id="addReportModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Top Header Section -->
            <div class="modal-header-custom bg-gradient-warning text-white p-4 text-center">
                <h4 class="mb-2">
                    <i class="fas fa-flag me-2"></i>Add New Report
                </h4>
                <p class="mb-0">Enter report details for this task</p>
            </div>

            <!-- Content Section -->
            <form id="addReportForm" action="{{ route('reports.store', ['task' => ':task_id']) }}" method="POST">
                @csrf
                <input type="hidden" name="task_id" id="reportTaskId">
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold text-warning">
                                    <i class="fas fa-exclamation-circle me-2"></i>Report Reason
                                </label>
                                <textarea 
                                    class="form-control" 
                                    id="reportReason" 
                                    name="reason" 
                                    rows="5" 
                                    placeholder="Enter your report reason here..."
                                    required
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 py-3">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <button type="button" class="btn btn-warning btn-save-report">
                        <i class="fas fa-save me-2"></i>Submit Report
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- Edit Modal For Report -->
<div class="modal fade" id="editReportModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Top Header Section -->
            <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                <h4 class="mb-2">
                    <i class="fas fa-flag me-2"></i>Edit Report
                </h4>
                <p class="mb-0">Update your report content</p>
            </div>

            <!-- Content Section -->
            <form id="editReportForm">
                <input type="hidden" id="editReportId" name="report_id">
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Report Content -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="fas fa-comment me-2"></i>Report Reason
                                </label>
                                <textarea 
                                    class="form-control" 
                                    id="editReportReason" 
                                    name="reason" 
                                    rows="5" 
                                    placeholder="Update your report reason here..."
                                    required
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 py-3">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary btn-update-report">
                        <i class="fas fa-save me-2"></i>Update Report
                    </button>

                   

                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Edit Modal For Note -->
    <div class="modal fade" id="editNoteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Top Header Section -->
                <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                    <h4 class="mb-2">
                        <i class="ti-pencil me-2"></i>Edit Note
                    </h4>
                    <p class="mb-0">Update your note content</p>
                </div>
    
                <!-- Content Section -->
                <form id="editNoteForm">
                    <input type="hidden" id="editNoteId" name="note_id">
                    
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <!-- Note Content -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-paragraph me-2"></i>Note Content
                                    </label>
                                    <textarea 
                                        class="form-control" 
                                        id="editNoteContent" 
                                        name="content" 
                                        rows="5" 
                                        placeholder="Update your note here..."
                                        required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer border-0 py-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="ti-close me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary btn-update-note">
                            <i class="ti-save me-2"></i>Update Note
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <!-- Added Note Modal -->
    <div class="modal fade" id="addNoteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Top Header Section -->
                <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                    <h4 class="mb-2">
                        <i class="ti-plus me-2"></i>Add New Note
                    </h4>
                    <p class="mb-0">Enter your note details</p>
                </div>
    
                <!-- Content Section -->
                <form id="addNoteForm" action="{{ route('admin.task.notes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" id="noteTaskId">
                    
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="ti-paragraph me-2"></i>Note Content
                                    </label>
                                    <textarea 
                                        class="form-control" 
                                        id="noteContent" 
                                        name="content" 
                                        rows="5" 
                                        placeholder="Enter your note here..."
                                        required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer border-0 py-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="ti-close me-2"></i>Cancel
                        </button>
                       
                        <button type="button" class="btn btn-primary btn-save-note">
                            <i class="ti-save me-2"></i>Save Note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

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
    @endforeach

     <!-- Edit Modal -->
     @foreach($tasks as $task)
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
                <form id="editTaskForm{{ $task->id }}" action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
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
    @endforeach

     <!-- Delete Modal -->
     @foreach($tasks as $task)
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
                <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST">
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


<!-- Users Modal for all users -->

<div class="modal fade" id="viewUsersModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                <h4 class="mb-2">
                    <i class="ti-users me-2"></i>All Users
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <tr>
                                <td colspan="5" class="text-center">Loading users...</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 py-3">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    <i class="ti-close me-2"></i>Close
                </button>
                
            </div>
        </div>
    </div>
</div>
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
            <form action="{{ route('profile.updates') }}" method="POST" enctype="multipart/form-data" id="editProfileForm">
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
            <form action="{{ route('password.updates') }}" method="POST" id="changePasswordForm">
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
    




<!-- End custom js for this page-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>




<script>
    $(document).on('click', '[data-bs-dismiss="modal"], .modal .close', function() {
    $(this).closest('.modal').modal('hide');
});
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
                    required: true
                },
                status: {
                    required: true
                },
                due_date: {
                    required: true,
                    date: true
                }
            },
            messages: {
                title: {
                    required: "Please enter a task title",
                    minlength: "Title must be at least 5 characters long",
                    maxlength: "Title cannot exceed 255 characters"
                },
                description: {
                    required: "Please enter a task description",
                    minlength: "Description must be at least 5 characters long",
                    maxlength: "Description cannot exceed 500 characters"
                },
                priority: {
                    required: "Please select a priority level"
                },
                status: {
                    required: "Please select a status"
                },
                due_date: {
                    required: "Please select a due date",
                    date: "Please enter a valid date"
                }
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
    });

    // Reset validation when modal closes
    $(".modal").on('hidden.bs.modal', function () {
        let form = $(this).find("form");
        form.validate().resetForm();
        form[0].reset();
        form.find('.is-invalid, .is-valid').removeClass('is-invalid is-valid');
    });
});

</script>
<script>
    
$(document).ready(function() {
    // Initialize the modal
    const reportModal = new bootstrap.Modal(document.getElementById('editReportModal'));

    // Handle edit button click
    $(document).on('click', '.edit-report-btn', function() {
        const reportId = $(this).data('report-id');
        
        $.get(`/reports/${reportId}/fetch`, function(data) {
            $('#editReportId').val(data.id);
            $('#editReportReason').val(data.reason);
            reportModal.show();
        });
    });

    // Initialize validation for edit form
    $("#editReportForm").validate({
        rules: {
            reason: {
                required: true,
                minlength: 5,
                maxlength: 1000
            }
        },
        messages: {
            reason: {
                required: "Please enter report reason",
                minlength: "Report reason must be at least 5 characters long",
                maxlength: "Report reason cannot exceed 1000 characters"
            }
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });

    $('#editReportForm').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            const reportId = $('#editReportId').val();
            const reason = $('#editReportReason').val();
            
            const form = $('<form>', {
                'method': 'POST',
                'action': `/reports/${reportId}`
            }).hide();
            
            form.append($('<input>', {
                'name': '_token',
                'value': $('meta[name="csrf-token"]').attr('content'),
                'type': 'hidden'
            }));
            
            form.append($('<input>', {
                'name': '_method',
                'value': 'PUT',
                'type': 'hidden'
            }));
            
            form.append($('<input>', {
                'name': 'reason',
                'value': reason,
                'type': 'hidden'
            }));

            // Reset the original form
            $('#editReportForm').trigger('reset'); 
            $('#editReportForm').validate().resetForm(); 
            $('.is-invalid').removeClass('is-invalid');
            $('.is-valid').removeClass('is-valid');

            // Hide the modal and submit the form
            $('#editReportModal').modal('hide');
            $('body').append(form);
            form.submit();
        }
    });

    // Reset form when modal closes
    $('#editReportModal').on('hidden.bs.modal', function() {
        $('#editReportForm').trigger('reset'); 
        $('#editReportForm').validate().resetForm(); 
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
    });
});

</script>



<script>
    function showAddReportForm(taskId) {
    $('#reportTaskId').val(taskId);
    const form = $('#addReportForm');
    form.attr('action', form.attr('action').replace(':task_id', taskId));
    $('#addReportModal').modal('show');
}

$(document).ready(function() {
    // Initialize form validation
    $("#addReportForm").validate({
        rules: {
            reason: {
                required: true,
                minlength: 5,
                maxlength: 1000
            }
        },
        messages: {
            reason: {
                required: "Please enter report reason",
                minlength: "Report reason must be at least 5 characters long",
                maxlength: "Report reason cannot exceed 1000 characters"
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

    // Handle form submission
    $('#addReportForm').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            const form = $(this);
            $('.btn-save-report').prop('disabled', true);
            
            const hiddenForm = $('<form>', {
                'method': 'POST',
                'action': form.attr('action')
            }).hide();
            
            const formData = new FormData(this);
            for (let pair of formData.entries()) {
                hiddenForm.append($('<input>', {
                    'name': pair[0],
                    'value': pair[1],
                    'type': 'hidden'
                }));
            }
            
            $('#addReportModal').modal('hide');
            $('body').append(hiddenForm);
            hiddenForm.submit();
        }
    });

    // Reset form when modal closes
    $('#addReportModal').on('hidden.bs.modal', function() {
        $('#addReportForm').trigger('reset');
        $('#addReportForm').validate().resetForm();
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
    });

    // Handle save button click
    $(document).on('click', '.btn-save-report', function() {
        $('#addReportForm').submit();
    });
});

</script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("admin.get.users") }}',
            method: 'GET',
            success: function(response) {
                $('#userCount').text(response.userCount);
            }
        });
    });
    </script>

<script>$(document).ready(function() {
    function updateUserCount() {
        $.ajax({
            url: '{{ route("admin.get.users") }}',
            method: 'GET',
            success: function(response) {
                $('#userCount').text(response.userCount);
            }
        });
    }

    updateUserCount();

    $('#viewUsersModal').on('show.bs.modal', function() {
        $.ajax({
            url: '{{ route("admin.get.users") }}',
            method: 'GET',
            success: function(response) {
                let tbody = '';
                response.users.forEach(function(user) {
                    let isChecked = user.enable === 0 ? 'checked' : ''; // 0 means enabled
                    let statusText = user.enable === 0 ? 'Enabled' : 'Disabled';

                    tbody += `
                        <tr>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.role}</td>
                            <td>${new Date(user.created_at).toLocaleDateString()}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input user-status" 
                                           data-user-id="${user.id}" ${isChecked}>
                                    <label class="form-check-label status-label">
                                        ${statusText}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    `;
                });
                $('#userTableBody').html(tbody);

                $('.user-status').off('change').on('change', function() {
                    const checkbox = $(this);
                    const statusLabel = checkbox.siblings('.status-label');
                    const userId = checkbox.data('user-id');
                    const newStatus = checkbox.prop('checked') ? 0 : 1; // 0 = Enabled, 1 = Disabled

                    $.ajax({
                        url: '{{ url("admin/users") }}/' + userId + '/toggle-status',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            enable: newStatus
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message);
                                setTimeout(function() {
                                    location.reload(); // Refresh the page naturally
                                }, 1500);
                                statusLabel.text(response.new_status === 0 ? 'Enabled' : 'Disabled');
                                updateUserCount();
                            }
                        },
                        error: function() {
                            toastr.error('Failed to update user status');
                            checkbox.prop('checked', !checkbox.prop('checked'));
                        }
                    });
                });
            }
        });
    });
});

    </script>
 
<script>
    $(document).ready(function() {
    // Initialize modal with proper event handling
    $('#viewProfileModal .close, #viewProfileModal button[data-dismiss="modal"]').on('click', function() {
        $('#viewProfileModal').modal('hide');
    });
});

</script>

<script>
    $(document).ready(function() {
    // Initialize dropdown with proper event handling
    $('.nav-profile .dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const $dropdownMenu = $(this).siblings('.dropdown-menu');
        $('.dropdown-menu').not($dropdownMenu).removeClass('show');
        $dropdownMenu.toggleClass('show');
    });

    // Handle modal triggers
    $('.nav-profile .dropdown-item[data-toggle="modal"]').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const $dropdownMenu = $(this).closest('.dropdown-menu');
        const modalTarget = $(this).data('target');
        
        $(modalTarget).modal('show');
        $dropdownMenu.removeClass('show');
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
            
            $('#editProfileModal .close, #editProfileModal button[data-dismiss="modal"]').on('click', function() {
        $('#editProfileModal').modal('hide');
    });

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
    $('#changePasswordModal .close, #changePasswordModal button[data-dismiss="modal"]').on('click', function() {
        $('#changePasswordModal').modal('hide');
    });
    // Setup CSRF token for all AJAX requests
    $.validator.addMethod("validateCurrentPassword", function(value, element) {
            let isValid = false;
    
            $.ajax({
                url: '/admin-validate-current-password',
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

 

























  
<script>
    function deleteNote(noteId) {
    if (confirm('Are you sure you want to delete this note?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/tasks/notes/${noteId}`;

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';

        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = '_token';
        tokenInput.value = document.querySelector('meta[name="csrf-token"]').content;

        form.appendChild(methodInput);
        form.appendChild(tokenInput);
        document.body.appendChild(form);
        form.submit();
    }
}

</script>


<script>

    // Function to open the modal
function showAddNoteForm(taskId) {
    $('#noteTaskId').val(taskId);
    $('#addNoteModal').modal('show');
}

$(document).ready(function() {
    // Initialize form validation
    $("#addNoteForm").validate({
        rules: {
            content: {
                required: true,
                minlength: 5,
                maxlength: 1000
            }
        },
        messages: {
            content: {
                required: "Please enter note content",
                minlength: "Note content must be at least 5 characters long",
                maxlength: "Note content cannot exceed 1000 characters"
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

    // Handle form submission
    $('#addNoteForm').on('submit', function(e) {
    e.preventDefault();
    if ($(this).valid()) {
        const form = $(this);
        
        // Disable submit button to prevent double submission
        $('.btn-save-note').prop('disabled', true);
        
        // Create and submit a hidden form for traditional submission
        const hiddenForm = $('<form>', {
            'method': 'POST',
            'action': form.attr('action')
        }).hide();
        
        // Add form data
        const formData = new FormData(this);
        for (let pair of formData.entries()) {
            hiddenForm.append($('<input>', {
                'name': pair[0],
                'value': pair[1],
                'type': 'hidden'
            }));
        }
        
        // Close modal and submit once
        $('#addNoteModal').modal('hide');
        $('body').append(hiddenForm);
        hiddenForm.submit();
    }
});

    // Reset form when modal closes
    $('#addNoteModal').on('hidden.bs.modal', function() {
        $('#addNoteForm').trigger('reset');
        $('#addNoteForm').validate().resetForm();
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
    });

    // Handle save button click
    $(document).on('click', '.btn-save-note', function() {
        $('#addNoteForm').submit();
    });
});

</script>


<script>
    // Function to open edit modal
function editNote(noteId) {
    $.get(`/tasks/notes/${noteId}/edit`, function(data) {
        $('#editNoteId').val(noteId);
        $('#editNoteContent').val(data.content);
        $('#editNoteModal').modal('show');
    });
}
$(document).ready(function() {
    // Initialize validation for edit form
    $("#editNoteForm").validate({
        rules: {
            content: {
                required: true,
                minlength: 5,
                maxlength: 1000
            }
        },
        messages: {
            content: {
                required: "Please enter note content",
                minlength: "Note content must be at least 5 characters long",
                maxlength: "Note content cannot exceed 1000 characters"
            }
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });

    $('#editNoteForm').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            const noteId = $('#editNoteId').val();
            const content = $('#editNoteContent').val();
            
            // Create a new form element
            const form = $('<form>', {
                'method': 'POST',
                'action': `/admin/tasks/notes/${noteId}`
            }).hide();
            
            // Add the necessary form fields
            form.append($('<input>', {
                'name': '_token',
                'value': $('meta[name="csrf-token"]').attr('content'),
                'type': 'hidden'
            }));
            
            form.append($('<input>', {
                'name': '_method',
                'value': 'PUT',
                'type': 'hidden'
            }));
            
            form.append($('<input>', {
                'name': 'content',
                'value': content,
                'type': 'hidden'
            }));

            // Reset the original form
            $('#editNoteForm').trigger('reset'); 
            $('#editNoteForm').validate().resetForm(); 
            $('.is-invalid').removeClass('is-invalid');
            $('.is-valid').removeClass('is-valid');

            // Hide the modal and submit the dynamically created form
            $('#editNoteModal').modal('hide');
            $('body').append(form);
            form.submit();
        }
    });

    // Reset form when modal closes
    $('#editNoteModal').on('hidden.bs.modal', function() {
        $('#editNoteForm').trigger('reset'); 
        $('#editNoteForm').validate().resetForm(); 
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
        function deleteProfileImage() {
        if (confirm('Are you sure you want to delete your profile picture?')) {
            document.getElementById('delete_image').value = '1';
            document.getElementById('imagePreview').src = '';
            document.getElementById('imagePreview').innerHTML = '<i class="fas fa-user-circle"></i>';
            document.getElementById('imagePreview').className = 'profile-placeholder rounded-circle border shadow d-flex align-items-center justify-content-center';
        }
    }
    
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Initialize search and filter functionality for each priority section
        ['high', 'medium', 'low'].forEach(priority => {
            initializeTaskFilters(priority);
        });
    });
    
    function initializeTaskFilters(priority) {
        const container = document.querySelector(`[data-priority="${priority}"]`).closest('.card');
        const searchInput = container.querySelector('.task-search');
        const statusFilter = container.querySelector('.status-filter');
        const dateFilter = container.querySelector('.date-filter');
        const taskCards = container.querySelectorAll('.task-card');
    
        // Debounce search function
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                filterTasks();
            }, 300);
        });
    
        // Add change listeners to filters
        statusFilter.addEventListener('change', filterTasks);
        dateFilter.addEventListener('change', filterTasks);
    
        function filterTasks() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const dateValue = dateFilter.value;
    
            taskCards.forEach(card => {
                const title = card.querySelector('.task-title').textContent.toLowerCase();
                const description = card.querySelector('.task-description').textContent.toLowerCase();
                const status = card.querySelector('.status-badge').textContent.trim().toLowerCase().replace(' ', '_');
                const dateText = card.querySelector('.date-badge').textContent.trim();
                const date = new Date(dateText);
    
                let showCard = true;
    
                // Search filter
                if (searchTerm) {
                    showCard = title.includes(searchTerm) || description.includes(searchTerm);
                }
    
                // Status filter
                if (showCard && statusValue) {
                    showCard = status === statusValue;
                }
    
                // Date filter
                if (showCard && dateValue) {
                    const today = new Date();
                    const tomorrow = new Date(today);
                    tomorrow.setDate(tomorrow.getDate() + 1);
    
                    switch (dateValue) {
                        case 'today':
                            showCard = isSameDay(date, today);
                            break;
                        case 'tomorrow':
                            showCard = isSameDay(date, tomorrow);
                            break;
                        case 'week':
                            showCard = isThisWeek(date);
                            break;
                        case 'overdue':
                            showCard = date < today;
                            break;
                    }
                }
    
                // Show/hide card with animation
                if (showCard) {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
    
            // Show empty state if no results
            const visibleCards = Array.from(taskCards).filter(card => card.style.display !== 'none');
            const emptyState = container.querySelector('.empty-state') || createEmptyState();
            
            if (visibleCards.length === 0) {
                container.querySelector('.card-body').appendChild(emptyState);
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }
        }
    }
    
    // Helper functions
    function isSameDay(date1, date2) {
        return date1.getDate() === date2.getDate() &&
               date1.getMonth() === date2.getMonth() &&
               date1.getFullYear() === date2.getFullYear();
    }
    
    function isThisWeek(date) {
        const today = new Date();
        const weekStart = new Date(today.setDate(today.getDate() - today.getDay()));
        const weekEnd = new Date(today.setDate(today.getDate() - today.getDay() + 6));
        return date >= weekStart && date <= weekEnd;
    }
    
    function createEmptyState() {
        const div = document.createElement('div');
        div.className = 'empty-state text-center py-4';
        div.innerHTML = `
            <i class="fas fa-filter fa-2x text-muted mb-2"></i>
            <p class="text-muted">No tasks match your filters</p>
        `;
        return div;
    }
    </script>
</body>

</html>

