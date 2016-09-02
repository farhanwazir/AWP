<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

* Name:  Ion Auth Lang - English

*

* Author: Ben Edmunds

*         ben.edmunds@gmail.com

*         @benedmunds

*

* Location: http://github.com/benedmunds/ion_auth/

*

* Created:  03.14.2010

*

* Description:  English language file for Ion Auth messages and errors

*

*/



// Account Creation

$lang['account_creation_successful']            = 'Cuenta creada con éxito';

$lang['account_creation_unsuccessful']          = 'No se puede crear la cuenta';

$lang['account_creation_duplicate_email']       = 'El correo electrónico ya se utiliza o no es válido';

$lang['account_creation_duplicate_identity']    = 'Identidad ya utilizados o no válida';

$lang['account_creation_missing_default_group'] = 'Grupo predeterminado no establecido';

$lang['account_creation_invalid_default_group'] = 'El nombre del grupo predeterminado no es válido';





// Password

$lang['password_change_successful']          = 'Contraseña cambiada con éxito';

$lang['password_change_unsuccessful']        = 'No sue puede cambiar la contraseña';

$lang['forgot_password_successful']          = 'Se envió un correo de reinicio de contraseña';

$lang['forgot_password_unsuccessful']        = 'Imposible reinciar la contraseña';



// Activation

$lang['activate_successful']                 = 'Cuenta activada';

$lang['activate_unsuccessful']               = 'No se puede activar la cuenta';

$lang['deactivate_successful']               = 'Cuenta desactivada';

$lang['deactivate_unsuccessful']             = 'No es posible desactivar la cuenta';

$lang['activation_email_successful']         = 'Correo electrónico de activación enviado';

$lang['activation_email_unsuccessful']       = 'No se puede enviar correo electrónico de activación';



// Login / Logout

$lang['login_successful']                    = 'Conectado con éxito';

$lang['login_unsuccessful']                  = 'Login incorrecto';

$lang['login_unsuccessful_not_active']       = 'Cuenta inactiva';

$lang['login_timeout']                       = 'Temporalmente bloqueada. Inténtelo más tarde.';

$lang['logout_successful']                   = 'La conexión fue un éxito';



// Account Changes

$lang['update_successful']                   = 'La información de la cuenta se ha actualizado correctamente';

$lang['update_unsuccessful']                 = 'No se puede actualizar información de la cuenta';

$lang['delete_successful']                   = 'Usuario eliminado';

$lang['delete_unsuccessful']                 = 'No se puede eliminar el usuario';



// Groups

$lang['group_creation_successful']           = 'Grupo creado con éxito';

$lang['group_already_exists']                = 'El nombre de grupo ya está ocupado';

$lang['group_update_successful']             = 'Detalles del grupo actualizados';

$lang['group_delete_successful']             = 'Grupo borrado';

$lang['group_delete_unsuccessful']           = 'No se puede eliminar el grupo';

$lang['group_delete_notallowed']             = 'No se pueden eliminar a los administradores del group';

$lang['group_name_required']                 = 'El nombre del grupo es un campo obligatorio';

$lang['group_name_admin_not_alter']          = 'El nombre del grupo de administración no se puede cambiar';



// Activation Email

$lang['email_activation_subject']            = 'Activación de cuenta';

$lang['email_activate_heading']              = 'Activar cuenta para %s';

$lang['email_activate_subheading']           = 'Por favor, haga clic en el enlace %s.';

$lang['email_activate_link']                 = 'Activa tu cuenta';



// Forgot Password Email

$lang['email_forgotten_password_subject']    = 'Recordar Contraseña Verificación';

$lang['email_forgot_password_heading']       = 'Cambiar contraseña para %s';

$lang['email_forgot_password_subheading']    = 'Por favor, haga clic en el enlace %s.';

$lang['email_forgot_password_link']          = 'Restablecer su contraseña';



// New Password Email

$lang['email_new_password_subject']          = 'Nueva contraseña';

$lang['email_new_password_heading']          = 'Nueva contraseña para %s';

$lang['email_new_password_subheading']       = 'La contraseña se ha restablecido a: %s';

