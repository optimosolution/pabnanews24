<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'country_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'state_name',array('class'=>'span5','maxlength'=>192)); ?>

	<?php echo $form->textFieldRow($model,'state_3_code',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'state_2_code',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'published',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_on',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified_on',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'locked_on',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'locked_by',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
