<div class="like">
		<noindex><script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="vkontakte,facebook,twitter,lj"></div></noindex><br />
	<div id="banner_ap">
		<div class="banner_yama">
			<span class="">Партнер:</span><br />
			<noindex><a href="http://autoportal.ua/" target="_blank" rel="nofollow"><img src="<?php echo Yii::app()->request->baseUrl;?>/banners/ap-bann-215x111.png" alt="" /></a></noindex>
		</div>
		<br />
		<div id="partners">
			SSL сертификаты и <a href="http://www.isplicense.ru/" target="_blank">лицензии ПО</a>
		</div> 
	</div>
</div>
<!-- NEWS -->
<div class="news-list-mainpage">
<?php foreach ($model as $news) : ?>	
	<div class="news-item">		
					<p  class="date"><?php echo Y::dateFromTime($news->date); ?></p>
			
		
					<p><?php echo $news->introtext; ?></p>
					<?php echo CHtml::link('>>', array('news/view', 'id'=>$news->id), array('class'=>"show")); ?>
	</div>
<?php endforeach; ?>
<?php echo CHtml::link('Все новости', array('news/index'), array('class'=>'news-all')); ?>
<div style="clear:both"></div>
</div>
<!-- /NEWS -->
