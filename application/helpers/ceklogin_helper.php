<?php

function ceklogin()
{
  $ci =& get_instance();
  if (!$ci->session->userdata('id_user_backend')) {
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
  }
  // else {
  //     if ($ci->session->userdata('id_role') == 1) {
  //       redirect('admin/Auth');
  //     } elseif ($ci->session->userdata('id_role') == 3) {
  //       redirect('admin/Auth');
  //     }
  // }
}

function instance_helper()
{
  return get_instance();
}
function menu_helper($ci)
{
  return $ci->db->get('menu_grup');
}
function submenu_helper($ci,$id_menu)
{
  return $ci->db->get_where('sub_menu',['id_menu'=>$id_menu]);
}
function kategori_helper($ci,$id_submenu)
{
  return $ci->db->get_where('kategori',['id_sub_menu'=>$id_submenu]);
}