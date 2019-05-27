<div class="">
    <div class="page-header-title">
        <h4 class="page-title">Keluarga</h4>
    </div>
</div>

<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <h4>Data Keluarga</h4>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-wrap" id="t_keluarga" style="font-size: 12px">
                                <thead>
                                    <tr>
                                    <th class="w-1">#</th>
                                    <th>No.KK</th>
                                    <th>Alamat</th>
                                    <th class="text-wrap">Kode POS</th>
                                    <th>Provinsi</th>
                                    <th>Kotamadya</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Jml Anggota</th>
                                    <th><button type="button" id="btn_add" class="btn btn-default btn-md"><i class="fa fa-plus"></i> Tambah</button></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal animated bounceInDown delay-2s" id="modal_keluarga">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="judul" ></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_keluarga">
          <div class="form-group">
            <label class="form-label">No. KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" minlength="16" maxlength="16"/>
          </div>
          <div class="form-group">
            <label class="form-label">Tanggal KK</label>
            <input type="date" class="form-control" id="tgl_kk" name="tgl_kk" />
          </div>
          <div class="form-group">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" rows="8" cols="80" class="form-control"></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="" id="submit"></button>
            <button type="button" class="btn btn-danger" id="batal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function load_data(cari){
    $.ajax({
      url: '<?= base_url().'api/select_keluarga' ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {cari: cari},
      success: function(data){
        var html = '';
        var no = 1;

        if(data.keluarga.length != 0){
          $.each(data.keluarga, function(k,v){
            html += `<tr>`;
              html += `<td>${no++}</td>`;
              html += `<td>${v.no_kk}</td>`;
              html += `<td>${v.alamat}</td>`;
              html += `<td>${v.kode_pos}</td>`;
              html += `<td>${v.provinsi}</td>`;
              html += `<td>${v.kotamadya}</td>`;
              html += `<td>${v.kecamatan}</td>`;
              html += `<td>${v.kelurahan}</td>`;
              html += `<td>${v.jml_anggota}</td>`;
              html += `<td>`;
              html += `<a class="btn btn-info btn-md" href="#/anggota/${v.no_kk}"><i class="fa fa-search"></i></a>`;
              html += ` <button class="btn btn-success btn-md" id="btn_edit" data-id="${v.no_kk}" data-tgl_kk="${v.tgl_kk}" data-alamat="${v.alamat}"><i class="fa fa-pencil"></i></button>`;
              html += ` <button class="btn btn-danger btn-md btn_hapus" data-id="${v.no_kk}"><i class="fa fa-trash"></i></button>`;
              html += `</td>`;
            html += `</tr>`;
          });
        } else {
          html += `<tr>`;
          html += `<td colspan="10" align="center">Tidak ada data keluarga</td>`;
          html += `</tr>`;
        }

        $('#t_keluarga tbody').html(html);
      },
      error: function(){
        alert('Tidak dapat mengakses halaman');
      }
    })
  }

  $(document).ready(function(){
    var save_method;
    load_data();

    $('#btn_add').on('click', function(){
      save_method = 'add';
      $('#no_kk').val($(this).data('id')).prop('readonly', false);
      $('#modal_keluarga').modal('show');
      $('#form_keluarga')[0].reset();
      $('#judul').text('Tambah Data Keluarga');
      $('#submit').removeClass().addClass('btn btn-info btn-md').text('Simpan');
    });

    $(document).on('click', '#btn_edit', function(){
      save_method = 'edit';
      $('#no_kk').val($(this).data('id')).prop('readonly', true);
      $('#tgl_kk').val($(this).data('tgl_kk'));
      $('#alamat').val($(this).data('alamat'));
      $('#judul').text('Edit Data Keluarga');
      $('#submit').removeClass().addClass('btn btn-success btn-md').text('Edit');
      $('#modal_keluarga').modal('show');
    })

    $('#batal').on('click', function(){
      $('#modal_keluarga').modal('hide');
    });

    $('#form_keluarga').on('submit', function(e){
      e.preventDefault();
      var submit = true;

      $(this).find('#no_kk, #tgl_pengajuan, #alamat, #rtrw').each(function(){
        if($(this).val() == ''){
          submit = false;
        } else {
          submit = true;
        }
      });

      if(submit == true){
        if(save_method == 'add'){
          var link = '<?= base_url().'api/add_keluarga' ?>'
        } else if(save_method == 'edit'){
          var link = '<?= base_url().'api/edit_keluarga' ?>'
        }

        $.ajax({
          url: link,
          type: 'POST',
          data: $(this).serialize(),
          beforeSend: function(){
            $('#submit').addClass('btn-loading');
          },
          success: function(data){
            if(data == 'berhasil'){
              toastr.success('Berhasil menambah data keluarga', 'Success');
            } else {
              toastr.error('Gagal menambah data keluarga', 'Failed');
            }

            $('#submit').removeClass('btn-loading');
            $('#modal_keluarga').modal('hide');
            load_data();
          },
          error: function(){
            toastr.warning('Halaman tidak dapat diakses', 'Failed');
          }
        })
      } else {
        toastr.warning('Silahkan isi form dengan lengkap', 'Failed');
      }
    });

    $(document).on('click', '.btn_hapus', function(){
      var id = $(this).data('id');
      var konfirmasi = confirm('Apakah anda yakin akan menghapus data ini ?');

      if(konfirmasi){
        $.ajax({
          url: '<?= base_url().'api/hapus_keluarga/' ?>'+id,
          type: 'GET',
          success: function(data){
            if(data == 'berhasil'){
              toastr.info('Berhasil menghapus Data Keluarga', 'Success');
              load_data();
            } else {
              toastr.error('Gagal menghapus Data Keluarga', 'Failed');
            }
          },
          error: function(){
            toastr.error('Tidak dapat mengakses halaman', 'Error');
          }
        });
      }
    });
  });
</script>