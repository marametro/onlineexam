<?php 
	require_once('../../model/QuestionsManagement/qm_model.php' );
	// $model = new QmModel();
	// $manage_school = $model->getManage('manage_school','elearn_qm_manage_id', $key->id);
	// $tryout = $model->getByIDTryout('tryout',$key->elearn_qm_tryout_id);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <style type="text/css">
        *
        {
            font-family: Arial; /*font-size:12px;*/
        }
        .tabtitle
        {
            width: 29.7cm;
            /*height: 20.4cm;*/
        }
        table.tabtitle tr td
        {
            padding-top: 0.5mm;
            padding-bottom: 0.5mm;
            padding-left: 2mm;
        }
        table.grid
        {
            width: 29.7cm;
            /*height: 20.4cm;*/
            font-size: 9pt;
            border-collapse: collapse;
        }
        table.grid th
        {
            padding-top: 1mm;
            padding-bottom: 1mm;
        }
        table.grid th
        {
            background: #F0F0F0;
            border-top: 0.2mm solid #000;
            border-bottom: 0.2mm solid #000;
            text-align: center;
            padding-left: 0.2cm;
            border: 1px solid #000;
        }
        table.grid tr td
        {
            padding-top: 1mm;
            padding-bottom: 1mm;
            padding-left: 2mm;
            border-bottom: 0.2mm solid #000;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
	<table class="tabtitle">
    <tr>
      <td align="center"><font size="4" style="text-decoration: underline;">LAPORAN SOAL</font></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </table>

  <table class="grid" border="0" cellpadding="0" cellspacing="0">
      <!-- <tr>
        <th>
            Kode 
        </th>
        <th>
            Sekolah
        </th>
        <th>
            Jenis
        </th>
        <th>
            No. Trans
        </th>
        <th>
            Tgl. Trans
        </th>
        <th>
            Masuk
        </th>
        <th>
            Keluar
        </th>
        <th>
            Jumlah
        </th>
        <th>
            Keterangan
        </th>
      </tr> -->
      <tr>
        <td style="width: 150px;">
            Kode
        </td>
        <td style="width: 20px;">
            :
        </td>
        <td>
            
        </td>
    	</tr>
      <tr>
        <td>
            Sekolah
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
      <tr>
        <td>
            Judul
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
      <tr>
        <td>
            Jenis
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
        <td>
            Mata Pelajaran
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
        <td>
            Nilai Kelulusan
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Lama Pengerjaan
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Tanggal Aktif Terbit
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Publish
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Remedial
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Tipe Soal
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Jumlah Terbit Soal
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
    	<tr>
    		<td>
          Pesan dan Saran
        </td>
        <td>
            :
        </td>
        <td>
            
        </td>
    	</tr>
  </table>
</body>
</html>