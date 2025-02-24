
$(document).ready(function() {
  $("#loginForm").validate({
      rules: {
          email: {
              required: true,
              email: true,
              maxlength: 255
          },
          password: {
              required: true,
              minlength: 8,
              maxlength: 255
          }
      },
      messages: {
          email: {
              required: "Please enter your email address",
              email: "Please enter a valid email address",
              maxlength: "Email cannot exceed 255 characters"
          },
          password: {
              required: "Please enter your password",
              minlength: "Password must be at least 8 characters long",
              maxlength: "Password cannot exceed 255 characters"
          }
      },
      errorElement: 'div',
      errorClass: 'invalid-feedback d-block',
      highlight: function(element) {
          $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function(element) {
          $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorPlacement: function(error, element) {
          error.insertAfter(element);
      }
  });

  // Force Laravel validation errors to be visible
  $(".invalid-feedback").addClass('d-block');
});


  document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
          document.querySelector('.skeleton-loader').style.display = 'none';
          document.querySelector('.content-loaded').style.display = 'block';
      }, 1500); // Show skeleton for 1.5 seconds
  });
  
  // Show skeleton when navigating away
  window.addEventListener('beforeunload', function() {
      document.querySelector('.skeleton-loader').style.display = 'block';
      document.querySelector('.content-loaded').style.display = 'none';
  });
 