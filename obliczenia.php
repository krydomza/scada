<?php
require_once('wczytywanie.php'); 
require_once('config.php'); 

$limity = parse_ini_file("konfiguracje.ini", true); 

//================= obróbka danych , obliczenia =========================================
// 'rtask-diris' - na stronie jako RTASK
$rtask_diris_P_suma=$rtask_diris['rtask-diris']['moc-czynna-suma'];
$rtask_diris_S_suma=$rtask_diris['rtask-diris']['moc-pozorna-suma'];

// ======================'rtask1'================================
$rtask1_P_suma=$rtask1['rtask1']['moc-czynna-suma']*120; // [kW]
$rtask1_S_suma=$rtask1['rtask1']['moc-pozorna-suma']*120; // [kVA]

// ======================'rtask3'================================
$rtask3_P_suma=$rtask3['rtask3']['moc-czynna-suma']*100;  // [kW]
$rtask3_S_suma=$rtask3['rtask3']['moc-pozorna-suma']*100; // [kVA]

// 'rgnn1' - licznik przed (parter,rtask1,rtask3)========================
$licznik1_P_suma=$rgnn1['rgnn1']['moc-czynna-suma']*250/1000; // [kW]
$licznik1_S_suma=$rgnn1['rgnn1']['moc-pozorna-suma']*250/1000; // [kVA]

// 'rgnn2' - licznik P.poż ==========================================
$licznik_p_Poz_P_suma=$rgnn2['rgnn2']['moc-czynna-suma']*30/1000; // [kW]
$licznik_p_Poz_S_suma=$rgnn2['rgnn2']['moc-pozorna-suma']*30/1000; // [kVA]

// Tr2 = licznik + licznik_P.Poż======================================
$tr2_P_suma=$licznik1_P_suma+$licznik_p_Poz_P_suma;
$tr2_S_suma=$licznik1_S_suma+$licznik_p_Poz_S_suma;

// odbiory na parterze;  parter = licznik - rtask1 - rtask3;  
$parter_P_suma=$licznik1_P_suma-$rtask1_P_suma-$rtask3_P_suma;
$parter_S_suma=$licznik1_S_suma-$rtask1_S_suma-$rtask3_S_suma;

// TR1 => licznik od TR1  = 'RGTASK' 
$tr1_P_suma=$rgtask['rgtask']['moc-czynna-suma']*250/1000; //[kW]
$tr1_S_suma=$rgtask['rgtask']['moc-pozorna-suma']*250/1000; // [kVA]

//================ rups1==============================

// prąd IN na L1 , L2 i L3
$rups1_I_L1_IN=$rups1['rups1']['prad-in-L1']/10;  
$rups1_I_L2_IN=$rups1['rups1']['prad-in-L2']/10;  
$rups1_I_L3_IN=$rups1['rups1']['prad-in-L3']/10;  
// prąd OUT na L1 , L2 i L3
$rups1_I_L1_OUT=$rups1['rups1']['prad-out-L1']/10; 
$rups1_I_L2_OUT=$rups1['rups1']['prad-out-L2']/10;  
$rups1_I_L3_OUT=$rups1['rups1']['prad-out-L3']/10;  
// napięcie IN na L1 , L2 i L3
$rups1_U_L1_IN=$rups1['rups1']['napiecie-in-L1']/10;  // [V]
$rups1_U_L2_IN=$rups1['rups1']['napiecie-in-L2']/10;  // [V]
$rups1_U_L3_IN=$rups1['rups1']['napiecie-in-L3']/10;  // [V]
// napięcie OUT na L1 , L2 i L3
$rups1_U_L1_OUT=$rups1['rups1']['napiecie-out-L1']/10;  // [V]
$rups1_U_L2_OUT=$rups1['rups1']['napiecie-out-L2']/10;  // [V]
$rups1_U_L3_OUT=$rups1['rups1']['napiecie-out-L3']/10;  // [V]
// częstotliwość IN na L1 , L2 i L3
$rups1_f_L1_IN=$rups1['rups1']['czestotliwosc-in-L1']/10;  // [Hz]
$rups1_f_L2_IN=$rups1['rups1']['czestotliwosc-in-L2']/10;  // [Hz]
$rups1_f_L3_IN=$rups1['rups1']['czestotliwosc-in-L3']/10;  // [Hz]
// częstotliwość OUT
$rups1_f_OUT=$rups1['rups1']['czestotliwosc-out']/10;  // [Hz]  
// napięcie baterii
$rups1_U_bateria=$rups1['rups1']['bateria-napiecie']/10;  // [V]             
// prąd bateria
$rups1_I_bateria=$rups1['rups1']['bateria-prad'];  
// naładowanie baterii
$rups1_charge_bateria=$rups1['rups1']['bateria-charge']; // [%]

