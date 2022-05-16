/**
 * Empty input fields on UM registration form.
 *
 * @package aap_wp_functionality
 */

(function () {
	const changeLogin     = document.querySelector( 'article > .entry-content > .um-register > .um-form > form > .um-row > div > .um-field.um-field-user_login > div.um-field-area > input.um-form-field' ),
	changeFirstName       = document.querySelector( 'article > .entry-content > .um-register > .um-form > form > .um-row > div > .um-field.um-field-first_name > div.um-field-area > input.um-form-field' ),
	changeLastName        = document.querySelector( 'article > .entry-content > .um-register > .um-form > form > .um-row > div > .um-field.um-field-last_name > div.um-field-area > input.um-form-field' ),
		changeEmail       = document.querySelector( 'article > .entry-content > .um-register > .um-form > form > .um-row > div > .um-field.um-field-user_email > div.um-field-area > input.um-form-field' );
	changeLogin.value     = ''
	changeFirstName.value = ''
	changeLastName.value  = ''
	changeEmail.value     = ''
})();
