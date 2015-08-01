<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'currency_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'currency_code_2',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'currency_code_3',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'currency_numeric_code',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'currency_exchange_rate',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'currency_symbol',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'currency_decimal_place',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'currency_decimal_symbol',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'currency_thousands',array('class'=>'span5','maxlength'=>4)); ?>

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
