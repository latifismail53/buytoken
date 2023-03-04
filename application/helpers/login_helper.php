<?php
defined('BASEPATH') or exit('No direct script access allowed');

function cek_login()
{
  $ci = &get_instance();
  $session = $ci->session->userdata('name');
  if ($session) {
    redirect('home');
  }
}

function cek_not_login()
{
  $ci = &get_instance();
  $session = $ci->session->userdata('name');
  if (!$session) {
    redirect('auth');
  }
}
