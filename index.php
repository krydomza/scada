<?php

require_once('obliczenia.php'); // wczytanie przeliczonych danych
require_once('config.php'); // wczytanie konfiguracji - czas odswiezania strony
require_once('laczniki.php'); // stany łacznikow (IN,OUT,BYPASS..) wraz z odpowiednimi kolorami (anomalia, praca normalna)
require_once('warunki.php'); // warunki na awarie w UPS-ach

// require_once('ladowanie.php'); // do zaladowania symulowanej struktury danych do memcache ; trwalosc danych w memcache 24h

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Monitoring UPS</title>	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />	
	<meta http-equiv="Refresh" content="<?php echo $czas_odswiezania_strony ;?>" /> <!-- automatyczne odswiezanie strony co zadana ilosc sekund -> patrz w config.php -->
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>

<svg viewBox="0 0 1500 717"> <!-- automatyczne skalowanie obrazu dzięki 'viewBox' -->

<!----------------------------------------------TRANSFORMATORY------------------------------------------------>
<!----------------------------transformator2 -TR2----------------------------------->
	<?php
		echo tekst(485, 40,'tr','Tr2','');  // (x,y,nazwa_klasy,tekst,inny_tekst) 
		echo tekst(485, 60,'tr_g_moc','800 kVA','');  	
	// rysowanie symbolu transformatora :
		echo kolo(450, 60, 30, 'tr_kola'); 
		echo kolo(450, 90, 30, 'tr_kola'); 
	// linia od transformatora2 - TR2
		echo linia(450, 120, 450, 160, 'linia');
	// -----------WYŚWIETLANIE DANYCH TR2-----------------------------------
		echo prostokat(270, 45,140,60, 'tr_dymek');
		echo tekst(280, 70, 'tr_dane' ,$tr2_S_suma,'kVA');  
		echo tekst(280, 90,'tr_dane',$tr2_P_suma,'kW');  	
	?>		
<!-----------------------------transformator1- TR1------------------------------>
	<?php
		echo tekst(985, 40,'tr','Tr1','');  // (x,y,tekst,nazwa_klasy) 
		echo tekst(985, 60,'tr_g_moc','800 kVA','');  	
	// rysowanie symbolu transformatora :
		echo kolo(950, 60, 30, 'tr_kola'); 
		echo kolo(950, 90, 30, 'tr_kola'); 
	// linia od transformatora1 - TR1
		echo linia(950, 120, 950, 160, 'linia');
	// -----------WYŚWIETLANIE DANYCH TR1-----------------------------------
		echo prostokat(770, 45,140,60, 'tr_dymek');
		echo tekst(780, 70, 'tr_dane' ,$tr1_S_suma,'kVA');  
		echo tekst(780, 90,'tr_dane',$tr1_P_suma,'kW');  		
	// połączenia do dymka danych licznika TR1
		echo linia(850, 140, 943, 140, 'dymek_linia');
		echo linia(850, 105, 850, 140, 'dymek_linia');
		echo kolo(950, 140, 8, 'dymek_kolo'); 
	?>		
	<!----------------------------------------------GENERATORY------------------------------------------------>
	<!------------------------------generator2 - G2 ------------------------------------>
	<?php
		echo kolo(620, 60, 30, 'G_kolo'); 
		echo tekst(608, 72,'G','G','');  	
		echo tekst(660, 40,'G1_G2','G2','');  	
		echo tekst(660, 60,'tr_g_moc','550 kVA','');  	
	// linia od generatora2 do szyny
		echo linia(620, 89, 620, 160, 'linia');
	?>	
	<!---------------------------------generator1 - G1 --------------------------------->
	<?php
		echo kolo(1150, 60, 30, 'G_kolo'); 
		echo tekst(1138, 72,'G','G','');  	
		echo tekst(1188, 40,'G1_G2','G2','');  	
		echo tekst(1188, 60,'tr_g_moc','880 kVA','');  	
	// linia od generatora1 do szyny
		echo linia(1150, 89, 1150, 160, 'linia');
