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
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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
          {{--       <div class="btn btn-primary">
                    <i class="ti-list"></i> Tasks (<span id="taskCount">{{ $tasks->count() }}</span>)
                </div>  --}}

                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tasksModal">
                    <i class="fas fa-file-signature"></i> All Tasks (<span id="taskCount">{{ $tasks->count() }}</span>)
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewUsersModal">
                    <i class="bi bi-people-fill me-2"></i> View All Users (<span id="userCount"></span>)
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTaskModal">
                    <i class="ti-plus"></i> Create New Task
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

              // Statistics calculations
    $totalTasks = $highPriorityTasks->count();
    $pendingTasks = $highPriorityTasks->where('status', 'pending')->count();
    $inProgressTasks = $highPriorityTasks->where('status', 'in_progress')->count();
    $completedTasks = $highPriorityTasks->where('status', 'completed')->count();
    
    $dueTodayTasks = $highPriorityTasks->filter(fn($task) => $task->due_date->isToday())->count();
    $dueThisWeekTasks = $highPriorityTasks->filter(fn($task) => 
        $task->due_date->between(now()->startOfWeek(), now()->endOfWeek())
    )->count();
    $overdueTasks = $highPriorityTasks->filter(fn($task) => 
        $task->due_date->isPast() && $task->status !== 'completed'
    )->count();

    // Progress calculations
    $completedPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    $inProgressPercentage = $totalTasks > 0 ? ($inProgressTasks / $totalTasks) * 100 : 0;
    $pendingPercentage = $totalTasks > 0 ? ($pendingTasks / $totalTasks) * 100 : 0;
         @endphp
        
       
        
<div class="total-tasks-counter mb-3 text-center">
    <div class="card bg-primary bg-gradient text-white p-3 rounded-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white-50">Total Tasks</h2>
                <h3 class="mb-0 fw-bold">{{ $totalTasks }}</h3>
                
            </div>
            <div class="display-4">
               <i class="fas fa-file-signature"></i> 
</div>
        </div>
    </div>
</div>


<div class="statistics-section p-3 border-bottom">
    <div class="row g-3">
        <!-- Status Statistics -->
        <div class="col-md-6">
            <div class="stats-card bg-light rounded p-3">
                <h6 class="mb-3 text-primary">
                    <i class="fas fa-chart-pie me-2"></i>Status Breakdown
                </h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Pending</span>
                        <span class="badge bg-danger rounded-pill">
                            {{ $highPriorityTasks->where('status', 'pending')->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">In Progress</span>
                        <span class="badge bg-warning rounded-pill">
                            {{ $highPriorityTasks->where('status', 'in_progress')->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Completed</span>
                        <span class="badge bg-success rounded-pill">
                            {{ $highPriorityTasks->where('status', 'completed')->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Due Date Statistics -->
        <div class="col-md-6">
            <div class="stats-card bg-light rounded p-3">
                <h6 class="mb-3 text-primary">
                    <i class="fas fa-calendar-check me-2"></i>Due Date Analysis
                </h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Due Today</span>
                        <span class="badge bg-info rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->isToday(); 
                            })->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Due This Week</span>
                        <span class="badge bg-primary rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->between(now()->startOfWeek(), now()->endOfWeek()); 
                            })->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Overdue</span>
                        <span class="badge bg-danger rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->isPast() && $task->status !== 'completed'; 
                            })->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overall Progress -->
        <div class="col-12">
            <div class="progress" style="height: 25px;">
                @php
                    $total = $highPriorityTasks->count();
                    $completed = $highPriorityTasks->where('status', 'completed')->count();
                    $inProgress = $highPriorityTasks->where('status', 'in_progress')->count();
                    $pending = $highPriorityTasks->where('status', 'pending')->count();
                    
                    $completedPercentage = $total > 0 ? ($completed / $total) * 100 : 0;
                    $inProgressPercentage = $total > 0 ? ($inProgress / $total) * 100 : 0;
                    $pendingPercentage = $total > 0 ? ($pending / $total) * 100 : 0;
                @endphp
                
                <div class="progress-bar bg-success" style="width: {{ $completedPercentage }}%" 
                     title="Completed: {{ $completed }}">
                    {{ round($completedPercentage) }}%
                </div>
                <div class="progress-bar bg-warning" style="width: {{ $inProgressPercentage }}%"
                     title="In Progress: {{ $inProgress }}">
                    {{ round($inProgressPercentage) }}%
                </div>
                <div class="progress-bar bg-danger" style="width: {{ $pendingPercentage }}%"
                     title="Pending: {{ $pending }}">
                    {{ round($pendingPercentage) }}%
                </div>
            </div>
        </div>
    </div>