// moc czynna L1 - IN , wartość procentowa
$rups1_P_L1_IN=$rups1['rups1']['load-percent-out-L1']/100; // np. 0,29 zamiast 29%
// moc czynna  L2 - IN
$rups1_P_L2_IN=$rups1['rups1']['load-percent-out-L2']/100;
// moc czynna  L3 - IN
$rups1_P_L3_IN=$rups1['rups1']['load-percent-out-L3']/100;
// suma moc czynna IN;      P-in=Sn*cosfi* (P_L1+PL_2+P_L3) / 3
$rups1_P_IN=$limity['RUPS1']['S-IN']['S-IN-znamionowe']*$limity['RUPS1']['cosfi']*($rups1_P_L1_IN+$rups1_P_L2_IN+$rups1_P_L3_IN)/3 ;//[kW]
// moc pozorna  L1 - OUT 
//$rups1_S_L1_OUT=$rups1_I_L1_OUT*$rups1_U_L1_OUT/1000;
// moc pozorna  L2 - OUT 
//$rups1_S_L2_OUT=$rups1_I_L2_OUT*$rups1_U_L2_OUT/1000;
// moc pozorna  L3 - OUT 
//$rups1_S_L3_OUT=$rups1_I_L3_OUT*$rups1_U_L3_OUT/1000;
// suma moc pozorna OUT
//$rups1_S_OUT=$rups1_S_L1_OUT+$rups1_S_L2_OUT+$rups1_S_L3_OUT;

//================ rups2==============================
// prąd IN na L1 , L2 i L3
$rups2_I_L1_IN=$rups2['rups2']['prad-in-L1']/10;  // spr         
$rups2_I_L2_IN=$rups2['rups2']['prad-in-L2']/10;  // spr         
$rups2_I_L3_IN=$rups2['rups2']['prad-in-L3']/10;  // spr         
 // prąd OUT na L1 , L2 i L3
$rups2_I_L1_OUT=$rups2['rups2']['prad-out-L1']/10;  // spr       
$rups2_I_L2_OUT=$rups2['rups2']['prad-out-L2']/10;  // spr       
$rups2_I_L3_OUT=$rups2['rups2']['prad-out-L3']/10;  // spr       
// napięcie IN na L1 , L2 i L3
$rups2_U_L1_IN=$rups2['rups2']['napiecie-in-L1']/10;  // [V]
$rups2_U_L2_IN=$rups2['rups2']['napiecie-in-L2']/10;  // [V]
$rups2_U_L3_IN=$rups2['rups2']['napiecie-in-L3']/10;  // [V]
// napięcie OUT na L1 , L2 i L3
$rups2_U_L1_OUT=$rups2['rups2']['napiecie-out-L1']/10;  // [V] 
$rups2_U_L2_OUT=$rups2['rups2']['napiecie-out-L2']/10;  // [V] 
$rups2_U_L3_OUT=$rups2['rups2']['napiecie-out-L3']/10;  // [V] 
// częstotliwość IN na L1 , L2 i L3
$rups2_f_L1_IN=$rups2['rups2']['czestotliwosc-in-L1']/10;  // [Hz] 
$rups2_f_L2_IN=$rups2['rups2']['czestotliwosc-in-L2']/10;  // [Hz] 
$rups2_f_L3_IN=$rups2['rups2']['czestotliwosc-in-L3']/10;  // [Hz] 
// częstotliwość OUT
$rups2_f_OUT=$rups2['rups2']['czestotliwosc-out']/10;  // [Hz] 
// napięcie baterii
$rups2_U_bateria=$rups2['rups2']['bateria-napiecie']/10;  // [V]             
// prąd bateria
$rups2_I_bateria=$rups2['rups2']['bateria-prad'];  // spr
// naładowanie baterii
$rups2_charge_bateria=$rups2['rups2']['bateria-charge']; // [%]     
     
// moc czynna L1 - IN , wartość procentowa
$rups2_P_L1_IN=$rups2['rups2']['load-percent-out-L1']/100; // np. 0,29 zamiast 29%
// moc czynna  L2 - IN
$rups2_P_L2_IN=$rups2['rups2']['load-percent-out-L2']/100;
// moc czynna  L3 - IN
$rups2_P_L3_IN=$rups2['rups2']['load-percent-out-L3']/100;
// suma moc czynna IN;      P-in=Sn*cosfi* (P_L1+PL_2+P_L3) / 3
$rups2_P_IN=$limity['RUPS2']['S-IN']['S-IN-znamionowe']*$limity['RUPS2']['cosfi']*($rups2_P_L1_IN+$rups2_P_L2_IN+$rups2_P_L3_IN)/3 ;//[kW]
// moc pozorna  L1 - OUT 
//$rups2_S_L1_OUT=$rups2_I_L1_OUT*$rups2_U_L1_OUT/1000;
// moc pozorna  L2 - OUT 
//$rups2_S_L2_OUT=$rups2_I_L2_OUT*$rups2_U_L2_OUT/1000;
// moc pozorna  L3 - OUT 
//$rups2_S_L3_OUT=$rups2_I_L3_OUT*$rups2_U_L3_OUT/1000;
// suma moc pozorna OUT
//$rups2_S_OUT=$rups2_S_L1_OUT+$rups2_S_L2_OUT+$rups2_S_L3_OUT;

