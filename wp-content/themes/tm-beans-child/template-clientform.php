<?php
/**
 * Template Name: ClientForm Page
 *
 * A page showing Client Form
 *
 *
 * @package WordPress
 * @subpackage mumohal
 * @since mumohal 1.0
 */
?>
<!-- Titlebar
================================================== -->
<?php 
function beans_create_client_form()
{
$error_message = false;
 
if (is_array($_POST) && count($_POST)) {
	if (trim($_POST['name']) === '') {
		$error_message[] = 'Please enter a name';
        $hasError = true;
    }
	if (trim($_POST['phone']) === '') {
		$error_message[] = 'Please enter a phone';
        $hasError = true;
    }
	if (trim($_POST['email']) === '') {
		$error_message[] = 'Please enter an email';
        $hasError = true;
    }
}
if (is_array($error_message) && count($error_message)) {
?>
    <div class="uk-alert uk-alert-danger"><?php echo(implode('<br />', $error_message)); ?></div>
    <div class="clearfix"></div>
<?php
}
?>
<p>Fill the form below to add new client.</p>
<form class="uk-form uk-form-horizontal" action="" id="primary_client_form" method="POST">
	<fieldset>
		<div class="uk-form-row">
			<label class="uk-form-label" for="name">Name: </label>
			<div class="uk-form-controls">
				<input type="text" name="name" id="name" class="required" placeholder="Client Name" value="<?php if (isset($_POST['name'])) echo($_POST['name']); ?>" />
			</div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label" for="gender">Gender: </label>
			<div class="uk-form-controls">
				<select name="gender" class="required">
					<option value="female">Female</option>
					<option value="male">Male</option>
					<option value="other">Other</option>
				</select>
			</div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label" for="phone">Phone: </label>
			<div class="uk-form-controls">
				<input type="text" name="phone" id="phone" class="required" placeholder="Client Phone" value="<?php if (isset($_POST['phone'])) echo($_POST['phone']); ?>" />
			</div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label" for="email">Email: </label>
			<div class="uk-form-controls">
				<input type="email" name="email" id="email" class="required" placeholder="Client Email" value="<?php if (isset($_POST['email'])) echo($_POST['email']); ?>" />
			</div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label" for="address">Address: </label>
			<div class="uk-form-controls">
				<input type="text" name="address" id="address" placeholder="Client Address" value="<?php if (isset($_POST['address'])) echo($_POST['address']); ?>" />
			</div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label" for="nationality">Nationality: </label>
			<div class="uk-form-controls">
				<input type="text" name="nationality" id="nationality" placeholder="Client Nationality" value="<?php if (isset($_POST['nationality'])) echo($_POST['nationality']); ?>" />
			</div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label" for="nationality">Date of Birth: </label>
			<div class="uk-form-icon" style="margin-left: 15px;">
				<i class="uk-icon-calendar"></i>
				<input type="text" name="dob" id="dob" placeholder="Date of Birth" style="padding-left: 30px !important;" value="<?php if (isset($_POST['dob'])) echo($_POST['dob']); ?>" />
			</div>
		</div>
		<div class="uk-form-row">
            <label class="uk-form-label" for="education">Education Background: </label>
            <div class="uk-form-controls">
                <textarea id="education" cols="30" rows="5" placeholder="Education Background" name="education"><?php if (isset($_POST['education'])) { if (function_exists('stripslashes')) { echo(stripslashes($_POST['education'])); } else { echo($_POST['postContent']); }} ?>
</textarea>
            </div>
        </div>
        <div class="uk-form-row">
            <span class="uk-form-label">Preferred mode of contact: </span>
            <div class="uk-form-controls uk-form-controls-text">
                <input type="radio" id="email_radio" name="contact_mode">&nbsp;<label for="email_radio">E-mail</label>
                <input type="radio" id="phone_radio" name="contact_mode">&nbsp;<label for="phone_radio">Phone</label>
                <input type="radio" id="none_radio" name="contact_mode">&nbsp;<label for="none_radio">None</label>
            </div>
        </div>
        <div class="uk-form-row"></div>
        <div class="uk-form-row">
            <button class="uk-button uk-button-primary" type="submit">Add Client</button>
        </div>
    </fieldset>
</form>

<?php
}
add_action('beans_content_append_markup', 'beans_create_client_form');

beans_load_document();

