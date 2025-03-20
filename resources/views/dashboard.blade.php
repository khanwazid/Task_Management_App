<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

 
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

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
             
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">My Tasks</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTaskModal">
                        <i class="ti-plus"></i> Create New Task
                    </button>
                </div>
              
               


                <div class="row">
                    @if($tasks->isEmpty())
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
                                               data-priority="high">
                                        
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
                                    
                                    <div class="task-timeline mb-3">
                                        <div class="timeline-item d-flex align-items-center gap-3">
                                            <div class="timeline-icon bg-success rounded-circle p-2">
                                                <i class="fas fa-clock text-white"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <p class="mb-0 small">Created: {{ $task->created_at->format('M d, Y h:i A') }}</p>
                                                <p class="mb-0 small">Updated: {{ $task->updated_at->format('M d, Y h:i A') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="task-progress mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-muted small">Task Completion</span>
                                            <span class="badge bg-success">{{ $task->getProgressPercentage() }}%</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                                 role="progressbar" 
                                                 style="width: {{ $task->getProgressPercentage() }}%">
                                            </div>
                                        </div>
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
                                    
                                    <!-- Task Image Section -->
@if($task->taskimage && Storage::exists('public/taskimages/' . basename($task->taskimage)))
<div class="task-image-section mb-3">
    <div class="d-flex gap-2">
        <div class="icon-wrapper">
            <i class="fas fa-image text-success fs-5"></i>
        </div>
        <div class="image-content">
            <img src="{{ Storage::url('taskimages/' . basename($task->taskimage)) }}"
             loading="lazy" 
                 alt="Task Image" class="img-fluid rounded shadow-sm" 
                 style="max-width: 100px; max-height: 100px;">
        </div>
    </div>
</div>
@else
<div class="alert alert-info">
    <i class="fas fa-exclamation-circle"></i> No image available for this task.
</div>
@endif



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
                                            
                                            <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
                                                    onclick="showAddNoteForm({{ $task->id }})">
                                                <i class="fas fa-plus-circle"></i>
                                                <span>Add Note</span>
                                            </button>
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
                                                    <p class="text-muted mb-0">No notes added yet</p>
                                                    <small class="text-muted">Click the 'Add Note' button to create your first note</small>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    
                                    



                                        <!-- Task Reports Section -->
<div class="task-reports mb-4">
    <div class="notes-header d-flex justify-content-between align-items-center mb-4 p-4 bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-sm">
        <div class="d-flex align-items-center gap-4">
            <div class="notes-icon p-3 bg-warning bg-opacity-10 rounded-circle">
                <i class="fas fa-chart-line text-warning fa-lg"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold d-flex align-items-center gap-3">
                    Admin Reports
                    
                </h5>
                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-primary"></i>
                    Task progress reports from administration
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
                            <i class="fas fa-user-shield text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">Admin Report</h6>
                            <small class="text-muted">
                                @if ($report->created_at != $report->updated_at)
                                    Last updated {{ $report->updated_at->diffForHumans() }}
                                @else
                                    Created {{ $report->created_at->diffForHumans() }}
                                @endif
                            </small>
                        </div>
                    </div>
                    
                    <div class="admin-badge">
                        <span class="badge bg-info rounded-pill">
                            <i class="fas fa-user-tie me-1"></i>
                            Admin Report
                        </span>
                    </div>
                </div>
                
                <!-- Report Content -->
                <div class="note-content p-3">
                    <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $report->reason }}</p>
                </div>
            </div>
        @empty
            <div class="empty-notes text-center py-4 bg-light rounded-4">
                <div class="empty-icon mb-3">
                    <i class="fas fa-clipboard-list text-warning fa-2x"></i>
                </div>
                <h5 class="fw-bold text-dark mb-3">No Reports Available</h5>
            <p class="text-muted mb-4 px-4">
                No admin reports have been generated for this task yet.<br>
                Check back later for updates on task progress.
            </p>
        </div>
        @endforelse


       


    </div>
