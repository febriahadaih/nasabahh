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
        <h2 style="margin-top:0px">Sales List</h2>
		<div class="btn-group" role="group" aria-label="...">
		<input type="button" class="btn btn-danger" onclick="window.open('http://[::1]/nasabah/codeIgniter/sales/', '_self')" value="Sales"></input>
		
		<input type="button" class="btn btn-danger" onclick="window.open('http://[::1]/nasabah/codeIgniter/nasabah/', '_self')" value="Nasabah"></input>
		
		<input type="button" class="btn btn-danger" onclick="window.open('http://[::1]/nasabah/codeIgniter/motor/', '_self')" value="Motor"></input>
			</div>
			<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sales/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
										?>
                                    <a href="<?php echo site_url('sales'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Created At</th>
		<th>Created By</th>
		<th>Updated At</th>
		<th>Updated By</th>
		<th>Action</th>
            </tr><?php
            foreach ($sales_data as $sales)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sales->username ?></td>
			<td><?php echo $sales->password ?></td>
			<td><?php echo $sales->created_at ?></td>
			<td><?php echo $sales->created_by ?></td>
			<td><?php echo $sales->updated_at ?></td>
			<td><?php echo $sales->updated_by ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('sales/read/'.$sales->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('sales/update/'.$sales->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('sales/delete/'.$sales->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
            <div class="col-md-4 text-left">
                <?php echo anchor(site_url('sales/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
        <div class="row">
            <div class="col-md-7 text-right">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-4 text-center">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>