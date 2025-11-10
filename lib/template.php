<?php
class MyTemplate{
	function show($tpl_file_path){
		extract((array)$this);
		require_once($tpl_file_path);
	}
}
