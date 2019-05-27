
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title>Sistem RW | RW</title>

        <link rel="shortcut icon" href="<?= base_url() ?>images/logo.png">

        <link href="<?= base_url() ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets2/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets2/css/style.css" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="<?= base_url().'assets2/plugins/toastr/toastr.min.css' ?>">

    </head>


    <body class="fixed-left small-menu">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><img src="<?= base_url().'image/logo-main-1.png' ?>" style="width: 90%; height: auto" alt="logo-img"></a>
                        <a href="index.html" class="logo-sm"><img src="<?= base_url() ?>image/logo.png" alt="logo-img"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="mdi mdi-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <img src="<?= base_url().'image/logo-small-I.png' ?>" alt="user-img" class="img-circle">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" id="btn_pass">Ganti Password </a></li>
                                        <li><a href="<?= base_url().'auth/logout'?>"> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- <div class="user-details">
                        <div class="pull-left">
                            <img src="<?= base_url() ?>assets2/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">David Cooper <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Admin</p>
                        </div>
                    </div> -->
                    <!--- Divider -->


                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="#/dashboard" class="waves-effect"><i class="mdi mdi-home"></i><span> Beranda </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Pengajuan </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#/domisili">Surat Domisili</a></li>
                                    <li><a href="#/kehilangan">Surat Kehilangan</a></li>
                                    <li><a href="#/kematian">Surat Kematian</a></li>
                                    <li><a href="#/pindah">Surat Pindah</a></li>
                                    <li><a href="#/ktp">Pembuatan KTP</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#/keluarga" class="waves-effect"><i class="mdi mdi-account"></i><span> Keluarga </span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content" id="content">

                    

                </div> <!-- content -->

                <div class="modal animated bounceInDown delay-2s" id="modal_pass">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title">Ganti Password</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="form_pass">
                          <div class="form-group">
                            <label class="form-label"  >Password lama</label>
                            <input type="password" class="form-control" id="old_pass" name="old_pass" />
                          </div>
                          <div class="form-group">
                            <label class="form-label " >Password Baru</label>
                            <input type="password" class="form-control" id="new_pass" name="new_pass" />
                          </div>
                          <div class="form-group">
                            <label class="form-label">Ulangi Password</label>
                            <input type="password" class="form-control" id="rtp_pass" name="rtp_pass" />
                          </div>
                          <div class="form-grup">
                            <center><button type="submit" class="btn btn-primary" id="submit">Simpan</button></center>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <footer class="footer" style="left: -10px">
                    © 2019 Sistem RW - All Rights Reserved.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


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
        
        <script src="<?= base_url().'assets2/plugins/toastr/toastr.min.js' ?>" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets2/js/app.js"></script>

         <script type="text/javascript">

      $(document).ready(function()
      {
        var href;

        function load_content(link)
        {
          $.get(`<?= base_url().'rw/' ?>${link}`,function(content)
          {
            $('#content').html(content);
          });
        }

//Load halaman with URL
        if(location.hash)
        {
          href = location.hash.substr(2);
          load_content(href);
        }else
        {
          location.hash ='#/dashboard';
        }

// load halaman with Navigasi
        $(window).on('hashchange',function(){
          href = location.hash.substr(2);
          load_content(href);
        });


// modal bootstrap
        $("#btn_pass").on('click',function(){
          $("#modal_pass").modal('show');
          $('#form_pass')[0].reset();
        });

//Function validasi untuk ganti password
        $('#form_pass').on('submit',function(e){
          e.preventDefault(); //Mematikan loading

          var submit = true;

          $(this).find('#old_pass, #new_pass, #rtp_pass').each(function(){
            if($(this).val() == ''){
              submit = false;
            }else{
              submit = true;
            }
          });

          if (submit == true ) {
            if ($('#new_pass').val() != $('#rtp_pass').val() ){
              toastr.warning('Password baru tidak sama')
            }else {

              $.ajax({
                url: '<?= base_url().'auth/ganti_password' ?>',
                type: 'POST',
                data: $(this).serialize(),
                beforeSend: function(){
                  $('#submit').addClass('btn-loading');
                },
                success: function(data){
                  if(data == 'berhasil'){
                    toastr.success('Password berhasil di perbaharui');
                    $('#submit').removeClass('btn-loading');
                    $('#modal_pass').modal('hide');
                  } else {
                    toastr.error('Password tidak berhasil di perbaharui');
                    $('#submit').removeClass('btn-loading');
                    $('#modal_pass').modal('hide');
                  }

                }, error: function(){
                  toastr.success('Password tidak berhasil di perbaharui')
                }
              })
            }
          }else{
            toastr.error('Masukkan Password')
          }
        });
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
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

      });

    </script>

    </body>
</html>