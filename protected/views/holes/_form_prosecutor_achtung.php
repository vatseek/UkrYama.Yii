							<a href="#" onclick="var c=document.getElementById('prosecutor_form');if(c){c.style.display=c.style.display=='block'?'none':'block';}return false;" class="close">&times;</a>
							<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'request-form',
										'enableAjaxValidation'=>false,
										'action'=>Yii::app()->createUrl("holes/request", array("id"=>$hole->ID)),
										'htmlOptions'=>Array ('onsubmit'=>"document.getElementById('prosecutor_form2').style.display='none';"),
									)); 
									$model=new HoleRequestForm;
									$usermodel=Yii::app()->user->userModel;
									$model->form_type='prosecutor';
									$model->to=$hole->subject ? $hole->subject->name_full_genitive : '';
									$model->from=$usermodel->relProfile->request_from ? $usermodel->relProfile->request_from : $usermodel->last_name.' '.$usermodel->name.' '.$usermodel->second_name;
									$model->address=CHtml::encode($hole->ADDRESS);
									$model->signature=$usermodel->relProfile->request_signature ? $usermodel->relProfile->request_signature : $usermodel->last_name.' '.substr($usermodel->name, 0, 2).($usermodel->name ? '.' : '').' '.substr($usermodel->second_name, 0, 2).($usermodel->second_name ? '.' : '');
									$model->gibdd=$hole->subject && $hole->subject->gibdd ? $hole->subject->gibdd->gibdd_name : '';
									$model->application_data=$hole->request_gibdd ? date('d.m.Y',$hole->request_gibdd->date_sent) : '';
									$model->postaddress=$usermodel->relProfile->request_address ? $usermodel->relProfile->request_address : '';
									?>					
									<?php echo $form->hiddenField($model,'form_type'); ?>
                                <h2><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM') ?></h2>
								<?= Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_PREFACE') ?>
								<table>
									<tr>
										<th><?=  Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_TO') ?></th>
										<td><?php echo $form->textArea($model,'to',array('rows'=>3, 'cols'=>40)); ?></td>
									</tr>
									<tr>
										<th><?=  Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_FROM') ?></th>
										<td><?php echo $form->textArea($model,'from',array('rows'=>3, 'cols'=>40)); ?></td>
									</tr>
									<tr>
											<th><?= Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_POSTADDRESS') ?></th>
											<td>
                                                <?php echo $form->textArea($model,'postaddress',array('rows'=>3, 'cols'=>40)); ?>
                                                <span class="comment"><?= Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_POSTADDRESS_COMMENT') ?></span>
                                            </td>
									</tr>
									<tr>
											<th><?= Yii::t('holes_view', 'HOLE_PRESECUTOR_FORM_ADDRESS') ?></th>
											<td><?php echo $form->textArea($model,'address',array('rows'=>3, 'cols'=>40)); ?>
												<?php /*<textarea rows="3" cols="40" id="prosecutor_form_address" name="address"><?= CHtml::encode($hole['ESS']) ?></textarea> */ ?></td>
									</tr>
									<tr>
										<th><?= Yii::t('holes_view', 'HOLE_PRESECUTOR_FORM_GIBDD') ?></th>
										<td>
                                            <?php echo $form->textArea($model,'gibdd',array('rows'=>3, 'cols'=>40)); ?><?//= $arResult['PROSECUTOR_GIBDD'] ?>
                                            <span class="comment"><?= Yii::t('holes_view', 'HOLE_PRESECUTOR_FORM_GIBDD_COMMENT') ?></span>
                                        </td>
									</tr>
									<tr>
										<th><?= Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_APPLICATION_DATA') ?></th>
										<td>
                                            <?php echo $form->textField($model,'application_data',array('class'=>'textInput')); ?>
                                            <span class="comment"><?= Yii::t('holes_view', 'HOLE_PROSECUTOR_FORM_APPLICATION_DATA_COMMENT') ?></span>
                                        </td>
									</tr>
									<tr>
										<th><?php echo $form->labelEx($model,'signature'); ?></th>
										<td>
                                            <?php echo $form->textField($model,'signature',array('class'=>'textInput')); ?>
                                            <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_SIGNATURE_COMMENT') ?></span>
                                        </td>
									</tr>								
									<tr>
										<td colspan="2" class="action-cell">
											<?php echo CHtml::submitButton(Yii::t('holes_view', 'HOLE_REQUEST_FORM_SUBMIT'), Array('class'=>'submit', 'name'=>'HoleRequestForm[pdf]')); ?>
											<?php echo CHtml::submitButton(Yii::t('holes_view', 'HOLE_REQUEST_FORM_SUBMIT2'), Array('class'=>'submit', 'name'=>'HoleRequestForm[html]')); ?>
										</td>
									</tr>
								</table>
								<?php if ($hole->subject && $hole->subject->prosecutor) : ?>
								<strong><?php echo CHtml::encode($hole->subject->prosecutor->name) ?></strong>
								<p><?php echo CHtml::encode(strip_tags($hole->subject->prosecutor->preview_text)) ?></p>
								<?php endif; ?>
								<?php $this->endWidget(); ?>