// --------------------------------------SZYNY ------------------------------------------------------------------		
	// linia - szyna1	
		echo linia(300, 160, 620, 160, 'szyna');
	// linia - szyna2	
		echo linia(770, 160, 1150, 160, 'szyna');		
	?>	
	<!-------------------------------------------------RTASK---------------------------------------------------->
	<?php 
		echo prostokat(1070, 200,160,60, 'rtask');	
	// linia: szyna2 -> RTASK
		echo linia(1130, 160, 1130, 200, 'linia');		
	//------------------------------linia: RTASK -> RUPS4---------------------
		echo linia(1105, 260, 1105, 455, 'linia');	
		echo linia(855, 455, 1105, 455, 'linia');	
		echo linia(855, 455, 855, 480, 'linia');		
	//------------------------------linia: RTASK -> RUPS8---------------------
		echo linia(1130, 260, 1130, 470, 'linia');		
		echo linia(1095, 470, 1130, 470, 'linia');		
		echo linia(1095, 470, 1130, 470, 'linia');		
		echo linia(1095, 470, 1095, 480, 'linia');		
	//------------------------------linia: RTASK -> RUPS9------------------------
		echo linia(1155, 260, 1155, 455, 'linia');	
		echo linia(1155, 455, 1335, 455, 'linia');	
		echo linia(1335, 455, 1335, 480, 'linia');	
	// ------------------------------WYŚWIETLANIE DANYCH  RTASK-----------------------
		echo tekst(1110, 225,'rtask_dane','RTASK','');  
		echo tekst(1082, 248,'rtask_dane1',$rtask_diris_S_suma,'kVA /');  
		echo tekst(1160, 248,'rtask_dane1',$rtask_diris_P_suma,'kW');  
	?>	
	<!-------------------------------------------------RTASK1 -------------------------------------------------->
	<?php 
		echo prostokat(360, 350,120,80, 'rtask');	
	//------------------------------WYŚWIETLANIE DANYCH RTASK1----------------------------
		echo tekst(375, 370,'rtask_dane','RTASK1','');  
		echo tekst(370, 395,'rtask_dane1',$rtask1_S_suma,' kVA');  
		echo tekst(370, 415,'rtask_dane1',$rtask1_P_suma,' kW');  	
	// ------------------------------linia: RTASK -> RUPS1---------------------
		echo linia(140, 450, 140, 480, 'linia');	
		echo linia(140, 450, 385, 450, 'linia');	
		echo linia(385, 430, 385, 450, 'linia');	
	// -----------------------------linia: RTASK->RUPS2-----------------------
		echo linia(410, 430, 410, 480, 'linia');	
	// ------------------------------linia RTASK RUPS3------------------------
		echo linia(615, 450, 615, 480, 'linia');	
		echo linia(615, 450, 435, 450, 'linia');	
		echo linia(435, 450, 435, 430, 'linia');	
	// ----------------------------linia: szyna -> RTASK1---------------------
		echo linia(300, 160, 300, 380, 'linia');	
		echo linia(300, 380, 360, 380, 'linia');	
	?>		
	<!-------------------------------------------------RTASK3 -------------------------------------------------->
	<?php 
		echo prostokat(360, 220,120,80, 'rtask');	
	// ------------------------------WYŚWIETLANIE DANYCH RTASK3----------------------
		echo tekst(375, 240,'rtask_dane','RTASK3','');  
		echo tekst(370, 265,'rtask_dane1',$rtask3_S_suma,'kVA');  	
		echo tekst(370, 285,'rtask_dane1',$rtask3_P_suma,'kW');  		
	// ------------------------------linia od szyna1 do  RTASK3------------------------
		echo linia(300, 250, 360, 250, 'linia');	
	// -------------------------------------------------P.Poż --------------------------------------------------
	// ------------------------------linia od szyny1 do Ppoż-----------------------------
		echo linia(520, 160, 520, 230, 'odbiory');	
	?>
	<!-- ----------------------------------------grot odb Ppoz------------------------------>
	<polygon points="513,230, 527,230,520,244" class="grot" />
	<?php
	//-----------------------------------------napis odb P.poz---------------------------
		echo tekst(500, 270,'Ppoz','P.Poż','');  
	// ------------------połączenie dymka danych od P.Poż-----------------------
		echo kolo(520, 210, 8, 'dymek_kolo'); 
		echo linia(527, 210, 590, 210, 'dymek_linia');	
	// ----------------------------WYŚWIETLANIE DANYCH P.Poż--------------------------------
		echo prostokat(580, 180,130,60, 'liczniki');	
		echo tekst(590, 205,'liczniki_dane',$licznik_p_Poz_S_suma,'kVA');  	
		echo tekst(590, 225,'liczniki_dane',$licznik_p_Poz_P_suma,'kW');
	// ----------------------------WYŚWIETLANIE DANYCH LICZNIK1----------------------------
		echo prostokat(90, 130,170,40, 'liczniki');	
		echo tekst(100, 155,'liczniki_dane',$licznik1_S_suma,'kVA /');  	
		echo tekst(185, 155,'liczniki_dane',$licznik1_P_suma,'kW');  	
	// ----------------------------LINIE DO LICZNIKA1--------------------------------
		echo linia(170, 170, 170, 190, 'dymek_linia');	
		echo linia(170, 190, 294, 190, 'dymek_linia');	
		echo kolo(300, 190, 8, 'dymek_kolo'); 
	?>
	<!------------------------------------------------PARTER---------------------------------------------------->
	<?php
		echo linia(170, 230, 300, 230, 'odbiory');	
		echo linia(170, 230, 170, 260, 'odbiory');	
	?>
	<!-- ----------------------------------------grot PARTER ----------------------->
	<polygon points="163,260, 177,260,170,274" class="grot"/>
	<!----------------------------WYŚWIETLANIE DANYCH PARTER----------------------------------->
	<?php
		echo prostokat(90, 280,160,40, 'liczniki');	
		echo tekst(185, 265,'parter','Parter',''); 
		echo tekst(100, 305,'liczniki_dane',$parter_S_suma,'kVA /'); 
		echo tekst(180, 305,'liczniki_dane',$parter_P_suma,'kW'); 
	?>	
	<!-------------------------------------------------PRZEŁĄCZNIK -FREON ------------------------------->	
	<?php
		echo prostokat(960, 200,50,50, 'przelacznik');	
	// ----------------------------rys. WYL-FREON ----------------------------
		echo linia(995, 200, 995, 215, 'linia');	
		echo linia(985, 235, 985, 250, 'linia');		
		echo linia(960, 217, 975, 217, 'linia');		
		echo linia(977, 217, 985, 235, 'linia');		
		echo kolo(995, 217, 4, 'wyl_kolo'); 
		echo kolo(977, 217, 4, 'wyl_kolo'); 
	// ---------------------linia: szyna -> przelacznik freon--------------
		echo linia(995, 160, 995, 200, 'linia');	
	// -------------------linia: przelacznik freon - > klim freon--------
		echo linia(985, 250, 985, 300, 'linia');		
	?>
	<!-- ----------------------------------------grot freon ------------------->
	<polygon points="978,300, 992,300,985,314" class="grot" />
	<?php
	// ---------------------linia: przelacznik freon -> RTASK1-----------
		echo linia(910, 217, 965, 217, 'linia');
		echo linia(910, 217, 910, 440, 'linia');	
		echo linia(450, 440, 910, 440, 'linia');		
		echo linia(450, 430, 450, 440, 'linia');		
	//---------------------------tekst klim. freon ------------------------------
		echo tekst(995, 285,'klim_napis','Klim.',''); 
		echo tekst(995, 305,'klim_napis','Freon',''); 	
	// ----------------------------wyswietlanie danych KLIM. FROEN ----------------------
		echo prostokat(935, 320,100,100, 'klim');	
		echo tekst(945, 345,'klim_dane','P=',''); 
		echo tekst(945, 365,'klim_dane','S=',''); 
		echo tekst(945, 385,'klim_dane','T=',''); 
	?>
	<!-------------------------------------------------PRZEŁĄCZNIK -GLIKOL ------------------------------->
	<?php 	
		echo prostokat(800, 200,50,50, 'przelacznik');		
	// ----------------------------rys. WYL-GLIKOL ----------------------------
		echo linia(835, 200, 835, 215, 'linia');		
		echo linia(825, 235, 825, 250, 'linia');		
		echo linia(800, 217, 815, 217, 'linia');		
		echo linia(817, 217, 825, 235, 'linia');		
		echo kolo(835, 217, 4, 'wyl_kolo'); 
		echo kolo(817, 217, 4, 'wyl_kolo'); 	
	//---------------------linia: szyna -> przelacznik glikol---------------
		echo linia(835, 160, 835, 200, 'linia');
	// --------------------linia: przelacznik glikol -> klim glikol---------
		echo linia(825, 250, 825, 300, 'odbiory');
	?>	
	<!-- -------------------------------------grot GLIKOL -------------------->
	<polygon points="818,300, 832,300,825,314" class="grot"/>
	<?php
	//---------------------linia: przelacznik GLIKOL -> RTASK3---------
		echo linia(730, 217, 800, 217, 'linia');
		echo linia(730, 217, 730, 325, 'linia');
		echo linia(410, 325, 730, 325, 'linia');	
		echo linia(410, 300, 410, 325, 'linia');	
	// -------------------------napis klim. GLIKOL --------------------------
		echo tekst(835, 285,'klim_napis','Klim.',''); 
		echo tekst(835, 305,'klim_napis','Glikol',''); 
	//---------------------------WYSWIETLANIE DANYCH KLIM. GLIKOL ---------------------------
		echo prostokat(775, 320,100,100, 'klim');		
		echo tekst(785, 345,'klim_dane','P=',''); 
		echo tekst(785, 365,'klim_dane','S=',''); 	
		echo tekst(785, 385,'klim_dane','T=',''); 	
	?>	
	<!-----------------------------------------------------------------UPSy ------------------------------------------------------------------->
	<!-------------------------------------------------RUPS1 ---------------------------------------------------->		
		<rect x="50" y="465" class="rups"
			  width="190" height="245"
			  style="stroke:<?php echo $rups1_kolor_obramowania;?>;" 
		 />		
		 <text class="rups_napis" x="110" y="482" >
				RUPS-1
		 </text>
		 <text class="rups_moc" x="80" y="498" style="fill:<?php echo $rups1_P_IN_kolor_dane ;?> ;">		 
				<?php printf ("%.3f", $rups1_P_IN);?> kW	
		 </text>
		 <text class="rups_in_out" x="60" y="510" >
				IN:	
		 </text> 		
			 <text class="rups_czcionka" x="60" y="525" style="fill:<?php echo $rups1_I_IN_kolor_dane ;?>">
					I=
			 </text>
		 <?php
		 // I-in = L1 / L2 / L3
				//echo pisz(60, 525,' I= ', $rups1_I_L1_IN,' / ', $rups1_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(75, 525,'', $rups1_I_L1_IN,' / ', $rups1_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(100, 525,'', $rups1_I_L2_IN ,' / ' , $rups1_I_L2_IN_kolor_dane,'rups_czcionka' );  
				echo pisz(125, 525,'', $rups1_I_L3_IN ,' A ' , $rups1_I_L3_IN_kolor_dane,'rups_czcionka' );   
		// U-in = L1 , L2, L3					
				echo pisz(60, 540,'U-L1=',$rups1_U_L1_IN,' V ', $rups1_U_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(60, 555,'U-L2=',$rups1_U_L2_IN,' V ', $rups1_U_L2_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(60, 570,'U-L3=',$rups1_U_L3_IN,' V ', $rups1_U_L3_IN_kolor_dane, 'rups_czcionka' ); 				
		?>		
			 <text class="rups_czcionka" x="60" y="585" style="fill: <?php echo $rups1_f_IN_kolor_dane ;?>">
					f=
			 </text>
		<?php
		 // f-in = L1 / L2 / L3
		 		echo pisz_float(75, 585,'',$rups1_f_L1_IN,' / ', $rups1_f_L1_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(108, 585,'',$rups1_f_L2_IN,' / ', $rups1_f_L2_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(141, 585,'',$rups1_f_L3_IN,' Hz ', $rups1_f_L3_IN_kolor_dane, 'rups_czcionka' ); 
		?>		 
		 		 
		 <text class="rups_in_out"  x="60" y="600" >
				OUT:				
		 </text>		
			 <text class="rups_czcionka" x="60" y="615" style="fill:  <?php echo $rups1_I_OUT_kolor_dane ;?>">
					I=									
			 </text>	
		<?php
		 // I-out = L1 / L2 / L3
				echo pisz(75, 615,'', $rups1_I_L1_OUT,' / ', $rups1_I_L1_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(100, 615,'', $rups1_I_L2_OUT,' / ', $rups1_I_L2_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(125, 615,'', $rups1_I_L3_OUT,' A ', $rups1_I_L3_OUT_kolor_dane, 'rups_czcionka' ); 
		 // U-out = L1 , L2 , L3
				echo pisz(60, 630,'U-L1=', $rups1_U_L1_OUT,' V ', $rups1_U_L1_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(60, 645,'U-L2=', $rups1_U_L2_OUT,' V ', $rups1_U_L2_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(60, 660,'U-L3=', $rups1_U_L3_OUT,' V ', $rups1_U_L3_OUT_kolor_dane, 'rups_czcionka' ); 	
		// f-out=		
				echo pisz_float(60, 675,'f=', $rups1_f_OUT,' Hz ', $rups1_f_OUT_kolor_dane, 'rups_czcionka' ); 
		// Bateria-charge=		
				echo pisz(60, 690,'Bateria-charge=', $rups1_charge_bateria,' % ', $rups1_bateria_charge_kolor_dane, 'rups_czcionka' ); 			
		// U-bateria=		
				echo pisz(60, 705,'U-bateria=', $rups1_U_bateria ,' V ', $rups1_U_bateria_kolor_dane , 'rups_czcionka' ); 					
		?>			 	 		 
		 				 
	<!------------------------------RUPS1 wyl IN----------------------------->
		 <text class="wyl_napis" x="210" y="497" >
			IN
		 </text>
		 <?php
			 echo rysuj_linie(230,490,230,500,$rups1_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(230, 500, 3, $rups1_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups1_stan_lacznika_IN,500,230,520,$rups1_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(230, 520, 3, $rups1_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(230,520,230,530,$rups1_kolor_lacznika_IN,"wylacznik");
		 ?>		
		<!------------------------------RUPS1 wyl BYPASS----------------------->
		<text  class="wyl_napis" x="197" y="541" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(230,545,230,555,$rups1_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(230, 555, 3, $rups1_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups1_stan_lacznika_bypass,555,230,575,$rups1_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(230, 575, 3, $rups1_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(230,575,230,585,$rups1_kolor_lacznika_bypass, "wylacznik");
		 ?>				
		<!----------------------RUPS1 wyl MANUAL BYPASS------------------>
		<text class="wyl_napis" x="185" y="595">
			MANUAL
		 </text>
		 <text class="wyl_napis" x="185" y="605">
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(230,600,230,610,$rups1_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(230, 610, 3, $rups1_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups1_stan_lacznika_m_bypass,610,230,630,$rups1_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(230, 630, 3, $rups1_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(230, 630, 230, 640,$rups1_kolor_lacznika_m_bypass, "wylacznik");
		 ?>				
		<!------------------------------RUPS1 wyl OUT---------------------------->
		<text class="wyl_napis" x="200" y="660">
			OUT
		</text>
		 <?php
			 echo rysuj_linie(230, 655, 230, 665,$rups1_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(230, 665, 3, $rups1_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie($rups1_stan_lacznika_OUT,665,230,685,$rups1_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(230, 685, 3, $rups1_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie(230, 685, 230, 695, $rups1_kolor_lacznika_OUT, "wylacznik");
		 ?>				
	<!-------------------------------------------------------RUPS2 ------------------------------------------------->		 
		 <rect x="280" y="465" class="rups"
		  width="190" height="245"
		  style="stroke:<?php echo $rups2_kolor_obramowania;?>;"
		 />
		 <text class="rups_napis"  x="345" y="482" >
			RUPS-2
		 </text>
		 <text class="rups_moc" x="310" y="498" style="fill: <?php echo $rups2_P_IN_kolor_dane ;?>">
				<?php printf ("%.3f", $rups2_P_IN);?> kW
		 </text>
		 <text class="rups_in_out" x="290" y="510" >
				IN:
		 </text>
			 <text class="rups_czcionka" x="290" y="525" style=" fill: <?php echo $rups2_I_IN_kolor_dane ;?>">
					I=
			 </text>
		 <?php
		 // I-in = L1 / L2 / L3				
				echo pisz(305, 525,'', $rups2_I_L1_IN,' / ', $rups2_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(330, 525,'', $rups2_I_L2_IN ,' / ' , $rups2_I_L2_IN_kolor_dane,'rups_czcionka' );  
				echo pisz(355, 525,'', $rups2_I_L3_IN ,' A ' , $rups2_I_L3_IN_kolor_dane,'rups_czcionka' );   
		// U-in = L1 , L2, L3					
				echo pisz(290, 540,'U-L1=',$rups2_U_L1_IN,' V ', $rups2_U_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(290, 555,'U-L2=',$rups2_U_L2_IN,' V ', $rups2_U_L2_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(290, 570,'U-L3=',$rups2_U_L3_IN,' V ', $rups2_U_L3_IN_kolor_dane, 'rups_czcionka' ); 				
		?>		 
		 	 
		  <text class="rups_czcionka" x="290" y="585" style="fill: <?php echo $rups2_f_IN_kolor_dane ;?>">
				f=
		 </text>
		 <?php
		 // f-in = L1 / L2 / L3
		 		echo pisz_float(305, 585,'',$rups2_f_L1_IN,' / ', $rups2_f_L1_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(338, 585,'',$rups2_f_L2_IN,' / ', $rups2_f_L2_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(373, 585,'',$rups2_f_L3_IN,' Hz ', $rups2_f_L3_IN_kolor_dane, 'rups_czcionka' ); 
		?>	
		
		 <text class="rups_in_out"  x="290" y="600" >
				OUT:
		 </text>
			 <text class="rups_czcionka" x="290" y="615" style="fill:  <?php echo $rups2_I_OUT_kolor_dane ;?>">
					I=									
			 </text>
		<?php
		 // I-out = L1 / L2 / L3
				echo pisz(305, 615,'', $rups2_I_L1_OUT,' / ', $rups2_I_L1_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(330, 615,'', $rups2_I_L2_OUT,' / ', $rups2_I_L2_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(355, 615,'', $rups2_I_L3_OUT,' A ', $rups2_I_L3_OUT_kolor_dane, 'rups_czcionka' ); 
		 // U-out = L1 , L2 , L3
				echo pisz(290, 630,'U-L1=', $rups2_U_L1_OUT,' V ', $rups2_U_L1_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(290, 645,'U-L2=', $rups2_U_L2_OUT,' V ', $rups2_U_L2_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(290, 660,'U-L3=', $rups2_U_L3_OUT,' V ', $rups2_U_L3_OUT_kolor_dane, 'rups_czcionka' ); 	
		// f-out=		
				echo pisz_float(290, 675,'f=', $rups2_f_OUT,' Hz ', $rups2_f_OUT_kolor_dane, 'rups_czcionka' ); 
		// Bateria-charge=		
				echo pisz(290, 690,'Bateria-charge=', $rups2_charge_bateria,' % ', $rups2_bateria_charge_kolor_dane, 'rups_czcionka' ); 			
		// U-bateria=		
				echo pisz(290, 705,'U-bateria=', $rups2_U_bateria ,' V ', $rups2_U_bateria_kolor_dane , 'rups_czcionka' ); 					
		?>		
		 
	<!------------------------------RUPS2 wyl IN----------------------------->
		<text class="wyl_napis" x="440" y="497" >
			IN
		</text>
		<?php
			 echo rysuj_linie(460,490,460,500,$rups2_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(460, 500, 3, $rups2_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups2_stan_lacznika_IN,500,460,520,$rups2_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(460, 520, 3, $rups2_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(460,520,460,530,$rups2_kolor_lacznika_IN,"wylacznik");
		 ?>			
		<!------------------------------RUPS2 wyl BYPASS----------------------->
		<text class="wyl_napis" x="427" y="541" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(460,545,460,555,$rups2_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(460, 555, 3, $rups2_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups2_stan_lacznika_bypass,555,460,575,$rups2_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(460, 575, 3, $rups2_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(460,575,460,585,$rups2_kolor_lacznika_bypass,"wylacznik");
		 ?>			
		<!----------------------RUPS2 wyl MANUAL BYPASS------------------>
		<text class="wyl_napis" x="417" y="595" >
			MANUAL
		 </text>
		 <text class="wyl_napis" x="417" y="605" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(460,600,460,610,$rups2_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(460, 610, 3, $rups2_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups2_stan_lacznika_m_bypass,610,460,630,$rups2_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(460, 630, 3, $rups2_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(460,630,460,640,$rups2_kolor_lacznika_m_bypass,"wylacznik");
		 ?>				
		<!------------------------------RUPS2 wyl OUT---------------------------->
		<text class="wyl_napis" x="430" y="660" >
			OUT
		 </text>
		 <?php
			 echo rysuj_linie(460,655,460,665,$rups2_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(460, 665, 3, $rups2_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie($rups2_stan_lacznika_OUT,665,460,685,$rups2_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(460, 685, 3, $rups2_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie(460,685, 460, 695,$rups2_kolor_lacznika_OUT,"wylacznik");
		 ?>	
	<!------------------------------RUPS3 ------------------------------------->	 
	<g>
		  <rect x="510" y="465" class="rups"
				width="210" height="245"
				style="stroke:<?php echo $rups3_kolor_obramowania;?>;"
		 />
		 <text class="rups_napis" x="520" y="482">
			RUPS-3-1, 3-2
		 </text>				 
		 <text class="rups_moc" x="540" y="497" style="fill:<?php echo $rups3_P_IN_kolor_dane ;?> ;">		 
				<?php printf ("%.3f", $rups3_P_IN);?> kW	
		 </text>
		 <text class="rups_in_out"  x="520" y="510" >
			IN:
		 </text>			 
		<text class="rups_czcionka" x="520" y="525" style=" fill: <?php echo $rups3_I_L1_IN_kolor_dane ;?>">
			I-L1=
		</text>
				<?php
				 // I-L1-IN = 3_1_L1 /  3_2_L1 						
						echo pisz(555, 525,'', $rups3_1_I_L1_IN,' / ', $rups3_1_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(582, 525,'', $rups3_2_I_L1_IN ,' A ' , $rups3_2_I_L1_IN_kolor_dane,'rups_czcionka' );  						
				?>					 
		 <text class="rups_czcionka" x="520" y="540" style="fill: <?php echo $rups3_I_L2_IN_kolor_dane ;?>">
			I-L2=
		 </text>
				 <?php
				 // I-L2-IN = 3_1_L2 /  3_2_L2 						
						echo pisz(555, 540,'', $rups3_1_I_L2_IN,' / ', $rups3_1_I_L2_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(582, 540,'', $rups3_2_I_L2_IN ,' A ' , $rups3_2_I_L2_IN_kolor_dane,'rups_czcionka' );  						
				?>					 
		 <text class="rups_czcionka" x="520" y="555" style="fill: <?php echo $rups3_I_L3_IN_kolor_dane ;?>">
			I-L3=
		 </text>
				<?php
				 // I-L3-IN = 3_1_L3 /  3_2_L3 						
						echo pisz(555, 555,'', $rups3_1_I_L3_IN,' / ', $rups3_1_I_L3_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(582, 555,'', $rups3_2_I_L3_IN ,' A ' , $rups3_2_I_L3_IN_kolor_dane,'rups_czcionka' );  						
				?>					 
		 <text class="rups_czcionka" x="520" y="570" style=" fill: <?php echo $rups3_U_L1_IN_kolor_dane ;?>">
			U-L1=
		 </text>
				<?php
				 // U-L1-IN = 3_1_L1 /  3_2_L1 						
						echo pisz(560, 570,'', $rups3_1_U_L1_IN,' / ', $rups3_1_U_L1_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(593, 570,'', $rups3_2_U_L1_IN ,' V ' , $rups3_2_U_L1_IN_kolor_dane,'rups_czcionka' );  						
				?>
		 				 
		<text class="rups_czcionka" x="520" y="585" style="fill:<?php echo $rups3_U_L2_IN_kolor_dane ;?>">
				U-L2=
		 </text>
				<?php
				 // U-L2-IN = 3_1_L1 /  3_2_L1 						
						echo pisz(560, 585,'', $rups3_1_U_L2_IN,' / ', $rups3_1_U_L2_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(593, 585,'', $rups3_2_U_L2_IN ,' V ' , $rups3_2_U_L2_IN_kolor_dane,'rups_czcionka' );  						
				?> 				 
		 <text class="rups_czcionka" x="520" y="600" style="fill:<?php echo $rups3_U_L3_IN_kolor_dane ;?>">
				U-L3=
		 </text>
				<?php
				 // U-L3-IN = 3_1_L1 /  3_2_L1 						
						echo pisz(560, 600,'', $rups3_1_U_L3_IN,' / ', $rups3_1_U_L3_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(593, 600,'', $rups3_2_U_L3_IN ,' V ' , $rups3_2_U_L3_IN_kolor_dane,'rups_czcionka' );  						
				?> 	 	 
				
		 <text class="rups_in_out"  x="520" y="615" >
			OUT:
		 </text>		
		<text class="rups_czcionka" x="520" y="630" style=" fill: <?php echo $rups3_I_L1_OUT_kolor_dane ;?>">
			I-L1=
		</text>
				<?php
				 // I-L1-OUT = 3_1_L1 /  3_2_L1 						
						echo pisz(555, 630,'', $rups3_1_I_L1_OUT,' / ', $rups3_1_I_L1_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(582, 630,'', $rups3_2_I_L1_OUT ,' A ' , $rups3_2_I_L1_OUT_kolor_dane,'rups_czcionka' );  						
				?>				 
		 <text class="rups_czcionka" x="520" y="645" style="fill: <?php echo $rups3_I_L2_OUT_kolor_dane ;?>">
			I-L2=
		 </text>
				<?php
				 // I-L2-OUT = 3_1_L2 /  3_2_L2 						
						echo pisz(555, 645,'', $rups3_1_I_L2_OUT,' / ', $rups3_1_I_L2_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(582, 645,'', $rups3_2_I_L2_OUT ,' A ' , $rups3_2_I_L2_OUT_kolor_dane,'rups_czcionka' );  						
				?>		 			 
		<text class="rups_czcionka" x="520" y="660" style="fill:  <?php echo $rups3_I_L3_OUT_kolor_dane ;?>">
			I-L3=
		 </text>
				<?php
				 // I-L3-OUT = 3_1_L3 /  3_2_L3 						
						echo pisz(555, 660,'', $rups3_1_I_L3_OUT,' / ', $rups3_1_I_L3_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(582, 660,'', $rups3_2_I_L3_OUT ,' A ' , $rups3_2_I_L3_OUT_kolor_dane,'rups_czcionka' );  						
				?>					 
		 <text class="rups_czcionka" x="520" y="675" style="fill: <?php echo $rups3_U_L1_OUT_kolor_dane ;?>">
			U-L1=
		 </text>
				<?php
				 // U-L1-OUT = 3_1_L1 /  3_2_L1 						
						echo pisz(560, 675,'', $rups3_1_U_L1_OUT,' / ', $rups3_1_U_L1_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(593, 675,'', $rups3_2_U_L1_OUT ,' A ' , $rups3_2_U_L1_OUT_kolor_dane,'rups_czcionka' );  						
				?>					 
		 <text class="rups_czcionka" x="520" y="690" style=" fill:<?php echo $rups3_U_L2_OUT_kolor_dane ;?>">
				U-L2=
		 </text>
				<?php
				 // U-L2-OUT = 3_1_L2 /  3_2_L2 						
						echo pisz(560, 690,'', $rups3_1_U_L2_OUT,' / ', $rups3_1_U_L2_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(593, 690,'', $rups3_2_U_L2_OUT ,' V ' , $rups3_2_U_L2_OUT_kolor_dane,'rups_czcionka' );  						
				?>					 
		 <text class="rups_czcionka" x="520" y="705" style="fill:<?php echo $rups3_U_L3_OUT_kolor_dane ;?>">
				U-L3=
		 </text>
				<?php
				 // U-L3-OUT = 3_1_L3 /  3_2_L3 						
						echo pisz(560, 705,'', $rups3_1_U_L3_OUT,' / ', $rups3_1_U_L3_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(593, 705,'', $rups3_2_U_L3_OUT ,' V ' , $rups3_2_U_L3_OUT_kolor_dane,'rups_czcionka' );  						
				?>			
		<!------------------------------RUPS3-1 wyl IN----------------------------->
		<text class="wyl_napis" x="695" y="492" >
			IN
		 </text>
		  <?php
			 echo rysuj_linie(690,490,690,500,$rups3_1_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(690, 500, 3, $rups3_1_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_1_stan_lacznika_IN,500,690,520,$rups3_1_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(690, 520, 3, $rups3_1_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(690,520, 690, 530,$rups3_1_kolor_lacznika_IN,"wylacznik");
		 ?>			
		<!------------------------------RUPS3-1 wyl BYPASS----------------------->
		<text class="wyl_napis" x="676" y="541" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(690,545,690,555,$rups3_1_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(690, 555, 3, $rups3_1_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_1_stan_lacznika_bypass,555,690,575,$rups3_1_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(690, 575, 3, $rups3_1_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(690,575, 690, 585, $rups3_1_kolor_lacznika_bypass ,"wylacznik");
		 ?>			
		<!----------------------RUPS3-1 wyl MANUAL BYPASS------------------>
		<text class="wyl_napis" x="665" y="596" >
			M-BYPASS
		 </text>	
		 <?php
			 echo rysuj_linie(690,600,690,610,$rups3_1_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(690, 610, 3, $rups3_1_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_1_stan_lacznika_m_bypass,610,690,630,$rups3_1_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(690, 630, 3, $rups3_1_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(690, 630, 690, 640, $rups3_1_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>			
		<!------------------------------RUPS3-1 wyl OUT---------------------------->
		<text class="wyl_napis" x="690" y="652" >
			OUT
		 </text>
		 <?php
			 echo rysuj_linie(690,655,690,665,$rups3_1_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(690, 665, 3, $rups3_1_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_1_stan_lacznika_OUT,665,690,685, $rups3_1_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(690, 685, 3, $rups3_1_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie(690, 685, 690, 695, $rups3_1_kolor_lacznika_OUT ,"wylacznik");
		 ?>			
		<!--------------------------------------------------------RUPS3-2 wyl ------------------------------------------------->
		<!------------------------------RUPS3-2 wyl IN----------------------------->
		 <?php
			 echo rysuj_linie(710,490,710,500,$rups3_2_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(710, 500, 3, $rups3_2_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_2_stan_lacznika_IN , 500,710,520, $rups3_2_kolor_lacznika_IN ,"wylacznik");
			 echo rysuj_kolo(710, 520, 3, $rups3_2_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(710, 520, 710, 530, $rups3_2_kolor_lacznika_IN ,"wylacznik");
		 ?>			
		<!------------------------------RUPS3-2 wyl BYPASS----------------------->
		<?php
			 echo rysuj_linie(710,545,710,555,$rups3_2_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(710, 555, 3, $rups3_2_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_2_stan_lacznika_bypass, 555,710,575, $rups3_2_kolor_lacznika_bypass ,"wylacznik");
			 echo rysuj_kolo(710, 575, 3, $rups3_2_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(710, 575, 710, 585, $rups3_2_kolor_lacznika_bypass ,"wylacznik");
		 ?>			
		<!----------------------RUPS3-2 wyl MANUAL BYPASS------------------>	
		<?php
			 echo rysuj_linie(710,600,710,610,$rups3_2_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(710, 610, 3, $rups3_2_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_2_stan_lacznika_m_bypass, 610,710,630, $rups3_2_kolor_lacznika_m_bypass ,"wylacznik");
			 echo rysuj_kolo(710, 630, 3, $rups3_2_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(710, 630, 710, 640, $rups3_2_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>			
		<!------------------------------RUPS3-2 wyl OUT---------------------------->	
		<?php
			 echo rysuj_linie(710,655,710,665,$rups3_2_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(710, 665, 3, $rups3_2_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie($rups3_2_stan_lacznika_OUT, 665,710,685, $rups3_2_kolor_lacznika_OUT ,"wylacznik");
			 echo rysuj_kolo(710, 685, 3, $rups3_2_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie(710, 685, 710, 695, $rups3_2_kolor_lacznika_OUT ,"wylacznik");
		 ?>			
		<title>
			<?php echo				
				'f-in='.$rups3_1_f_L1_IN.' / '.$rups3_1_f_L2_IN.' / '.$rups3_1_f_L3_IN.' Hz'."\n".
				'f-out='.$rups3_1_f_OUT.' Hz'."\n".
				'U-bateria='.$rups3_1_U_bateria.' V'."\n".
				'Bateria-charge='.$rups3_1_charge_bateria.' %'."\n";
				printf ("P-in= %.3f / %.3f kW",$rups3_1_P_IN,$rups3_2_P_IN);
			?> 				
		 </title>
	</g>
	<!------------------------------RUPS4 -------------------------------------> 	
		 <rect x="760" y="465" class="rups"
			  width="190" height="245"
			  style="stroke:<?php echo $rups4_kolor_obramowania;?>;"
		 />
		 <text class="rups_napis"  x="815" y="482">
				RUPS-4
		 </text>
		 <text class="rups_moc" x="790" y="497" style="fill: <?php echo $rups4_P_IN_kolor_dane ;?>">
				<?php printf ("%.3f", $rups4_P_IN);?> kW 	
		 </text>
		 <text class="rups_in_out" x="770" y="510">
				IN:
		 </text>		
		<text class="rups_czcionka" x="770" y="525" style="fill: <?php echo $rups4_I_IN_kolor_dane ;?>">
					I=
		</text>
		 <?php
		 // I-in = L1 / L2 / L3				
				echo pisz(785, 525,'', $rups4_I_L1_IN,' / ', $rups4_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(810, 525,'', $rups4_I_L2_IN ,' / ' , $rups4_I_L2_IN_kolor_dane,'rups_czcionka' );  
				echo pisz(835, 525,'', $rups4_I_L3_IN ,' A ' , $rups4_I_L3_IN_kolor_dane,'rups_czcionka' );   
		// U-in = L1 , L2, L3					
				echo pisz(770, 540,'U-L1=',$rups4_U_L1_IN,' V ', $rups4_U_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(770, 555,'U-L2=',$rups4_U_L2_IN,' V ', $rups4_U_L2_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(770, 570,'U-L3=',$rups4_U_L3_IN,' V ', $rups4_U_L3_IN_kolor_dane, 'rups_czcionka' ); 				
		?>			 
		 	 
		  <text class="rups_czcionka" x="770" y="585" style="fill: <?php echo $rups4_f_IN_kolor_dane ;?>">
				f=
		 </text>
		 <?php
		 // f-in = L1 / L2 / L3
		 		echo pisz_float(785, 585,'',$rups4_f_L1_IN,' / ', $rups4_f_L1_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(818, 585,'',$rups4_f_L2_IN,' / ', $rups4_f_L2_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(851, 585,'',$rups4_f_L3_IN,' Hz ', $rups4_f_L3_IN_kolor_dane, 'rups_czcionka' ); 
		?>			 
		 <text class="rups_in_out"  x="770" y="600">
				OUT:
		 </text>
		  <text class="rups_czcionka" x="770" y="615" style="fill:  <?php echo $rups4_I_OUT_kolor_dane ;?>">
				I=									
		 </text>	
		 <?php
		 // I-out = L1 / L2 / L3
				echo pisz(785, 615,'', $rups4_I_L1_OUT,' / ', $rups4_I_L1_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(810, 615,'', $rups4_I_L2_OUT,' / ', $rups4_I_L2_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(835, 615,'', $rups4_I_L3_OUT,' A ', $rups4_I_L3_OUT_kolor_dane, 'rups_czcionka' ); 
		 // U-out = L1 , L2 , L3
				echo pisz(770, 630,'U-L1=', $rups4_U_L1_OUT,' V ', $rups4_U_L1_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(770, 645,'U-L2=', $rups4_U_L2_OUT,' V ', $rups4_U_L2_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(770, 660,'U-L3=', $rups4_U_L3_OUT,' V ', $rups4_U_L3_OUT_kolor_dane, 'rups_czcionka' ); 	
		// f-out=		
				echo pisz_float(770, 675,'f=', $rups4_f_OUT,' Hz ', $rups4_f_OUT_kolor_dane, 'rups_czcionka' ); 
		// Bateria-charge=		
				echo pisz(770, 690,'Bateria-charge=', $rups4_charge_bateria,' % ', $rups4_bateria_charge_kolor_dane, 'rups_czcionka' ); 			
		// U-bateria=		
				echo pisz(770, 705,'U-bateria=', $rups4_U_bateria ,' V ', $rups4_U_bateria_kolor_dane , 'rups_czcionka' ); 					
		?>		 		 
	<!------------------------------RUPS4 wyl IN----------------------------->
		<text class="wyl_napis" x="920" y="497" >
			IN
		 </text>
		 <?php
			 echo rysuj_linie(940,490,940,500,$rups4_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(940, 500, 3, $rups4_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups4_stan_lacznika_IN, 500,940,520, $rups4_kolor_lacznika_IN ,"wylacznik");
			 echo rysuj_kolo(940, 520, 3, $rups4_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(940, 520, 940, 530, $rups4_kolor_lacznika_IN ,"wylacznik");
		 ?>		
		<!------------------------------RUPS4 wyl BYPASS----------------------->
		<text class="wyl_napis" x="907" y="541" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(940,545,940,555,$rups4_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(940, 555, 3, $rups4_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups4_stan_lacznika_bypass, 555,940,575, $rups4_kolor_lacznika_bypass ,"wylacznik");
			 echo rysuj_kolo(940, 575, 3, $rups4_kolor_lacznika_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(940, 575, 940, 585, $rups4_kolor_lacznika_bypass ,"wylacznik");
		 ?>		
		<!----------------------RUPS4 wyl MANUAL BYPASS------------------>
		<text class="wyl_napis" x="895" y="595" >
			MANUAL
		 </text>
		 <text class="wyl_napis" x="895" y="605" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(940,600,940,610,$rups4_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(940, 610, 3, $rups4_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie($rups4_stan_lacznika_m_bypass, 610,940,630, $rups4_kolor_lacznika_m_bypass ,"wylacznik");
			 echo rysuj_kolo(940, 630, 3, $rups4_kolor_lacznika_m_bypass, "wylacznik_kolo") ;
			 echo rysuj_linie(940, 630, 940, 640, $rups4_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>			
		<!------------------------------RUPS4 wyl OUT---------------------------->
		<text class="wyl_napis" x="910" y="660" >
			OUT
		 </text>
		 <?php
			 echo rysuj_linie(940,655,940,665,$rups4_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(940, 665, 3, $rups4_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie($rups4_stan_lacznika_OUT, 665,940,685, $rups4_kolor_lacznika_OUT ,"wylacznik");
			 echo rysuj_kolo(940, 685, 3, $rups4_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie(940, 685, 940, 695, $rups4_kolor_lacznika_OUT ,"wylacznik");
		 ?>		
	<!------------------------------RUPS8 ------------------------------------->	 
		<rect x="990" y="465" class="rups"
			  width="190" height="245"
			  style="stroke:<?php echo $rups8_kolor_obramowania;?>;"
		 />
		 <text class="rups_napis" x="1045" y="482" >
				RUPS-8
		 </text>
		 <text class="rups_moc" x="1020" y="497" style="fill: <?php echo $rups8_P_IN_kolor_dane ;?>">
				<?php printf ("%.3f", $rups8_P_IN);?> kW
		 </text>
		 <text class="rups_in_out"  x="1000" y="510" >
				IN:
		 </text>		 
		<text class="rups_czcionka" x="1000" y="525" style=" fill: <?php echo $rups4_I_IN_kolor_dane ;?>">
					I=
		</text>
		 <?php
		 // I-in = L1 / L2 / L3				
				echo pisz(1015, 525,'', $rups8_I_L1_IN,' / ', $rups8_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(1040, 525,'', $rups8_I_L2_IN ,' / ' , $rups8_I_L2_IN_kolor_dane,'rups_czcionka' );  
				echo pisz(1065, 525,'', $rups8_I_L3_IN ,' A ' , $rups8_I_L3_IN_kolor_dane,'rups_czcionka' );   
		// U-in = L1 , L2, L3					
				echo pisz(1000, 540,'U-L1=',$rups8_U_L1_IN,' V ', $rups8_U_L1_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(1000, 555,'U-L2=',$rups8_U_L2_IN,' V ', $rups8_U_L2_IN_kolor_dane, 'rups_czcionka' ); 
				echo pisz(1000, 570,'U-L3=',$rups8_U_L3_IN,' V ', $rups8_U_L3_IN_kolor_dane, 'rups_czcionka' ); 				
		?>	 
		  	 
			 <text class="rups_czcionka" x="1000" y="585" style="fill: <?php echo $rups8_f_IN_kolor_dane ;?>">
					f=
			 </text>
		 <?php
		 // f-in = L1 / L2 / L3
		 		echo pisz_float(1015, 585,'',$rups8_f_L1_IN,' / ', $rups8_f_L1_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(1048, 585,'',$rups8_f_L2_IN,' / ', $rups8_f_L2_IN_kolor_dane, 'rups_czcionka' ); 
		 		echo pisz_float(1081, 585,'',$rups8_f_L3_IN,' Hz ', $rups8_f_L3_IN_kolor_dane, 'rups_czcionka' ); 
		?>		 
		 
		 <text class="rups_in_out"  x="1000" y="600" >
				OUT:
		 </text>		 
		 <text class="rups_czcionka" x="1000" y="615" style="fill:  <?php echo $rups8_I_OUT_kolor_dane ;?>">
					I=									
		 </text>	
		  <?php
		 // I-out = L1 / L2 / L3
				echo pisz(1015, 615,'', $rups8_I_L1_OUT,' / ', $rups8_I_L1_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(1040, 615,'', $rups8_I_L2_OUT,' / ', $rups8_I_L2_OUT_kolor_dane, 'rups_czcionka' ); 
				echo pisz(1065, 615,'', $rups8_I_L3_OUT,' A ', $rups8_I_L3_OUT_kolor_dane, 'rups_czcionka' ); 
		 // U-out = L1 , L2 , L3
				echo pisz(1000, 630,'U-L1=', $rups8_U_L1_OUT,' V ', $rups8_U_L1_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(1000, 645,'U-L2=', $rups8_U_L2_OUT,' V ', $rups8_U_L2_OUT_kolor_dane, 'rups_czcionka' ); 				
				echo pisz(1000, 660,'U-L3=', $rups8_U_L3_OUT,' V ', $rups8_U_L3_OUT_kolor_dane, 'rups_czcionka' ); 	
		// f-out=		
				echo pisz_float(1000, 675,'f=', $rups8_f_OUT,' Hz ', $rups8_f_OUT_kolor_dane, 'rups_czcionka' ); 
		// Bateria-charge=		
				echo pisz(1000, 690,'Bateria-charge=', $rups8_charge_bateria,' % ', $rups8_bateria_charge_kolor_dane, 'rups_czcionka' ); 			
		// U-bateria=		
				echo pisz(1000, 705,'U-bateria=', $rups8_U_bateria ,' V ', $rups8_U_bateria_kolor_dane , 'rups_czcionka' ); 					
		?>				 
	<!------------------------------RUPS8 wyl IN----------------------------->
		<text class="wyl_napis" x="1150" y="497">
			IN
		 </text>
		 <?php
			 echo rysuj_linie(1170,490,1170,500,$rups8_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(1170, 500, 3, $rups8_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups8_stan_lacznika_IN, 500,1170,520, $rups8_kolor_lacznika_IN ,"wylacznik");
			 echo rysuj_kolo(1170, 520, 3, $rups8_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(1170, 520, 1170, 530, $rups8_kolor_lacznika_IN ,"wylacznik");
		 ?>			
		<!------------------------------RUPS8 wyl BYPASS----------------------->
		<text class="wyl_napis" x="1137" y="541" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(1170,545,1170,555,$rups8_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(1170, 555, 3, $rups8_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups8_stan_lacznika_bypass, 555,1170,575, $rups8_kolor_lacznika_bypass ,"wylacznik");
			 echo rysuj_kolo(1170, 575, 3, $rups8_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1170, 575, 1170, 585, $rups8_kolor_lacznika_bypass ,"wylacznik");
		 ?>			
		<!----------------------RUPS8 wyl MANUAL BYPASS------------------>
		<text class="wyl_napis" x="1125" y="595" >
			MANUAL
		 </text>
		 <text  class="wyl_napis" x="1125" y="605" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(1170,600,1170,610,$rups8_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(1170, 610, 3, $rups8_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups8_stan_lacznika_m_bypass, 610,1170,630, $rups8_kolor_lacznika_m_bypass ,"wylacznik");
			 echo rysuj_kolo(1170, 630, 3, $rups8_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1170, 630, 1170, 640, $rups8_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>		
		<!------------------------------RUPS8 wyl OUT---------------------------->
		 <text class="wyl_napis" x="1140" y="660" >
			OUT
		 </text>
		  <?php
			 echo rysuj_linie(1170,655,1170,665,$rups8_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(1170, 665, 3, $rups8_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie($rups8_stan_lacznika_OUT, 665,1170,685, $rups8_kolor_lacznika_OUT ,"wylacznik");
			 echo rysuj_kolo(1170, 685, 3, $rups8_kolor_lacznika_OUT, "wylacznik_kolo") ;
			 echo rysuj_linie(1170, 685, 1170, 695, $rups8_kolor_lacznika_OUT ,"wylacznik");
		 ?>		
	<!------------------------------RUPS9 ------------------------------------->	 
	<g>
		 <rect x="1220" y="465" class="rups"
				  width="245" height="245"
				  style="stroke:<?php echo $rups9_kolor_obramowania;?>;"
		 />
		 <text class="rups_napis" x="1230" y="482" >
			RUPS-9-1, 9-2, 9-3
		 </text>
		<text class="rups_moc" x="1250" y="497" style="fill:<?php echo $rups9_P_OUT_kolor_dane ;?> ;">		 
				<?php printf ("%.3f",$rups9_P_OUT);?> kW	
		 </text>				 
		 <text class="rups_in_out" x="1230" y="510" >
			IN:
		 </text>
		 <text class="rups_czcionka" x="1230" y="525" style="fill:<?php echo $rups9_I_L1_IN_kolor_dane ;?>">
			I-L1=
		 </text>		 
				<?php
				 // I-L1-IN = 9_1_L1 /  9_2_L1 	/  9_3_L1					
						echo pisz(1263, 525,'', $rups9_1_I_L1_IN,' / ', $rups9_1_I_L1_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1295, 525,'', $rups9_2_I_L1_IN ,' / ' , $rups9_2_I_L1_IN_kolor_dane,'rups_czcionka' );  						
						echo pisz(1327, 525,'', $rups9_3_I_L1_IN ,' A ' , $rups9_3_I_L1_IN_kolor_dane,'rups_czcionka' );  						
				?>				 
		 <text class="rups_czcionka" x="1230" y="540" style="fill:<?php echo $rups9_I_L2_IN_kolor_dane ;?>">
			I-L2=
		 </text>
				<?php
				 // I-L2-IN = 9_1_L2 /  9_2_L2 	/  9_3_L2					
						echo pisz(1263, 540,'', $rups9_1_I_L2_IN,' / ', $rups9_1_I_L2_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1295, 540,'', $rups9_2_I_L2_IN ,' / ' , $rups9_2_I_L2_IN_kolor_dane,'rups_czcionka' );  						
						echo pisz(1327, 540,'', $rups9_3_I_L2_IN ,' A ' , $rups9_3_I_L2_IN_kolor_dane,'rups_czcionka' );  						
				?>			  			 
		<text class="rups_czcionka" x="1230" y="555" style="fill:<?php echo $rups9_I_L3_IN_kolor_dane ;?>">
			I-L3=
		 </text>
				<?php
				 // I-L3-IN = 9_1_L3 /  9_2_L3 	/  9_3_L3					
						echo pisz(1263, 555,'', $rups9_1_I_L3_IN,' / ', $rups9_1_I_L3_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1295, 555,'', $rups9_2_I_L3_IN ,' / ' , $rups9_2_I_L3_IN_kolor_dane,'rups_czcionka' );  						
						echo pisz(1327, 555,'', $rups9_3_I_L3_IN ,' A ' , $rups9_3_I_L3_IN_kolor_dane,'rups_czcionka' );  						
				?>		 
				 </text>
		 <text class="rups_czcionka" x="1230" y="570" style="fill:<?php echo $rups9_U_L1_IN_kolor_dane ;?>">
			U-L1=
		 </text>
				<?php
				 // U-L1-IN = 9_1_L1 /  9_2_L1 	/  9_3_L1										
						echo pisz(1268, 570,'', $rups9_1_U_L1_IN,' / ', $rups9_1_U_L1_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1303, 570,'', $rups9_2_U_L1_IN ,' / ', $rups9_2_U_L1_IN_kolor_dane,'rups_czcionka' );  						
						echo pisz(1338, 570,'', $rups9_3_U_L1_IN ,' V ', $rups9_3_U_L1_IN_kolor_dane,'rups_czcionka' );  						
				?>			 		
		<text class="rups_czcionka" x="1230" y="585" style="fill: <?php echo $rups9_U_L2_IN_kolor_dane ;?>">			
			U-L2=
		 </text>
				<?php
				 // U-L2-IN = 9_1_L2 /  9_2_L2 	/  9_3_L2										
						echo pisz(1268, 585,'', $rups9_1_U_L2_IN,' / ', $rups9_1_U_L2_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1303, 585,'', $rups9_2_U_L2_IN ,' / ', $rups9_2_U_L2_IN_kolor_dane,'rups_czcionka' );  						
						echo pisz(1338, 585,'', $rups9_3_U_L2_IN ,' V ', $rups9_3_U_L2_IN_kolor_dane,'rups_czcionka' );  						
				?>						 
		 <text class="rups_czcionka" x="1230" y="600" style="fill: <?php echo $rups9_U_L3_IN_kolor_dane ;?>">		
			U-L3=
		 </text>	
				<?php
				 // U-L3-IN = 9_1_L3 /  9_2_L3 	/  9_3_L3										
						echo pisz(1268, 600,'', $rups9_1_U_L3_IN,' / ', $rups9_1_U_L3_IN_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1303, 600,'', $rups9_2_U_L3_IN ,' / ', $rups9_2_U_L3_IN_kolor_dane,'rups_czcionka' );  						
						echo pisz(1338, 600,'', $rups9_3_U_L3_IN ,' V ', $rups9_3_U_L3_IN_kolor_dane,'rups_czcionka' );  						
				?>				
		 <text class="rups_in_out" x="1230" y="615">
			OUT:
		 </text>		 
		 <text  class="rups_czcionka" x="1230" y="630" style="fill: <?php echo $rups9_I_L1_OUT_kolor_dane ;?>">	
			I-L1=
		 </text>
				<?php
				 // I-L1-OUT = 9_1_L1 /  9_2_L1 	/  9_3_L1					
						echo pisz(1263, 630,'', $rups9_1_I_L1_OUT,' / ', $rups9_1_I_L1_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1295, 630,'', $rups9_2_I_L1_OUT ,' / ' , $rups9_2_I_L1_OUT_kolor_dane,'rups_czcionka' );  						
						echo pisz(1327, 630,'', $rups9_3_I_L1_OUT ,' A ' , $rups9_3_I_L1_OUT_kolor_dane,'rups_czcionka' );  						
				?>			
		 <text  class="rups_czcionka" x="1230" y="645" style="fill: <?php echo $rups9_I_L2_OUT_kolor_dane ;?>">	
			I-L2=
		 </text>
				<?php
				 // I-L2-OUT = 9_1_L2 /  9_2_L2 	/  9_3_L2					
						echo pisz(1263, 645,'', $rups9_1_I_L2_OUT,' / ', $rups9_1_I_L2_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1295, 645,'', $rups9_2_I_L2_OUT ,' / ' , $rups9_2_I_L2_OUT_kolor_dane,'rups_czcionka' );  						
						echo pisz(1327, 645,'', $rups9_3_I_L2_OUT ,' A ' , $rups9_3_I_L2_OUT_kolor_dane,'rups_czcionka' );  						
				?>	
		 <text class="rups_czcionka" x="1230" y="660" style="fill:  <?php echo $rups9_I_L3_OUT_kolor_dane ;?>">	
			I-L3=
		 </text>
				<?php
				 // I-L3-OUT = 9_1_L3 /  9_2_L3 	/  9_3_L3					
						echo pisz(1263, 660,'', $rups9_1_I_L3_OUT,' / ', $rups9_1_I_L3_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1295, 660,'', $rups9_2_I_L3_OUT ,' / ' , $rups9_2_I_L3_OUT_kolor_dane, 'rups_czcionka' );  						
						echo pisz(1327, 660,'', $rups9_3_I_L3_OUT ,' A ' , $rups9_3_I_L3_OUT_kolor_dane, 'rups_czcionka' );  						
				?>
		 <text class="rups_czcionka" x="1230" y="675" style="fill: <?php echo $rups9_U_L1_OUT_kolor_dane ;?>">		
			U-L1=
		 </text>
				<?php
				 // U-L1-OUT = 9_1_L1 /  9_2_L1 	/  9_3_L1										
						echo pisz(1268, 675,'', $rups9_1_U_L1_OUT,' / ', $rups9_1_U_L1_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1303, 675,'', $rups9_2_U_L1_OUT ,' / ', $rups9_2_U_L1_OUT_kolor_dane,'rups_czcionka' );  						
						echo pisz(1338, 675,'', $rups9_3_U_L1_OUT ,' V ', $rups9_3_U_L1_OUT_kolor_dane,'rups_czcionka' );  						
				?>				 
		<text class="rups_czcionka" x="1230" y="690" style="fill: <?php echo $rups9_U_L2_OUT_kolor_dane ;?>">		
			U-L2=
		 </text>
				<?php
				 // U-L2-OUT = 9_1_L2 /  9_2_L2 	/  9_3_L2										
						echo pisz(1268, 690,'', $rups9_1_U_L2_OUT,' / ', $rups9_1_U_L2_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1303, 690,'', $rups9_2_U_L2_OUT ,' / ', $rups9_2_U_L2_OUT_kolor_dane,'rups_czcionka' );  						
						echo pisz(1338, 690,'', $rups9_3_U_L2_OUT ,' V ', $rups9_3_U_L2_OUT_kolor_dane,'rups_czcionka' );  						
				?>		
		 <text class="rups_czcionka" x="1230" y="705" style=" fill: <?php echo $rups9_U_L3_OUT_kolor_dane ;?>">	
			U-L3=
		 </text>
				<?php
				 // U-L3-OUT = 9_1_L3 /  9_2_L3 	/  9_3_L3										
						echo pisz(1268, 705,'', $rups9_1_U_L3_OUT,' / ', $rups9_1_U_L3_OUT_kolor_dane, 'rups_czcionka' ); 
						echo pisz(1303, 705,'', $rups9_2_U_L3_OUT ,' / ', $rups9_2_U_L3_OUT_kolor_dane,'rups_czcionka' );  						
						echo pisz(1338, 705,'', $rups9_3_U_L3_OUT ,' V ', $rups9_3_U_L3_OUT_kolor_dane,'rups_czcionka' );  						
				?>		 
		<!------------------------------RUPS9-1 wyl IN----------------------------->
		<text class="wyl_napis" x="1428" y="491" >
			IN
		 </text>
		 <?php
			 echo rysuj_linie(1415,490,1415,500,$rups9_1_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(1415, 500, 3, $rups9_1_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_1_stan_lacznika_IN, 500,1415,520, $rups9_1_kolor_lacznika_IN ,"wylacznik");
			 echo rysuj_kolo(1415, 520, 3, $rups9_1_kolor_lacznika_IN, "wylacznik_kolo") ;
			 echo rysuj_linie(1415, 520, 1415, 530, $rups9_1_kolor_lacznika_IN ,"wylacznik");
		 ?>			
		<!------------------------------RUPS9-1 wyl BYPASS----------------------->
		<text class="wyl_napis" x="1415" y="541" >
			BYPASS
		 </text>
		 <?php
			 echo rysuj_linie(1415,545,1415,555,$rups9_1_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(1415, 555, 3, $rups9_1_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_1_stan_lacznika_bypass, 555,1415,575, $rups9_1_kolor_lacznika_bypass ,"wylacznik");
			 echo rysuj_kolo(1415, 575, 3, $rups9_1_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1415, 575, 1415, 585, $rups9_1_kolor_lacznika_bypass ,"wylacznik");
		 ?>			
		<!----------------------RUPS9-1 wyl MANUAL BYPASS------------------>
		<text class="wyl_napis" x="1410" y="597" >
			M-BYPASS
		 </text>	
		 <?php
			 echo rysuj_linie(1415,600,1415,610,$rups9_1_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(1415, 610, 3, $rups9_1_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_1_stan_lacznika_m_bypass, 610,1415,630, $rups9_1_kolor_lacznika_m_bypass ,"wylacznik");
			 echo rysuj_kolo(1415, 630, 3, $rups9_1_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1415, 630, 1415, 640, $rups9_1_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>				
		<!------------------------------RUPS9-1 wyl OUT---------------------------->
		<text class="wyl_napis" x="1423" y="652" >
			OUT
		</text>
		 <?php
			 echo rysuj_linie(1415,655,1415,665,$rups9_1_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(1415, 665, 3, $rups9_1_kolor_lacznika_OUT , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_1_stan_lacznika_OUT, 665,1415,685, $rups9_1_kolor_lacznika_OUT ,"wylacznik");
			 echo rysuj_kolo(1415, 685, 3, $rups9_1_kolor_lacznika_OUT , "wylacznik_kolo") ;
			 echo rysuj_linie(1415, 685, 1415, 695, $rups9_1_kolor_lacznika_OUT ,"wylacznik");
		 ?>			
		<!------------------------------RUPS9-2 wyl IN----------------------------->	
		<?php
			 echo rysuj_linie(1435,492,1435,500,$rups9_2_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(1435, 500, 3, $rups9_2_kolor_lacznika_IN , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_2_stan_lacznika_IN, 500,1435,520, $rups9_2_kolor_lacznika_IN ,"wylacznik");
			 echo rysuj_kolo(1435, 520, 3, $rups9_2_kolor_lacznika_IN , "wylacznik_kolo") ;
			 echo rysuj_linie(1435, 520, 1435, 530, $rups9_2_kolor_lacznika_IN ,"wylacznik");
		 ?>	
		<!------------------------------RUPS9-2 wyl BYPASS----------------------->		
		<?php
			 echo rysuj_linie(1435,545,1435,555,$rups9_2_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(1435, 555, 3, $rups9_2_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_2_stan_lacznika_bypass, 555,1435,575, $rups9_2_kolor_lacznika_bypass ,"wylacznik");
			 echo rysuj_kolo(1435, 575, 3, $rups9_2_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1435, 575, 1435, 585, $rups9_2_kolor_lacznika_bypass ,"wylacznik");
		 ?>			
		<!----------------------RUPS9-2 wyl MANUAL BYPASS------------------>		
		<?php
			 echo rysuj_linie(1435,600,1435,610,$rups9_2_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(1435, 610, 3, $rups9_2_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_2_stan_lacznika_m_bypass, 610,1435,630, $rups9_2_kolor_lacznika_m_bypass ,"wylacznik");
			 echo rysuj_kolo(1435, 630, 3, $rups9_2_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1435, 630, 1435, 640, $rups9_2_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>			
		<!------------------------------RUPS9-2 wyl OUT---------------------------->	
		<?php
			 echo rysuj_linie(1435,655,1435,665,$rups9_2_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(1435, 665, 3, $rups9_2_kolor_lacznika_OUT , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_2_stan_lacznika_OUT, 665,1435,685, $rups9_2_kolor_lacznika_OUT ,"wylacznik");
			 echo rysuj_kolo(1435, 685, 3, $rups9_2_kolor_lacznika_OUT , "wylacznik_kolo") ;
			 echo rysuj_linie(1435, 685, 1435, 695, $rups9_2_kolor_lacznika_OUT ,"wylacznik");
		?>		
		<!------------------------------RUPS9-3 wyl IN----------------------------->		
		<?php
			 echo rysuj_linie(1455,490,1455,500,$rups9_3_kolor_lacznika_IN,"wylacznik");
			 echo rysuj_kolo(1455, 500, 3, $rups9_3_kolor_lacznika_IN , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_3_stan_lacznika_IN, 500,1455,520, $rups9_3_kolor_lacznika_IN ,"wylacznik");
			 echo rysuj_kolo(1455, 520, 3, $rups9_3_kolor_lacznika_IN , "wylacznik_kolo") ;
			 echo rysuj_linie(1455, 520, 1455, 530, $rups9_3_kolor_lacznika_IN ,"wylacznik");
		 ?>		
		<!------------------------------RUPS9-3 wyl BYPASS----------------------->
		<?php
			 echo rysuj_linie(1455,545,1455,555,$rups9_3_kolor_lacznika_bypass,"wylacznik");
			 echo rysuj_kolo(1455, 555, 3, $rups9_3_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_3_stan_lacznika_bypass, 555,1455,575, $rups9_3_kolor_lacznika_bypass ,"wylacznik");
			 echo rysuj_kolo(1455, 575, 3, $rups9_3_kolor_lacznika_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1455, 575, 1455, 585, $rups9_3_kolor_lacznika_bypass ,"wylacznik");
		 ?>	
		<!----------------------RUPS9-3 wyl MANUAL BYPASS------------------>	
		<?php
			 echo rysuj_linie(1455,600,1455,610,$rups9_3_kolor_lacznika_m_bypass,"wylacznik");
			 echo rysuj_kolo(1455, 610, 3, $rups9_3_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_3_stan_lacznika_m_bypass, 610,1455,630, $rups9_3_kolor_lacznika_m_bypass ,"wylacznik");
			 echo rysuj_kolo(1455, 630, 3, $rups9_3_kolor_lacznika_m_bypass , "wylacznik_kolo") ;
			 echo rysuj_linie(1455, 630, 1455, 640, $rups9_3_kolor_lacznika_m_bypass ,"wylacznik");
		 ?>				
		<!------------------------------RUPS9-3 wyl OUT---------------------------->	
		<?php
			 echo rysuj_linie(1455,655,1455,665,$rups9_3_kolor_lacznika_OUT,"wylacznik");
			 echo rysuj_kolo(1455, 665, 3, $rups9_3_kolor_lacznika_OUT , "wylacznik_kolo") ;
			 echo rysuj_linie($rups9_3_stan_lacznika_OUT, 665,1455,685, $rups9_3_kolor_lacznika_OUT ,"wylacznik");
			 echo rysuj_kolo(1455, 685, 3, $rups9_3_kolor_lacznika_OUT , "wylacznik_kolo") ;
			 echo rysuj_linie(1455, 685, 1455, 695, $rups9_3_kolor_lacznika_OUT ,"wylacznik");
		?>
		<title>
			<?php  // dymek z danymi po najechaniu
			echo 
				'f-in='.$rups9_1_f_L1_IN.' / '.$rups9_2_f_L2_IN.' / '.$rups9_3_f_L3_IN.' Hz'."\n".
				'f-out='.$rups9_1_f_OUT.' / '.$rups9_2_f_OUT.' / '.$rups9_3_f_OUT.' Hz'."\n".
				'U-bateria='.$rups9_1_U_bateria.' / '.$rups9_2_U_bateria.' / '.$rups9_3_U_bateria.' V'."\n".
				'Bateria-charge='.$rups9_1_charge_bateria.' / '.$rups9_2_charge_bateria.' / '.$rups9_3_charge_bateria.' %'."\n".
				'Temperatura-baterii='.$rups9_1_T_bateria.' / '.$rups9_2_T_bateria.' / '.$rups9_3_T_bateria.' °C'."\n";				
			printf ("P-out= %.3f / %.3f / %.3f kW",$rups9_1_P_OUT,$rups9_2_P_OUT,$rups9_3_P_OUT);
			?>		
	     </title>
	</g>	
</svg>

</body>
</html>