<?php
use rrmontuan\widgets\Menu;
use yii\base\Widget;
?>
<aside id="sidebar">
	<div class="sidebar-inner">
		<div class="si-inner">
			<div class="profile-menu">
				<a href="">
					<div class="profile-pic">
						<img src="<?= $directoryAsset ?>/img/profile-pics/1.jpg" alt="">
					</div>
					
					<div class="profile-info">
						Malinda Hollaway
						
						<i class="md md-arrow-drop-down"></i>
					</div>
				</a>
				<?= 
					//Profile Menu
					Menu::widget([
						'encodeLabels'=>false,
						'items'=>[
							[
								'label' => 'View Profile',
								'icon' => 'person',
								'url' => ['/site/profile'],
								'visible' => true
							],
							[
								'label' => 'Privacy Settings',
								'icon' => 'settings-input-antenna',
								'url' => ['/site/privacy'],
								'visible' => true
							],
							[
								'label' => 'Settings',
								'icon' => 'settings',
								'url' => ['/site/settings'],
								'visible' => true
							],
							[
								'label' => 'Logout',
								'icon' => 'history',
								'url' => ['/site/logout'],
								'visible' => true
							],
						]
					])
				?>
			</div>
			
			<?= 
				//Main Menu
				Menu::widget([
					'encodeLabels'=>false,
					'items'=>[
						[
							'label' => 'Dashboards Slideshow',
							'icon' => 'now-widgets',
							'url' => ['/site/about'],
							'visible' => true
						],
						[
							'label' => 'Tables',
							'icon' => 'view-list',
							'url' => ['/site'],
							'items' => [
								['label' => 'Normal Tables', 'url' => ['/site/contact'],],
								['label' => 'Data Tables', 'url' => ['/site/index'],],
							],
						],
					]
				])
			?>
		</div>
	</div>
</aside>