<?php
if ( ! defined('BASEPATH')) exit ('No direct script access allowed');
if ( ! function_exists('rupiah'))
{
	function rupiah($number)
	{
		return 'Rp. '.number_format($number,2,',','.');
	}
}

if ( ! function_exists('cetak_judul'))
{
	function cetak_judul($judul, $heading=1, $others = null, $garis = true)
	{
		$result = heading($judul, $heading, $others);
		if($garis){
			$result .= "<hr/>";
		}
		return $result;
	}
}