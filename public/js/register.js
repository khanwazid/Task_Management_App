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
