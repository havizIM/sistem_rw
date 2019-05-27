<div class="">
    <div class="page-header-title">
        <h4 class="page-title">Detail Keluarga</h4>
    </div>
</div>

<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Kartu Keluarga</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter" style="font-size: 12px">
                            <tbody>
                                <tr>
                                <td> <i class="fa fa-user text-blue"></i> Nama Kepala Keluarga </td>
                                <td>:</td>
                                <td id="kepala_keluarga"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-address-card text-blue"></i> Alamat </td>
                                <td>:</td>
                                <td id="alamat"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-tags text-blue"></i> RT/RW </td>
                                <td>:</td>
                                <td id="rtrw"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-tags text-blue"></i> Desa/Kelurahan</td>
                                <td>:</td>
                                <td id="kelurahan"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-tags text-blue"></i> Kecamatan</td>
                                <td>:</td>
                                <td id="kecamatan"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-tags text-blue"></i> Kabupaten/Kota</td>
                                <td>:</td>
                                <td id="kota"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-envelope text-blue"></i> Kode Pos </td>
                                <td>:</td>
                                <td id="kode_pos"></td>
                                </tr>
                                <tr>
                                <td> <i class="fa fa-tags text-blue"></i> Provinsi</td>
                                <td>:</td>
                                <td id="provinsi"></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Anggota Keluarga</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter" style="font-size: 12px" id="t_anggota">
                            <thead>
                                <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>Agama</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th><button type="button" class="btn btn-primary btn-md" id="btn_tambah"> <i class="fa fa-plus"></i> Tambah</button></th>
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

