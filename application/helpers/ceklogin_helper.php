<?php


function ceklogin()
{
    $ci =& get_instance();
    if (!$ci->session->userdata('id_user_frontend')) {
        redirect('admin/auth');
    } else {
        if ($ci->session->userdata('id_role') == 2) {
          redirect('admin/Auth');
        } elseif ($ci->session->userdata('id_role') == 3) {
          redirect('admin/Auth');
        }
    }
}

function ceklogincustomer()
{
  $ci = get_instance();
  if (!isset($_SESSION['id_user'])) {
    $ci->session->set_flashdata('failed','anda harus login terlebih dahulu');
    redirect('auth');
  } else {
      if ($ci->session->userdata('id_role') == 1) {
        redirect('admin/Auth');
      } elseif ($ci->session->userdata('id_role') == 3) {
        redirect('admin/Auth');
      }
  }
}