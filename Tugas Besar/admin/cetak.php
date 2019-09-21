<?php 
require_once __DIR__ . '/../vendor/autoload.php';

require '../helper/functions.php';
$perusahaan_teknologi = query("SELECT * FROM perusahaan_teknologi");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
 <html>
 <head>
 	<title>Perusahaan Teknologi</title>
 </head>
 <body>
 	<h1>Perusahaan Teknologi</h1>
 	<table border="1" cellpadding="10" cellspacing="0">
	      
	    <tr>
	        <th>No</th>
			<th>Nama</th>
			<th>Penghasilan</th>
			<th>Laba</th>
			<th>Asset</th>
			<th>Karyawan</th>
			<th>Kantor</th>
			<th>CEO</th>
			<th>Gambar</th>
	    </tr>';

	    $i = 1;
	    foreach ($perusahaan_teknologi as $company) {
	    	$html .= '<tr>
				<td>'.$i++.'</td>
				<td>'.$company["nama"].'</td>
				<td>'.$company["penghasilan"].'</td>
				<td>'.$company["laba"].'</td>
				<td>'.$company["asset"].'</td>
				<td>'.$company["karyawan"].'</td>
				<td>'.$company["kantor"].'</td>
				<td>'.$company["ceo"].'</td>
				<td><img src="../assets/img/'. $company["gambar"].'"></td>
	    	</tr>';
	    }

	$html .= '</table>
 </body>
 </html>';

$mpdf->WriteHTML($html);
$mpdf->Output('perusahaan-teknologi.pdf', 'D');

 ?>
 