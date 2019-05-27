                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Beranda</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <marquee behavior="slide" direction="right" scrollamount="20" speed="fast" loop="1">
                                        <div class="alert alert-info">
                                            <p>Selamat Datang di Sistem Kami, Ketua RT <?= $this->session->userdata('rtrw') ?>  . </p>
                                        </div>
                                    </marquee>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="panel text-center">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-muted font-light">Total Pengajuan</h4>
                                        </div>
                                        <div class="panel-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-file text-info m-r-10"></i><b id="jml_pengajuan">0</b></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-6">
                                    <div class="panel text-center">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-muted font-light">Jumlah Keluarga</h4>
                                        </div>
                                        <div class="panel-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-account text-success m-r-10"></i><b id="jml_keluarga">0</b></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                    <script type="text/javascript">
                        function loadProfile()
                        {
                            $.ajax({
                                url: '<?= base_url().'api/profile_keluarga' ?>',
                                type: 'GET',
                                dataType: 'JSON',
                                success: function(data){
                                    $('#jml_keluarga').text(data.anggota.length)
                                },
                                error: function(){
                                alert('Tidak dapat mengakses Halaman');
                                }
                            })
                        }

                        function loadPengajuan(){
                            $.ajax({
                                url: '<?= base_url().'api/show_pengajuan' ?>',
                                type: 'GET',
                                dataType: 'JSON',
                                success: function(data){
                                    $('#jml_pengajuan').text(data.pengajuan.length)
                                },
                                error: function(){
                                alert('Tidak dapat mengakses halaman');
                                }
                            })
                            }


                        $(document).ready(function(){
                            loadProfile();
                            loadPengajuan();
                        })
                    </script>