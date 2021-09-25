<?php
/**
 * @var \App\core\View $this
 * @var \App\core\UserModel $model
 */

use App\core\form\Form;

$this->title = "Register";
?>
<h1>Create an account</h1>
<?php $form = Form::begin("/register", "post")?>
<?php echo $form->inputField($model, "username") ?>
<?php echo $form->inputField($model, "email") ?>
<?php echo $form->inputField($model, "password")->passwordField() ?>
<?php echo $form->inputField($model, "confirmPassword")->passwordField() ?>
<button type="submit" class="btn btn-primary">Register</button>
<?php $form->end() ?>

