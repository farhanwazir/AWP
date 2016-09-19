<?php  if ( ! defined('BASEPATH')) exit('No tiene permitido acceder al script');

/**

* Name:  Auth Lang - English

*

* Author: Ben Edmunds

* 		  ben.edmunds@gmail.com

*         @benedmunds

*

* Author: Daniel Davis

*         @ourmaninjapan

*

* Location: http://github.com/benedmunds/ion_auth/

*

* Created:  03.09.2013

*

* Description:  English language file for Ion Auth example views

*

*/



// Errors

$lang['error_csrf'] = 'Este formulario de envío no pasó el control de seguridad';



// Login

$lang['login_heading']         = 'Ingresar';

$lang['login_subheading']      = 'Ingrese usuario y contraseña.';

$lang['login_identity_label']  = 'Email:';

$lang['login_password_label']  = 'Contraseña:';

$lang['login_remember_label']  = 'Recordar mis datos:';

$lang['login_submit_btn']      = 'Iniciar Sesión';

$lang['login_forgot_password'] = '¿Olvidó su contraseña?';



// Index

$lang['index_heading']           = 'Usuarios';

$lang['index_subheading']        = 'Lista de usuarios.';

$lang['index_fname_th']          = 'Nombre';

$lang['index_lname_th']          = 'Apellido';

$lang['index_email_th']          = 'Email';

$lang['index_groups_th']         = 'Grupos';

$lang['index_status_th']         = 'Estado';

$lang['index_action_th']         = 'Acción';

$lang['index_active_link']       = 'Activo';

$lang['index_inactive_link']     = 'Inactivo';

$lang['index_create_user_link']  = 'Crear nuevo usuario';

$lang['index_create_group_link'] = 'Crear nuevo grupo';



// Deactivate User

$lang['deactivate_heading']                  = 'Desactivar usuario';

$lang['deactivate_subheading']               = '¿Estas seguro que quieres desactivar el usuario? \'%s\'';

$lang['deactivate_confirm_y_label']          = 'Si:';

$lang['deactivate_confirm_n_label']          = 'No:';

$lang['deactivate_submit_btn']               = 'Enviar';

$lang['deactivate_validation_confirm_label'] = 'Confirmación';

$lang['deactivate_validation_user_id_label'] = 'ID de Usuario';



// Create User

$lang['create_user_heading']                           = 'Nuevo Usuario';

$lang['create_user_subheading']                        = 'Ingrese los datos del usuario.';

$lang['create_user_fname_label']                       = 'Nombre:';

$lang['create_user_lname_label']                       = 'Apellidos:';

$lang['create_user_company_label']                     = 'Compañía:';

$lang['create_user_email_label']                       = 'Email:';

$lang['create_user_phone_label']                       = 'Teléfono:';

$lang['create_user_password_label']                    = 'Contraseña:';

$lang['create_user_password_confirm_label']            = 'Confirme Contraseña:';

$lang['create_user_submit_btn']                        = 'Crear Usuario';

$lang['create_user_validation_fname_label']            = 'Nombre';

$lang['create_user_validation_lname_label']            = 'Apellidos';

$lang['create_user_validation_email_label']            = 'Email';

$lang['create_user_validation_phone_label']            = 'Teléfono';

$lang['create_user_validation_company_label']          = 'Compañía';

$lang['create_user_validation_password_label']         = 'Contraseña';

$lang['create_user_validation_password_confirm_label'] = 'Confirmación de Contraseña';



// Edit User

$lang['edit_user_heading']                           = 'Editar Usuario';

$lang['edit_user_subheading']                        = 'Ingrese los datos del usuario.';

$lang['edit_user_fname_label']                       = 'Nombre:';

$lang['edit_user_lname_label']                       = 'Apellidos:';

$lang['edit_user_company_label']                     = 'Compañía:';

$lang['edit_user_email_label']                       = 'Email:';

$lang['edit_user_phone_label']                       = 'Teléfono:';

