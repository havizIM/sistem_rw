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

<div class="modal animated bounceInDown delay-2s" id="modal_user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><center>Aktivasi User</center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_user">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input type="hidden" name="no_kk" id="no_kk2">
            <input type="email" class="form-control" id="email" name="email" />
          </div>
          <div class="form-group">
            <label class="form-label">Level</label>
            <select class="form-control" name="level" id="level">
              <option value="">--Pilih Level--</option>
              <option value="Warga">Warga</option>
              <option value="RT">RT</option>
            </select>
          </div>
          <div class="form-grup">
            <center><button type="submit" class="btn btn-primary">Simpan</button></center>
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
              html += `<td>${v.rtrw}</td>`;
              html += `<td>${v.alamat}, Kel. ${v.kelurahan} Kec. ${v.kecamatan}</td>`;
              html += `<td>${v.kode_pos}</td>`;
              html += `<td>${v.provinsi}</td>`;
              html += `<td>${v.kotamadya}</td>`;
              html += `<td>${v.jml_anggota}</td>`;
              html += `<td>`;
              html += `<a class="btn btn-info btn-md" href="#/anggota/${v.no_kk}"><i class="fa fa-search"></i> Detail</a>`;
              if(v.jml_user == 0){
                html += ` <button class="btn btn-success btn-md" id="btn_user" data-id="${v.no_kk}"><i class="fa fa-plus"></i> User</button>`;
              }
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
    load_data();

    $(document).on('click', '#btn_user', function(){
      $('#modal_user').modal('show');
      $('#no_kk2').val($(this).data('id'));
      $('#form_user')[0].reset();
    });

    $('#form_user').on('submit', function(e){
      e.preventDefault();

      $.ajax({
        url: '<?= base_url().'api/add_user' ?>',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data){
          if(data == 'berhasil'){
            toastr.info('Berhasil aktivasi User', 'Success');
          } else {
            toastr.error('Gagal aktivasi User', 'Error');
          }
          load_data();
          $('#modal_user').modal('hide');
        },
        error: function(){
          toastr.error('Gagal aktivasi User', 'Error');
        }
      });
    })

  });
</script>
