<h1>Create an account</h1>
<?php $form = \App\core\form\Form::begin("/register", "post")?>
<?php echo $form->field($model, "username") ?>
<?php echo $form->field($model, "email") ?>
<?php echo $form->field($model, "password")->passwordField() ?>
<?php echo $form->field($model, "confirmPassword")->passwordField() ?>
<button type="submit" class="btn btn-primary">Register</button>
<?php $form->end() ?>