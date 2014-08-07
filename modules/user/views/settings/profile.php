<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
$this->params['sideMenu'] = [
		['label' => Yii::t('user', 'Profile'), 'url' => ['/user/settings/profile']],
		['label' => Yii::t('user', 'Email'), 'url' => ['/user/settings/email']],
		['label' => Yii::t('user', 'Password'), 'url' => ['/user/settings/password']],
		['label' => Yii::t('user', 'Networks'), 'url' => ['/user/settings/networks']],
	];
?>
<?php $this->beginContent('@hscstudio/heart/views/layouts/column2module.php'); ?>

<?php if (Yii::$app->getSession()->hasFlash('settings_saved')): ?>
	<div class="col-md-12">
		<div class="alert alert-success">
			<?= Yii::$app->getSession()->getFlash('settings_saved') ?>
		</div>
	</div>
<?php endif; ?>

      
<div class="panel panel-default">
	<div class="panel-heading">
		<?= Html::encode($this->title) ?>
	</div>
	<div class="panel-body">
		<?php $form = \yii\widgets\ActiveForm::begin([
			'id' => 'profile-form',
			'options' => ['class' => 'form-horizontal'],
			'fieldConfig' => [
				'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
				'labelOptions' => ['class' => 'col-lg-3 control-label'],
			],
		]); ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'public_email') ?>

		<?= $form->field($model, 'website') ?>

		<?= $form->field($model, 'location') ?>

		<?= $form->field($model, 'gravatar_email')->hint(\yii\helpers\Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com')) ?>

		<?= $form->field($model, 'bio')->textarea() ?>

		<div class="form-group">
			<div class="col-lg-offset-3 col-lg-9">
				<?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-success']) ?><br>
			</div>
		</div>

		<?php \yii\widgets\ActiveForm::end(); ?>
	</div>
</div>
<?php $this->endContent();