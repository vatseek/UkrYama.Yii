<div class="view">

<p class="date"><?php echo CHtml::encode(Y::dateFromTime($data->date)); ?></p>
<p class="preview_text"><?php echo CHtml::encode($data->introtext); ?> <?php echo CHtml::link('&rarr;', array('view', 'id'=>$data->id), array('class' => 'arrow')); ?></p>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('introtext')); ?>:</b>
	<?php echo CHtml::encode($data->introtext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fulltext')); ?>:</b>
	<?php echo CHtml::encode($data->fulltext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('archive')); ?>:</b>
	<?php echo CHtml::encode($data->archive); ?>
	<br />

	*/ ?>

</div>