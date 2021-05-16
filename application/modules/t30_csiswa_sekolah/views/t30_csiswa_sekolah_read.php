<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T30_csiswa_sekolah Read</h2>
        <table class="table">
	    <tr><td>Idcsiswa</td><td><?php echo $idcsiswa; ?></td></tr>
	    <tr><td>Idsekolah</td><td><?php echo $idsekolah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t30_csiswa_sekolah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>