</div>
                               
                                               <!-- Action Buttons -->
                                    <div class="action-buttons d-flex justify-content-end gap-2">
                                        <button type="button" 
                                             class="btn btn-light btn-sm rounded-circle" 
                                            data-toggle="modal" 
                                              data-target="#viewTaskModal{{ $task->id }}" 
                                             aria-label="View task details" title="View Details">
                                            <i class="far fa-eye text-info" aria-hidden="true"></i>
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
                                   
                                 </div> <div class="empty-state-wrapper py-5">
                                    <div class="empty-state-container text-center">
                                        <!-- Animated Illustration -->
                                        <div class="empty-illustration mb-4">
                                            <div class="illustration-wrapper position-relative">
                                                <i class="fas fa-clipboard-check text-info fa-4x mb-3 main-icon"></i>
                                                <div class="floating-elements">
                                                    <i class="fas fa-check text-success floating-item-1"></i>
                                                    <i class="fas fa-star text-warning floating-item-2"></i>
                                                    <i class="fas fa-bell text-danger floating-item-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <!-- Content -->
                                        <div class="empty-content">
                                            <h4 class="empty-title mb-3 text-gradient">Ready to Organize Your Tasks?</h4>
                                            <div class="empty-description mb-4">
                                                <p class="text-muted lead">Start managing your Medium priority tasks</p>
                                                <div class="features-list mt-3">
                                                    <span class="badge bg-light text-primary m-1">
                                                        <i class="fas fa-check-circle me-1"></i>Easy Organization
                                                    </span>
                                                    <span class="badge bg-light text-success m-1">
                                                        <i class="fas fa-clock me-1"></i>Track Progress
                                                    </span>
                                                    <span class="badge bg-light text-info m-1">
                                                        <i class="fas fa-bell me-1"></i>Stay Updated
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Action Button -->
                                            <button type="button" class="btn btn-primary btn-lg shadow-lg pulse-button" data-toggle="modal" data-target="#createTaskModal">
                                                <i class="ti-plus me-2"></i>
                                                Add Your First Task
                                                <div class="ripple"></div>
                                            </button>
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
                           data-priority="medium">
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
            <!-- Check if there are no tasks -->
            @php
                $highPriorityTasks = $tasks->where('priority', 'medium');
            @endphp

            @if($highPriorityTasks->isEmpty())
                <!-- Empty State Section -->
                <div class="empty-state-wrapper py-5">
                    <div class="empty-state-container text-center">
                        <!-- Animated Illustration -->
                        <div class="empty-illustration mb-4">
                            <div class="illustration-wrapper position-relative">
                                <i class="fas fa-clipboard-check text-info fa-4x mb-3 main-icon"></i>
                                <div class="floating-elements">
                                    <i class="fas fa-check text-success floating-item-1"></i>
                                    <i class="fas fa-star text-warning floating-item-2"></i>
                                    <i class="fas fa-bell text-danger floating-item-3"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="empty-content">
                            <h4 class="empty-title mb-3 text-gradient">Ready to Organize Your Tasks?</h4>
                            <div class="empty-description mb-4">
                                <p class="text-muted lead">Start managing your Medium priority tasks</p>
                                <div class="features-list mt-3">
                                    <span class="badge bg-light text-primary m-1">
                                        <i class="fas fa-check-circle me-1"></i>Easy Organization
                                    </span>
                                    <span class="badge bg-light text-success m-1">
                                        <i class="fas fa-clock me-1"></i>Track Progress
                                    </span>
                                    <span class="badge bg-light text-info m-1">
                                        <i class="fas fa-bell me-1"></i>Stay Updated
                                    </span>
                                </div>
                            </div>
                            <!-- Action Button -->
                            <button type="button" class="btn btn-primary btn-lg shadow-lg pulse-button" data-toggle="modal" data-target="#createTaskModal">
                                <i class="ti-plus me-2"></i>
                                Add Your First Task
                                <div class="ripple"></div>
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <!-- Task List Section -->
                @php
                    $startingNumber = ($tasks->currentPage() - 1) * $tasks->perPage();
                @endphp
                @foreach($highPriorityTasks as $index => $task)
                    <!-- Task Card -->
                    <div class="task-card mb-3 p-3 border rounded hover-shadow">
                        <!-- Task Details -->
                        <div class="serial-number mb-2">
                            <span class="badge bg-secondary rounded-pill">
                                <i class="fas fa-hashtag me-1"></i>
                                {{ $startingNumber + $index + 1 }}
                            </span>
                        </div>
                        <div class="task-timeline mb-3">
                            <div class="timeline-item d-flex align-items-center gap-3">
                                <div class="timeline-icon bg-success rounded-circle p-2">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div class="timeline-content">
                                    <p class="mb-0 small">Created: {{ $task->created_at->format('M d, Y h:i A') }}</p>
                                    <p class="mb-0 small">Updated: {{ $task->updated_at->format('M d, Y h:i A') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="task-progress mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Task Completion</span>
                                <span class="badge bg-success">{{ $task->getProgressPercentage() }}%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                     role="progressbar" 
                                     style="width: {{ $task->getProgressPercentage() }}%">
                                </div>
                            </div>
                        </div>

                        <!-- Title Section -->
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
                        <!-- Description Section -->
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

                        <!-- Task Image Section -->
@if($task->taskimage && Storage::exists('public/taskimages/' . basename($task->taskimage)))
<div class="task-image-section mb-3">
    <div class="d-flex gap-2">
        <div class="icon-wrapper">
            <i class="fas fa-image text-success fs-5"></i>
        </div>
        <div class="image-content">
            <img src="{{ Storage::url('taskimages/' . basename($task->taskimage)) }}"
            loading="lazy" 
                 alt="Task Image" class="img-fluid rounded shadow-sm" 
                 style="max-width: 100px; max-height: 100px;">
        </div>

    </div>
</div>
@else
<div class="alert alert-info">
    <i class="fas fa-exclamation-circle"></i> No image available for this task.
</div>
@endif


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
                        <!-- Task Notes Section -->
                        <div class="task-notes mb-4">
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
                                <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
                                        onclick="showAddNoteForm({{ $task->id }})">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Add Note</span>
                                </button>
                            </div>
                            <!-- Notes List -->
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
                                        <p class="text-muted mb-0">No notes added yet</p>
                                        <small class="text-muted">Click the 'Add Note' button to create your first note</small>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                           <!-- Task Reports Section -->
<div class="task-reports mb-4">
    <div class="notes-header d-flex justify-content-between align-items-center mb-4 p-4 bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-sm">
        <div class="d-flex align-items-center gap-4">
            <div class="notes-icon p-3 bg-warning bg-opacity-10 rounded-circle">
                <i class="fas fa-chart-line text-warning fa-lg"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold d-flex align-items-center gap-3">
                    Admin Reports
                    
                </h5>
                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-primary"></i>
                    Task progress reports from administration
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
                            <i class="fas fa-user-shield text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">Admin Report</h6>
                            <small class="text-muted">
                                @if ($report->created_at != $report->updated_at)
                                    Last updated {{ $report->updated_at->diffForHumans() }}
                                @else
                                    Created {{ $report->created_at->diffForHumans() }}
                                @endif
                            </small>
                        </div>
                    </div>
                    

                    
                    <div class="admin-badge">
                        <span class="badge bg-info rounded-pill">
                            <i class="fas fa-user-tie me-1"></i>
                            Admin Report
                        </span>
                    </div>
                </div>
                
                <!-- Report Content -->
                <div class="note-content p-3">
                    <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $report->reason }}</p>
                </div>
            </div>
        @empty
            <div class="empty-notes text-center py-4 bg-light rounded-4">
                <div class="empty-icon mb-3">
                    <i class="fas fa-clipboard-list text-warning fa-2x"></i>
                </div>
                <h5 class="fw-bold text-dark mb-3">No Reports Available</h5>
            <p class="text-muted mb-4 px-4">
                No admin reports have been generated for this task yet.<br>
                Check back later for updates on task progress.
            </p>
        </div>
        @endforelse


       


    </div>