</div>

         
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
                 

                <div class="created-by-section mb-3">
                    <div class="d-flex gap-2">
                        <div class="icon-wrapper">
                            <i class="fas fa-user-edit text-primary fs-5"></i>
                        </div>
                        <div class="created-by-content flex-grow-1">
                            <label class="form-label fw-bold text-primary mb-1">
                                Created by:
                            </label>
                            <p class="task-created-by text-secondary mb-0">{{ $task->user->username }}</p>
                        </div>
                    </div>
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
                         
                         @if(auth()->id() === $task->user_id)
    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
            onclick="showAddNoteForm({{ $task->id }})">
        <i class="fas fa-plus-circle"></i>
        <span>Add Note</span>
    </button>
@endif
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
              // Statistics calculations
    $totalTasks = $highPriorityTasks->count();
    $pendingTasks = $highPriorityTasks->where('status', 'pending')->count();
    $inProgressTasks = $highPriorityTasks->where('status', 'in_progress')->count();
    $completedTasks = $highPriorityTasks->where('status', 'completed')->count();
    
    $dueTodayTasks = $highPriorityTasks->filter(fn($task) => $task->due_date->isToday())->count();
    $dueThisWeekTasks = $highPriorityTasks->filter(fn($task) => 
        $task->due_date->between(now()->startOfWeek(), now()->endOfWeek())
    )->count();
    $overdueTasks = $highPriorityTasks->filter(fn($task) => 
        $task->due_date->isPast() && $task->status !== 'completed'
    )->count();

    // Progress calculations
    $completedPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    $inProgressPercentage = $totalTasks > 0 ? ($inProgressTasks / $totalTasks) * 100 : 0;
    $pendingPercentage = $totalTasks > 0 ? ($pendingTasks / $totalTasks) * 100 : 0;
         @endphp
        
         
        
<div class="total-tasks-counter mb-3 text-center">
    <div class="card bg-primary bg-gradient text-white p-3 rounded-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white-50">Total Tasks</h2>
                <h3 class="mb-0 fw-bold">{{ $totalTasks }}</h3>
                
            </div>
            <div class="display-4">
                <i class="fas fa-file-signature"></i> 
            </div>
        </div>
    </div>
</div>


      
<div class="statistics-section p-3 border-bottom">
    <div class="row g-3">
        <!-- Status Statistics -->
        <div class="col-md-6">
            <div class="stats-card bg-light rounded p-3">
                <h6 class="mb-3 text-primary">
                    <i class="fas fa-chart-pie me-2"></i>Status Breakdown
                </h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Pending</span>
                        <span class="badge bg-danger rounded-pill">
                            {{ $highPriorityTasks->where('status', 'pending')->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">In Progress</span>
                        <span class="badge bg-warning rounded-pill">
                            {{ $highPriorityTasks->where('status', 'in_progress')->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Completed</span>
                        <span class="badge bg-success rounded-pill">
                            {{ $highPriorityTasks->where('status', 'completed')->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Due Date Statistics -->
        <div class="col-md-6">
            <div class="stats-card bg-light rounded p-3">
                <h6 class="mb-3 text-primary">
                    <i class="fas fa-calendar-check me-2"></i>Due Date Analysis
                </h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Due Today</span>
                        <span class="badge bg-info rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->isToday(); 
                            })->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Due This Week</span>
                        <span class="badge bg-primary rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->between(now()->startOfWeek(), now()->endOfWeek()); 
                            })->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Overdue</span>
                        <span class="badge bg-danger rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->isPast() && $task->status !== 'completed'; 
                            })->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overall Progress -->
        <div class="col-12">
            <div class="progress" style="height: 25px;">
                @php
                    $total = $highPriorityTasks->count();
                    $completed = $highPriorityTasks->where('status', 'completed')->count();
                    $inProgress = $highPriorityTasks->where('status', 'in_progress')->count();
                    $pending = $highPriorityTasks->where('status', 'pending')->count();
                    
                    $completedPercentage = $total > 0 ? ($completed / $total) * 100 : 0;
                    $inProgressPercentage = $total > 0 ? ($inProgress / $total) * 100 : 0;
                    $pendingPercentage = $total > 0 ? ($pending / $total) * 100 : 0;
                @endphp
                
                <div class="progress-bar bg-success" style="width: {{ $completedPercentage }}%" 
                     title="Completed: {{ $completed }}">
                    {{ round($completedPercentage) }}%
                </div>
                <div class="progress-bar bg-warning" style="width: {{ $inProgressPercentage }}%"
                     title="In Progress: {{ $inProgress }}">
                    {{ round($inProgressPercentage) }}%
                </div>
                <div class="progress-bar bg-danger" style="width: {{ $pendingPercentage }}%"
                     title="Pending: {{ $pending }}">
                    {{ round($pendingPercentage) }}%
                </div>
            </div>
        </div>
    </div>
