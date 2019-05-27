
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title>Sistem RW | Login</title>

        <link rel="shortcut icon" href="<?= base_url() ?>assets2/images/favicon.ico">

        <link href="<?= base_url() ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?= base_url() ?>assets2/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets2/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= base_url().'assets2/plugins/toastr/toastr.min.css' ?>">

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">

                <div class="panel-body">
                    <h3 class="text-center m-t-0 m-b-15">
                        <a class="logo"><img src="<?= base_url().'image/logo-main-1.png' ?>" alt="logo-img" style="width: 90%; height: 50%"></a>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>Log In</b></h4>

                    <form class="form-horizontal m-t-20" id="form-login">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" placeholder="Password" id="password" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" class="show_pass">
                                    <label for="checkbox-signup">
                                        Show Pass
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit" id="btn_submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



        <!-- jQuery  -->
        <script src="<?= base_url() ?>assets2/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets2/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets2/js/modernizr.min.js"></script>
        <script src="<?= base_url() ?>assets2/js/detect.js"></script>
        <script src="<?= base_url() ?>assets2/js/fastclick.js"></script>
        <script src="<?= base_url() ?>assets2/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url() ?>assets2/js/jquery.blockUI.js"></script>
        <script src="<?= base_url() ?>assets2/js/waves.js"></script>
        <script src="<?= base_url() ?>assets2/js/wow.min.js"></script>
        <script src="<?= base_url() ?>assets2/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url() ?>assets2/js/jquery.scrollTo.min.js"></script>
        <script src="<?= base_url().'assets2/plugins/toastr/toastr.min.js' ?>"></script>

        <script src="<?= base_url() ?>assets2/js/app.js"></script>
        <script type="text/javascript">
    // function validasi
    $(document).ready(function(){
      $('#form-login').on('submit',function(e){
        e.preventDefault(); //function untuk mematikan loading

        var submit = true;
//function menciari data sudah terisi / belum
        $(this).find('#no_kk, #password').each(function(){
          if ($(this).val() == '' ) {
            submit = false;
          }else {
            submit = true;
          }
        });

//function Validasi login with Ajax
          if (submit == true ) {
            $.ajax({
              url: '<?= base_url().'auth/cekLogin' ?>',
              type: 'POST',
              cache: false,
              beforeSend: function(){
                $('#btn_submit').html('<i class="fa fa-spinner fa-spin></i>');
              },
              data: $(this).serialize(),
              success:function(respons){
                if (respons == 'berhasil'){
                  window.location = '<?= base_url().'main/' ?>';
                }else {
                  toastr.error('Email atau Password salah','Error');
                  $('#btn_submit').html('Login');
                }

              },
              error: function(){
                $('#btn_submit').text('Login');
              }
            });
          }else{
            toastr.warning('Silahkan masukkan Email dan Password');
          }
      });
      toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
      }

// Function Show Password
    $('.show_pass').click(function(){
      if ($(this).is(':checked')) {
        $('#password').attr('type','text');
      }else{
        $('#password').attr('type','password');
      }
    });
    });

    </script>

    </body>
</html>