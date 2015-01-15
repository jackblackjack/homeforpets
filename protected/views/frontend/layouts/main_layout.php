<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="keywords" content="<?php echo CHtml::encode($this->keywords); ?>"/>
	<meta name="description" content="<?php echo CHtml::encode($this->description); ?>"/>
	<meta name="language" content="ru" />
	<meta name="author" content="<?php echo CHtml::encode(Yii::app()->config->author); ?>"/>
	<title><?php if ($this->title) echo CHtml::encode($this->title), ' - ', CHtml::encode(Yii::app()->config->sitename);?></title>
	<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="inner">
				<div class="top">
					<div class="logo"><a href="/"><img src="/images/logo.png" alt=""/></a></div>
					<?php Yii::import('application.modules.catalog.models.CatalogProduct'); ?>
					<?php $attached = CatalogProduct::getAttachCount();?>
					<div class="helps" title="Мы помогли найти дом <?php echo $attached; ?> питомцам">
						<div class="att"><?php echo $attached; ?></div>
						<div>Мы помогли найти дом <?php echo $attached; ?> <?php echo CatalogProduct::getAttachWordForm($attached); ?></div>
					</div>
				</div>
				<div class="track-line"></div>
				<div class="bot">
					<div class="bot-l">
						<?php if ($this->layout == 'first_page'): ?>
							<a href="/ja-hochu-pomoch" class="s-btn">Я хочу помочь</a>
							<a href="/" class="s-btn par">Предложить животное</a>
						<?php else: ?>
							<?php 
								$backUrl = "/";
								if (isset($this->module) and $this->module->id == 'catalog')
									$backUrl .= 'catalog';
								if (isset($this->action) and $this->action->id == 'product')
								{
									$uriParts = explode("/", Yii::app()->request->requestUri);
									if (array_key_exists(2, $uriParts))
										$backUrl .= '/' . $uriParts[2];
								}
							?>
							<a href="<?php echo $backUrl;?>" class="s-btn back"><img src="/images/back.png" alt=""/>Вернуться</a>
							<a href="/catalog/favorite" class="s-btn favorite par" style="display:<?php echo (count(Yii::app()->session['favorite']) ? 'inline-block' : 'none'); ?>"><img src="/images/favorite.png" alt=""/>В избранном</a>
						<?php endif; ?>
					</div>
					<div class="bot-r">
						<a href="#" class="sc-btn"><img src="/images/soc-in.png" alt=""/></a>
						<a href="#" class="sc-btn"><img src="/images/soc-fb.png" alt=""/></a>
						<a href="#" class="sc-btn"><img src="/images/soc-tw.png" alt=""/></a>
						<a href="#" class="sc-btn"><img src="/images/soc-vk.png" alt=""/></a>
						<a href="#" class="sc-btn"><img src="/images/soc-ok.png" alt=""/></a>
						<a href="#" class="sc-sh-btn">Поделиться</a>
					</div>
				</div>
			</div>
			<div class="delta-line"></div>
		</header>
		<div class="content">
			<div class="inner">
				<?php echo $content; ?>
			</div>
		</div>
		<div class="empty"></div>
	</div>
	<footer>
		<div class="delta-line r"></div>
		<div class="footer_inner">
			<div class="inner">
				<div class="track-line"></div>
				<div class="bot">
					<div class="logo">
						<a href="/"><img src="/images/logo.png" alt=""/></a>
					</div>
					<div class="dev">
						<a href="http://plus1dev.ru/"><img src="/images/logo+1.png" alt=""/></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>