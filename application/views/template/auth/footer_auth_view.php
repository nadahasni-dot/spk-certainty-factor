<!-- jQuery -->
<script src="<?= base_url('assets/adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/adminlte'); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/adminlte'); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte'); ?>/dist/js/adminlte.min.js"></script>

<!-- script validasi registrasi form -->
<?php if ($title == "Registration") : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#registrationForm').validate({
                rules: {
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    confpassword: {
                        required: true
                    },
                },
                messages: {
                    username: {
                        required: "Please enter a username"
                    },
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    confpassword: {
                        required: "Please provide a confirmation password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
<?php endif; ?>

<!-- script validasi login form -->
<?php if ($title == "Login") : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,                        
                    },
                },
                messages: {
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",                        
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
<?php endif; ?>

<!-- script validasi login form -->
<?php if ($title == "Forgot Password") : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#forgotForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter a vaild email address"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
<?php endif; ?>

<!-- script validasi recover form -->
<?php if ($title == "Recover Password") : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#recoverForm').validate({
                rules: {                    
                    password: {
                        required: true,
                        minlength: 6
                    },
                    confpassword: {
                        required: true
                    },
                },
                messages: {                    
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    confpassword: {
                        required: "Please provide a confirmation password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
<?php endif; ?>
</body>

</html>