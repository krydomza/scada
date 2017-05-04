<?php
require_once('config.php');  // pobranie danych konfiguracyjnych do polaczenia z Memcache

// polaczenie z baza Memcache
$memcache1 = new Memcache; 
$memcache1->connect($host,$port) or die ("Could not connect"); 

		//pobór całych obiektów z Memcache
		$rtask_diris = $memcache1->get('rtask-diris');
		$rtask1 = $memcache1->get('rtask1');
		$rtask3 = $memcache1->get('rtask3');
		$rgnn1 = $memcache1->get('rgnn1');
		$rgnn2 = $memcache1->get('rgnn2');
		$rgtask = $memcache1->get('rgtask');
		$rgtask = $memcache1->get('rgtask');
		$rups1 = $memcache1->get('rups1');
		$rups2 = $memcache1->get('rups2');
		$rups3_1 = $memcache1->get('rups3-1');
		$rups3_2 = $memcache1->get('rups3-2');
		$rups4 = $memcache1->get('rups4');
		$rups8 = $memcache1->get('rups8');
		$rups9_1 = $memcache1->get('rups9-1');
		$rups9_2 = $memcache1->get('rups9-2');
		$rups9_3 = $memcache1->get('rups9-3');

		//==========STANY ŁĄCZNIKÓW IN, OUT, BYPASS, MANUAL BYPASS================
		//-----------------------------------RUPS1---------------------------------------
		// RUPS1 IN
		$rups1_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 BYPASS
		$rups1_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 MANUAL-BYPASS
		$rups1_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 OUT
		$rups1_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS2---------------------------------------
		// RUPS2 IN
		$rups2_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS2 BYPASS
		$rups2_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS2 MANUAL-BYPASS
		$rups2_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS2 OUT
		$rups2_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS3_1---------------------------------------
		// RUPS3_1 IN
		$rups3_1_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS3_1 BYPASS
		$rups3_1_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS3_1 MANUAL-BYPASS
		$rups3_1_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS3_1 OUT
		$rups3_1_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS3_2---------------------------------------
		// RUPS3_2 IN
		$rups3_2_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS3_2 BYPASS
		$rups3_2_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS3_2 MANUAL-BYPASS
		$rups3_2_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS3_2 OUT
		$rups3_2_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS4---------------------------------------
		// RUPS4 IN
		$rups4_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 BYPASS
		$rups4_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 MANUAL-BYPASS
		$rups4_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 OUT
		$rups4_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS8---------------------------------------
		// RUPS8 IN
		$rups8_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 BYPASS
		$rups8_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 MANUAL-BYPASS
		$rups8_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS1 OUT
		$rups8_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS9_1---------------------------------------
		// RUPS9_1 IN
		$rups9_1_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_1 BYPASS
		$rups9_1_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_1 MANUAL-BYPASS
		$rups9_1_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_1 OUT
		$rups9_1_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS9_2---------------------------------------
		// RUPS9_2 IN
		$rups9_2_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_2 BYPASS
		$rups9_2_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_2 MANUAL-BYPASS
		$rups9_2_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_2 OUT
		$rups9_2_OUT=1;   // narazie na sztywno !!!!!!!!!!!
		//-----------------------------------RUPS9_3---------------------------------------
		// RUPS9_3 IN
		$rups9_3_IN=1;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_3 BYPASS
		$rups9_3_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_3 MANUAL-BYPASS
		$rups9_3_M_BYPASS=0;   // narazie na sztywno !!!!!!!!!!!
		// RUPS9_3 OUT
		$rups9_3_OUT=1;   // narazie na sztywno !!!!!!!!!!!

?>