</div>

         
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
<div class="created-by-section mb-3">
    <div class="d-flex gap-2">
        <div class="icon-wrapper">
            <i class="fas fa-user-edit text-primary fs-5"></i>
        </div>
        <div class="created-by-content flex-grow-1">
            <label class="form-label fw-bold text-primary mb-1">
                Created by:
            </label>
            <p class="task-created-by text-secondary mb-0">{{ $task->user->username }}</p>
        </div>
    </div>
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
                         
                         @if(auth()->id() === $task->user_id)
    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
            onclick="showAddNoteForm({{ $task->id }})">
        <i class="fas fa-plus-circle"></i>
        <span>Add Note</span>
    </button>
@endif
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
                            <small class="text-muted">
                                @if ($report->created_at != $report->updated_at)
                                    Last updated {{ $report->updated_at->diffForHumans() }}
                                @else
                                    Created {{ $report->created_at->diffForHumans() }}
                                @endif
                            </small>
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
               // Statistics calculations
    $totalTasks = $highPriorityTasks->count();
    $pendingTasks = $highPriorityTasks->where('status', 'pending')->count();
    $inProgressTasks = $highPriorityTasks->where('status', 'in_progress')->count();
    $completedTasks = $highPriorityTasks->where('status', 'completed')->count();
    
    $dueTodayTasks = $highPriorityTasks->filter(fn($task) => $task->due_date->isToday())->count();
    $dueThisWeekTasks = $highPriorityTasks->filter(fn($task) => 
        $task->due_date->between(now()->startOfWeek(), now()->endOfWeek())
    )->count();
    $overdueTasks = $highPriorityTasks->filter(fn($task) => 
        $task->due_date->isPast() && $task->status !== 'completed'
    )->count();

    // Progress calculations
    $completedPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    $inProgressPercentage = $totalTasks > 0 ? ($inProgressTasks / $totalTasks) * 100 : 0;
    $pendingPercentage = $totalTasks > 0 ? ($pendingTasks / $totalTasks) * 100 : 0;
         @endphp
        
        
<div class="total-tasks-counter mb-3 text-center">
    <div class="card bg-primary bg-gradient text-white p-3 rounded-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white-50">Total Tasks</h2>
                <h3 class="mb-0 fw-bold">{{ $totalTasks }}</h3>
                
            </div>
            <div class="display-4">
                <i class="fas fa-file-signature"></i> 
            </div>
        </div>
    </div>
