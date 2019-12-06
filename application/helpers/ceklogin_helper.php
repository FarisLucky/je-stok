<?php

function ceklogin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('admin/auth');
    }
}
