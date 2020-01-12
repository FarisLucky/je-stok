<?php

function ceklogincustomer()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('admin/auth');
    } else {
        if ($ci->session->userdata('id_role') == 1) {
            redirect('admin/Auth');
        } elseif ($ci->session->userdata('id_role') == 3) {
            redirect('admin/Auth');
        }
    }
}
