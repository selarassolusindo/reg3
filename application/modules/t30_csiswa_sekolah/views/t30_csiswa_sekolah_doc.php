<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T30_csiswa_sekolah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idcsiswa</th>
		<th>Idsekolah</th>
		
            </tr><?php
            foreach ($t30_csiswa_sekolah_data as $t30_csiswa_sekolah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t30_csiswa_sekolah->idcsiswa ?></td>
		      <td><?php echo $t30_csiswa_sekolah->idsekolah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>