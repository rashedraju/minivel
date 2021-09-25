<?php
/**
 * @var \App\core\View $this
 * @var \App\models\ContactForm $model
 */
$this->title = "Contact";
use App\core\form\Form;

?>
<h1>Contact</h1>
<?php $form = Form::begin("/contact", "post")?>
<?php echo $form->inputField($model, "name") ?>
<?php echo $form->inputField($model, "email") ?>
<?php echo $form->textareaField($model, "body") ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php $form->end() ?>