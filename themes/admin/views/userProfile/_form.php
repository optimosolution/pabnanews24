<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-profile-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'profile_picture',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'country_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'state_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'city_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'expiry',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'birth_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
