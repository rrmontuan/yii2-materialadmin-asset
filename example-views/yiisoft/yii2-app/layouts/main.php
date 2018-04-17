<?php

use yii\helpers\Html;
use rrmontuan\widgets\Alert;

rrmontuan\web\MaterialAdminAsset::register($this);

//Get the sourcePath used for the Material Admin Asset
$bundle = \Yii::$app->assetManager->getBundle('rrmontuan\web\MaterialAdminAsset');
$sourcePath = $bundle->sourcePath;

//Get the directory asset for the informed sourcePath
$directoryAsset = Yii::$app->assetManager->getPublishedUrl($sourcePath);

//Widget responsible for showing alerts (Bootstrap growl plugin)
Alert::widget();

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        
    </head>
    <body>
	<?php $this->beginBody() ?>
		
		<?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>
        
        <section id="main">
		
			<?= $this->render(
				'left.php',
				['directoryAsset' => $directoryAsset]
			)
			?>
			
			<?= $this->render(
				'chat.php',
				['directoryAsset' => $directoryAsset]
			)
			?>
			
			<?= $this->render(
				'content.php',
				[
					'directoryAsset' => $directoryAsset, 
					'content'=>$content
				]
			)
			?>
			
        </section>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">IE SUCKS!</h1>
                <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser <br/>in order to access the maximum functionality of this website. </p>
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="img/browsers/chrome.png" alt="">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="img/browsers/firefox.png" alt="">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="img/browsers/safari.png" alt="">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                            <div>IE (New)</div>
                        </a>
                    </li>
                </ul>
                <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
            </div>   
        <![endif]-->

	<?php $this->endBody() ?>
    </body>
  </html>
  <?php $this->endPage() ?>