//================ rups3-1=============================
// prąd IN na L1 , L2 i L3
$rups3_1_I_L1_IN=$rups3_1['rups3-1']['prad-in-L1']/10;  // spr         
$rups3_1_I_L2_IN=$rups3_1['rups3-1']['prad-in-L2']/10;  // spr         
$rups3_1_I_L3_IN=$rups3_1['rups3-1']['prad-in-L3']/10;  // spr           
 // prąd OUT na L1 , L2 i L3
$rups3_1_I_L1_OUT=$rups3_1['rups3-1']['prad-out-L1']/10;  // spr       
$rups3_1_I_L2_OUT=$rups3_1['rups3-1']['prad-out-L2']/10;  // spr       
$rups3_1_I_L3_OUT=$rups3_1['rups3-1']['prad-out-L3']/10;  // spr       
// napięcie IN na L1 , L2 i L3
$rups3_1_U_L1_IN=$rups3_1['rups3-1']['napiecie-in-L1']/10;  // [V]
$rups3_1_U_L2_IN=$rups3_1['rups3-1']['napiecie-in-L2']/10;  // [V]
$rups3_1_U_L3_IN=$rups3_1['rups3-1']['napiecie-in-L3']/10;  // [V]
// napięcie OUT na L1 , L2 i L3
$rups3_1_U_L1_OUT=$rups3_1['rups3-1']['napiecie-out-L1']/10;  // [V] 
$rups3_1_U_L2_OUT=$rups3_1['rups3-1']['napiecie-out-L2']/10;  // [V] 
$rups3_1_U_L3_OUT=$rups3_1['rups3-1']['napiecie-out-L3']/10;  // [V] 
// częstotliwość IN na L1 , L2 i L3
$rups3_1_f_L1_IN=$rups3_1['rups3-1']['czestotliwosc-in-L1']/10;  // [Hz] 
$rups3_1_f_L2_IN=$rups3_1['rups3-1']['czestotliwosc-in-L2']/10;  // [Hz] 
$rups3_1_f_L3_IN=$rups3_1['rups3-1']['czestotliwosc-in-L3']/10;  // [Hz] 
// częstotliwość OUT
$rups3_1_f_OUT=$rups3_1['rups3-1']['czestotliwosc-out']/10;  // [Hz] 
// napięcie baterii
$rups3_1_U_bateria=$rups3_1['rups3-1']['bateria-napiecie']/10;  // [V]             
// prąd bateria
$rups3_1_I_bateria=$rups3_1['rups3-1']['bateria-prad'];  // spr
// naładowanie baterii
$rups3_1_charge_bateria=$rups3_1['rups3-1']['bateria-charge']; // [%]     

		// moc czynna L1 - IN , wartość procentowa
		$rups3_1_P_L1_IN=$rups3_1['rups3-1']['load-percent-out-L1']/100; // np. 0,29 zamiast 29%
		// moc czynna  L2 - IN
		$rups3_1_P_L2_IN=$rups3_1['rups3-1']['load-percent-out-L2']/100;
		// moc czynna  L3 - IN
		$rups3_1_P_L3_IN=$rups3_1['rups3-1']['load-percent-out-L3']/100;
// suma moc czynna IN;      P-in=Sn*cosfi* (P_L1+PL_2+P_L3) / 3
$rups3_1_P_IN=$limity['RUPS3']['S-IN']['S-IN-znamionowe']*$limity['RUPS3']['cosfi']*($rups3_1_P_L1_IN+$rups3_1_P_L2_IN+$rups3_1_P_L3_IN)/3 ;//[kW]

//================ rups3-2=============================
// prąd IN na L1 , L2 i L3
$rups3_2_I_L1_IN=$rups3_2['rups3-2']['prad-in-L1']/10;  // spr         
$rups3_2_I_L2_IN=$rups3_2['rups3-2']['prad-in-L2']/10;  // spr         
$rups3_2_I_L3_IN=$rups3_2['rups3-2']['prad-in-L3']/10;  // spr           
 // prąd OUT na L1 , L2 i L3