</div>
                        <!-- Action Buttons -->
                        <div class="action-buttons d-flex justify-content-end gap-2">
                           
                            <button type="button" 
                            class="btn btn-light btn-sm rounded-circle" 
                           data-toggle="modal" 
                             data-target="#viewTaskModal{{ $task->id }}" 
                            aria-label="View task details" title="View Details">
                           <i class="far fa-eye text-info" aria-hidden="true"></i>
                           </button>
                            <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#editTaskModal{{ $task->id }}" title="Edit Task">
                                <i class="far fa-pen-to-square text-warning"></i>
                            </button>
                            <button class="btn btn-light btn-sm rounded-circle" data-toggle="modal" data-target="#deleteTaskModal{{ $task->id }}" title="Delete Task">
                                <i class="far fa-trash-can text-danger"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
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

                                    <div class="task-timeline mb-3">
                                        <div class="timeline-item d-flex align-items-center gap-3">
                                            <div class="timeline-icon bg-success rounded-circle p-2">
                                                <i class="fas fa-clock text-white"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <p class="mb-0 small">Created: {{ $task->created_at->format('M d, Y h:i A') }}</p>
                                                <p class="mb-0 small">Updated: {{ $task->updated_at->format('M d, Y h:i A') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="task-progress mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-muted small">Task Completion</span>
                                            <span class="badge bg-success">{{ $task->getProgressPercentage() }}%</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                                 role="progressbar" 
                                                 style="width: {{ $task->getProgressPercentage() }}%">
                                            </div>
                                        </div>
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

<!-- Task Image Section -->
@if($task->taskimage && Storage::exists('public/taskimages/' . basename($task->taskimage)))
    <div class="task-image-section mb-3">
        <div class="d-flex gap-2">
            <div class="icon-wrapper">
                <i class="fas fa-image text-success fs-5"></i>
            </div>
            <div class="image-content">
                <img src="{{ Storage::url('taskimages/' . basename($task->taskimage)) }}"
                loading="lazy" 
                     alt="Task Image" class="img-fluid rounded shadow-sm" 
                     style="max-width: 100px; max-height: 100px;">
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <i class="fas fa-exclamation-circle"></i> No image available for this task.
    </div>
@endif





                                    
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
                                            
                                            <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
                                                    onclick="showAddNoteForm({{ $task->id }})">
                                                <i class="fas fa-plus-circle"></i>
                                                <span>Add Note</span>
                                            </button>
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
                                                    <p class="text-muted mb-0">No notes added yet</p>
                                                    <small class="text-muted">Click the 'Add Note' button to create your first note</small>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    

                                       <!-- Task Reports Section -->
<div class="task-reports mb-4">
    <div class="notes-header d-flex justify-content-between align-items-center mb-4 p-4 bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-sm">
        <div class="d-flex align-items-center gap-4">
            <div class="notes-icon p-3 bg-warning bg-opacity-10 rounded-circle">
                <i class="fas fa-chart-line text-warning fa-lg"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold d-flex align-items-center gap-3">
                    Admin Reports
                    
                </h5>
                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-primary"></i>
                    Task progress reports from administration
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
                            <i class="fas fa-user-shield text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">Admin Report</h6>
                            <small class="text-muted">
                                @if ($report->created_at != $report->updated_at)
                                    Last updated {{ $report->updated_at->diffForHumans() }}
                                @else
                                    Created {{ $report->created_at->diffForHumans() }}
                                @endif
                            </small>
                        </div>
                    </div>
                    
                    <div class="admin-badge">
                        <span class="badge bg-info rounded-pill">
                            <i class="fas fa-user-tie me-1"></i>
                            Admin Report
                        </span>
                    </div>
                </div>
                
                <!-- Report Content -->
                <div class="note-content p-3">
                    <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $report->reason }}</p>
                </div>
            </div>
        @empty
            <div class="empty-notes text-center py-4 bg-light rounded-4">
                <div class="empty-icon mb-3">
                    <i class="fas fa-clipboard-list text-warning fa-2x"></i>
                </div>
                <h5 class="fw-bold text-dark mb-3">No Reports Available</h5>
            <p class="text-muted mb-4 px-4">
                No admin reports have been generated for this task yet.<br>
                Check back later for updates on task progress.
            </p>
        </div>
        @endforelse


       


    </div>
