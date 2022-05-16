# Redirects



```php
if ( isset( $_POST['default_role_redirect_url'] ) && ! empty( $_POST['default_role_redirect_url'] ) ) {
	$default_role_redirect_url = $_POST['default_role_redirect_url'];
} else {
	$default_role_redirect_url = home_url();
}

if ( isset( $_POST['role_based_redirect_url'] ) ) {
	$role_based_redirect_url = serialize( $_POST['role_based_redirect_url'] );
}

if ( isset( $_POST['o365_user_auth_redirect_after_login'] ) ) {
	$azure_login_setting_flow->after_login_redirect_url = $_POST['o365_user_auth_redirect_after_login'];
}
```

