<div id="frm-objeto" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form id="frm-sopa-objeto" class="form-horizontal mb-lg">
			<header class="panel-heading">
				<h2 class="panel-title">Create object</h2>
			</header>
			<div class="panel-body">
				<input type="hidden" name="idu" value="<?php echo $idu;?>">
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Name</label>
					<div class="col-sm-9">
						<input type="text" name="nombre" class="form-control" placeholder="Enter name for new object" required/>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button id="cl_frm-objeto" class="btn btn-default modal-dismiss">Cancel</button>
					</div>
				</div>
			</footer>
		</form>
	</section>
</div>