</div>


                                    <!-- Action Buttons -->
                                    <div class="action-buttons d-flex justify-content-end gap-2">
                                        <button type="button" 
                                        class="btn btn-light btn-sm rounded-circle" 
                                       data-toggle="modal" 
                                         data-target="#viewTaskModal{{ $task->id }}" 
                                        aria-label="View task details" title="View Details">
                                       <i class="far fa-eye text-info" aria-hidden="true"></i>
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
                            </div> <div class="empty-state-wrapper py-5">
                                <div class="empty-state-container text-center">
                                    <!-- Animated Illustration -->
                                    <div class="empty-illustration mb-4">
                                        <div class="illustration-wrapper position-relative">
                                            <i class="fas fa-clipboard-check text-info fa-4x mb-3 main-icon"></i>
                                            <div class="floating-elements">
                                                <i class="fas fa-check text-success floating-item-1"></i>
                                                <i class="fas fa-star text-warning floating-item-2"></i>
                                                <i class="fas fa-bell text-danger floating-item-3"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <!-- Content -->
                                    <div class="empty-content">
                                        <h4 class="empty-title mb-3 text-gradient">Ready to Organize Your Tasks?</h4>
                                        <div class="empty-description mb-4">
                                            <p class="text-muted lead">Start managing your Medium priority tasks</p>
                                            <div class="features-list mt-3">
                                                <span class="badge bg-light text-primary m-1">
                                                    <i class="fas fa-check-circle me-1"></i>Easy Organization
                                                </span>
                                                <span class="badge bg-light text-success m-1">
                                                    <i class="fas fa-clock me-1"></i>Track Progress
                                                </span>
                                                <span class="badge bg-light text-info m-1">
                                                    <i class="fas fa-bell me-1"></i>Stay Updated
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Action Button -->
                                        <button type="button" class="btn btn-primary btn-lg shadow-lg pulse-button" data-toggle="modal" data-target="#createTaskModal">
                                            <i class="ti-plus me-2"></i>
                                            Add Your First Task
                                            <div class="ripple"></div>
                                        </button>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            
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
                <form id="addNoteForm" action="{{ route('note.add') }}" method="POST">
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
    
    
    <!-- Create Task Modal -->
    <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="createTaskModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                    <h4 class="mb-2" id="createTaskModalLabel">
                        <i class="ti-plus me-2"></i>Create New Task
                    </h4>
                    <p class="mb-0">Enter your task details and preferences</p>
                </div>

            <!-- Content Section -->
            <form id="createTaskForm" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-image me-2"></i>Task Image
                                </label>
                                <div class="custom-file-upload">
                                    <input type="file" name="taskimage" id="taskimage" class="form-control" accept="image/*">
                                    <div id="imagePreview" class="mt-2 d-none">
                                        <img src="" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                </div>
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
     <div class="modal" id="viewTaskModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="taskDetailsTitle{{ $task->id }}">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                 <!-- Top Header Section -->
                 <div class="bg-primary text-white p-4 d-flex align-items-center justify-content-center gap-4">
                     <i class="ti-eye" style="font-size: 48px;" aria-hidden="true"></i>
                     <div>
                         <h4 class="mb-2" id="taskDetailsTitle{{ $task->id }}">Task Details</h4>
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
    
                                 <!-- Task Image Section -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-image me-2"></i>Task Image
                                </label>
                                <div class="d-flex align-items-center">
                                    @if($task->taskimage && Storage::exists('public/taskimages/' . basename($task->taskimage)))
                                        <img src="{{ Storage::url('taskimages/' . basename($task->taskimage)) }}" 
                                             alt="Task Image" class="img-fluid rounded shadow-sm" 
                                             style="max-width: 150px; max-height: 150px;">
                                    @else
                                        <p class="text-muted"><i class="ti-alert"></i> No image available for this task.</p>
                                    @endif
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
                    <button type="button" class="btn btn-primary px-4" data-dismiss="modal" autofocus>
                        <i class="ti-close me-2" aria-hidden="true"></i>Close
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
                    <form id="editTaskForm{{ $task->id }}" action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
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
        
                                  <!-- Task Image Section -->
