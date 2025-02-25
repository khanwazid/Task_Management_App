 $(document).ready(function() {
    // Initialize modal with proper event handling
    $('#viewProfileModal .close, #viewProfileModal button[data-dismiss="modal"]').on('click', function() {
        $('#viewProfileModal').modal('hide');
    });
});


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


    $(document).ready(function() {
        $.validator.addMethod("fileSize", function(value, element, param) {
            return this.optional(element) || (element.files[0] && element.files[0].size <= param);
        }, "File size must be less than 2MB");
        
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
            },
            taskimage: {
                required: false, // Optional
                extension: "jpg|jpeg|png|gif",// Allowed file types
                fileSize: 2097152 // 2MB

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
            },
            taskimage: {
                extension: "Please upload a valid image file (jpg, jpeg, png, gif)"
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
    $('#taskimage').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').removeClass('d-none');
                $('#imagePreview img').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        } else {
            $('#imagePreview').addClass('d-none');
            $('#imagePreview img').attr('src', '');
        }
    });

    // Reset image preview when modal closes
    $('#createTaskModal').on('hidden.bs.modal', function () {
        $('#imagePreview').addClass('d-none');
        $('#imagePreview img').attr('src', '');
   
});
    // Reset form when modal closes
    $('#createTaskModal').on('hidden.bs.modal', function () {
        $('#createTaskForm').trigger('reset');
        $('#createTaskForm').validate().resetForm();
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
    });
});


    $(document).ready(function() {
        $.validator.addMethod("fileSize", function(value, element, param) {
            return this.optional(element) || (element.files[0] && element.files[0].size <= param);
        }, "File size must be less than 2MB");
        
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
                },
                taskimage: {
                    required: false, // Optional
                    extension: "jpg|jpeg|png|gif",// Allowed file types
                    fileSize: 2097152 // 2MB
    
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
                },
                taskimage: {
                    extension: "Please upload a valid image file (jpg, jpeg, png, gif)"
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
    $('.delete-image').on('click', function(e) {
        e.preventDefault();
        
        const taskId = $(this).data('task-id');
        const imageContainer = $(this).closest('.current-image');
        
        if (confirm('Are you sure you want to delete this image?')) {
            $.ajax({
                url: `/tasks/${taskId}/delete-image`,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        imageContainer.remove();
                    }
                },
                error: function() {
                    alert('Error deleting image. Please try again.');
                }
            });
        }
    });

    // Store original values when page loads
    $("form[id^='editTaskForm']").each(function() {
        $(this).find('input, textarea, select').each(function() {
            $(this).data('original-value', $(this).val());
        });
    });
});


    $(document).ready(function() {
    // Initialize Bootstrap dropdowns
    $('.dropdown-toggle').dropdown();
    
    // Optional: Add click handler for profile image
    $('.nav-profile').click(function(e) {
        e.preventDefault();
        $(this).find('.dropdown-menu').toggleClass('show');
    });
});


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
    
    
    
        // Reset form when modal is closed
        $('#changePasswordModal').on('hidden.bs.modal', function () {
            $('#changePasswordForm')[0].reset();
        });
      
            
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
       
$(document).ready(function() {
    $('#changePasswordModal .close, #changePasswordModal button[data-dismiss="modal"]').on('click', function() {
        $('#changePasswordModal').modal('hide');
    });
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

function showFullDescription(button) {
    const cell = button.closest('.description-cell');
    cell.classList.toggle('expanded');
}


    function showFullTitle(button) {
    const cell = button.closest('.title-cell');
    cell.classList.toggle('expanded');
}


    function deleteProfileImage() {
    if (confirm('Are you sure you want to delete your profile picture?')) {
        document.getElementById('delete_image').value = '1';
        document.getElementById('imagePreview').src = '';
        document.getElementById('imagePreview').innerHTML = '<i class="fas fa-user-circle"></i>';
        document.getElementById('imagePreview').className = 'profile-placeholder rounded-circle border shadow d-flex align-items-center justify-content-center';
    }
}


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
                'action': `/tasks/notes/${noteId}`
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