$lang['edit_user_password_label']                    = 'Contraseña: (en caso de cambiar la contraseña)';

$lang['edit_user_password_confirm_label']            = 'Confirmación de Contraseña: (en caso de cambiar la contraseña)';

$lang['edit_user_groups_heading']                    = 'Member of groups';

$lang['edit_user_submit_btn']                        = 'Save User';

$lang['edit_user_validation_fname_label']            = 'Nombres';

$lang['edit_user_validation_lname_label']            = 'Apellidos';

$lang['edit_user_validation_email_label']            = 'Email';

$lang['edit_user_validation_phone_label']            = 'Teléfono';

$lang['edit_user_validation_company_label']          = 'Compañía';

$lang['edit_user_validation_groups_label']           = 'Groups';

$lang['edit_user_validation_password_label']         = 'Contraseña';

$lang['edit_user_validation_password_confirm_label'] = 'Confirmación de Contraseña';



// Create Group

$lang['create_group_title']                  = 'Crear Grupo';

$lang['create_group_heading']                = 'Crear Grupo';

$lang['create_group_subheading']             = 'Ingrese la información del grupo.';

$lang['create_group_name_label']             = 'Nombre del grupo:';

$lang['create_group_desc_label']             = 'Descripción:';

$lang['create_group_submit_btn']             = 'Guardar';

$lang['create_group_validation_name_label']  = 'Nombre del grupo';

$lang['create_group_validation_desc_label']  = 'Descripción';



// Edit Group

$lang['edit_group_title']                  = 'Editar Grupo';

$lang['edit_group_saved']                  = 'Grupo Guardado';

$lang['edit_group_heading']                = 'Editar Grupo';

$lang['edit_group_subheading']             = 'Ingrese la información del grupo.';

$lang['edit_group_name_label']             = 'Nombre del grupo:';

$lang['edit_group_desc_label']             = 'Descripción:';

$lang['edit_group_submit_btn']             = 'Guardar grupo';

$lang['edit_group_validation_name_label']  = 'Nombre del grupo';

$lang['edit_group_validation_desc_label']  = 'Descripción';



// Change Password

$lang['change_password_heading']                               = 'Cambiar contraseña';

$lang['change_password_old_password_label']                    = 'Contraseña actual:';

$lang['change_password_new_password_label']                    = 'Nueva contraseña (al menos %s caracteres de longitud):';

$lang['change_password_new_password_confirm_label']            = 'Confirme nueva contraseña:';

$lang['change_password_submit_btn']                            = 'Cambiar';

$lang['change_password_validation_old_password_label']         = 'Contraseña anterior';

$lang['change_password_validation_new_password_label']         = 'Nueva contraseña';

$lang['change_password_validation_new_password_confirm_label'] = 'Confirme nueva contraseña';



// Forgot Password

$lang['forgot_password_heading']                 = '¿Olvidó su contraseña?';

$lang['forgot_password_subheading']              = 'Por favor ingrese %s para que enviemos un email de cambio de contraseña.';

$lang['forgot_password_email_label']             = '%s:';

$lang['forgot_password_submit_btn']              = 'Enviar';

$lang['forgot_password_validation_email_label']  = 'Email';

$lang['forgot_password_identity_label'] = 'Identity';

$lang['forgot_password_email_identity_label']    = 'Email';

$lang['forgot_password_email_not_found']         = 'Su email no se encuentra registrado.';



// Reset Password

$lang['reset_password_heading']                               = 'Cambiar contraseña';

$lang['reset_password_new_password_label']                    = 'Nueva contraseña (al menos %s caracteres de longitud)):';

$lang['reset_password_new_password_confirm_label']            = 'Confirme nueva contraseña:';

$lang['reset_password_submit_btn']                            = 'Cambiar';

$lang['reset_password_validation_new_password_label']         = 'Nueva contraseña';

$lang['reset_password_validation_new_password_confirm_label'] = 'Confirme nueva contraseña';