$rups3_2_I_L1_OUT=$rups3_2['rups3-2']['prad-out-L1']/10;  // spr       
$rups3_2_I_L2_OUT=$rups3_2['rups3-2']['prad-out-L2']/10;  // spr       
$rups3_2_I_L3_OUT=$rups3_2['rups3-2']['prad-out-L3']/10;  // spr       
// napięcie IN na L1 , L2 i L3
$rups3_2_U_L1_IN=$rups3_2['rups3-2']['napiecie-in-L1']/10;  // [V]
$rups3_2_U_L2_IN=$rups3_2['rups3-2']['napiecie-in-L2']/10;  // [V]
$rups3_2_U_L3_IN=$rups3_2['rups3-2']['napiecie-in-L3']/10;  // [V]
// napięcie OUT na L1 , L2 i L3
$rups3_2_U_L1_OUT=$rups3_2['rups3-2']['napiecie-out-L1']/10;  // [V] 
$rups3_2_U_L2_OUT=$rups3_2['rups3-2']['napiecie-out-L2']/10;  // [V] 
$rups3_2_U_L3_OUT=$rups3_2['rups3-2']['napiecie-out-L3']/10;  // [V] 
// częstotliwość IN na L1 , L2 i L3
$rups3_2_f_L1_IN=$rups3_2['rups3-2']['czestotliwosc-in-L1']/10;  // [Hz] 
$rups3_2_f_L2_IN=$rups3_2['rups3-2']['czestotliwosc-in-L2']/10;  // [Hz] 
$rups3_2_f_L3_IN=$rups3_2['rups3-2']['czestotliwosc-in-L3']/10;  // [Hz] 
// częstotliwość OUT
$rups3_2_f_OUT=$rups3_2['rups3-2']['czestotliwosc-out']/10;  // [Hz] 
// napięcie baterii
$rups3_2_U_bateria=$rups3_2['rups3-2']['bateria-napiecie']/10;  // [V]             
// prąd bateria
$rups3_2_I_bateria=$rups3_2['rups3-2']['bateria-prad'];  // spr
// naładowanie baterii
$rups3_2_charge_bateria=$rups3_2['rups3-2']['bateria-charge']; // [%]    

		// moc czynna L1 - IN , wartość procentowa
		$rups3_2_P_L1_IN=$rups3_2['rups3-2']['load-percent-out-L1']/100; // np. 0,29 zamiast 29%
		// moc czynna  L2 - IN
		$rups3_2_P_L2_IN=$rups3_2['rups3-2']['load-percent-out-L2']/100;
		// moc czynna  L3 - IN
		$rups3_2_P_L3_IN=$rups3_2['rups3-2']['load-percent-out-L3']/100;
// suma moc czynna IN;      P-in=Sn*cosfi* (P_L1+PL_2+P_L3) / 3
$rups3_2_P_IN=$limity['RUPS3']['S-IN']['S-IN-znamionowe']*$limity['RUPS3']['cosfi']*($rups3_2_P_L1_IN+$rups3_2_P_L2_IN+$rups3_2_P_L3_IN)/3 ;//[kW]

//=========rups3==========
// łączna moc wejsciowa z:  rups3_1 + rups3_2
$rups3_P_IN=$rups3_1_P_IN+$rups3_2_P_IN;    
//$rups3_S_OUT=$rups3_1_S_OUT+$rups3_2_S_OUT;    

//================ rups4==============================
// prąd IN na L1 , L2 i L3
$rups4_I_L1_IN=$rups4['rups4']['prad-in-L1']/10;  // spr         
$rups4_I_L2_IN=$rups4['rups4']['prad-in-L2']/10;  // spr         
$rups4_I_L3_IN=$rups4['rups4']['prad-in-L3']/10;  // spr         
 // prąd OUT na L1 , L2 i L3
