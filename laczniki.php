<?php
require_once('wczytywanie.php'); 

$limity = parse_ini_file("konfiguracje.ini", true); 

// ====================WARUNKI - KOLORY ŁĄCZNIKÓW zależnie od stanu==============================
//funkcja dla łącznika IN oraz OUT
function kolor($x,$kolor_lacznik_normal,$kolor_lacznik_anomalia)
{	
	if($x==1) // stan zamkniety IN , OUT
	{
		$kolor=$kolor_lacznik_normal;	
	}
	else // kolor dla anomalii - otwarty IN, OUT
	{
		$kolor=$kolor_lacznik_anomalia;
	}	
	return $kolor;
}

//funkcja dla łącznika BYPASS oraz MANUAL-BYPASS
function negacja_kolor($y,$kolor_lacznik_normal,$kolor_lacznik_anomalia)
{
	//var kolor;
	if($y==0)
	{
		$kolor=$kolor_lacznik_normal;	
	}
	else // kolor dla anomalii
	{
		$kolor=$kolor_lacznik_anomalia;
	}	
	return $kolor;
}
// wspolrzedne dla stanu lacznika w RUPS (OTWARTY , ZAMKNIETY)
function stan_lacznika($stan,$nr_rups)
{	
	if($stan==1 && $nr_rups==1)  // zamkniety dla rups1
	{
		$wspolrzedna=230;	
	}
	elseif($stan==0 && $nr_rups==1)  // otwarty dla rups1
	{
		$wspolrzedna=220;
	}	
	elseif($stan==1 && $nr_rups==2)  // zamkniety dla rups2
	{
		$wspolrzedna=460;	
	}
	elseif($stan==0 && $nr_rups==2)  // otwarty dla rups2
	{
		$wspolrzedna=450;
	}	
	elseif($stan==1 && $nr_rups==3.1)  // zamkniety dla rups3
	{
		$wspolrzedna=690;	
	}
	elseif($stan==0 && $nr_rups==3.1)  // otwarty dla rups3
	{
		$wspolrzedna=680;
	}
	elseif($stan==1 && $nr_rups==3.2)  // zamkniety dla rups3
	{
		$wspolrzedna=710;	
	}
	elseif($stan==0 && $nr_rups==3.2)  // otwarty dla rups3
	{
		$wspolrzedna=700;
	}
	elseif($stan==1 && $nr_rups==4)  // zamkniety dla rups4
	{
		$wspolrzedna=940;	
	}
	elseif($stan==0 && $nr_rups==4)  // otwarty dla rups4
	{
		$wspolrzedna=930;
	}
	elseif($stan==1 && $nr_rups==8)  // zamkniety dla rups8
	{
		$wspolrzedna=1170;	
	}
	elseif($stan==0 && $nr_rups==8)  // otwarty dla rups8
	{
		$wspolrzedna=1160;
	}	
	elseif($stan==1 && $nr_rups==9.1)  // zamkniety dla rups9.1
	{
		$wspolrzedna=1415;	
	}
	elseif($stan==0 && $nr_rups==9.1)  // otwarty dla rups9.1
	{
		$wspolrzedna=1405;
	}
	elseif($stan==1 && $nr_rups==9.2)  // zamkniety dla rups9.2
	{
		$wspolrzedna=1435;	
	}
	elseif($stan==0 && $nr_rups==9.2)  // otwarty dla rups9.2
	{
		$wspolrzedna=1425;
	}		
	elseif($stan==1 && $nr_rups==9.3)  // zamkniety dla rups9.3
	{
		$wspolrzedna=1455;	
	}
	elseif($stan==0 && $nr_rups==9.3)  // otwarty dla rups9.3
	{
		$wspolrzedna=1445;
	}	
	
	return $wspolrzedna;
}

