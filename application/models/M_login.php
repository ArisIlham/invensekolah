<?php

class M_login extends CI_Model
{

	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function query_validasi_username($username)
	{
		$result = $this->db->query("SELECT * FROM dt_user WHERE username='$username' LIMIT 1");
		return $result;
	}

	function query_validasi_password($username, $password)
	{
		$result = $this->db->query("SELECT * FROM dt_user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
		return $result;
	}
}