$rups4_I_L1_OUT=$rups4['rups4']['prad-out-L1']/10;  // spr       
$rups4_I_L2_OUT=$rups4['rups4']['prad-out-L2']/10;  // spr       
$rups4_I_L3_OUT=$rups4['rups4']['prad-out-L3']/10;  // spr       
// napięcie IN na L1 , L2 i L3
$rups4_U_L1_IN=$rups4['rups4']['napiecie-in-L1']/10;  // [V]
$rups4_U_L2_IN=$rups4['rups4']['napiecie-in-L2']/10;  // [V]
$rups4_U_L3_IN=$rups4['rups4']['napiecie-in-L3']/10;  // [V]
// napięcie OUT na L1 , L2 i L3
$rups4_U_L1_OUT=$rups4['rups4']['napiecie-out-L1']/10;  // [V] 
$rups4_U_L2_OUT=$rups4['rups4']['napiecie-out-L2']/10;  // [V] 
$rups4_U_L3_OUT=$rups4['rups4']['napiecie-out-L3']/10;  // [V] 
// częstotliwość IN na L1 , L2 i L3
$rups4_f_L1_IN=$rups4['rups4']['czestotliwosc-in-L1']/10;  // [Hz] 
$rups4_f_L2_IN=$rups4['rups4']['czestotliwosc-in-L2']/10;  // [Hz] 
$rups4_f_L3_IN=$rups4['rups4']['czestotliwosc-in-L3']/10;  // [Hz] 
// częstotliwość OUT
$rups4_f_OUT=$rups4['rups4']['czestotliwosc-out']/10;  // [Hz] 
// napięcie baterii
$rups4_U_bateria=$rups4['rups4']['bateria-napiecie']/10;  // [V]             
// prąd bateria
$rups4_I_bateria=$rups4['rups4']['bateria-prad'];  // spr
// naładowanie baterii
$rups4_charge_bateria=$rups4['rups4']['bateria-charge']; // [%]    

// moc czynna L1 - IN , wartość procentowa
$rups4_P_L1_IN=$rups4['rups4']['load-percent-out-L1']/100; // np. 0,29 zamiast 29%
// moc czynna  L2 - IN
$rups4_P_L2_IN=$rups4['rups4']['load-percent-out-L2']/100;
// moc czynna  L3 - IN
$rups4_P_L3_IN=$rups4['rups4']['load-percent-out-L3']/100;
// suma moc czynna IN;      P-in=Sn*cosfi* (P_L1+PL_2+P_L3) / 3
$rups4_P_IN=$limity['RUPS4']['S-IN']['S-IN-znamionowe']*$limity['RUPS4']['cosfi']*($rups4_P_L1_IN+$rups4_P_L2_IN+$rups4_P_L3_IN)/3 ;//[kW]
// moc pozorna  L1 - OUT 
//$rups4_S_L1_OUT=$rups4_I_L1_OUT*$rups4_U_L1_OUT/1000;
// moc pozorna  L2 - OUT 
//$rups4_S_L2_OUT=$rups4_I_L2_OUT*$rups4_U_L2_OUT/1000;
// moc pozorna  L3 - OUT 
//$rups4_S_L3_OUT=$rups4_I_L3_OUT*$rups4_U_L3_OUT/1000;
// suma moc pozorna OUT
//$rups4_S_OUT=$rups4_S_L1_OUT+$rups4_S_L2_OUT+$rups4_S_L3_OUT;

//================ rups8==============================
// prąd IN na L1 , L2 i L3
$rups8_I_L1_IN=$rups8['rups8']['prad-in-L1']/10;  // spr         
$rups8_I_L2_IN=$rups8['rups8']['prad-in-L2']/10;  // spr         
$rups8_I_L3_IN=$rups8['rups8']['prad-in-L3']/10;  // spr         
 // prąd OUT na L1 , L2 i L3
$rups8_I_L1_OUT=$rups8['rups8']['prad-out-L1']/10;  // spr       
$rups8_I_L2_OUT=$rups8['rups8']['prad-out-L2']/10;  // spr       
$rups8_I_L3_OUT=$rups8['rups8']['prad-out-L3']/10;  // spr       
// napięcie IN na L1 , L2 i L3
$rups8_U_L1_IN=$rups8['rups8']['napiecie-in-L1']/10;  // [V]
$rups8_U_L2_IN=$rups8['rups8']['napiecie-in-L2']/10;  // [V]
$rups8_U_L3_IN=$rups8['rups8']['napiecie-in-L3']/10;  // [V]
// napięcie OUT na L1 , L2 i L3
$rups8_U_L1_OUT=$rups8['rups8']['napiecie-out-L1']/10;  // [V] 
$rups8_U_L2_OUT=$rups8['rups8']['napiecie-out-L2']/10;  // [V] 
$rups8_U_L3_OUT=$rups8['rups8']['napiecie-out-L3']/10;  // [V] 
// częstotliwość IN na L1 , L2 i L3
$rups8_f_L1_IN=$rups8['rups8']['czestotliwosc-in-L1']/10;  // [Hz] 
$rups8_f_L2_IN=$rups8['rups8']['czestotliwosc-in-L2']/10;  // [Hz] 
$rups8_f_L3_IN=$rups8['rups8']['czestotliwosc-in-L3']/10;  // [Hz] 
// częstotliwość OUT
$rups8_f_OUT=$rups8['rups8']['czestotliwosc-out']/10;  // [Hz] 
// napięcie baterii
$rups8_U_bateria=$rups8['rups8']['bateria-napiecie']/10;  // [V]             
// prąd bateria
$rups8_I_bateria=$rups8['rups8']['bateria-prad'];  // spr
// naładowanie baterii
$rups8_charge_bateria=$rups8['rups8']['bateria-charge']; // [%]  

		// moc czynna L1 - IN , wartość procentowa
		$rups8_P_L1_IN=$rups8['rups8']['load-percent-out-L1']/100; // np. 0,29 zamiast 29%
		// moc czynna  L2 - IN
		$rups8_P_L2_IN=$rups8['rups8']['load-percent-out-L2']/100;
		// moc czynna  L3 - IN
		$rups8_P_L3_IN=$rups8['rups8']['load-percent-out-L3']/100;