<div class="modal animated bounceInDown delay-2s" id="modal-anggota">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-anggota">
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label for="" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik"  id="nik" minlength="16" maxlength="16">
                <input type="hidden" name="no_kk" id="no_kk" value="<?= $no_kk ?>">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" >
              </div>
              <div class="form-group">
                <label for="" class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                  <option value="">-- Pilih Jenis Kelamin--</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
                <div class="form-group">
                  <label for="" class="form-label">Tempat</label>
                  <input type="text" class="form-control" name="tempat_lahir"  id="tempat_lahir">
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir"  id="tgl_lahir">
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Agama</label>
                  <select class="form-control" name="agama" id="agama">
                    <option value="">--Pilih Agama--</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Pendidikan </label>
                  <input type="text" class="form-control" name="pendidikan" id="pendidikan" >
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" >
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="" class="form-label">Status Perkawinan</label>
                <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                  <option value="">--Pilih Status--</option>
                  <option value="Kawin">Kawin</option>
                  <option value="Belum Kawin">Belum Kawin</option>
                </select>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Status Keluarga</label>
                <select class="form-control" name="status_keluarga" id="status_keluarga">
                  <option value="">--Pilih Status--</option>
                  <option value="Kepala Keluarga">Kepala Keluarga</option>
                  <option value="Istri">Istri</option>
                  <option value="Anak">Anak</option>
                </select>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Kewarganegaraan</label>
                <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                  <option value="">--Pilih Warganegara--</option>
                  <option value="WNI">WNI</option>
                  <option value="WNA">WNA</option>
                </select>
              </div>
              <div class="form-group">
                <label for="" class="form-label">No Passpor</label>
                <input type="number" class="form-control" name="no_paspor" id="no_paspor" >
              </div>
              <div class="form-group">
                <label for="" class="form-label">No Kitap</label>
                <input type="number" class="form-control" name="no_kitap" id="no_kitap" >
              </div>
              <div class="form-group">
                <label for="" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" >
              </div>
              <div class="form-group">
                <label for="" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" >
              </div>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" class="" name="button" id="submit"></button>
            <button type="button" class="btn btn-lg btn-danger" name="button" id="batal">Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    function load_anggota()
    {
      $.ajax({
        url: '<?= base_url().'api/select_anggota/'.$no_kk ?>',
        type: 'GET',
        dataType: 'JSON',
        success: function(data){
          var anggota = '';

          $.each(data.keluarga, function(k, v){
            $('#no_kk').text(v.no_kk);
            $('#kepala_keluarga').text(v.nama);
            $('#alamat').text(v.alamat);
            $('#rtrw').text(v.rtrw);
            $('#kelurahan').text(v.kelurahan);
            $('#kecamatan').text(v.kecamatan);
            $('#kota').text(v.kotamadya);
            $('#kode_pos').text(v.kode_pos);
            $('#provinsi').text(v.provinsi);
          });

          $.each(data.anggota, function(k,v){

            anggota += `<tr>`
              anggota += `<td>${v.NIK}</td>`;
              anggota += `<td>${v.nama}</td>`;
              anggota += `<td>${v.jenis_kelamin}</td>`;
              anggota += `<td>${v.tempat_lahir}, ${v.tgl_lahir}</td>`;
              anggota += `<td>${v.agama}</td>`;
              anggota += `<td>${v.pendidikan}</td>`;
              anggota += `<td>${v.pekerjaan}</td>`;
              anggota += `<td>`;
              anggota += `<button type="button" class="btn btn-sm btn-success" name="button" id="btn_edit" data-nik="${v.NIK}" data-nama="${v.nama}" data-jenis_kelamin="${v.jenis_kelamin}" data-tempat_lahir="${v.tempat_lahir}" data-tgl_lahir="${v.tgl_lahir}" data-agama="${v.agama}" data-pendidikan="${v.pendidikan}" data-pekerjaan="${v.pekerjaan}" data-status_perkawinan="${v.status_perkawinan}" data-status_keluarga="${v.status_keluarga}" data-kewarganegaraan="${v.kewarganegaraan}" data-no_paspor="${v.no_paspor}" data-no_kitap="${v.no_kitap}" data-nama_ayah="${v.nama_ayah}" data-nama_ibu="${v.nama_ibu}"><i class="fa fa-edit"></i></button>`;
              anggota += ` <button type="button" class="btn btn-sm btn-danger" name="button" id="btn_hapus" data-id="${v.NIK}"><i class="fa fa-trash"></i></button>`;
              anggota += `</td>`
            anggota += `</tr>`

          });

          $('#t_anggota tbody').html(anggota);
        },
        error: function(){
          alert('Tidak dapat mengakses Halaman');
        }
      })
    }


    $(document).ready(function(){
      load_anggota();

      var save_method;

      $('#btn_tambah').on('click',function(){
        save_method = 'add';
        $('#modal-anggota').modal('show');
        $('.modal-title').text('Tambah Anggota Keluarga');
        $('#form-anggota')[0].reset();
        $('#submit').text('Simpan').removeClass().addClass('btn btn-lg btn-info');
      });

      $(document).on('click', '#btn_edit' ,function(){

        save_method = 'edit';
        $('.modal-title').text('Edit Anggota Keluarga');
        $('#modal-anggota').modal('show');
        $('#nik').val($(this).data('nik'));
        $('#nama').val($(this).data('nama'));
        $('#jenis_kelamin').val($(this).data('jenis_kelamin'));
        $('#tempat_lahir').val($(this).data('tempat_lahir'));
        $('#tgl_lahir').val($(this).data('tgl_lahir'));
        $('#agama').val($(this).data('agama'));
        $('#pendidikan').val($(this).data('pendidikan'));
        $('#pekerjaan').val($(this).data('pekerjaan'));
        $('#status_perkawinan').val($(this).data('status_perkawinan'));
        $('#status_keluarga').val($(this).data('status_keluarga'));
        $('#kewarganegaraan').val($(this).data('kewarganegaraan'));
        $('#no_paspor').val($(this).data('no_paspor'));
        $('#no_kitap').val($(this).data('no_kitap'));
        $('#nama_ayah').val($(this).data('nama_ayah'));
        $('#nama_ibu').val($(this).data('nama_ibu'));
        $('#submit').text('Edit').removeClass().addClass('btn btn-lg btn-success');
      });

      $('#batal').on('click',function(){
        $('#modal-anggota').modal('hide');
      });

      $('#form-anggota').on('submit', function(e){
        e.preventDefault();
        var submit = true;

        if(save_method === 'add'){
          link = '<?= base_url().'api/add_anggota' ?>';
        } else {
          link = '<?= base_url().'api/edit_anggota' ?>';
        }

        $(this).find('#nik, #nama, #jenis_kelamin, #tempat_lahir, #tgl_lahir, #agama, #pendidikan, #pekerjaan, #status_perkawinan, #status_keluarga, #kewarganegaraan, #nama_ayah, #nama_ibu').each(function(){
          if($(this).val() === ''){
            submit = false;
          } else {
            submit = true;
          }
        });

        if(submit == true){
          $.ajax({
            url: link,
            type: 'POST',
            data: $('#form-anggota').serialize(),
            beforeSend: function(){
              $('#submit').addClass('btn-loading');
            },
            success: function(data){
              if(data == 'berhasil'){
                toastr.info('Berhasil menambah Anggota Keluarga', 'Success');
              } else {
                toastr.error('Gagal menambah Anggota Keluarga', 'Failed');
              }

              load_anggota();
              $('#modal-anggota').modal('hide');
              $('#submit').removeClass('btn-loading');
            },
            error: function(){
              toastr.error('Tidak dapat mengakses halaman', 'Error')
            }
          })
        } else {
          toastr.warning('Harap isi form dengan lengkap', 'Warning');
        }
      });

      $(document).on('click', '#btn_hapus',function(){
        var id = $(this).data('id');
        var konfirmasi = confirm('Apakah Anda yakin ingin menghapus data ini ?');

        if(konfirmasi){
          $.ajax({
            url: '<?= base_url().'api/hapus_anggota/' ?>'+id,
            type: 'GET',
            success: function(data){
              if(data == 'berhasil'){
                toastr.info('Berhasil menghapus Anggota Keluarga', 'Success');
              } else {
                toastr.error('Gagal menghapus Anggota Keluarga', 'Failed');
              }

              load_anggota();
            },
            error: function(){
              toastr.error('Tidak dapat mengakses halaman', 'Error');
            }
          });
        }
      });
    });

  </script>