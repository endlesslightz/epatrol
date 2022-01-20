<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>HALAMAN RIWAYAT</h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
					<div class="header">
						<a href="<?php echo site_url('backend/dashboard'); ?>">Home</a> >
						<a href="<?php echo site_url('backend/report'); ?>">Report</a> >
						Rekam Medis
					</div>
					<div class="body">
                    <?php
                    foreach ($diagnosa as $item) {
                      $diag[]=$item->diagnosa;
                    }
                    foreach ($tindakan as $item) {
                      $tind[]=$item->tindakan;
                    }
                    foreach ($odontogram as $item) { ?>
						<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<table style="font-size: 18px; font-weight: bold;">
									<tr>
										<td width="110px">Puskesmas</td>
										<td>: Banyudono 1</td>
									</tr>
									<tr>
										<td>Kabupaten</td>
										<td>: Boyolali</td>
									</tr>
								</table>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div style="float: right; text-align: center; width: 250px; border: 1px solid #000; padding: 15px; font-size: 18px; font-weight: bold; ">No Pemeriksaan : <?php echo $_GET['id']; ?>
								</div>
							</div>
						</div>
						
						<center><strong><u><h2>DATA REKAM MEDIS</h2></u></strong></center>
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<table class="table" border="0">
								  <tr>
									<td width="20%">Nama </td>
									<td width="20px">:</td>
									<td><?php echo $item['nama']; ?></td>
									
									<td width="20%">Golongan Darah </td>
									<td>:</td>
									<td><?php echo $item['golongan_darah']; ?></td>
								  </tr>
								  <tr>
									<td width="20%">Jenis Kelamin </td>
									<td>:</td>
									<td><?php echo $item['jenis_kelamin']; ?></td>
									
									<td width="20%">Nomor Telepon </td>
									<td>:</td>
									<td><?php echo $item['nomor_telepon']; ?></td>
								  </tr>
								  <tr>
									<td width="20%">Tempat / Tanggal Lahir </td>
									<td>:</td>
									<td><?php echo $item['tempat_lahir'].", ".$item['tanggal_lahir']; ?></td>
									
									<td width="20%">Alamat </td>
									<td>:</td>
									<td><?php echo $item['alamat']; ?></td>
								  </tr>
								</table>
								<table class="table" border="0">
								  <tr>
									<td width="20%">Tanggal Pemeriksaan </td>
									<td width="20px">:</td>
									<td><?php echo $item['tanggal']; ?></td>
								  </tr>
								  <tr>
									<td>Tekanan Darah</td>
									<td>:</td>
									<td><?php echo $item['tekanan_sistolik']; ?> / <?php echo $item['tekanan_diastolik']; ?></td>
								  </tr>
								  <tr>
									<td>Penyakit Jantung</td>
									<td>:</td>
									<td><?php echo $item['jantung']; ?></td>
								  </tr>
								  <tr>
									<td>Penyakit Diabetes</td>
									<td>:</td>
									<td><?php echo $item['diabetes']; ?></td>
								  </tr>
								  <tr>
									<td>Peyakit Magh</td>
									<td>:</td>
									<td><?php echo $item['magh']; ?></td>
								  </tr>
								  <tr>
									<td>Peyakit Hepatitis</td>
									<td>:</td>
									<td><?php echo $item['hepatitis']; ?></td>
								  </tr>
								  <tr>
									<td>Peyakit Alergi</td>
									<td>:</td>
									<td><?php echo $item['alergi']; ?></td>
								  </tr>
								</table>
							</div>
						</div>
					   
						<?php } ?>

						<b>Tabel Odontogram</b>
						<div class="row clearfix" style="background:#49cdd0;">
							<div class="col-md-6" style="text-align:right !important;">
							  <?php detail('18',$item['18'],$diag,$tind); ?>
							  <?php detail('17',$item['17'],$diag,$tind); ?>
							  <?php detail('16',$item['16'],$diag,$tind); ?>
							  <?php detail('15',$item['15'],$diag,$tind); ?>
							  <?php detail('14',$item['14'],$diag,$tind); ?>
							  <?php detail('13',$item['13'],$diag,$tind); ?>
							  <?php detail('12',$item['12'],$diag,$tind); ?>
							  <?php detail('11',$item['11'],$diag,$tind); ?>
							</div>
							<div class="col-md-6">
							  <?php detail('21',$item['21'],$diag,$tind); ?>
							  <?php detail('22',$item['22'],$diag,$tind); ?>
							  <?php detail('23',$item['23'],$diag,$tind); ?>
							  <?php detail('24',$item['24'],$diag,$tind); ?>
							  <?php detail('25',$item['25'],$diag,$tind); ?>
							  <?php detail('26',$item['26'],$diag,$tind); ?>
							  <?php detail('27',$item['27'],$diag,$tind); ?>
							  <?php detail('28',$item['28'],$diag,$tind); ?>
							</div>
						</div>

						<div class="row clearfix" style="background:#49cdd0;">
							<div class="col-md-6" style="text-align:right !important;">
							  <?php detail('55',$item['55'],$diag,$tind); ?>
							  <?php detail('54',$item['54'],$diag,$tind); ?>
							  <?php detail('53',$item['53'],$diag,$tind); ?>
							  <?php detail('52',$item['52'],$diag,$tind); ?>
							  <?php detail('51',$item['51'],$diag,$tind); ?>
							</div>
							<div class="col-md-6">
							  <?php detail('61',$item['61'],$diag,$tind); ?>
							  <?php detail('62',$item['62'],$diag,$tind); ?>
							  <?php detail('63',$item['63'],$diag,$tind); ?>
							  <?php detail('64',$item['64'],$diag,$tind); ?>
							  <?php detail('65',$item['65'],$diag,$tind); ?>
							</div>
						</div>

						<div class="row clearfix" style="background:#49cdd0;">
							<div class="col-md-6" style="text-align:right !important;">
							  <?php detail('85',$item['85'],$diag,$tind); ?>
							  <?php detail('84',$item['84'],$diag,$tind); ?>
							  <?php detail('83',$item['83'],$diag,$tind); ?>
							  <?php detail('82',$item['82'],$diag,$tind); ?>
							  <?php detail('81',$item['81'],$diag,$tind); ?>
							</div>
							<div class="col-md-6">
							  <?php detail('71',$item['71'],$diag,$tind); ?>
							  <?php detail('72',$item['72'],$diag,$tind); ?>
							  <?php detail('73',$item['73'],$diag,$tind); ?>
							  <?php detail('74',$item['74'],$diag,$tind); ?>
							  <?php detail('75',$item['75'],$diag,$tind); ?>
							</div>
						</div>


						<div class="row clearfix" style="background:#49cdd0;">
							<div class="col-md-6" style="text-align:right !important;">
							  <?php detail('48',$item['48'],$diag,$tind); ?>
							  <?php detail('47',$item['47'],$diag,$tind); ?>
							  <?php detail('46',$item['46'],$diag,$tind); ?>
							  <?php detail('45',$item['45'],$diag,$tind); ?>
							  <?php detail('44',$item['44'],$diag,$tind); ?>
							  <?php detail('43',$item['43'],$diag,$tind); ?>
							  <?php detail('42',$item['42'],$diag,$tind); ?>
							  <?php detail('41',$item['41'],$diag,$tind); ?>
							</div>
							<div class="col-md-6">
							  <?php detail('31',$item['31'],$diag,$tind); ?>
							  <?php detail('32',$item['32'],$diag,$tind); ?>
							  <?php detail('33',$item['33'],$diag,$tind); ?>
							  <?php detail('34',$item['34'],$diag,$tind); ?>
							  <?php detail('35',$item['35'],$diag,$tind); ?>
							  <?php detail('36',$item['36'],$diag,$tind); ?>
							  <?php detail('37',$item['37'],$diag,$tind); ?>
							  <?php detail('38',$item['38'],$diag,$tind); ?>
							</div>
						</div>

						<div class="row clearfix" style="">
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('18',$item['18'],$diag,$tind); ?>
							  <?php detail_diag_tind('17',$item['17'],$diag,$tind); ?>
							  <?php detail_diag_tind('16',$item['16'],$diag,$tind); ?>
							  <?php detail_diag_tind('15',$item['15'],$diag,$tind); ?>
							  <?php detail_diag_tind('14',$item['14'],$diag,$tind); ?>
							  <?php detail_diag_tind('13',$item['13'],$diag,$tind); ?>
							  <?php detail_diag_tind('12',$item['12'],$diag,$tind); ?>
							  <?php detail_diag_tind('11',$item['11'],$diag,$tind); ?>
							</div>
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('21',$item['21'],$diag,$tind); ?>
							  <?php detail_diag_tind('22',$item['22'],$diag,$tind); ?>
							  <?php detail_diag_tind('23',$item['23'],$diag,$tind); ?>
							  <?php detail_diag_tind('24',$item['24'],$diag,$tind); ?>
							  <?php detail_diag_tind('25',$item['25'],$diag,$tind); ?>
							  <?php detail_diag_tind('26',$item['26'],$diag,$tind); ?>
							  <?php detail_diag_tind('27',$item['27'],$diag,$tind); ?>
							  <?php detail_diag_tind('28',$item['28'],$diag,$tind); ?>
							</div>
						</div>

						<div class="row clearfix" style="">
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('55',$item['55'],$diag,$tind); ?>
							  <?php detail_diag_tind('54',$item['54'],$diag,$tind); ?>
							  <?php detail_diag_tind('53',$item['53'],$diag,$tind); ?>
							  <?php detail_diag_tind('52',$item['52'],$diag,$tind); ?>
							  <?php detail_diag_tind('51',$item['51'],$diag,$tind); ?>
							</div>
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('61',$item['61'],$diag,$tind); ?>
							  <?php detail_diag_tind('62',$item['62'],$diag,$tind); ?>
							  <?php detail_diag_tind('63',$item['63'],$diag,$tind); ?>
							  <?php detail_diag_tind('64',$item['64'],$diag,$tind); ?>
							  <?php detail_diag_tind('65',$item['65'],$diag,$tind); ?>
							</div>
						</div>

						<div class="row clearfix" style="">
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('85',$item['85'],$diag,$tind); ?>
							  <?php detail_diag_tind('84',$item['84'],$diag,$tind); ?>
							  <?php detail_diag_tind('83',$item['83'],$diag,$tind); ?>
							  <?php detail_diag_tind('82',$item['82'],$diag,$tind); ?>
							  <?php detail_diag_tind('81',$item['81'],$diag,$tind); ?>
							</div>
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('71',$item['71'],$diag,$tind); ?>
							  <?php detail_diag_tind('72',$item['72'],$diag,$tind); ?>
							  <?php detail_diag_tind('73',$item['73'],$diag,$tind); ?>
							  <?php detail_diag_tind('74',$item['74'],$diag,$tind); ?>
							  <?php detail_diag_tind('75',$item['75'],$diag,$tind); ?>
							</div>
						</div>


						<div class="row clearfix" style="">
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('48',$item['48'],$diag,$tind); ?>
							  <?php detail_diag_tind('47',$item['47'],$diag,$tind); ?>
							  <?php detail_diag_tind('46',$item['46'],$diag,$tind); ?>
							  <?php detail_diag_tind('45',$item['45'],$diag,$tind); ?>
							  <?php detail_diag_tind('44',$item['44'],$diag,$tind); ?>
							  <?php detail_diag_tind('43',$item['43'],$diag,$tind); ?>
							  <?php detail_diag_tind('42',$item['42'],$diag,$tind); ?>
							  <?php detail_diag_tind('41',$item['41'],$diag,$tind); ?>
							</div>
							<div class="col-md-6" style="text-align:center !important;">
							  <?php detail_diag_tind('31',$item['31'],$diag,$tind); ?>
							  <?php detail_diag_tind('32',$item['32'],$diag,$tind); ?>
							  <?php detail_diag_tind('33',$item['33'],$diag,$tind); ?>
							  <?php detail_diag_tind('34',$item['34'],$diag,$tind); ?>
							  <?php detail_diag_tind('35',$item['35'],$diag,$tind); ?>
							  <?php detail_diag_tind('36',$item['36'],$diag,$tind); ?>
							  <?php detail_diag_tind('37',$item['37'],$diag,$tind); ?>
							  <?php detail_diag_tind('38',$item['38'],$diag,$tind); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center;">
					<a href="<?php echo site_url('backend/report/cetakrekammedis?id='.$_GET['id']); ?>" class="btn btn-sm" target="_blank"><i class="zmdi zmdi-print"></i><span>     Cetak</span></a>
					<!--a href="<?php echo site_url('report/downloadrekammedis/'.$_GET['id']); ?>" class="btn btn-sm"><i class="zmdi zmdi-file-text"></i><span> Download</span></a-->
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="ModalGigi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalGigiLabel">Detail Odontogram</h4>
            </div>
            <div class="modal-body">
              <a>Urutan Gigi : </a><a class="modal-subtitle"></a><br><br>
              <a>Diagnosa : </a><a class="diagnosa"></a>
                <br><br>
              <a>Tindakan : </a><a class="tindakan"></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php
function detail_diag_tind($id,$index,$diag,$tind){
  if ($index!="0-0"){
      $indDiag = explode("-",$index)[0];
      $indTind = explode("-",$index)[1];
      echo "<b>Kode gigi</b> : ".$id."<br><b>Diagnosa</b> : ". $diag[$indDiag-1]."<br> <b>Tindakan</b> : ".$tind[$indTind-1]."<br><br>";
    }
}
function detail($id,$index,$diag,$tind){
  if ($index=="0-0"){
      echo '<a style="padding:10px 15px !important;" data-id="'.$id.'" class="btn btn-raised btn-default waves-effect">'.$id.'</a>';
    } else {
      $indDiag = explode("-",$index)[0];
      $indTind = explode("-",$index)[1];
      echo '<a style="background:#ff2200 !important; padding:10px 15px !important;" class="btn btn-raised btn-default waves-effect">'.$id.'</a>';

    }
}

$this->load->view('backend/tema/Footer');
?>
