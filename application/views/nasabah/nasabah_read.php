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
        <h2 style="margin-top:0px">Nasabah Read</h2>
        <table class="table">
	    <tr><td>Sales Id</td><td><?php echo $sales_id; ?></td></tr>
	    <tr><td>Nasabah</td><td><?php echo $nasabah; ?></td></tr>
	    <tr><td>Jeniskelamin</td><td><?php echo $jeniskelamin; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Notlpn</td><td><?php echo $notlpn; ?></td></tr>
	    <tr><td>Tgllahir</td><td><?php echo $tgllahir; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nasabah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>