// suma moc czynna IN;      P-in=Sn*cosfi* (P_L1+PL_2+P_L3) / 3
$rups8_P_IN=$limity['RUPS8']['S-IN']['S-IN-znamionowe']*$limity['RUPS8']['cosfi']*($rups8_P_L1_IN+$rups8_P_L2_IN+$rups8_P_L3_IN)/3 ;//[kW]

		// moc pozorna  L1 - OUT 
	//	$rups8_S_L1_OUT=$rups8_I_L1_OUT*$rups8_U_L1_OUT/1000;
		// moc pozorna  L2 - OUT 
	//	$rups8_S_L2_OUT=$rups8_I_L2_OUT*$rups8_U_L2_OUT/1000;
		// moc pozorna  L3 - OUT 
	//	$rups8_S_L3_OUT=$rups8_I_L3_OUT*$rups8_U_L3_OUT/1000;
// suma moc pozorna OUT
//$rups8_S_OUT=$rups8_S_L1_OUT+$rups8_S_L2_OUT+$rups8_S_L3_OUT;

//================ rups9-1==============================
// prąd IN na L1 , L2 i L3
$rups9_1_I_L1_IN=$rups9_1['rups9-1']['prad-in-L1']/10;  // spr   
$rups9_1_I_L2_IN=$rups9_1['rups9-1']['prad-in-L2']/10;  // spr   
$rups9_1_I_L3_IN=$rups9_1['rups9-1']['prad-in-L3']/10;  // spr   
// prąd OUT na L1 , L2 i L3
$rups9_1_I_L1_OUT=$rups9_1['rups9-1']['prad-out-L1']/10;  // spr 
$rups9_1_I_L2_OUT=$rups9_1['rups9-1']['prad-out-L2']/10;  // spr 
$rups9_1_I_L3_OUT=$rups9_1['rups9-1']['prad-out-L3']/10;  // spr 
// napięcie IN na L1 , L2 i L3
$rups9_1_U_L1_IN=$rups9_1['rups9-1']['napiecie-in-L1'];  // [V]
$rups9_1_U_L2_IN=$rups9_1['rups9-1']['napiecie-in-L2'];  // [V]
$rups9_1_U_L3_IN=$rups9_1['rups9-1']['napiecie-in-L3'];  // [V]
// napięcie OUT na L1 , L2 i L3
$rups9_1_U_L1_OUT=$rups9_1['rups9-1']['napiecie-out-L1'];  // [V]            
$rups9_1_U_L2_OUT=$rups9_1['rups9-1']['napiecie-out-L2'];  // [V]            
$rups9_1_U_L3_OUT=$rups9_1['rups9-1']['napiecie-out-L3'];  // [V]      
// moc OUT na L1 , L2 i L3
$rups9_1_S_L1_OUT=$rups9_1['rups9-1']['load-power-out-L1']/1000;  // [kVA]            
$rups9_1_S_L2_OUT=$rups9_1['rups9-1']['load-power-out-L2']/1000;  // [kVA]            
$rups9_1_S_L3_OUT=$rups9_1['rups9-1']['load-power-out-L3']/1000;  // [kVA]   
// suma moc OUT  
$rups9_1_S_OUT=$rups9_1_S_L1_OUT+$rups9_1_S_L2_OUT+$rups9_1_S_L3_OUT;        
// częstotliwość IN na L1 , L2 i L3
$rups9_1_f_L1_IN=$rups9_1['rups9-1']['czestotliwosc-in-L1']/10;  // [Hz]         
$rups9_1_f_L2_IN=$rups9_1['rups9-1']['czestotliwosc-in-L2']/10;  // [Hz]         
$rups9_1_f_L3_IN=$rups9_1['rups9-1']['czestotliwosc-in-L3']/10;  // [Hz]         
// częstotliwość OUT        
$rups9_1_f_OUT=$rups9_1['rups9-1']['czestotliwosc-out']/10;  // [Hz]               
// napięcie baterii
$rups9_1_U_bateria=$rups9_1['rups9-1']['bateria-napiecie']/10;  // [V]              
// prąd bateria
$rups9_1_I_bateria=$rups9_1['rups9-1']['bateria-prad'];  // spr
// naładowanie baterii
$rups9_1_charge_bateria=$rups9_1['rups9-1']['bateria-charge']; // [%]        
// temperatura baterii
$rups9_1_T_bateria=$rups9_1['rups9-1']['bateria-temperatura'];  

