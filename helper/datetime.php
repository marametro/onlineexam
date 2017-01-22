<?php
class Helper
{

	public static function format_indo($date){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$tahun = substr($date, 0, 4);
		
		$bulan = substr($date, 5, 2);
		/*if ($bulan == 1) $bulan = "Januari";
		else if ($bulan == 2) $bulan = "Februari";
		else if ($bulan == 3) $bulan = "Maret";
		else if ($bulan == 4) $bulan = "April";
		else if ($bulan == 5) $bulan = "Mei";
		else if ($bulan == 6) $bulan = "Juni";
		else if ($bulan == 7) $bulan = "Juli";
		else if ($bulan == 8) $bulan = "Agustus";
		else if ($bulan == 9) $bulan = "September"; */
		
		
		$tgl   = substr($date, 8, 2);
		$result = $tgl . "-" . $BulanIndo[(int)$bulan-1]. "-". $tahun;
		return($result);
	}
	
}
?>