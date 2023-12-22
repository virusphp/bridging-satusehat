<?php

use Illuminate\Http\Request;
use Virusphp\BridgingSatusehat\ReferensiController;

Route::get('/practition/{nik}', function($nik) {
	$practition = new ReferensiController;
	$practition = $practition->practition($nik);
	return $practition;
});