// moc czynna out na kazdej z faz dla RUPS9-1
		$rups9_1_P_L1_OUT=$rups9_1['rups9-1']['load-power-out-L1']/1000;   //[kW]
		$rups9_1_P_L2_OUT=$rups9_1['rups9-1']['load-power-out-L2']/1000;   //[kW]
		$rups9_1_P_L3_OUT=$rups9_1['rups9-1']['load-power-out-L3']/1000;   //[kW]
// suma mocy czynnej out z 3 faz
$rups9_1_P_OUT=$rups9_1_P_L1_OUT+$rups9_1_P_L2_OUT+$rups9_1_P_L3_OUT;

//================ rups9-2==============================
// prąd IN na L1 , L2 i L3
$rups9_2_I_L1_IN=$rups9_2['rups9-2']['prad-in-L1']/10;  // spr   
$rups9_2_I_L2_IN=$rups9_2['rups9-2']['prad-in-L2']/10;  // spr   
$rups9_2_I_L3_IN=$rups9_2['rups9-2']['prad-in-L3']/10;  // spr   
// prąd OUT na L1 , L2 i L3
$rups9_2_I_L1_OUT=$rups9_2['rups9-2']['prad-out-L1']/10;  // spr 
$rups9_2_I_L2_OUT=$rups9_2['rups9-2']['prad-out-L2']/10;  // spr 
$rups9_2_I_L3_OUT=$rups9_2['rups9-2']['prad-out-L3']/10;  // spr 
// napięcie IN na L1 , L2 i L3
$rups9_2_U_L1_IN=$rups9_2['rups9-2']['napiecie-in-L1'];  // [V]
$rups9_2_U_L2_IN=$rups9_2['rups9-2']['napiecie-in-L2'];  // [V]
$rups9_2_U_L3_IN=$rups9_2['rups9-2']['napiecie-in-L3'];  // [V]
// napięcie OUT na L1 , L2 i L3
$rups9_2_U_L1_OUT=$rups9_2['rups9-2']['napiecie-out-L1'];  // [V]            
$rups9_2_U_L2_OUT=$rups9_2['rups9-2']['napiecie-out-L2'];  // [V]            
$rups9_2_U_L3_OUT=$rups9_2['rups9-2']['napiecie-out-L3'];  // [V]    
// moc OUT na L1 , L2 i L3
$rups9_2_S_L1_OUT=$rups9_2['rups9-2']['load-power-out-L1']/1000;  // [kVA]            
$rups9_2_S_L2_OUT=$rups9_2['rups9-2']['load-power-out-L2']/1000;  // [kVA]            
$rups9_2_S_L3_OUT=$rups9_2['rups9-2']['load-power-out-L3']/1000;  // [kVA]   
// suma moc OUT  
$rups9_2_S_OUT=$rups9_2_S_L1_OUT+$rups9_2_S_L2_OUT+$rups9_2_S_L3_OUT;                
// częstotliwość IN na L1 , L2 i L3
$rups9_2_f_L1_IN=$rups9_2['rups9-2']['czestotliwosc-in-L1']/10;  // [Hz]         
$rups9_2_f_L2_IN=$rups9_2['rups9-2']['czestotliwosc-in-L2']/10;  // [Hz]         
$rups9_2_f_L3_IN=$rups9_2['rups9-2']['czestotliwosc-in-L3']/10;  // [Hz]         
// częstotliwość OUT        
$rups9_2_f_OUT=$rups9_2['rups9-2']['czestotliwosc-out']/10;  // [Hz]               
// napięcie baterii
$rups9_2_U_bateria=$rups9_2['rups9-2']['bateria-napiecie']/10;  // [V]              
// prąd bateria
$rups9_2_I_bateria=$rups9_2['rups9-2']['bateria-prad'];  // spr
// naładowanie baterii
$rups9_2_charge_bateria=$rups9_2['rups9-2']['bateria-charge']; // [%]        
// temperatura baterii
$rups9_2_T_bateria=$rups9_2['rups9-2']['bateria-temperatura'];       

