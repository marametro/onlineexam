<?php 
    require_once '../../mssql/config.php';
    require_once '../../model/QuestionsManagement/qm_model.php';
    $model =new QmModel(); 
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
  
  <?php 
    $manage = $model->getByID('manage',$_GET['id']);
    $manage_school = $model->getManage('manage_school','elearn_qm_manage_id', $_GET['id']);
    $tryout = $model->getByIDTryout('tryout',$manage->elearn_qm_tryout_id);
    $manage_quest = $model->getManageQuest("manage_quest","elearn_qm_manage_id",$_GET['id'])
  ?>
  <table class="grid" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
          Kode
      </td>
      <td>
          :
      </td>
      <td colspan="4">
        <?php echo $manage->code; ?>
      </td>
    </tr>
    <tr>
      <td>
          Sekolah
      </td>
      <td>
          :
      </td>
      <td colspan="4">
        <?php 
          $numbers = 1; 
          foreach ($manage_school as $field) { 
            echo "<b>".$numbers."</b>. "; 
            echo $field->name.", "; 
            $numbers++; 
          }
        ?>
      </td>
    </tr>
    <tr>
      <td style="width: 15%;">
          Judul
      </td>
      <td style="width: 2%;">
          :
      </td>
      <td style="width: 28%;">
        <?php echo $tryout->title; ?>
      </td>
      <td style="width: 15%;">
          Jenis
      </td>
      <td style="width: 2%;">
          :
      </td>
      <td style="width: 28%;">
        <?php echo $tryout->kind; ?>
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
        <?php echo $tryout->study; ?>
      </td>
      <td>
          Nilai Kelulusan
      </td>
      <td>
          :
      </td>
      <td>
        <?php echo $tryout->min_value; ?>
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
        <?php echo $tryout->time; ?>
      </td>
      <td>
        Tanggal Aktif Terbit
      </td>
      <td>
          :
      </td>
      <td>
        <?php echo (date('d-m-Y',strtotime($tryout->date_start)))." s/d ".(date('d-m-Y',strtotime($tryout->date_end))); ?>
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
        <?php echo ($tryout->publish=='yes' ? 'Ya' : 'Tidak'); ?>
      </td>
      <td>
        Remedial
      </td>
      <td>
          :
      </td>
      <td>
        <?php echo $tryout->remedial; ?>
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
          <?php echo ($tryout->type_quest=='reguler' ? 'Tidak Acak' : 'Acak'); ?>
      </td>
      <td>
        Jumlah Terbit Soal
      </td>
      <td>
          :
      </td>
      <td>
          <?php echo $tryout->amount_quest; ?>
      </td>
    </tr>
    <tr>
      <td>
        Pesan dan Saran
      </td>
      <td>
          :
      </td>
      <td colspan="4">
          <?php echo $tryout->attention; ?>
      </td>
    </tr>
  </table>
  <br/>
  <table class="grid" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="30px">
          No 
        </th>
        <th>
            Pembahasan
        </th>
      </tr>
      <?php 
        $numbers = 1; 
        foreach ($manage_quest as $field) { ?>
          
          <tr>
            <td align="right">
              <?php echo $numbers; ?>
            </td>
            <td>
              <?php echo $field->pembahasan; ?>
            </td>
          </tr>

          <?php $numbers++; 
        }
      ?>

  </table>
</body>
</html>