<div class="col-12 mt-3">
    <div class="form-group">
        <label class="form-label fw-bold text-primary">
            <i class="ti-image me-2"></i>Task Image
        </label>
        
        @if($task->taskimage)
        <div class="current-image mb-2">
            <img src="{{ Storage::url('taskimages/' . basename($task->taskimage)) }}" 
                 alt="Task Image" 
                 class="img-thumbnail" 
                 style="max-width: 200px">
            
            <button type="button" 
                    class="btn btn-danger btn-sm delete-image" 
                    data-task-id="{{ $task->id }}">
                <i class="ti-trash me-1"></i>Delete Image
            </button>
        </div>
        @endif
        
        <div class="form-text text-muted mb-2">
            <i class="fas fa-info-circle"></i> 
            Upload a new image or delete the existing one.
        </div>
        
        <input type="file" 
               name="taskimage" 
               class="form-control" 
               accept="image/*">
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
        <div class="modal fade" 
        id="deleteTaskModal{{ $task->id }}" 
        tabindex="-1" 
        role="dialog" 
        aria-labelledby="deleteTaskModalLabel{{ $task->id }}">
       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
               <!-- Top Warning Section -->
               <div class="bg-danger text-white p-4 d-flex align-items-center justify-content-center gap-4">
                   <i class="ti-alert" style="font-size: 48px;" aria-hidden="true"></i>
                   <div>
                       <h4 class="mb-2" id="deleteTaskModalLabel{{ $task->id }}">Are you sure you want to delete this task?</h4>
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
        
                                     <!-- Task Image Section -->
                            <div class="col-12">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-image me-2"></i>Task Image
                                </label>
                                <div class="d-flex align-items-center">
                                    @if($task->taskimage && Storage::exists('public/taskimages/' . basename($task->taskimage)))
                                        <img src="{{ Storage::url('taskimages/' . basename($task->taskimage)) }}" 
                                             alt="Task Image" class="img-fluid rounded shadow-sm" 
                                             style="max-width: 150px; max-height: 150px;">
                                    @else
                                        <p class="text-muted"><i class="ti-alert"></i> No image available for this task.</p>
                                    @endif
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
                            <button type="submit" class="btn btn-danger px-4 delete-task-btn">
    <i class="ti-trash me-2"></i>Delete Task
