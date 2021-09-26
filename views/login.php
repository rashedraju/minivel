<?php
/**
 * @var Minivel\View $this
 * @var App\Models\User $model
 */

use Minivel\Form\Form;

$this->title = "LoginForm";
?>

<h1>Login</h1>
<?php $form = Form::begin("/login", "post")?>
<?php echo $form->inputField($model, "email") ?>
<?php echo $form->inputField($model, "password")->passwordField() ?>
<button type="submit" class="btn btn-primary">Login</button>
<?php $form->end() ?>