// moc czynna out na kazdej z faz dla RUPS9-2
		$rups9_2_P_L1_OUT=$rups9_2['rups9-2']['load-power-out-L1']/1000; 
		$rups9_2_P_L2_OUT=$rups9_2['rups9-2']['load-power-out-L2']/1000; 
		$rups9_2_P_L3_OUT=$rups9_2['rups9-2']['load-power-out-L3']/1000; 
// suma mocy czynnej out z 3 faz
$rups9_2_P_OUT=$rups9_2_P_L1_OUT+$rups9_2_P_L2_OUT+$rups9_2_P_L3_OUT;
 
//================ rups9-3==============================
// prąd IN na L1 , L2 i L3
$rups9_3_I_L1_IN=$rups9_3['rups9-3']['prad-in-L1']/10;  // spr   
$rups9_3_I_L2_IN=$rups9_3['rups9-3']['prad-in-L2']/10;  // spr   
$rups9_3_I_L3_IN=$rups9_3['rups9-3']['prad-in-L3']/10;  // spr   
// prąd OUT na L1 , L2 i L3
$rups9_3_I_L1_OUT=$rups9_3['rups9-3']['prad-out-L1']/10;  // spr 
$rups9_3_I_L2_OUT=$rups9_3['rups9-3']['prad-out-L2']/10;  // spr 
$rups9_3_I_L3_OUT=$rups9_3['rups9-3']['prad-out-L3']/10;  // spr 
// napięcie IN na L1 , L2 i L3
$rups9_3_U_L1_IN=$rups9_3['rups9-3']['napiecie-in-L1'];  // [V]
$rups9_3_U_L2_IN=$rups9_3['rups9-3']['napiecie-in-L2'];  // [V]
$rups9_3_U_L3_IN=$rups9_3['rups9-3']['napiecie-in-L3'];  // [V]
// napięcie OUT na L1 , L2 i L3
$rups9_3_U_L1_OUT=$rups9_3['rups9-3']['napiecie-out-L1'];  // [V]            
$rups9_3_U_L2_OUT=$rups9_3['rups9-3']['napiecie-out-L2'];  // [V]            
$rups9_3_U_L3_OUT=$rups9_3['rups9-3']['napiecie-out-L3'];  // [V]  
// moc OUT na L1 , L2 i L3
$rups9_3_S_L1_OUT=$rups9_3['rups9-3']['load-power-out-L1']/1000;  // [kVA]            
$rups9_3_S_L2_OUT=$rups9_3['rups9-3']['load-power-out-L2']/1000;  // [kVA]            
$rups9_3_S_L3_OUT=$rups9_3['rups9-3']['load-power-out-L3']/1000;  // [kVA]   
// suma moc OUT  
$rups9_3_S_OUT=$rups9_3_S_L1_OUT+$rups9_3_S_L2_OUT+$rups9_3_S_L3_OUT;                
// częstotliwość IN na L1 , L2 i L3
$rups9_3_f_L1_IN=$rups9_3['rups9-3']['czestotliwosc-in-L1']/10;  // [Hz]         
$rups9_3_f_L2_IN=$rups9_3['rups9-3']['czestotliwosc-in-L2']/10;  // [Hz]         
$rups9_3_f_L3_IN=$rups9_3['rups9-3']['czestotliwosc-in-L3']/10;  // [Hz]         
// częstotliwość OUT        
$rups9_3_f_OUT=$rups9_3['rups9-3']['czestotliwosc-out']/10;  // [Hz]               
// napięcie baterii
$rups9_3_U_bateria=$rups9_3['rups9-3']['bateria-napiecie']/10;  // [V]              
// prąd bateria
$rups9_3_I_bateria=$rups9_3['rups9-3']['bateria-prad'];  // spr
// naładowanie baterii
$rups9_3_charge_bateria=$rups9_3['rups9-3']['bateria-charge']; // [%]        
// temperatura baterii
$rups9_3_T_bateria=$rups9_3['rups9-3']['bateria-temperatura'];  

// moc czynna out na kazdej z faz dla RUPS9-3
		$rups9_3_P_L1_OUT=$rups9_3['rups9-3']['load-power-out-L1']/1000; 
		$rups9_3_P_L2_OUT=$rups9_3['rups9-3']['load-power-out-L2']/1000; 
		$rups9_3_P_L3_OUT=$rups9_3['rups9-3']['load-power-out-L3']/1000; 
// suma mocy czynnej out z 3 faz
$rups9_3_P_OUT=$rups9_3_P_L1_OUT+$rups9_3_P_L2_OUT+$rups9_3_P_L3_OUT;

//====================rups9====================
// łączna moc wyjsciowa z:  rups9_1 + rups9_2 + rups9_3
$rups9_P_OUT=$rups9_1_P_OUT+$rups9_2_P_OUT+$rups9_3_P_OUT;    
            

?>