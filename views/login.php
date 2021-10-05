<?php

use Minivel\Form\Form;

/**
 * @var Minivel\View $this
 * @var App\Models\User $model
 */

$this->title = "Login";
?>
<div class="form__container">
    <h1 class="display-5">Login</h1>
    <?php $form = Form::begin("/login", "post")?>
    <?php echo $form->inputField($model, "email") ?>
    <?php echo $form->inputField($model, "password")->passwordField() ?>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <?php $form->end() ?>
</div>
