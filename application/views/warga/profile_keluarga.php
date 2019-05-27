<div class="">
    <div class="page-header-title">
        <h4 class="page-title">Profile Keluarga</h4>
    </div>
</div>

<div class="page-content-wrapper ">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>KARTU KELUARGA</h4></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter" >
                        <tbody>
                            <tr>
                            <td> <i class="fa fa-user text-pink"></i> Nama Kepala Keluarga </td>
                            <td>:</td>
                            <td id="kepala_keluarga"></td>
                            </tr>
                            <tr>
                            <td> <i class="fa fa-tags text-pink"></i> Alamat </td>
                            <td>:</td>
                            <td id="alamat"></td>
                            </tr>
                            <tr>
                            <td> <i class="fa fa-tags text-pink"></i> RT/RW </td>
                            <td>:</td>
                            <td id="rtrw"></td>
                            </tr>
                            <tr>
                            <td> <i class="fa fa-tags text-pink"></i> Desa/Kelurahan</td>
                            <td>:</td>
                            <td id="kelurahan"></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter" >
                        <tbody>

                            <tr>
                            <td> <i class="fa fa-tags text-pink"></i> Kecamatan</td>
                            <td>:</td>
                            <td id="kecamatan"></td>
                            </tr>
                            <tr>
                            <td> <i class="fa fa-tags text-pink"></i> Kabupaten/Kota</td>
                            <td>:</td>
                            <td id="kota"></td>
                            </tr>
                            <tr>
                            <td> <i class="fa fa-envelope text-pink"></i> Kode Pos </td>
                            <td>:</td>
                            <td id="kode_pos"></td>
                            </tr>
                            <tr>
                            <td> <i class="fa fa-tags text-pink"></i> Provinsi</td>
                            <td>:</td>
                            <td id="provinsi"></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">ANGGOTA KELUARGA</h4>
          </div>
          <div class="panel-body">
            <div class="row" id="anggota">
              <div class="table-responsive">
                <table class="table" id="t_keluarga">
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Agama</th>
                      <th>Pendidikan</th>
                      <th>Pekerjaan</th>
                      <th>Status Perkawinan</th>
                      <th>Status Keluarga</th>
                      <th>Kewarganegaraan</th>
                      <th>No Paspor</th>
                      <th>No Kitap</th>
                      <th>Nama Ayah</th>
                      <th>Nama Ibu</th>
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

<script type="text/javascript">

    function loadProfile()
    {
      $.ajax({
        url: '<?= base_url().'api/profile_keluarga' ?>',
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
            anggota += `<tr>`;
              anggota += `<td>${v.NIK}</td>`;
              anggota += `<td>${v.nama}</td>`;
              anggota += `<td>${v.jenis_kelamin}</td>`;
              anggota += `<td>${v.tempat_lahir}</td>`;
              anggota += `<td>${v.tgl_lahir}</td>`;
              anggota += `<td>${v.agama}</td>`;
              anggota += `<td>${v.pendidikan}</td>`;
              anggota += `<td>${v.pekerjaan}</td>`;
              anggota += `<td>${v.status_perkawinan}</td>`;
              anggota += `<td>${v.status_keluarga}</td>`;
              anggota += `<td>${v.kewarganegaraan}</td>`;
              anggota += `<td>${v.no_paspor}</td>`;
              anggota += `<td>${v.no_kitap}</td>`;
              anggota += `<td>${v.nama_ayah}</td>`;
              anggota += `<td>${v.nama_ibu}</td>`;
            anggota += `</tr>`;
          });

          $('#t_keluarga tbody').html(anggota);
        },
        error: function(){
          alert('Tidak dapat mengakses Halaman');
        }
      })
    }

    $(document).ready(function(){
      loadProfile();
    });


  </script>