</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        
    @endforeach

    
<!-- View Profile-Details Section Start -->
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
                        <textarea 
                            class="form-control auto-expand bg-white custom-view-textarea" 
                            style="resize: none; min-height: 45px; border-radius: 8px;"
                            readonly>{{ auth()->user()->name }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-id-badge mr-2"></i>Username
                        </label>
                        <textarea 
                            class="form-control auto-expand bg-white custom-view-textarea" 
                            style="resize: none; min-height: 45px; border-radius: 8px;"
                            readonly>{{ auth()->user()->username }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-primary">
                            <i class="ti-email mr-2"></i>Email Address
                        </label>
                        <textarea 
                            class="form-control auto-expand bg-white custom-view-textarea" 
                            style="resize: none; min-height: 45px; border-radius: 8px;"
                            readonly>{{ auth()->user()->email }}</textarea>
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
                        <div class="position-relative d-inline-block" id="imageContainer">
                            @if(auth()->user()->image && Storage::disk('public')->exists(auth()->user()->image))
                                <img src="{{ Storage::url(auth()->user()->image) }}"
                                    id="imagePreview"
                                    class="rounded-circle border shadow"
                                    style="width: 150px; height: 150px; object-fit: cover;"
                                    alt="Profile Photo">
                    
                                <div class="current-image">
                                    @if(auth()->user()->image)
                                        <button type="button"
                                            class="badge badge-danger delete-profile-image"
                                            data-user-id="{{ auth()->id() }}">
                                            Delete Image
                                        </button>
                                    @endif
                                </div>
                            @else
                                <div id="defaultPreview" class="profile-placeholder rounded-circle border shadow d-flex align-items-center justify-content-center"
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
                        <small class="text-muted d-block mt-2">Click camera icon to upload a New profile photo</small>
                    </div>

                    <!-- Profile Details Section -->
                    <div class="bg-light p-4 rounded">
                       
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-user mr-2"></i>Full Name
                            </label>
                            <textarea 
                                name="name" 
                                class="form-control auto-expand" 
                                rows="2"
                                style="resize: none; overflow: hidden;">{{ auth()->user()->name }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-id-badge mr-2"></i>Username
                            </label>
                            <textarea 
                                name="username" 
                                class="form-control auto-expand" 
                                rows="2"
                                style="resize: none; overflow: hidden;">{{ auth()->user()->username }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                <i class="ti-email mr-2"></i>Email Address
                            </label>
                            <textarea 
                                name="email" 
                                class="form-control auto-expand" 
                                rows="2"
                                style="resize: none; overflow: hidden;"
                                data-rule-email="true">{{ auth()->user()->email }}</textarea>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/dashboards.js') }}"></script>



</body>

</html>