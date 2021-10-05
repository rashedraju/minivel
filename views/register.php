<?php
use Minivel\Form\Form;

/**
 * @var Minivel\View $this
 * @var Minivel\UserModel $model
 */

$this->title = "Register";
?>
<div class="form__container">
    <h1 class="display-5">Create an account</h1>
    <?php $form = Form::begin("/register", "post")?>
    <?php echo $form->inputField($model, "username") ?>
    <?php echo $form->inputField($model, "email") ?>
    <?php echo $form->inputField($model, "password")->passwordField() ?>
    <?php echo $form->inputField($model, "confirmPassword")->passwordField() ?>
    <button type="submit" class="btn btn-primary w-100">Register</button>
    <?php $form->end() ?>
</div>

