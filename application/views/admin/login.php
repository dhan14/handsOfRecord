<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hands Of Record | Log in</title>
  <link href='<?=base_url("assets/uploads/images/avatar.png"); ?>' rel='shortcut icon' type='image/x-icon' />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet"
    href="<?=base_url('assets');?>/vendor/AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.1.0/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
<b>Hands Of</b>Record
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk</p>

        <form action="" role="form" id="quickForm" method="post">
        <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group mb-3 kosong">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
      </div>
        <label for="username">Password</label>
        <div class="input-group mb-3 kosong">
          <input type="password" name="password"  class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
    
          <!-- /.col -->
          <div class="center" >
            <button type="button" id="" class="btn btn-info btn-block btn-flat"><span class="fa fa-sign-in-alt"></span> Sign In</button>
          </div>
          <!-- /.col -->
        <!-- </div> -->
      </form>
        <p class="mb-1">
          <a href="forgot-password.html">Lupa Password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Daftar</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>


<script>
  $("#login").on('click',function() {
      $.ajax({
        url : '<?php echo base_url('login/login') ?>',
        type : 'POST',
        data : $('#quickForm').serialize(),
        dataType : 'JSON',
        success : function(data) {
          if (data.status) {
            toastr.success('Login Berhasil!');
            var url = '<?php echo base_url('dashboard') ?>';
            window.location = url;
          }else if (data.error) {
            toastr.error(
              data.pesan
            );
          }else{
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid');
                    $('[name="'+data.inputerror[i]+'"]').closest('.kosong').append('<span></span>');
                    $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]).addClass('invalid-feedback');
                }
          }
        }
      });
      
  });

</script>
</body>

</html>