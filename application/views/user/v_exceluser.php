<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="13"> Data Laporan Pembelian</th>
</tr>
<tr>
  <th>No</th>
  <th>NIK</th>
  <th>Nama</th>
  <th>Username</th>
  <th>Password</th>
  <th>Alamat</th>
  <th>Provinsi</th>
  <th>Kota</th>
  <th>Kecamatan</th>
  <th>Upline</th>
  <th>Jumlah HD</th>
  <th>Bank</th>
  <th>No Rek</th>
  <th>Pemilik</th>
  <th>Nama Sponsor</th>
  <th>Pembayaran</th>
  <th>Status</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $user) { 
	?>
<tr>
 	<td><?php echo $i++; ?></td>
  <td>&nbsp;<?php echo $user->nik; ?></td>
  <td><?php echo $user->nama; ?></td>
  <td>&nbsp;<?php echo $user->username; ?></td>
  <td><?php echo $user->password; ?></td>
  <td><?php echo $user->alamat; ?></td>
  <td><?php echo $user->name_prov; ?></td>
  <td><?php echo $user->name_kota; ?></td>
  <td><?php echo $user->kecamatan; ?></td>
  <td><?php echo $user->namaupline; ?></td>
  <td>&nbsp;<?php echo $user->jumlahhu; ?></td>
  <td><?php echo $user->bank; ?></td>
  <td>&nbsp;<?php echo $user->norek; ?></td>
  <td><?php echo $user->pemilik; ?></td>
  <td><?php echo $user->namasponsor; ?></td>
  <td><?php echo $user->statusbayar; ?></td>
  <td><?php echo $user->statusanggota; ?></td>
 </tr>
<?php } ?>
</tbody>
</table>