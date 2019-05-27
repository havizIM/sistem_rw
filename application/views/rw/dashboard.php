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
                                     <p>Selamat Datang di Sistem Kami, Ketua RW 010  . </p>
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

                                <div class="col-sm-12 col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-title">Daftar Pengajuan</div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table card-table table-vcenter text-wrap" id="t_pengajuan">
                                                <thead>
                                                    <tr>
                                                    <th class="w-1">#</th>
                                                    <th>No.Kartu Keluarga</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th class="text-wrap">Keperluan</th>
                                                    <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

<div class="modal animated bounceInDown delay-2s" id="modal_dokumen">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Dokumen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_data">
          <input type="hidden" name="no_pengajuan" id="no_pengajuan">
          <div class="form-group">
            <label for="form-label">Diambil Oleh</label>
            <input type="text" name="diambil_oleh" id="diambil_oleh" class="form-control">
          </div>
          <div class="form-group">
            <label for="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-info btn-md" id="submit">Submit</button>
            <button type="button" class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
          </div>
        </form>
      </div>
      <div class="modal-footer" id="content_btn"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function load_data(cari)
  {
    $.ajax({
      url: '<?= base_url().'api/select_pengajuan' ?>',
      type: 'POST',
      dataType: 'JSON',
      success: function(data){
        var html = '';
        var no = 1;

        if(data.pengajuan.length != 0){
          $.each(data.pengajuan, function(k,v){
            html += `<tr>`;
            html += `<td>${no++}</td>`;
            html += `<td>${v.no_pengajuan}</td>`;
            html += `<td>${v.NIK}</td>`;
            html += `<td>${v.nama_pengajuan}</td>`;
            html += `<td>${v.keperluan}</td>`;
            html += `<td><button class="btn btn-info btn-md" id="add_dokumen" data-id="${v.no_pengajuan}"><i class="fa fa-check"></i> Lihat</button></td>`;
            html += `</tr>`;
          });

        } else {
          html += `<tr><td colspan="6" align="center">Tidak ada pengajuan</td></td>`
        }

        $.each(data.summary, function(k,v){
          $('#jml_keluarga').text(v.jml_keluarga);
          $('#jml_pengajuan').text(v.jml_pengajuan);
        });

        $('#t_pengajuan tbody').html(html);
      },
      error: function(){
        alert('Halaman tidak dapat di akses');
      }
    });
  }

  $(document).ready(function(){
    load_data();

    $(document).on('click', '#add_dokumen', function(){
      $('#modal_dokumen').modal('show');
      $('#no_pengajuan').val($(this).data('id'));
    });

    $('#form_data').on('submit', function(e){
      e.preventDefault();
      submit = true;

      $(this).find('#diambil_oleh, #keterangan, #tgl_pengambilan, #no_pengajuan').each(function(){
        if($(this).val() === ''){
          submit = false;
        } else {
          submit = true;
        }
      });

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'api/add_dokumen' ?>',
          type: 'POST',
          data: $(this).serialize(),
          beforeSend: function(){
            $('#submit').addClass('btn-loading');
          },
          success: function(data){
            if(data == 'berhasil'){
              toastr.info('Berhasil menambah Dokumen', 'Berhasil');
              $('#modal_dokumen').modal('hide');
              load_data();
            } else {
              toastr.error('Gagal menambah Dokumen', 'Failed');
            }
            $('#submit').removeClass('btn-loading');
          },
          error: function(){
            toastr.error('Tidak dapat mengakses halaman', 'Error');
          }
        })
      } else {
        toastr.error('Silahkan mengisi data dengan lengkap', 'Error');
      }
    });

  });
</script>