</div>


       
<div class="statistics-section p-3 border-bottom">
    <div class="row g-3">
        <!-- Status Statistics -->
        <div class="col-md-6">
            <div class="stats-card bg-light rounded p-3">
                <h6 class="mb-3 text-primary">
                    <i class="fas fa-chart-pie me-2"></i>Status Breakdown
                </h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Pending</span>
                        <span class="badge bg-danger rounded-pill">
                            {{ $highPriorityTasks->where('status', 'pending')->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">In Progress</span>
                        <span class="badge bg-warning rounded-pill">
                            {{ $highPriorityTasks->where('status', 'in_progress')->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Completed</span>
                        <span class="badge bg-success rounded-pill">
                            {{ $highPriorityTasks->where('status', 'completed')->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Due Date Statistics -->
        <div class="col-md-6">
            <div class="stats-card bg-light rounded p-3">
                <h6 class="mb-3 text-primary">
                    <i class="fas fa-calendar-check me-2"></i>Due Date Analysis
                </h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Due Today</span>
                        <span class="badge bg-info rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->isToday(); 
                            })->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Due This Week</span>
                        <span class="badge bg-primary rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->between(now()->startOfWeek(), now()->endOfWeek()); 
                            })->count() }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Overdue</span>
                        <span class="badge bg-danger rounded-pill">
                            {{ $highPriorityTasks->filter(function($task) { 
                                return $task->due_date->isPast() && $task->status !== 'completed'; 
                            })->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overall Progress -->
        <div class="col-12">
            <div class="progress" style="height: 25px;">
                @php
                    $total = $highPriorityTasks->count();
                    $completed = $highPriorityTasks->where('status', 'completed')->count();
                    $inProgress = $highPriorityTasks->where('status', 'in_progress')->count();
                    $pending = $highPriorityTasks->where('status', 'pending')->count();
                    
                    $completedPercentage = $total > 0 ? ($completed / $total) * 100 : 0;
                    $inProgressPercentage = $total > 0 ? ($inProgress / $total) * 100 : 0;
                    $pendingPercentage = $total > 0 ? ($pending / $total) * 100 : 0;
                @endphp
                
                <div class="progress-bar bg-success" style="width: {{ $completedPercentage }}%" 
                     title="Completed: {{ $completed }}">
                    {{ round($completedPercentage) }}%
                </div>
                <div class="progress-bar bg-warning" style="width: {{ $inProgressPercentage }}%"
                     title="In Progress: {{ $inProgress }}">
                    {{ round($inProgressPercentage) }}%
                </div>
                <div class="progress-bar bg-danger" style="width: {{ $pendingPercentage }}%"
                     title="Pending: {{ $pending }}">
                    {{ round($pendingPercentage) }}%
                </div>
            </div>
        </div>
    </div>
</div>

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
<div class="created-by-section mb-3">
    <div class="d-flex gap-2">
        <div class="icon-wrapper">
            <i class="fas fa-user-edit text-primary fs-5"></i>
        </div>
        <div class="created-by-content flex-grow-1">
            <label class="form-label fw-bold text-primary mb-1">
                Created by:
            </label>
            <p class="task-created-by text-secondary mb-0">{{ $task->user->username }}</p>
        </div>
    </div>
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

                         @if(auth()->id() === $task->user_id)
    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-2"
            onclick="showAddNoteForm({{ $task->id }})">
        <i class="fas fa-plus-circle"></i>
        <span>Add Note</span>
    </button>
@endif

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
    
     <!-- Create Task Modal -->
   <div class="modal fade" id="createTaskModal" tabindex="-1"  role="dialog" aria-modal="true" aria-labelledby="createTaskModalLabel" >
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
            <form id="createTaskForm" action="{{ route('admin.tasks.store') }}" method="POST" enctype="multipart/form-data">
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

                {{--   <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold text-primary">
                                    <i class="ti-image me-2"></i>Task Image
                                </label>
                                <div class="modern-upload-container">
                                    <div class="upload-area" id="uploadArea">
                                        <input type="file" name="taskimage" id="taskimage" class="file-input" accept="image/*" hidden>
                                        <div class="upload-content text-center">
                                            <i class="ti-cloud-up display-4 mb-3"></i>
                                            <h5 class="upload-title mb-2">Drag & Drop your image here</h5>
                                            <p class="upload-subtitle mb-3">or</p>
                                            <button type="button" class="btn btn-outline-primary btn-upload" onclick="document.getElementById('taskimage').click()">
                                                <i class="ti-image me-2"></i>Browse Image
                                            </button>
                                        </div>
                                        <div id="imagePreview" class="preview-container d-none">
                                            <img src="" alt="Preview" class="preview-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

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
                <span class="ti-eye" style="font-size: 48px;"></span>
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
                <form id="editTaskForm{{ $task->id }}" action="{{ route('admin.tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
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
    
                           
<div class="col-12 mt-3">
    <div class="form-group">
        <label class="form-label fw-bold text-primary">
            <i class="ti-image me-2"></i>Task Image
        </label>
        
        @if($task->taskimage)
        <div class="current-image mb-2">
            <img src="{{ Storage::url('taskimages/' . $task->taskimage) }}" 
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
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="ti-trash me-2"></i>Delete Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
@endforeach


<!-- Users Modal for all usersWazid -->
<div class="modal fade" id="viewUsersModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                <h4 class="mb-2">
                    <i class="bi bi-people-fill me-2"></i>All Users
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
                    <!-- Add pagination container -->
                    <div id="userPagination" class="mt-3"></div>
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

<!-- ALL TASKS -->
<div class="modal fade" id="tasksModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header-custom bg-gradient-blue text-white p-4 text-center">
                <h4 class="mb-2">
                    <i class="fas fa-file-signature"></i> All Tasks
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Created By</th>
                            </tr>
                        </thead>
                        <tbody id="tasksTableBody">
                            <tr>
                                <td colspan="6" class="text-center">Loading tasks...</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Add this pagination container -->
                    <div id="tasksPagination" class="mt-3"></div>
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
<!-- Custom JS -->
<script src="{{ asset('js/admin.js') }}"></script>


<script>
    $(document).ready(function() {
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

    function loadUsers(page) {
        $.ajax({
            url: `{{ route("admin.get.users") }}?page=${page}`,
            method: 'GET',
            success: function(response) {
                let tbody = '';
                response.users.data.forEach(function(user) {
                    let isChecked = user.enable === 0 ? 'checked' : '';
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
                updatePagination(response.users);
                setupStatusToggle();
            }
        });
    }

    function updatePagination(userData) {
        let pagination = '<ul class="pagination justify-content-center">';
        
        for (let i = 1; i <= userData.last_page; i++) {
            pagination += `
                <li class="page-item ${userData.current_page === i ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;
        }

        pagination += '</ul>';
        $('#userPagination').html(pagination);
    }

    function setupStatusToggle() {
        $('.user-status').off('change').on('change', function() {
            const checkbox = $(this);
            const statusLabel = checkbox.siblings('.status-label');
            const userId = checkbox.data('user-id');
            const newStatus = checkbox.prop('checked') ? 0 : 1;

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
                            location.reload();
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

    $('#viewUsersModal').on('show.bs.modal', function() {
        loadUsers(1);
    });

    $(document).on('click', '#userPagination .page-link', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        loadUsers(page);
    });
});
</script>

<script>
     $(document).ready(function() {
    function updateTaskCount() {
        $.ajax({
            url: '{{ route("admin.get.tasks") }}',
            method: 'GET',
            success: function(response) {
                $('#taskCount').text(response.taskCount);
            }
        });
    }

    updateTaskCount();

    let currentPage = 1;

    function loadTasks(page) {
        $.ajax({
            url: `{{ route("admin.get.tasks") }}?page=${page}`,
            method: 'GET',
            success: function(response) {
                let tbody = '';
                response.tasks.data.forEach(function(task) {
                    tbody += `
                        <tr>
                            <td title="${task.title}">${task.title}</td>
                            <td title="${task.description}">${task.description}</td>
                            <td><span class="badge bg-${getPriorityColor(task.priority)}">${task.priority}</span></td>
                            <td><span class="badge bg-${getStatusColor(task.status)}">${task.status}</span></td>
                            <td>${new Date(task.due_date).toLocaleDateString()}</td>
                            <td>${task.user ? task.user.name : 'Unassigned'}</td>
                        </tr>
                    `;
                });
                $('#tasksTableBody').html(tbody);
                
                // Update pagination
                updatePagination(response.tasks);
            }
        });
    }

    function updatePagination(tasksData) {
        let pagination = '<ul class="pagination justify-content-center">';
        
       

        // Page Numbers
        for (let i = 1; i <= tasksData.last_page; i++) {
            pagination += `
                <li class="page-item ${tasksData.current_page === i ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;
        }

       

        pagination += '</ul>';
        $('#tasksPagination').html(pagination);
    }

    $('#tasksModal').on('show.bs.modal', function() {
        loadTasks(1);
    });

    // Handle pagination clicks
    $(document).on('click', '#tasksPagination .page-link', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        loadTasks(page);
    });

    function getPriorityColor(priority) {
        const colors = {
            'high': 'danger',
            'medium': 'warning',
            'low': 'info'
        };
        return colors[priority.toLowerCase()] || 'secondary';
    }

    function getStatusColor(status) {
        const colors = {
            'pending': 'warning',
            'in_progress': 'info',
            'completed': 'success'
        };
        return colors[status.toLowerCase()] || 'secondary';
    }
});
  
</script>


</body>

</html>

