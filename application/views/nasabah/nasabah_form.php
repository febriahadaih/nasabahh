<!doctype html>
<html>
    <head>
        <title>nasabah.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background-color: yellow;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Nasabah <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Sales Id <?php echo form_error('sales_id') ?></label>
            <input type="text" class="form-control" name="sales_id" id="sales_id" placeholder="Sales Id" value="<?php echo $sales_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nasabah <?php echo form_error('nasabah') ?></label>
            <input type="text" class="form-control" name="nasabah" id="nasabah" placeholder="Nasabah" value="<?php echo $nasabah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jeniskelamin <?php echo form_error('jeniskelamin') ?></label>
            <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="Jeniskelamin" value="<?php echo $jeniskelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Notlpn <?php echo form_error('notlpn') ?></label>
            <input type="text" class="form-control" name="notlpn" id="notlpn" placeholder="Notlpn" value="<?php echo $notlpn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgllahir <?php echo form_error('tgllahir') ?></label>
            <input type="text" class="form-control" name="tgllahir" id="tgllahir" placeholder="Tgllahir" value="<?php echo $tgllahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Created By <?php echo form_error('created_by') ?></label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Updated By <?php echo form_error('updated_by') ?></label>
            <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nasabah') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>