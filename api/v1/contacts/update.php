<?php
require('../validate_api_key.php');

require('../require_post_method.php');

// Parse Info
$contact_id = intval($_POST['contact_id']);
include('contact_model.php');

// Default
$update_id = FALSE;

if(!empty($name) && !empty($email)){

  $update_sql = mysqli_query($mysqli,"UPDATE contacts SET contact_name = '$name', contact_title = '$title', contact_phone = '$phone', contact_extension = '$extension', contact_mobile = '$mobile', contact_email = '$email', contact_notes = '$notes', contact_auth_method = '$auth_method', contact_updated_at = NOW(), contact_department_id = $department, contact_location_id = $location_id, contact_client_id = $client_id, company_id = $company_id WHERE contact_id = $contact_id LIMIT 1");

  // Check insert & get insert ID
  if($update_sql){
    $update_id = mysqli_affected_rows($mysqli);

    //Logging
    mysqli_query($mysqli,"INSERT INTO logs SET log_type = 'Contact', log_action = 'Updated', log_description = '$name via API ($api_key_name)', log_ip = '$ip', log_created_at = NOW(), log_client_id = $client_id, company_id = $company_id");
    mysqli_query($mysqli,"INSERT INTO logs SET log_type = 'API', log_action = 'Success', log_description = 'Updated contact $name via API ($api_key_name)', log_ip = '$ip', log_created_at = NOW(), log_client_id = $client_id, company_id = $company_id");
  }
}

// Output
include('../update_output.php');