<section id="content">
	<div class="container">
		<div class="block-header">
			<h2><?= $this->title ?></h2>
			
			<ul class="actions">
				<li>
					<a href="">
						<i class="md md-trending-up"></i>
					</a>
				</li>
				<li>
					<a href="">
						<i class="md md-done-all"></i>
					</a>
				</li>
				<li class="dropdown">
					<a href="" data-toggle="dropdown">
						<i class="md md-more-vert"></i>
					</a>
					
					<ul class="dropdown-menu dropdown-menu-right">
						<li>
							<a href="">Refresh</a>
						</li>
						<li>
							<a href="">Manage Widgets</a>
						</li>
						<li>
							<a href="">Widgets Settings</a>
						</li>
					</ul>
				</li>
			</ul>
			
		</div>
		
		<?= $content ?>
		
	</div>
</section>