<!-- Info Section -->

<section class="infosSection">	
	<div class="container">
		<div class="row infosD">
			<div class="col-md-4 col-sm-4">
				<div class="infos_item">
					<h4><img class="infos_item_img" alt="members" src="<?php echo img_url('icon/account.png'); ?>"></h4>
					<strong class="c-stats__number"><?php echo number_format($candidateNumber);?></strong>
					<p><?php echo $this->lang->line('Members')?></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="infos_item">
					<h4><img class="infos_item_img" alt="jobs" src="<?php echo img_url('icon/job-search2.png'); ?>"></h4>
					<strong class="c-stats__number"><?php echo number_format($jobNumber);?></strong>
					<p><?php echo $this->lang->line('JobsOnline')?></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="infos_item">
				<h4><img class="infos_item_img" alt="employers" src="<?php echo img_url('icon/boss.png'); ?>"></h4>
					<strong class="c-stats__number"><?php echo number_format($employerNumber);?></strong>
					<p><?php echo $this->lang->line('Employers')?></p>
				</div>
			</div>
		</div>
	</div> 	 
</section>