//=====================RUPS1=======================
//kolor łącznika IN RUPS1 
$rups1_kolor_lacznika_IN=kolor($rups1_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS1
$rups1_kolor_lacznika_bypass=negacja_kolor($rups1_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS1
$rups1_kolor_lacznika_m_bypass=negacja_kolor($rups1_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS1
$rups1_kolor_lacznika_OUT=kolor($rups1_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups1_stan_lacznika_IN=stan_lacznika($rups1_IN,1);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups1_stan_lacznika_bypass=stan_lacznika($rups1_BYPASS,1);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups1_stan_lacznika_m_bypass=stan_lacznika($rups1_M_BYPASS,1);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups1_stan_lacznika_OUT=stan_lacznika($rups1_OUT,1);

//=====================RUPS2=======================
//kolor łącznika IN RUPS2 
$rups2_kolor_lacznika_IN=kolor($rups2_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS2
$rups2_kolor_lacznika_bypass=negacja_kolor($rups2_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS2
$rups2_kolor_lacznika_m_bypass=negacja_kolor($rups2_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS2 
$rups2_kolor_lacznika_OUT=kolor($rups2_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups2_stan_lacznika_IN=stan_lacznika($rups2_IN,2);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups2_stan_lacznika_bypass=stan_lacznika($rups2_BYPASS,2);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups2_stan_lacznika_m_bypass=stan_lacznika($rups2_M_BYPASS,2);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups2_stan_lacznika_OUT=stan_lacznika($rups2_OUT,2);

//=====================RUPS3-1=======================
//kolor łącznika IN RUPS3-1 
$rups3_1_kolor_lacznika_IN=kolor($rups3_1_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS3
$rups3_1_kolor_lacznika_bypass=negacja_kolor($rups3_1_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS3
$rups3_1_kolor_lacznika_m_bypass=negacja_kolor($rups3_1_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS3
$rups3_1_kolor_lacznika_OUT=kolor($rups3_1_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);

//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups3_1_stan_lacznika_IN=stan_lacznika($rups3_1_IN,3.1);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups3_1_stan_lacznika_bypass=stan_lacznika($rups3_1_BYPASS,3.1);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups3_1_stan_lacznika_m_bypass=stan_lacznika($rups3_1_M_BYPASS,3.1);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups3_1_stan_lacznika_OUT=stan_lacznika($rups3_1_OUT,3.1);

//=====================RUPS3-2=======================
//kolor łącznika IN RUPS3-2 
$rups3_2_kolor_lacznika_IN=kolor($rups3_2_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS3
$rups3_2_kolor_lacznika_bypass=negacja_kolor($rups3_2_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS3
$rups3_2_kolor_lacznika_m_bypass=negacja_kolor($rups3_2_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS3
$rups3_2_kolor_lacznika_OUT=kolor($rups3_2_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);

//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups3_2_stan_lacznika_IN=stan_lacznika($rups3_2_IN,3.2);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups3_2_stan_lacznika_bypass=stan_lacznika($rups3_2_BYPASS,3.2);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups3_2_stan_lacznika_m_bypass=stan_lacznika($rups3_2_M_BYPASS,3.2);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups3_2_stan_lacznika_OUT=stan_lacznika($rups3_2_OUT,3.2);


//=====================RUPS4=======================
//kolor łącznika IN RUPS4 
$rups4_kolor_lacznika_IN=kolor($rups4_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS4
$rups4_kolor_lacznika_bypass=negacja_kolor($rups4_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS4
$rups4_kolor_lacznika_m_bypass=negacja_kolor($rups4_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS4 
$rups4_kolor_lacznika_OUT=kolor($rups4_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups4_stan_lacznika_IN=stan_lacznika($rups4_IN,4);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups4_stan_lacznika_bypass=stan_lacznika($rups4_BYPASS,4);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups4_stan_lacznika_m_bypass=stan_lacznika($rups4_M_BYPASS,4);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups4_stan_lacznika_OUT=stan_lacznika($rups4_OUT,4);


//=====================RUPS8=======================
//kolor łącznika IN RUPS8 
$rups8_kolor_lacznika_IN=kolor($rups8_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS8
$rups8_kolor_lacznika_bypass=negacja_kolor($rups8_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS8
$rups8_kolor_lacznika_m_bypass=negacja_kolor($rups8_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS8 
$rups8_kolor_lacznika_OUT=kolor($rups8_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups8_stan_lacznika_IN=stan_lacznika($rups8_IN,8);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups8_stan_lacznika_bypass=stan_lacznika($rups8_BYPASS,8);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups8_stan_lacznika_m_bypass=stan_lacznika($rups8_M_BYPASS,8);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups8_stan_lacznika_OUT=stan_lacznika($rups8_OUT,8);


//=====================RUPS9=======================
//=====================RUPS9-1=======================
//kolor łącznika IN RUPS9-1 
$rups9_1_kolor_lacznika_IN=kolor($rups9_1_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS9_1
$rups9_1_kolor_lacznika_bypass=negacja_kolor($rups9_1_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS9_1
$rups9_1_kolor_lacznika_m_bypass=negacja_kolor($rups9_1_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS9_1
$rups9_1_kolor_lacznika_OUT=kolor($rups9_1_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);

//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups9_1_stan_lacznika_IN=stan_lacznika($rups9_1_IN,9.1);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups9_1_stan_lacznika_bypass=stan_lacznika($rups9_1_BYPASS,9.1);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups9_1_stan_lacznika_m_bypass=stan_lacznika($rups9_1_M_BYPASS,9.1);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups9_1_stan_lacznika_OUT=stan_lacznika($rups9_1_OUT,9.1);

//=====================RUPS9-2=======================
//kolor łącznika IN RUPS9-2 
$rups9_2_kolor_lacznika_IN=kolor($rups9_2_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS9_2
$rups9_2_kolor_lacznika_bypass=negacja_kolor($rups9_2_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS9_2
$rups9_2_kolor_lacznika_m_bypass=negacja_kolor($rups9_2_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS9_2
$rups9_2_kolor_lacznika_OUT=kolor($rups9_2_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);

//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups9_2_stan_lacznika_IN=stan_lacznika($rups9_2_IN,9.2);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups9_2_stan_lacznika_bypass=stan_lacznika($rups9_2_BYPASS,9.2);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups9_2_stan_lacznika_m_bypass=stan_lacznika($rups9_2_M_BYPASS,9.2);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups9_2_stan_lacznika_OUT=stan_lacznika($rups9_2_OUT,9.2);

//=====================RUPS9-3=======================
//kolor łącznika IN RUPS9-3 
$rups9_3_kolor_lacznika_IN=kolor($rups9_3_IN,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika BYPASS RUPS9_3
$rups9_3_kolor_lacznika_bypass=negacja_kolor($rups9_3_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika MANUAL BYPASS RUPS9_3
$rups9_3_kolor_lacznika_m_bypass=negacja_kolor($rups9_3_M_BYPASS,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);
//kolor łącznika OUT RUPS9_3
$rups9_3_kolor_lacznika_OUT=kolor($rups9_3_OUT,$limity['WYL']['kolor_lacznik_normal'],$limity['WYL']['kolor_lacznik_anomalia']);

//-------wizualizacja stanu lacznikow IN,OUT,BYPASS,MANUAL-BYPASS----------
// zmiana stanu lacznika IN otwarty - zamkniety
$rups9_3_stan_lacznika_IN=stan_lacznika($rups9_3_IN,9.3);
// zmiana stanu lacznika BYPASS otwarty - zamkniety
$rups9_3_stan_lacznika_bypass=stan_lacznika($rups9_3_BYPASS,9.3);
// zmiana stanu lacznika MANUAL-BYPASS otwarty - zamkniety
$rups9_3_stan_lacznika_m_bypass=stan_lacznika($rups9_3_M_BYPASS,9.3);
// zmiana stanu lacznika OUT otwarty - zamkniety
$rups9_3_stan_lacznika_OUT=stan_lacznika($rups9_3_OUT,9.3);


?>