<ol class="breadcrumb">
	<li>
		<a class="text-dark" href="<?php echo $site_url;?>"><span><i class="ti ti-home"></i></span></a>
	</li>
	<li>
		<a class="text-dark" href="<?php echo "$site_url/$uri_base";?>"><span><?php echo ucfirst($uri_base);?></span></a>
	</li>
	<?php
	if(isset($uri[1])){
		?>
		<li class="active">
			<a class="text-dark" href="<?php echo "$site_url/$uri_base".'/'.$uri[1];?>"><span><?php echo ucfirst($uri[1]);?></span></a>
		</li>
		<?php
	}
	if(isset($uri[2])){
		?>
		<li class="active">
			<a class="text-dark" href="<?php echo "$site_url/$uri_base".'/'.$uri[1].'/'.$uri[2];?>"><span><?php echo ucfirst($uri[2]);?></span></a>
		</li>
		<?php
	}
	?>
</ol>
