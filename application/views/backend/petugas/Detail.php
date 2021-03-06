<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Detail Data Petugas</h2>
          <!-- <small class="text-muted">Id Petugas : <?php echo $this->uri->segment(4); ?></small> -->
      </div>
        <div class="col-md-4">
          <center>
            <a href="<?php echo site_url('backend/petugas'); ?>"  class="btn btn-raised btn-info">Kembali ke tabel petugas</a>
          </center>
        </div>
        </div>
      </div>
      <?php if($this->session->flashdata('sukses')!=''){ ?>
        <div class="alert bg-green alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Petugas berhasil diperbarui!
      </div>
      <?php } ?>
        <div class="row clearfix js-sweetalert">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Biodata Lengkap</h4>
                    <?php foreach ($petugas as $item) { ?>
                    <table class="table" border="0">
                      <tr>
                        <td width="25%">Nama </td>
                        <td>:</td>
                        <td><?php echo $item->nama_lengkap; ?></td>
                      </tr>
                      <tr>
                        <td width="25%">NIP </td>
                        <td>:</td>
                        <td><?php echo $item->NIP; ?></td>
                      </tr>
                        <tr>
                          <td width="25%">NPWP </td>
                          <td>:</td>
                          <td><?php echo $item->NPWP; ?></td>
                        </tr>
                        <tr>
                        <td width="25%">Jabatan </td>
                        <td>:</td>
                        <td><?php echo $item->jabatan; ?></td>
                      </tr>
                      <tr>
                        <td width="25%">Unit Kerja </td>
                        <td>:</td>
                        <td><?php echo $item->unit_kerja; ?></td>
                      </tr>
                      <tr>
                        <td width="25%">Email </td>
                        <td>:</td>
                        <td><?php echo $item->email; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat / Tanggal Lahir </td>
                        <td>:</td>
                        <td><?php echo $item->tempat_lahir; ?> / <?php echo $item->tanggal_lahir; ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin </td>
                        <td>:</td>
                        <td><?php
                          if ($item->jenis_kelamin=='L')
                          echo 'Laki-laki';
                          else
                          echo 'Perempuan';
                       ?></td>
                      </tr>
                      <tr>
                        <td>Nomor Telepon </td>
                        <td>:</td>
                        <td><?php echo $item->telepon; ?></td>
                      </tr>
                      <tr>
                        <td>Alamat </td>
                        <td>:</td>
                        <td><?php echo $item->alamat; ?></td>
                      </tr>
                      <tr>
                        <td>Nomor Telepon </td>
                        <td>:</td>
                        <td><?php echo $item->telepon; ?></td>
                      </tr>
                      <tr>
                        <td>Terdaftar sejak </td>
                        <td>:</td>
                        <td><?php echo $item->tanggal_terdaftar; ?></td>
                      </tr>
                    </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Foto Profil</h4>
                      <?php if ($item->gambar=="") { ?>
                        <center>
                          <img src="<?php echo base_url('assets/backend/images/user.png'); ?>" class="img-thumbnail rounded-circle" alt="profile-image">
                        </center>
                      <?php  } else {  ?>
                        <center>
                        <img src="<?php echo base_url('assets/upload/profil/'.$item->gambar); ?>" class="img-thumbnail rounded-circle" alt="profile-image">
                        </center>
                      <?php  } ?>
                  </div>
              </div>
              <?php if ($this->session->userdata('hak_akses')!='standar') { ?>
                <button  onclick="location.href='<?php echo site_url('backend/petugas/edit/'.$this->uri->segment(4)); ?>'" class="btn btn-raised btn-info waves-effect">Edit Data</button>
                <button class="btn btn-raised btn-danger waves-effect" data-type="confirm">Hapus Data</buton>
                <?php } ?>
            </div>
        </div>
	</div>
</section>
<script>
  function konfirmasi(){
    if (window.confirm("Apakah Anda yakin mau menghapus data petugas ini?")) {
        window.location = "<?php echo site_url('backend/petugas/delete/'.$this->uri->segment(4)); ?>";
      }
  }
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
