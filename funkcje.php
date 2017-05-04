<?php
// ==================================== FUNKCJE =========================================================
// funkcja sprawdzająca ograniczenia względem wartości min i max ------------------------------------------------------------
function ograniczenia($parametr,$wartosc_min,$wartosc_max,$kolor_anomalia,$kolor_normal) //np.  ( $rups1_P_IN ; ograniczenie z konfiga ; ...)
{
	if ($parametr > $wartosc_min && $parametr < $wartosc_max)
	{
		$kolor=$kolor_normal;		
	}
	else
	{
		$kolor=$kolor_anomalia;
	}
	return $kolor;
}
// linie do wyłączników w UPS-ach ----------------------------------------------------------------------------------------------------------
function rysuj_linie($x1, $y1, $x2, $y2, $kolor, $klasa) 
{
	$dane="<line class=\"$klasa\" x1=\"$x1\" y1=\"$y1\" x2=\"$x2\" y2=\"$y2\" style=\"stroke:$kolor\" />";
	return $dane;
}
// linie bez sterowan kolorem-----------------------------------------------------------------------------------------------------------------
function linia($x1, $y1, $x2, $y2, $klasa) 
{
	$dane="<line class=\"$klasa\" x1=\"$x1\" y1=\"$y1\" x2=\"$x2\" y2=\"$y2\" />";
	return $dane;
}
// okregi od wyłączników w UPS-ach --------------------------------------------------------------------------------------------------------
function rysuj_kolo($cx, $cy, $r, $kolor, $klasa) 
{
	$dane="<circle class=\"$klasa\" cx=\"$cx\" cy=\"$cy\" r=\"$r\" style=\"stroke:$kolor\" />";
	return $dane;
}
// okregi inne np. symbol transformatora ------------------------------------------------------------------------------------------------
function kolo($cx, $cy, $r, $klasa) 
{
	$dane="<circle class=\"$klasa\" cx=\"$cx\" cy=\"$cy\" r=\"$r\" />";
	return $dane;
}
//dla danych ktore wyswietlane moga byc jako int ------------------------------------------------------------------------------------
function pisz($x, $y,$tekst1,$dana,$tekst2, $kolor, $klasa) 
{	
	$dana=(int) $dana; // rzutowanie do int
	$tekst="<text class=\"$klasa\" x=\"$x\" y=\"$y\" style=\"fill: $kolor\">$tekst1 $dana $tekst2</text>";					  
	
	return $tekst;	 
}
// dla danych ktore maja byc wyswietlane jako float ---------------------------------------------------------------------------------
function pisz_float($x, $y,$tekst1,$dana,$tekst2, $kolor, $klasa) 
{		
	$tekst="<text class=\"$klasa\" x=\"$x\" y=\"$y\" style=\"fill: $kolor\">$tekst1 $dana $tekst2</text>";		
	return $tekst;	 
}
// dla znacznikow <text> ; brak danych sterowanych
function tekst($x, $y,$klasa,$tekst1,$jednostka) 
{		
	$tekst="<text class=\"$klasa\" x=\"$x\" y=\"$y\"> $tekst1 $jednostka </text>";		
	return $tekst;	 
}
// rysowanie prostokata
function prostokat($x, $y,$szerokosc,$wysokosc, $klasa)
{ 
	$rect="<rect x=\"$x\" y=\"$y\" width=\"$szerokosc\" height=\"$wysokosc\" class=\"$klasa\" />";
	return $rect;
}
?>