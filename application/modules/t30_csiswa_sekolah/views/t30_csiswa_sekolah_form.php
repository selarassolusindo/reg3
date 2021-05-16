<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T30_csiswa_sekolah <?php //echo $button ?></h2> -->
        <?php if (!empty($this->session->flashdata('message'))) { ?>
            <script>
                $(document).ready(function(){
                    $("#modal-default").modal('show');
                });
            </script>
        <?php } ?>

        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">IDCSISWA <?php echo form_error('idcsiswa') ?></label>
            	<input type="text" class="form-control" name="idcsiswa" id="idcsiswa" placeholder="IDCSISWA" value="<?php echo $idcsiswa; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDSEKOLAH <?php echo form_error('idsekolah') ?></label>
            	<input type="text" class="form-control" name="idsekolah" id="idsekolah" placeholder="IDSEKOLAH" value="<?php echo $idsekolah; ?>" />
        	</div>
			<input type="hidden" name="idcsiswasekolah" value="<?php echo $idcsiswasekolah; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t30_csiswa_sekolah') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div> -->
                    <div class="modal-body">
                        <!-- <p>One fine body&hellip;</p> -->
                        <p><?php echo $this->session->flashdata('message') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!-- </body>
</html> -->
