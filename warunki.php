<?php

require_once('wczytywanie.php'); 
require_once('funkcje.php'); 
require_once('obliczenia.php');

$limity = parse_ini_file("konfiguracje.ini", true); 

//=================================RUPS1=====================================================
// kolor danej dla - przekroczenia wartości mocy czynnej - IN
$rups1_P_IN_kolor_dane=ograniczenia($rups1_P_IN,$limity['RUPS1']['P-IN']['min-P-IN'],$limity['RUPS1']['P-IN']['max-P-IN'],$limity['RUPS1']['P-IN']['kolor-awaria'],$limity['RUPS1']['P-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups1_I_L1_IN_kolor_dane=ograniczenia($rups1_I_L1_IN,$limity['RUPS1']['I-IN']['min-I-IN'],$limity['RUPS1']['I-IN']['max-I-IN'],$limity['RUPS1']['I-IN']['kolor-awaria'],$limity['RUPS1']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups1_I_L2_IN_kolor_dane=ograniczenia($rups1_I_L2_IN,$limity['RUPS1']['I-IN']['min-I-IN'],$limity['RUPS1']['I-IN']['max-I-IN'],$limity['RUPS1']['I-IN']['kolor-awaria'],$limity['RUPS1']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups1_I_L3_IN_kolor_dane=ograniczenia($rups1_I_L3_IN,$limity['RUPS1']['I-IN']['min-I-IN'],$limity['RUPS1']['I-IN']['max-I-IN'],$limity['RUPS1']['I-IN']['kolor-awaria'],$limity['RUPS1']['I-IN']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups1_I_L1_IN_kolor_dane==$limity['RUPS1']['I-IN']['kolor-normal'] && $rups1_I_L2_IN_kolor_dane==$limity['RUPS1']['I-IN']['kolor-normal']	&& $rups1_I_L3_IN_kolor_dane==$limity['RUPS1']['I-IN']['kolor-normal']   )
		{
			$rups1_I_IN_kolor_dane=$limity['RUPS1']['I-IN']['kolor-normal'];
		}
		else
		{
			$rups1_I_IN_kolor_dane=$limity['RUPS1']['I-IN']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups1_I_L1_OUT_kolor_dane=ograniczenia($rups1_I_L1_OUT,$limity['RUPS1']['I-OUT']['min-I-OUT'],$limity['RUPS1']['I-OUT']['max-I-OUT'],$limity['RUPS1']['I-OUT']['kolor-awaria'],$limity['RUPS1']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups1_I_L2_OUT_kolor_dane=ograniczenia($rups1_I_L2_OUT,$limity['RUPS1']['I-OUT']['min-I-OUT'],$limity['RUPS1']['I-OUT']['max-I-OUT'],$limity['RUPS1']['I-OUT']['kolor-awaria'],$limity['RUPS1']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups1_I_L3_OUT_kolor_dane=ograniczenia($rups1_I_L3_OUT,$limity['RUPS1']['I-OUT']['min-I-OUT'],$limity['RUPS1']['I-OUT']['max-I-OUT'],$limity['RUPS1']['I-OUT']['kolor-awaria'],$limity['RUPS1']['I-OUT']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups1_I_L1_OUT_kolor_dane==$limity['RUPS1']['I-OUT']['kolor-normal'] && $rups1_I_L2_OUT_kolor_dane==$limity['RUPS1']['I-OUT']['kolor-normal']	&& $rups1_I_L3_OUT_kolor_dane==$limity['RUPS1']['I-OUT']['kolor-normal']   )
		{
			$rups1_I_OUT_kolor_dane=$limity['RUPS1']['I-OUT']['kolor-normal'];
		}
		else
		{
			$rups1_I_OUT_kolor_dane=$limity['RUPS1']['I-OUT']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups1_U_L1_IN_kolor_dane=ograniczenia($rups1_U_L1_IN,$limity['RUPS1']['U-IN']['min-U-IN'],$limity['RUPS1']['U-IN']['max-U-IN'],$limity['RUPS1']['U-IN']['kolor-awaria'],$limity['RUPS1']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups1_U_L2_IN_kolor_dane=ograniczenia($rups1_U_L2_IN,$limity['RUPS1']['U-IN']['min-U-IN'],$limity['RUPS1']['U-IN']['max-U-IN'],$limity['RUPS1']['U-IN']['kolor-awaria'],$limity['RUPS1']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups1_U_L3_IN_kolor_dane=ograniczenia($rups1_U_L3_IN,$limity['RUPS1']['U-IN']['min-U-IN'],$limity['RUPS1']['U-IN']['max-U-IN'],$limity['RUPS1']['U-IN']['kolor-awaria'],$limity['RUPS1']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups1_U_L1_OUT_kolor_dane=ograniczenia($rups1_U_L1_OUT,$limity['RUPS1']['U-OUT']['min-U-OUT'],$limity['RUPS1']['U-OUT']['max-U-OUT'],$limity['RUPS1']['U-OUT']['kolor-awaria'],$limity['RUPS1']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups1_U_L2_OUT_kolor_dane=ograniczenia($rups1_U_L2_OUT,$limity['RUPS1']['U-OUT']['min-U-OUT'],$limity['RUPS1']['U-OUT']['max-U-OUT'],$limity['RUPS1']['U-OUT']['kolor-awaria'],$limity['RUPS1']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups1_U_L3_OUT_kolor_dane=ograniczenia($rups1_U_L3_OUT,$limity['RUPS1']['U-OUT']['min-U-OUT'],$limity['RUPS1']['U-OUT']['max-U-OUT'],$limity['RUPS1']['U-OUT']['kolor-awaria'],$limity['RUPS1']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups1_f_L1_IN_kolor_dane=ograniczenia($rups1_f_L1_IN,$limity['RUPS1']['f-in']['min-f-in'],$limity['RUPS1']['f-in']['max-f-in'],$limity['RUPS1']['f-in']['kolor-awaria'],$limity['RUPS1']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups1_f_L2_IN_kolor_dane=ograniczenia($rups1_f_L2_IN,$limity['RUPS1']['f-in']['min-f-in'],$limity['RUPS1']['f-in']['max-f-in'],$limity['RUPS1']['f-in']['kolor-awaria'],$limity['RUPS1']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups1_f_L3_IN_kolor_dane=ograniczenia($rups1_f_L3_IN,$limity['RUPS1']['f-in']['min-f-in'],$limity['RUPS1']['f-in']['max-f-in'],$limity['RUPS1']['f-in']['kolor-awaria'],$limity['RUPS1']['f-in']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups1_f_L1_IN_kolor_dane==$limity['RUPS1']['f-in']['kolor-normal'] && $rups1_f_L2_IN_kolor_dane==$limity['RUPS1']['f-in']['kolor-normal']	&& $rups1_f_L3_IN_kolor_dane==$limity['RUPS1']['f-in']['kolor-normal']   )
		{
			$rups1_f_IN_kolor_dane=$limity['RUPS1']['f-in']['kolor-normal'];
		}
		else
		{
			$rups1_f_IN_kolor_dane=$limity['RUPS1']['f-in']['kolor-awaria'];
		}

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups1_f_OUT_kolor_dane=ograniczenia($rups1_f_OUT,$limity['RUPS1']['f-out']['min-f-out'],$limity['RUPS1']['f-out']['max-f-out'],$limity['RUPS1']['f-out']['kolor-awaria'],$limity['RUPS1']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups1_bateria_charge_kolor_dane=ograniczenia($rups1_charge_bateria,$limity['RUPS1']['bateria-charge']['min-charge'],$limity['RUPS1']['bateria-charge']['max-charge'],$limity['RUPS1']['bateria-charge']['kolor-awaria'],$limity['RUPS1']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups1_U_bateria_kolor_dane=ograniczenia($rups1_U_bateria,$limity['RUPS1']['U-bateria']['min-U-bateria'],$limity['RUPS1']['U-bateria']['max-U-bateria'],$limity['RUPS1']['U-bateria']['kolor-awaria'],$limity['RUPS1']['U-bateria']['kolor-normal']);

//------------ kolor obramowania RUPS1------------------
	if($rups1_IN==1 && $rups1_BYPASS==0 && $rups1_M_BYPASS==0 && $rups1_OUT==1 
		&& $rups1_P_IN_kolor_dane==$limity['RUPS1']['P-IN']['kolor-normal'] 		
		&& $rups1_I_IN_kolor_dane==$limity['RUPS1']['I-IN']['kolor-normal']
		&& $rups1_U_L1_IN_kolor_dane==$limity['RUPS1']['U-IN']['kolor-normal'] 
		&& $rups1_U_L2_IN_kolor_dane==$limity['RUPS1']['U-IN']['kolor-normal'] 
		&& $rups1_U_L3_IN_kolor_dane==$limity['RUPS1']['U-IN']['kolor-normal'] 
		&& $rups1_U_L1_OUT_kolor_dane==$limity['RUPS1']['U-OUT']['kolor-normal'] 
		&& $rups1_U_L2_OUT_kolor_dane==$limity['RUPS1']['U-OUT']['kolor-normal'] 
		&& $rups1_U_L3_OUT_kolor_dane==$limity['RUPS1']['U-OUT']['kolor-normal'] 
		&& $rups1_f_IN_kolor_dane==$limity['RUPS1']['f-in']['kolor-normal'] 
		&& $rups1_f_OUT_kolor_dane==$limity['RUPS1']['f-out']['kolor-normal'] 
		&& $rups1_bateria_charge_kolor_dane==$limity['RUPS1']['bateria-charge']['kolor-normal'] 
		&& $rups1_U_bateria_kolor_dane==$limity['RUPS1']['U-bateria']['kolor-normal'] )
		{			
			$rups1_kolor_obramowania=$limity['RUPS']['kolor_RUPS_normal'];
		}
	else
		{
			$rups1_kolor_obramowania=$limity['RUPS']['kolor_RUPS_anomalia'];
		}
		
		
//=================================RUPS2=====================================================	
// kolor danej dla - przekroczenia wartości mocy pozornej - IN
$rups2_P_IN_kolor_dane=ograniczenia($rups2_P_IN,$limity['RUPS2']['P-IN']['min-P-IN'],$limity['RUPS2']['P-IN']['max-P-IN'],$limity['RUPS2']['P-IN']['kolor-awaria'],$limity['RUPS2']['P-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups2_I_L1_IN_kolor_dane=ograniczenia($rups2_I_L1_IN,$limity['RUPS2']['I-IN']['min-I-IN'],$limity['RUPS2']['I-IN']['max-I-IN'],$limity['RUPS2']['I-IN']['kolor-awaria'],$limity['RUPS2']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups2_I_L2_IN_kolor_dane=ograniczenia($rups2_I_L2_IN,$limity['RUPS2']['I-IN']['min-I-IN'],$limity['RUPS2']['I-IN']['max-I-IN'],$limity['RUPS2']['I-IN']['kolor-awaria'],$limity['RUPS2']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups2_I_L3_IN_kolor_dane=ograniczenia($rups2_I_L3_IN,$limity['RUPS2']['I-IN']['min-I-IN'],$limity['RUPS2']['I-IN']['max-I-IN'],$limity['RUPS2']['I-IN']['kolor-awaria'],$limity['RUPS2']['I-IN']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups2_I_L1_IN_kolor_dane==$limity['RUPS2']['I-IN']['kolor-normal'] && $rups2_I_L2_IN_kolor_dane==$limity['RUPS2']['I-IN']['kolor-normal']	&& $rups2_I_L3_IN_kolor_dane==$limity['RUPS2']['I-IN']['kolor-normal']   )
		{
			$rups2_I_IN_kolor_dane=$limity['RUPS2']['I-IN']['kolor-normal'];
		}
		else
		{
			$rups2_I_IN_kolor_dane=$limity['RUPS2']['I-IN']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups2_I_L1_OUT_kolor_dane=ograniczenia($rups2_I_L1_OUT,$limity['RUPS2']['I-OUT']['min-I-OUT'],$limity['RUPS2']['I-OUT']['max-I-OUT'],$limity['RUPS2']['I-OUT']['kolor-awaria'],$limity['RUPS2']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups2_I_L2_OUT_kolor_dane=ograniczenia($rups2_I_L2_OUT,$limity['RUPS2']['I-OUT']['min-I-OUT'],$limity['RUPS2']['I-OUT']['max-I-OUT'],$limity['RUPS2']['I-OUT']['kolor-awaria'],$limity['RUPS2']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups2_I_L3_OUT_kolor_dane=ograniczenia($rups2_I_L3_OUT,$limity['RUPS2']['I-OUT']['min-I-OUT'],$limity['RUPS2']['I-OUT']['max-I-OUT'],$limity['RUPS2']['I-OUT']['kolor-awaria'],$limity['RUPS2']['I-OUT']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups2_I_L1_OUT_kolor_dane==$limity['RUPS2']['I-OUT']['kolor-normal'] && $rups2_I_L2_OUT_kolor_dane==$limity['RUPS2']['I-OUT']['kolor-normal']	&& $rups2_I_L3_OUT_kolor_dane==$limity['RUPS2']['I-OUT']['kolor-normal']   )
		{
			$rups2_I_OUT_kolor_dane=$limity['RUPS2']['I-OUT']['kolor-normal'];
		}
		else
		{
			$rups2_I_OUT_kolor_dane=$limity['RUPS2']['I-OUT']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups2_U_L1_IN_kolor_dane=ograniczenia($rups2_U_L1_IN,$limity['RUPS2']['U-IN']['min-U-IN'],$limity['RUPS2']['U-IN']['max-U-IN'],$limity['RUPS2']['U-IN']['kolor-awaria'],$limity['RUPS2']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups2_U_L2_IN_kolor_dane=ograniczenia($rups2_U_L2_IN,$limity['RUPS2']['U-IN']['min-U-IN'],$limity['RUPS2']['U-IN']['max-U-IN'],$limity['RUPS2']['U-IN']['kolor-awaria'],$limity['RUPS2']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups2_U_L3_IN_kolor_dane=ograniczenia($rups2_U_L3_IN,$limity['RUPS2']['U-IN']['min-U-IN'],$limity['RUPS2']['U-IN']['max-U-IN'],$limity['RUPS2']['U-IN']['kolor-awaria'],$limity['RUPS2']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups2_U_L1_OUT_kolor_dane=ograniczenia($rups2_U_L1_OUT,$limity['RUPS2']['U-OUT']['min-U-OUT'],$limity['RUPS2']['U-OUT']['max-U-OUT'],$limity['RUPS2']['U-OUT']['kolor-awaria'],$limity['RUPS2']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups2_U_L2_OUT_kolor_dane=ograniczenia($rups2_U_L2_OUT,$limity['RUPS2']['U-OUT']['min-U-OUT'],$limity['RUPS2']['U-OUT']['max-U-OUT'],$limity['RUPS2']['U-OUT']['kolor-awaria'],$limity['RUPS2']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups2_U_L3_OUT_kolor_dane=ograniczenia($rups2_U_L3_OUT,$limity['RUPS2']['U-OUT']['min-U-OUT'],$limity['RUPS2']['U-OUT']['max-U-OUT'],$limity['RUPS2']['U-OUT']['kolor-awaria'],$limity['RUPS2']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups2_f_L1_IN_kolor_dane=ograniczenia($rups2_f_L1_IN,$limity['RUPS2']['f-in']['min-f-in'],$limity['RUPS2']['f-in']['max-f-in'],$limity['RUPS2']['f-in']['kolor-awaria'],$limity['RUPS2']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups2_f_L2_IN_kolor_dane=ograniczenia($rups2_f_L2_IN,$limity['RUPS2']['f-in']['min-f-in'],$limity['RUPS2']['f-in']['max-f-in'],$limity['RUPS2']['f-in']['kolor-awaria'],$limity['RUPS2']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups2_f_L3_IN_kolor_dane=ograniczenia($rups2_f_L3_IN,$limity['RUPS2']['f-in']['min-f-in'],$limity['RUPS2']['f-in']['max-f-in'],$limity['RUPS2']['f-in']['kolor-awaria'],$limity['RUPS2']['f-in']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups2_f_L1_IN_kolor_dane==$limity['RUPS2']['f-in']['kolor-normal'] && $rups2_f_L2_IN_kolor_dane==$limity['RUPS2']['f-in']['kolor-normal']	&& $rups2_f_L3_IN_kolor_dane==$limity['RUPS2']['f-in']['kolor-normal']   )
		{
			$rups2_f_IN_kolor_dane=$limity['RUPS2']['f-in']['kolor-normal'];
		}
		else
		{
			$rups2_f_IN_kolor_dane=$limity['RUPS2']['f-in']['kolor-awaria'];
		}

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups2_f_OUT_kolor_dane=ograniczenia($rups2_f_OUT,$limity['RUPS2']['f-out']['min-f-out'],$limity['RUPS2']['f-out']['max-f-out'],$limity['RUPS2']['f-out']['kolor-awaria'],$limity['RUPS2']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups2_bateria_charge_kolor_dane=ograniczenia($rups2_charge_bateria,$limity['RUPS2']['bateria-charge']['min-charge'],$limity['RUPS2']['bateria-charge']['max-charge'],$limity['RUPS2']['bateria-charge']['kolor-awaria'],$limity['RUPS2']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups2_U_bateria_kolor_dane=ograniczenia($rups2_U_bateria,$limity['RUPS2']['U-bateria']['min-U-bateria'],$limity['RUPS2']['U-bateria']['max-U-bateria'],$limity['RUPS2']['U-bateria']['kolor-awaria'],$limity['RUPS2']['U-bateria']['kolor-normal']);

		//------------ kolor obramowania RUPS2------------------
	if($rups2_IN==1 && $rups2_BYPASS==0 && $rups2_M_BYPASS==0 && $rups2_OUT==1
		&& $rups2_P_IN_kolor_dane==$limity['RUPS2']['P-IN']['kolor-normal'] 
		&& $rups2_I_IN_kolor_dane==$limity['RUPS2']['I-IN']['kolor-normal']
		&& $rups2_U_L1_IN_kolor_dane==$limity['RUPS2']['U-IN']['kolor-normal'] 
		&& $rups2_U_L2_IN_kolor_dane==$limity['RUPS2']['U-IN']['kolor-normal'] 
		&& $rups2_U_L3_IN_kolor_dane==$limity['RUPS2']['U-IN']['kolor-normal'] 
		&& $rups2_U_L1_OUT_kolor_dane==$limity['RUPS2']['U-OUT']['kolor-normal'] 
		&& $rups2_U_L2_OUT_kolor_dane==$limity['RUPS2']['U-OUT']['kolor-normal'] 
		&& $rups2_U_L3_OUT_kolor_dane==$limity['RUPS2']['U-OUT']['kolor-normal'] 
		&& $rups2_f_IN_kolor_dane==$limity['RUPS2']['f-in']['kolor-normal'] 
		&& $rups2_f_OUT_kolor_dane==$limity['RUPS2']['f-out']['kolor-normal'] 
		&& $rups2_bateria_charge_kolor_dane==$limity['RUPS2']['bateria-charge']['kolor-normal'] 
		&& $rups2_U_bateria_kolor_dane==$limity['RUPS2']['U-bateria']['kolor-normal'])
		{			
			$rups2_kolor_obramowania=$limity['RUPS']['kolor_RUPS_normal'];
		}
	else
		{
			$rups2_kolor_obramowania=$limity['RUPS']['kolor_RUPS_anomalia'];
		}

//=================================RUPS3=====================================================
//=================================RUPS3-1=======================================
// kolor danej dla - przekroczenia wartości mocy pozornej - IN
$rups3_1_P_IN_kolor_dane=ograniczenia($rups3_1_P_IN,$limity['RUPS3']['P-IN']['min-P-IN'],$limity['RUPS3']['P-IN']['max-P-IN'],$limity['RUPS3']['P-IN']['kolor-awaria'],$limity['RUPS3']['P-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups3_1_I_L1_IN_kolor_dane=ograniczenia($rups3_1_I_L1_IN,$limity['RUPS3']['I-IN']['min-I-IN'],$limity['RUPS3']['I-IN']['max-I-IN'],$limity['RUPS3']['I-IN']['kolor-awaria'],$limity['RUPS3']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups3_1_I_L2_IN_kolor_dane=ograniczenia($rups3_1_I_L2_IN,$limity['RUPS3']['I-IN']['min-I-IN'],$limity['RUPS3']['I-IN']['max-I-IN'],$limity['RUPS3']['I-IN']['kolor-awaria'],$limity['RUPS3']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups3_1_I_L3_IN_kolor_dane=ograniczenia($rups3_1_I_L3_IN,$limity['RUPS3']['I-IN']['min-I-IN'],$limity['RUPS3']['I-IN']['max-I-IN'],$limity['RUPS3']['I-IN']['kolor-awaria'],$limity['RUPS3']['I-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups3_1_I_L1_OUT_kolor_dane=ograniczenia($rups3_1_I_L1_OUT,$limity['RUPS3']['I-OUT']['min-I-OUT'],$limity['RUPS3']['I-OUT']['max-I-OUT'],$limity['RUPS3']['I-OUT']['kolor-awaria'],$limity['RUPS3']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups3_1_I_L2_OUT_kolor_dane=ograniczenia($rups3_1_I_L2_OUT,$limity['RUPS3']['I-OUT']['min-I-OUT'],$limity['RUPS3']['I-OUT']['max-I-OUT'],$limity['RUPS3']['I-OUT']['kolor-awaria'],$limity['RUPS3']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups3_1_I_L3_OUT_kolor_dane=ograniczenia($rups3_1_I_L3_OUT,$limity['RUPS3']['I-OUT']['min-I-OUT'],$limity['RUPS3']['I-OUT']['max-I-OUT'],$limity['RUPS3']['I-OUT']['kolor-awaria'],$limity['RUPS3']['I-OUT']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups3_1_U_L1_IN_kolor_dane=ograniczenia($rups3_1_U_L1_IN,$limity['RUPS3']['U-IN']['min-U-IN'],$limity['RUPS3']['U-IN']['max-U-IN'],$limity['RUPS3']['U-IN']['kolor-awaria'],$limity['RUPS3']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups3_1_U_L2_IN_kolor_dane=ograniczenia($rups3_1_U_L2_IN,$limity['RUPS3']['U-IN']['min-U-IN'],$limity['RUPS3']['U-IN']['max-U-IN'],$limity['RUPS3']['U-IN']['kolor-awaria'],$limity['RUPS3']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups3_1_U_L3_IN_kolor_dane=ograniczenia($rups3_1_U_L3_IN,$limity['RUPS3']['U-IN']['min-U-IN'],$limity['RUPS3']['U-IN']['max-U-IN'],$limity['RUPS3']['U-IN']['kolor-awaria'],$limity['RUPS3']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups3_1_U_L1_OUT_kolor_dane=ograniczenia($rups3_1_U_L1_OUT,$limity['RUPS3']['U-OUT']['min-U-OUT'],$limity['RUPS3']['U-OUT']['max-U-OUT'],$limity['RUPS3']['U-OUT']['kolor-awaria'],$limity['RUPS3']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups3_1_U_L2_OUT_kolor_dane=ograniczenia($rups3_1_U_L2_OUT,$limity['RUPS3']['U-OUT']['min-U-OUT'],$limity['RUPS3']['U-OUT']['max-U-OUT'],$limity['RUPS3']['U-OUT']['kolor-awaria'],$limity['RUPS3']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups3_1_U_L3_OUT_kolor_dane=ograniczenia($rups3_1_U_L3_OUT,$limity['RUPS3']['U-OUT']['min-U-OUT'],$limity['RUPS3']['U-OUT']['max-U-OUT'],$limity['RUPS3']['U-OUT']['kolor-awaria'],$limity['RUPS3']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups3_1_f_L1_IN_kolor_dane=ograniczenia($rups3_1_f_L1_IN,$limity['RUPS3']['f-in']['min-f-in'],$limity['RUPS3']['f-in']['max-f-in'],$limity['RUPS3']['f-in']['kolor-awaria'],$limity['RUPS3']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups3_1_f_L2_IN_kolor_dane=ograniczenia($rups3_1_f_L2_IN,$limity['RUPS3']['f-in']['min-f-in'],$limity['RUPS3']['f-in']['max-f-in'],$limity['RUPS3']['f-in']['kolor-awaria'],$limity['RUPS3']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups3_1_f_L3_IN_kolor_dane=ograniczenia($rups3_1_f_L3_IN,$limity['RUPS3']['f-in']['min-f-in'],$limity['RUPS3']['f-in']['max-f-in'],$limity['RUPS3']['f-in']['kolor-awaria'],$limity['RUPS3']['f-in']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups3_1_f_OUT_kolor_dane=ograniczenia($rups3_1_f_OUT,$limity['RUPS3']['f-out']['min-f-out'],$limity['RUPS3']['f-out']['max-f-out'],$limity['RUPS3']['f-out']['kolor-awaria'],$limity['RUPS3']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups3_1_bateria_charge_kolor_dane=ograniczenia($rups3_1_charge_bateria,$limity['RUPS3']['bateria-charge']['min-charge'],$limity['RUPS3']['bateria-charge']['max-charge'],$limity['RUPS3']['bateria-charge']['kolor-awaria'],$limity['RUPS3']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups3_1_U_bateria_kolor_dane=ograniczenia($rups3_1_U_bateria,$limity['RUPS3']['U-bateria']['min-U-bateria'],$limity['RUPS3']['U-bateria']['max-U-bateria'],$limity['RUPS3']['U-bateria']['kolor-awaria'],$limity['RUPS3']['U-bateria']['kolor-normal']);


//=================================RUPS3-2=======================================
// kolor danej dla - przekroczenia wartości mocy pozornej - IN
$rups3_2_P_IN_kolor_dane=ograniczenia($rups3_2_P_IN,$limity['RUPS3']['P-IN']['min-P-IN'],$limity['RUPS3']['P-IN']['max-P-IN'],$limity['RUPS3']['P-IN']['kolor-awaria'],$limity['RUPS3']['P-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups3_2_I_L1_IN_kolor_dane=ograniczenia($rups3_2_I_L1_IN,$limity['RUPS3']['I-IN']['min-I-IN'],$limity['RUPS3']['I-IN']['max-I-IN'],$limity['RUPS3']['I-IN']['kolor-awaria'],$limity['RUPS3']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups3_2_I_L2_IN_kolor_dane=ograniczenia($rups3_2_I_L2_IN,$limity['RUPS3']['I-IN']['min-I-IN'],$limity['RUPS3']['I-IN']['max-I-IN'],$limity['RUPS3']['I-IN']['kolor-awaria'],$limity['RUPS3']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups3_2_I_L3_IN_kolor_dane=ograniczenia($rups3_2_I_L3_IN,$limity['RUPS3']['I-IN']['min-I-IN'],$limity['RUPS3']['I-IN']['max-I-IN'],$limity['RUPS3']['I-IN']['kolor-awaria'],$limity['RUPS3']['I-IN']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups3_2_I_L1_OUT_kolor_dane=ograniczenia($rups3_2_I_L1_OUT,$limity['RUPS3']['I-OUT']['min-I-OUT'],$limity['RUPS3']['I-OUT']['max-I-OUT'],$limity['RUPS3']['I-OUT']['kolor-awaria'],$limity['RUPS3']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups3_2_I_L2_OUT_kolor_dane=ograniczenia($rups3_2_I_L2_OUT,$limity['RUPS3']['I-OUT']['min-I-OUT'],$limity['RUPS3']['I-OUT']['max-I-OUT'],$limity['RUPS3']['I-OUT']['kolor-awaria'],$limity['RUPS3']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups3_2_I_L3_OUT_kolor_dane=ograniczenia($rups3_2_I_L3_OUT,$limity['RUPS3']['I-OUT']['min-I-OUT'],$limity['RUPS3']['I-OUT']['max-I-OUT'],$limity['RUPS3']['I-OUT']['kolor-awaria'],$limity['RUPS3']['I-OUT']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups3_2_U_L1_IN_kolor_dane=ograniczenia($rups3_2_U_L1_IN,$limity['RUPS3']['U-IN']['min-U-IN'],$limity['RUPS3']['U-IN']['max-U-IN'],$limity['RUPS3']['U-IN']['kolor-awaria'],$limity['RUPS3']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups3_2_U_L2_IN_kolor_dane=ograniczenia($rups3_2_U_L2_IN,$limity['RUPS3']['U-IN']['min-U-IN'],$limity['RUPS3']['U-IN']['max-U-IN'],$limity['RUPS3']['U-IN']['kolor-awaria'],$limity['RUPS3']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups3_2_U_L3_IN_kolor_dane=ograniczenia($rups3_2_U_L3_IN,$limity['RUPS3']['U-IN']['min-U-IN'],$limity['RUPS3']['U-IN']['max-U-IN'],$limity['RUPS3']['U-IN']['kolor-awaria'],$limity['RUPS3']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups3_2_U_L1_OUT_kolor_dane=ograniczenia($rups3_2_U_L1_OUT,$limity['RUPS3']['U-OUT']['min-U-OUT'],$limity['RUPS3']['U-OUT']['max-U-OUT'],$limity['RUPS3']['U-OUT']['kolor-awaria'],$limity['RUPS3']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups3_2_U_L2_OUT_kolor_dane=ograniczenia($rups3_2_U_L2_OUT,$limity['RUPS3']['U-OUT']['min-U-OUT'],$limity['RUPS3']['U-OUT']['max-U-OUT'],$limity['RUPS3']['U-OUT']['kolor-awaria'],$limity['RUPS3']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups3_2_U_L3_OUT_kolor_dane=ograniczenia($rups3_2_U_L3_OUT,$limity['RUPS3']['U-OUT']['min-U-OUT'],$limity['RUPS3']['U-OUT']['max-U-OUT'],$limity['RUPS3']['U-OUT']['kolor-awaria'],$limity['RUPS3']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups3_2_f_L1_IN_kolor_dane=ograniczenia($rups3_2_f_L1_IN,$limity['RUPS3']['f-in']['min-f-in'],$limity['RUPS3']['f-in']['max-f-in'],$limity['RUPS3']['f-in']['kolor-awaria'],$limity['RUPS3']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups3_2_f_L2_IN_kolor_dane=ograniczenia($rups3_2_f_L2_IN,$limity['RUPS3']['f-in']['min-f-in'],$limity['RUPS3']['f-in']['max-f-in'],$limity['RUPS3']['f-in']['kolor-awaria'],$limity['RUPS3']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups3_2_f_L3_IN_kolor_dane=ograniczenia($rups3_2_f_L3_IN,$limity['RUPS3']['f-in']['min-f-in'],$limity['RUPS3']['f-in']['max-f-in'],$limity['RUPS3']['f-in']['kolor-awaria'],$limity['RUPS3']['f-in']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups3_2_f_OUT_kolor_dane=ograniczenia($rups3_2_f_OUT,$limity['RUPS3']['f-out']['min-f-out'],$limity['RUPS3']['f-out']['max-f-out'],$limity['RUPS3']['f-out']['kolor-awaria'],$limity['RUPS3']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups3_2_bateria_charge_kolor_dane=ograniczenia($rups3_2_charge_bateria,$limity['RUPS3']['bateria-charge']['min-charge'],$limity['RUPS3']['bateria-charge']['max-charge'],$limity['RUPS3']['bateria-charge']['kolor-awaria'],$limity['RUPS3']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups3_2_U_bateria_kolor_dane=ograniczenia($rups3_2_U_bateria,$limity['RUPS3']['U-bateria']['min-U-bateria'],$limity['RUPS3']['U-bateria']['max-U-bateria'],$limity['RUPS3']['U-bateria']['kolor-awaria'],$limity['RUPS3']['U-bateria']['kolor-normal']);

//--------------------- własciwosci parametrów dla calego RUPS3-----------------------------------------------------------
// moc czynna suma z 2 urzadzen - ustalenie koloru dla wyswetlanej danej
	if($rups3_1_P_IN_kolor_dane==$limity['RUPS3']['P-IN']['kolor-normal'] &&
		$rups3_2_P_IN_kolor_dane==$limity['RUPS3']['P-IN']['kolor-normal'] )
		{
			$rups3_P_IN_kolor_dane=$limity['RUPS3']['P-IN']['kolor-normal'];
		}
		else
		{
			$rups3_P_IN_kolor_dane=$limity['RUPS3']['P-IN']['kolor-awaria'];
		}
// ustalenie koloru napisu 'I-L1' (-IN) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_I_L1_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] && 
		$rups3_2_I_L1_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] )
		{
			$rups3_I_L1_IN_kolor_dane=$limity['RUPS3']['I-IN']['kolor-normal'];						
		}
		else
		{
			$rups3_I_L1_IN_kolor_dane=$limity['RUPS3']['I-IN']['kolor-awaria'];
			
		}

// ustalenie koloru napisu 'I-L2' (-IN) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_I_L2_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] && 
		$rups3_2_I_L2_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] )
		{
			$rups3_I_L2_IN_kolor_dane=$limity['RUPS3']['I-IN']['kolor-normal'];			
		}
		else
		{
			$rups3_I_L2_IN_kolor_dane=$limity['RUPS3']['I-IN']['kolor-awaria'];
		}
		
// ustalenie koloru napisu 'I-L3' (-IN) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_I_L3_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] && 
		$rups3_2_I_L3_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] )
		{
			$rups3_I_L3_IN_kolor_dane=$limity['RUPS3']['I-IN']['kolor-normal'];			
		}
		else
		{
			$rups3_I_L3_IN_kolor_dane=$limity['RUPS3']['I-IN']['kolor-awaria'];
		}
		
// ustalenie koloru napisu 'U-L1' (-IN) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_U_L1_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] && 
		$rups3_2_U_L1_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] )
		{
			$rups3_U_L1_IN_kolor_dane=$limity['RUPS3']['U-IN']['kolor-normal'];			
		}
		else
		{
			$rups3_U_L1_IN_kolor_dane=$limity['RUPS3']['U-IN']['kolor-awaria'];
		}

// ustalenie koloru napisu 'U-L2' (-IN) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_U_L2_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] && 
		$rups3_2_U_L2_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] )
		{
			$rups3_U_L2_IN_kolor_dane=$limity['RUPS3']['U-IN']['kolor-normal'];			
		}
		else
		{
			$rups3_U_L2_IN_kolor_dane=$limity['RUPS3']['U-IN']['kolor-awaria'];
		}
// ustalenie koloru napisu 'U-L3' (-IN) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_U_L3_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] && 
		$rups3_2_U_L3_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] )
		{
			$rups3_U_L3_IN_kolor_dane=$limity['RUPS3']['U-IN']['kolor-normal'];			
		}
		else
		{
			$rups3_U_L3_IN_kolor_dane=$limity['RUPS3']['U-IN']['kolor-awaria'];
		}	

// ustalenie koloru napisu 'I-L1' (-OUT) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_I_L1_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] && 
		$rups3_2_I_L1_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] )
		{
			$rups3_I_L1_OUT_kolor_dane=$limity['RUPS3']['I-OUT']['kolor-normal'];						
		}
		else
		{
			$rups3_I_L1_OUT_kolor_dane=$limity['RUPS3']['I-OUT']['kolor-awaria'];
			
		}
// ustalenie koloru napisu 'I-L2' (-OUT) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_I_L2_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] && 
		$rups3_2_I_L2_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] )
		{
			$rups3_I_L2_OUT_kolor_dane=$limity['RUPS3']['I-OUT']['kolor-normal'];			
		}
		else
		{
			$rups3_I_L2_OUT_kolor_dane=$limity['RUPS3']['I-OUT']['kolor-awaria'];
		}
// ustalenie koloru napisu 'I-L3' (-OUT) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_I_L3_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] && 
		$rups3_2_I_L3_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] )
		{
			$rups3_I_L3_OUT_kolor_dane=$limity['RUPS3']['I-OUT']['kolor-normal'];			
		}
		else
		{
			$rups3_I_L3_OUT_kolor_dane=$limity['RUPS3']['I-OUT']['kolor-awaria'];
		}	

// ustalenie koloru napisu 'U-L1' (-OUT) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_U_L1_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] && 
		$rups3_2_U_L1_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] )
		{
			$rups3_U_L1_OUT_kolor_dane=$limity['RUPS3']['U-OUT']['kolor-normal'];			
		}
		else
		{
			$rups3_U_L1_OUT_kolor_dane=$limity['RUPS3']['U-OUT']['kolor-awaria'];
		}

// ustalenie koloru napisu 'U-L2' (-OUT) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_U_L2_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] && 
		$rups3_2_U_L2_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] )
		{
			$rups3_U_L2_OUT_kolor_dane=$limity['RUPS3']['U-OUT']['kolor-normal'];			
		}
		else
		{
			$rups3_U_L2_OUT_kolor_dane=$limity['RUPS3']['U-OUT']['kolor-awaria'];
		}
// ustalenie koloru napisu 'U-L3' (-OUT) w zaleznosci od wartosci z UPS3_1 i UPS3_2
	if($rups3_1_U_L3_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] && 
		$rups3_2_U_L3_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] )
		{
			$rups3_U_L3_OUT_kolor_dane=$limity['RUPS3']['U-OUT']['kolor-normal'];			
		}
		else
		{
			$rups3_U_L3_OUT_kolor_dane=$limity['RUPS3']['U-OUT']['kolor-awaria'];
		}		
		
//------------ kolor obramowania RUPS3------------------
	if($rups3_1_IN==1 && $rups3_1_BYPASS==0 && $rups3_1_M_BYPASS==0 && $rups3_1_OUT==1 &&
	    $rups3_2_IN==1 && $rups3_2_BYPASS==0 && $rups3_2_M_BYPASS==0 && $rups3_2_OUT==1 &&
		$rups3_1_f_L1_IN_kolor_dane==$limity['RUPS3']['f-in']['kolor-normal'] &&
		$rups3_1_f_L2_IN_kolor_dane==$limity['RUPS3']['f-in']['kolor-normal'] &&
		$rups3_1_f_L3_IN_kolor_dane==$limity['RUPS3']['f-in']['kolor-normal'] &&
		$rups3_2_f_L1_IN_kolor_dane==$limity['RUPS3']['f-in']['kolor-normal'] &&
		$rups3_2_f_L2_IN_kolor_dane==$limity['RUPS3']['f-in']['kolor-normal'] &&
		$rups3_2_f_L3_IN_kolor_dane==$limity['RUPS3']['f-in']['kolor-normal'] &&		
		$rups3_1_f_OUT_kolor_dane==$limity['RUPS3']['f-out']['kolor-normal'] &&
		$rups3_2_f_OUT_kolor_dane==$limity['RUPS3']['f-out']['kolor-normal'] &&
		$rups3_1_bateria_charge_kolor_dane==$limity['RUPS3']['bateria-charge']['kolor-normal'] &&
		$rups3_2_bateria_charge_kolor_dane==$limity['RUPS3']['bateria-charge']['kolor-normal'] &&
		$rups3_1_U_bateria_kolor_dane==$limity['RUPS3']['U-bateria']['kolor-normal'] &&
		$rups3_2_U_bateria_kolor_dane==$limity['RUPS3']['U-bateria']['kolor-normal'] &&				
		$rups3_P_IN_kolor_dane==$limity['RUPS3']['P-IN']['kolor-normal'] &&
		$rups3_I_L1_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] &&
		$rups3_I_L2_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] &&
		$rups3_I_L3_IN_kolor_dane==$limity['RUPS3']['I-IN']['kolor-normal'] &&
		$rups3_U_L1_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] &&
		$rups3_U_L2_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] &&
		$rups3_U_L3_IN_kolor_dane==$limity['RUPS3']['U-IN']['kolor-normal'] &&
		$rups3_I_L1_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] &&
		$rups3_I_L2_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] &&
		$rups3_I_L3_OUT_kolor_dane==$limity['RUPS3']['I-OUT']['kolor-normal'] &&
		$rups3_U_L1_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] &&
		$rups3_U_L2_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal'] &&
		$rups3_U_L3_OUT_kolor_dane==$limity['RUPS3']['U-OUT']['kolor-normal']
		)
		{			
			$rups3_kolor_obramowania=$limity['RUPS']['kolor_RUPS_normal'];
		}
	else
		{
			$rups3_kolor_obramowania=$limity['RUPS']['kolor_RUPS_anomalia'];
		}
		
//=================================RUPS4=====================================================
// kolor danej dla - przekroczenia wartości mocy pozornej - IN
$rups4_P_IN_kolor_dane=ograniczenia($rups4_P_IN,$limity['RUPS4']['P-IN']['min-P-IN'],$limity['RUPS4']['P-IN']['max-P-IN'],$limity['RUPS4']['P-IN']['kolor-awaria'],$limity['RUPS4']['P-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups4_I_L1_IN_kolor_dane=ograniczenia($rups4_I_L1_IN,$limity['RUPS4']['I-IN']['min-I-IN'],$limity['RUPS4']['I-IN']['max-I-IN'],$limity['RUPS4']['I-IN']['kolor-awaria'],$limity['RUPS4']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups4_I_L2_IN_kolor_dane=ograniczenia($rups4_I_L2_IN,$limity['RUPS4']['I-IN']['min-I-IN'],$limity['RUPS4']['I-IN']['max-I-IN'],$limity['RUPS4']['I-IN']['kolor-awaria'],$limity['RUPS4']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups4_I_L3_IN_kolor_dane=ograniczenia($rups4_I_L3_IN,$limity['RUPS4']['I-IN']['min-I-IN'],$limity['RUPS4']['I-IN']['max-I-IN'],$limity['RUPS4']['I-IN']['kolor-awaria'],$limity['RUPS4']['I-IN']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups4_I_L1_IN_kolor_dane==$limity['RUPS4']['I-IN']['kolor-normal'] && $rups4_I_L2_IN_kolor_dane==$limity['RUPS4']['I-IN']['kolor-normal']	&& $rups4_I_L3_IN_kolor_dane==$limity['RUPS4']['I-IN']['kolor-normal']   )
		{
			$rups4_I_IN_kolor_dane=$limity['RUPS4']['I-IN']['kolor-normal'];
		}
		else
		{
			$rups4_I_IN_kolor_dane=$limity['RUPS4']['I-IN']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups4_I_L1_OUT_kolor_dane=ograniczenia($rups4_I_L1_OUT,$limity['RUPS4']['I-OUT']['min-I-OUT'],$limity['RUPS4']['I-OUT']['max-I-OUT'],$limity['RUPS4']['I-OUT']['kolor-awaria'],$limity['RUPS4']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups4_I_L2_OUT_kolor_dane=ograniczenia($rups4_I_L2_OUT,$limity['RUPS4']['I-OUT']['min-I-OUT'],$limity['RUPS4']['I-OUT']['max-I-OUT'],$limity['RUPS4']['I-OUT']['kolor-awaria'],$limity['RUPS4']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups4_I_L3_OUT_kolor_dane=ograniczenia($rups4_I_L3_OUT,$limity['RUPS4']['I-OUT']['min-I-OUT'],$limity['RUPS4']['I-OUT']['max-I-OUT'],$limity['RUPS4']['I-OUT']['kolor-awaria'],$limity['RUPS4']['I-OUT']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups4_I_L1_OUT_kolor_dane==$limity['RUPS4']['I-OUT']['kolor-normal'] && $rups4_I_L2_OUT_kolor_dane==$limity['RUPS4']['I-OUT']['kolor-normal']	&& $rups4_I_L3_OUT_kolor_dane==$limity['RUPS4']['I-OUT']['kolor-normal']   )
		{
			$rups4_I_OUT_kolor_dane=$limity['RUPS4']['I-OUT']['kolor-normal'];
		}
		else
		{
			$rups4_I_OUT_kolor_dane=$limity['RUPS4']['I-OUT']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups4_U_L1_IN_kolor_dane=ograniczenia($rups4_U_L1_IN,$limity['RUPS4']['U-IN']['min-U-IN'],$limity['RUPS4']['U-IN']['max-U-IN'],$limity['RUPS4']['U-IN']['kolor-awaria'],$limity['RUPS4']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups4_U_L2_IN_kolor_dane=ograniczenia($rups4_U_L2_IN,$limity['RUPS4']['U-IN']['min-U-IN'],$limity['RUPS4']['U-IN']['max-U-IN'],$limity['RUPS4']['U-IN']['kolor-awaria'],$limity['RUPS4']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups4_U_L3_IN_kolor_dane=ograniczenia($rups4_U_L3_IN,$limity['RUPS4']['U-IN']['min-U-IN'],$limity['RUPS4']['U-IN']['max-U-IN'],$limity['RUPS4']['U-IN']['kolor-awaria'],$limity['RUPS4']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups4_U_L1_OUT_kolor_dane=ograniczenia($rups4_U_L1_OUT,$limity['RUPS4']['U-OUT']['min-U-OUT'],$limity['RUPS4']['U-OUT']['max-U-OUT'],$limity['RUPS4']['U-OUT']['kolor-awaria'],$limity['RUPS4']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups4_U_L2_OUT_kolor_dane=ograniczenia($rups4_U_L2_OUT,$limity['RUPS4']['U-OUT']['min-U-OUT'],$limity['RUPS4']['U-OUT']['max-U-OUT'],$limity['RUPS4']['U-OUT']['kolor-awaria'],$limity['RUPS4']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups4_U_L3_OUT_kolor_dane=ograniczenia($rups4_U_L3_OUT,$limity['RUPS4']['U-OUT']['min-U-OUT'],$limity['RUPS4']['U-OUT']['max-U-OUT'],$limity['RUPS4']['U-OUT']['kolor-awaria'],$limity['RUPS4']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups4_f_L1_IN_kolor_dane=ograniczenia($rups4_f_L1_IN,$limity['RUPS4']['f-in']['min-f-in'],$limity['RUPS4']['f-in']['max-f-in'],$limity['RUPS4']['f-in']['kolor-awaria'],$limity['RUPS4']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups4_f_L2_IN_kolor_dane=ograniczenia($rups4_f_L2_IN,$limity['RUPS4']['f-in']['min-f-in'],$limity['RUPS4']['f-in']['max-f-in'],$limity['RUPS4']['f-in']['kolor-awaria'],$limity['RUPS4']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups4_f_L3_IN_kolor_dane=ograniczenia($rups4_f_L3_IN,$limity['RUPS4']['f-in']['min-f-in'],$limity['RUPS4']['f-in']['max-f-in'],$limity['RUPS4']['f-in']['kolor-awaria'],$limity['RUPS4']['f-in']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups4_f_L1_IN_kolor_dane==$limity['RUPS4']['f-in']['kolor-normal'] && $rups4_f_L2_IN_kolor_dane==$limity['RUPS4']['f-in']['kolor-normal']	&& $rups4_f_L3_IN_kolor_dane==$limity['RUPS4']['f-in']['kolor-normal']   )
		{
			$rups4_f_IN_kolor_dane=$limity['RUPS4']['f-in']['kolor-normal'];
		}
		else
		{
			$rups4_f_IN_kolor_dane=$limity['RUPS4']['f-in']['kolor-awaria'];
		}

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups4_f_OUT_kolor_dane=ograniczenia($rups4_f_OUT,$limity['RUPS4']['f-out']['min-f-out'],$limity['RUPS4']['f-out']['max-f-out'],$limity['RUPS4']['f-out']['kolor-awaria'],$limity['RUPS4']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups4_bateria_charge_kolor_dane=ograniczenia($rups4_charge_bateria,$limity['RUPS4']['bateria-charge']['min-charge'],$limity['RUPS4']['bateria-charge']['max-charge'],$limity['RUPS4']['bateria-charge']['kolor-awaria'],$limity['RUPS4']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups4_U_bateria_kolor_dane=ograniczenia($rups4_U_bateria,$limity['RUPS4']['U-bateria']['min-U-bateria'],$limity['RUPS4']['U-bateria']['max-U-bateria'],$limity['RUPS4']['U-bateria']['kolor-awaria'],$limity['RUPS4']['U-bateria']['kolor-normal']);


//------------ kolor obramowania RUPS4------------------
	if($rups4_IN==1 && $rups4_BYPASS==0 && $rups4_M_BYPASS==0 && $rups4_OUT==1
		&& $rups4_P_IN_kolor_dane==$limity['RUPS4']['S-IN']['kolor-normal'] 	
		&& $rups4_I_IN_kolor_dane==$limity['RUPS4']['I-IN']['kolor-normal']
		&& $rups4_U_L1_IN_kolor_dane==$limity['RUPS4']['U-IN']['kolor-normal'] 
		&& $rups4_U_L2_IN_kolor_dane==$limity['RUPS4']['U-IN']['kolor-normal'] 
		&& $rups4_U_L3_IN_kolor_dane==$limity['RUPS4']['U-IN']['kolor-normal'] 
		&& $rups4_U_L1_OUT_kolor_dane==$limity['RUPS4']['U-OUT']['kolor-normal'] 
		&& $rups4_U_L2_OUT_kolor_dane==$limity['RUPS4']['U-OUT']['kolor-normal'] 
		&& $rups4_U_L3_OUT_kolor_dane==$limity['RUPS4']['U-OUT']['kolor-normal'] 
		&& $rups4_f_IN_kolor_dane==$limity['RUPS4']['f-in']['kolor-normal'] 
		&& $rups4_f_OUT_kolor_dane==$limity['RUPS4']['f-out']['kolor-normal'] 
		&& $rups4_bateria_charge_kolor_dane==$limity['RUPS4']['bateria-charge']['kolor-normal'] 
		&& $rups4_U_bateria_kolor_dane==$limity['RUPS4']['U-bateria']['kolor-normal'])
		{			
			$rups4_kolor_obramowania=$limity['RUPS']['kolor_RUPS_normal'];
		}
	else
		{
			$rups4_kolor_obramowania=$limity['RUPS']['kolor_RUPS_anomalia'];
		}
		
//=================================RUPS8=====================================================
// kolor danej dla - przekroczenia wartości mocy pozornej - IN
$rups8_P_IN_kolor_dane=ograniczenia($rups8_P_IN,$limity['RUPS8']['P-IN']['min-P-IN'],$limity['RUPS8']['P-IN']['max-P-IN'],$limity['RUPS8']['P-IN']['kolor-awaria'],$limity['RUPS8']['P-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups8_I_L1_IN_kolor_dane=ograniczenia($rups8_I_L1_IN,$limity['RUPS8']['I-IN']['min-I-IN'],$limity['RUPS8']['I-IN']['max-I-IN'],$limity['RUPS8']['I-IN']['kolor-awaria'],$limity['RUPS8']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups8_I_L2_IN_kolor_dane=ograniczenia($rups8_I_L2_IN,$limity['RUPS8']['I-IN']['min-I-IN'],$limity['RUPS8']['I-IN']['max-I-IN'],$limity['RUPS8']['I-IN']['kolor-awaria'],$limity['RUPS8']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups8_I_L3_IN_kolor_dane=ograniczenia($rups8_I_L3_IN,$limity['RUPS8']['I-IN']['min-I-IN'],$limity['RUPS8']['I-IN']['max-I-IN'],$limity['RUPS8']['I-IN']['kolor-awaria'],$limity['RUPS8']['I-IN']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups8_I_L1_IN_kolor_dane==$limity['RUPS8']['I-IN']['kolor-normal'] && $rups8_I_L2_IN_kolor_dane==$limity['RUPS8']['I-IN']['kolor-normal']	&& $rups8_I_L3_IN_kolor_dane==$limity['RUPS8']['I-IN']['kolor-normal']   )
		{
			$rups8_I_IN_kolor_dane=$limity['RUPS8']['I-IN']['kolor-normal'];
		}
		else
		{
			$rups8_I_IN_kolor_dane=$limity['RUPS8']['I-IN']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups8_I_L1_OUT_kolor_dane=ograniczenia($rups8_I_L1_OUT,$limity['RUPS8']['I-OUT']['min-I-OUT'],$limity['RUPS8']['I-OUT']['max-I-OUT'],$limity['RUPS8']['I-OUT']['kolor-awaria'],$limity['RUPS8']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups8_I_L2_OUT_kolor_dane=ograniczenia($rups8_I_L2_OUT,$limity['RUPS8']['I-OUT']['min-I-OUT'],$limity['RUPS8']['I-OUT']['max-I-OUT'],$limity['RUPS8']['I-OUT']['kolor-awaria'],$limity['RUPS8']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups8_I_L3_OUT_kolor_dane=ograniczenia($rups8_I_L3_OUT,$limity['RUPS8']['I-OUT']['min-I-OUT'],$limity['RUPS8']['I-OUT']['max-I-OUT'],$limity['RUPS8']['I-OUT']['kolor-awaria'],$limity['RUPS8']['I-OUT']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups8_I_L1_OUT_kolor_dane==$limity['RUPS8']['I-OUT']['kolor-normal'] && $rups8_I_L2_OUT_kolor_dane==$limity['RUPS8']['I-OUT']['kolor-normal']	&& $rups8_I_L3_OUT_kolor_dane==$limity['RUPS8']['I-OUT']['kolor-normal']   )
		{
			$rups8_I_OUT_kolor_dane=$limity['RUPS8']['I-OUT']['kolor-normal'];
		}
		else
		{
			$rups8_I_OUT_kolor_dane=$limity['RUPS8']['I-OUT']['kolor-awaria'];
		}
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups8_U_L1_IN_kolor_dane=ograniczenia($rups8_U_L1_IN,$limity['RUPS8']['U-IN']['min-U-IN'],$limity['RUPS8']['U-IN']['max-U-IN'],$limity['RUPS8']['U-IN']['kolor-awaria'],$limity['RUPS8']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups8_U_L2_IN_kolor_dane=ograniczenia($rups8_U_L2_IN,$limity['RUPS8']['U-IN']['min-U-IN'],$limity['RUPS8']['U-IN']['max-U-IN'],$limity['RUPS8']['U-IN']['kolor-awaria'],$limity['RUPS8']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups8_U_L3_IN_kolor_dane=ograniczenia($rups8_U_L3_IN,$limity['RUPS8']['U-IN']['min-U-IN'],$limity['RUPS8']['U-IN']['max-U-IN'],$limity['RUPS8']['U-IN']['kolor-awaria'],$limity['RUPS8']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups8_U_L1_OUT_kolor_dane=ograniczenia($rups8_U_L1_OUT,$limity['RUPS8']['U-OUT']['min-U-OUT'],$limity['RUPS8']['U-OUT']['max-U-OUT'],$limity['RUPS8']['U-OUT']['kolor-awaria'],$limity['RUPS8']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups8_U_L2_OUT_kolor_dane=ograniczenia($rups8_U_L2_OUT,$limity['RUPS8']['U-OUT']['min-U-OUT'],$limity['RUPS8']['U-OUT']['max-U-OUT'],$limity['RUPS8']['U-OUT']['kolor-awaria'],$limity['RUPS8']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups8_U_L3_OUT_kolor_dane=ograniczenia($rups8_U_L3_OUT,$limity['RUPS8']['U-OUT']['min-U-OUT'],$limity['RUPS8']['U-OUT']['max-U-OUT'],$limity['RUPS8']['U-OUT']['kolor-awaria'],$limity['RUPS8']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups8_f_L1_IN_kolor_dane=ograniczenia($rups8_f_L1_IN,$limity['RUPS8']['f-in']['min-f-in'],$limity['RUPS8']['f-in']['max-f-in'],$limity['RUPS8']['f-in']['kolor-awaria'],$limity['RUPS8']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups8_f_L2_IN_kolor_dane=ograniczenia($rups8_f_L2_IN,$limity['RUPS8']['f-in']['min-f-in'],$limity['RUPS8']['f-in']['max-f-in'],$limity['RUPS8']['f-in']['kolor-awaria'],$limity['RUPS8']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups8_f_L3_IN_kolor_dane=ograniczenia($rups8_f_L3_IN,$limity['RUPS8']['f-in']['min-f-in'],$limity['RUPS8']['f-in']['max-f-in'],$limity['RUPS8']['f-in']['kolor-awaria'],$limity['RUPS8']['f-in']['kolor-normal']);
// jeśli przynajmniej na jednej fazie będzie stan awaryjny to dane te będą na czerwono
		if($rups8_f_L1_IN_kolor_dane==$limity['RUPS8']['f-in']['kolor-normal'] && $rups8_f_L2_IN_kolor_dane==$limity['RUPS8']['f-in']['kolor-normal']	&& $rups8_f_L3_IN_kolor_dane==$limity['RUPS8']['f-in']['kolor-normal']   )
		{
			$rups8_f_IN_kolor_dane=$limity['RUPS8']['f-in']['kolor-normal'];
		}
		else
		{
			$rups8_f_IN_kolor_dane=$limity['RUPS8']['f-in']['kolor-awaria'];
		}

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups8_f_OUT_kolor_dane=ograniczenia($rups8_f_OUT,$limity['RUPS8']['f-out']['min-f-out'],$limity['RUPS8']['f-out']['max-f-out'],$limity['RUPS8']['f-out']['kolor-awaria'],$limity['RUPS8']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups8_bateria_charge_kolor_dane=ograniczenia($rups8_charge_bateria,$limity['RUPS8']['bateria-charge']['min-charge'],$limity['RUPS8']['bateria-charge']['max-charge'],$limity['RUPS8']['bateria-charge']['kolor-awaria'],$limity['RUPS8']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups8_U_bateria_kolor_dane=ograniczenia($rups8_U_bateria,$limity['RUPS8']['U-bateria']['min-U-bateria'],$limity['RUPS8']['U-bateria']['max-U-bateria'],$limity['RUPS8']['U-bateria']['kolor-awaria'],$limity['RUPS8']['U-bateria']['kolor-normal']);

//------------ kolor obramowania RUPS8------------------
	if($rups8_IN==1 && $rups8_BYPASS==0 && $rups8_M_BYPASS==0 && $rups8_OUT==1
		&& $rups8_P_IN_kolor_dane==$limity['RUPS8']['P-IN']['kolor-normal'] 
		&& $rups8_I_IN_kolor_dane==$limity['RUPS8']['I-IN']['kolor-normal']
		&& $rups8_U_L1_IN_kolor_dane==$limity['RUPS8']['U-IN']['kolor-normal'] 
		&& $rups8_U_L2_IN_kolor_dane==$limity['RUPS8']['U-IN']['kolor-normal'] 
		&& $rups8_U_L3_IN_kolor_dane==$limity['RUPS8']['U-IN']['kolor-normal'] 
		&& $rups8_U_L1_OUT_kolor_dane==$limity['RUPS8']['U-OUT']['kolor-normal'] 
		&& $rups8_U_L2_OUT_kolor_dane==$limity['RUPS8']['U-OUT']['kolor-normal'] 
		&& $rups8_U_L3_OUT_kolor_dane==$limity['RUPS8']['U-OUT']['kolor-normal'] 
		&& $rups8_f_IN_kolor_dane==$limity['RUPS8']['f-in']['kolor-normal'] 
		&& $rups8_f_OUT_kolor_dane==$limity['RUPS8']['f-out']['kolor-normal'] 
		&& $rups8_bateria_charge_kolor_dane==$limity['RUPS8']['bateria-charge']['kolor-normal'] 
		&& $rups8_U_bateria_kolor_dane==$limity['RUPS8']['U-bateria']['kolor-normal'])
		{			
			$rups8_kolor_obramowania=$limity['RUPS']['kolor_RUPS_normal'];
		}
	else
		{
			$rups8_kolor_obramowania=$limity['RUPS']['kolor_RUPS_anomalia'];
		}
		
//=================================RUPS9=====================================================
//=================================RUPS9-1=======================================
// kolor danej dla - przekroczenia wartości mocy czynnej - OUT
$rups9_1_P_OUT_kolor_dane=ograniczenia($rups9_1_P_OUT,$limity['RUPS9']['P-OUT']['min-P-OUT'],$limity['RUPS9']['P-OUT']['max-P-OUT'],$limity['RUPS9']['P-OUT']['kolor-awaria'],$limity['RUPS9']['P-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups9_1_I_L1_IN_kolor_dane=ograniczenia($rups9_1_I_L1_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups9_1_I_L2_IN_kolor_dane=ograniczenia($rups9_1_I_L2_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups9_1_I_L3_IN_kolor_dane=ograniczenia($rups9_1_I_L3_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups9_1_I_L1_OUT_kolor_dane=ograniczenia($rups9_1_I_L1_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups9_1_I_L2_OUT_kolor_dane=ograniczenia($rups9_1_I_L2_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups9_1_I_L3_OUT_kolor_dane=ograniczenia($rups9_1_I_L3_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups9_1_U_L1_IN_kolor_dane=ograniczenia($rups9_1_U_L1_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups9_1_U_L2_IN_kolor_dane=ograniczenia($rups9_1_U_L2_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups9_1_U_L3_IN_kolor_dane=ograniczenia($rups9_1_U_L3_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups9_1_U_L1_OUT_kolor_dane=ograniczenia($rups9_1_U_L1_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups9_1_U_L2_OUT_kolor_dane=ograniczenia($rups9_1_U_L2_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups9_1_U_L3_OUT_kolor_dane=ograniczenia($rups9_1_U_L3_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups9_1_f_L1_IN_kolor_dane=ograniczenia($rups9_1_f_L1_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups9_1_f_L2_IN_kolor_dane=ograniczenia($rups9_1_f_L2_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups9_1_f_L3_IN_kolor_dane=ograniczenia($rups9_1_f_L3_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups9_1_f_OUT_kolor_dane=ograniczenia($rups9_1_f_OUT,$limity['RUPS9']['f-out']['min-f-out'],$limity['RUPS9']['f-out']['max-f-out'],$limity['RUPS9']['f-out']['kolor-awaria'],$limity['RUPS9']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups9_1_bateria_charge_kolor_dane=ograniczenia($rups9_1_charge_bateria,$limity['RUPS9']['bateria-charge']['min-charge'],$limity['RUPS9']['bateria-charge']['max-charge'],$limity['RUPS9']['bateria-charge']['kolor-awaria'],$limity['RUPS9']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups9_1_U_bateria_kolor_dane=ograniczenia($rups9_1_U_bateria,$limity['RUPS9']['U-bateria']['min-U-bateria'],$limity['RUPS9']['U-bateria']['max-U-bateria'],$limity['RUPS9']['U-bateria']['kolor-awaria'],$limity['RUPS9']['U-bateria']['kolor-normal']);

//=================================RUPS9-2=======================================
// kolor danej dla - przekroczenia wartości mocy czynnej - OUT
$rups9_2_P_OUT_kolor_dane=ograniczenia($rups9_2_P_OUT,$limity['RUPS9']['P-OUT']['min-P-OUT'],$limity['RUPS9']['P-OUT']['max-P-OUT'],$limity['RUPS9']['P-OUT']['kolor-awaria'],$limity['RUPS9']['P-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups9_2_I_L1_IN_kolor_dane=ograniczenia($rups9_2_I_L1_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups9_2_I_L2_IN_kolor_dane=ograniczenia($rups9_2_I_L2_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups9_2_I_L3_IN_kolor_dane=ograniczenia($rups9_2_I_L3_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
	
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups9_2_I_L1_OUT_kolor_dane=ograniczenia($rups9_2_I_L1_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups9_2_I_L2_OUT_kolor_dane=ograniczenia($rups9_2_I_L2_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups9_2_I_L3_OUT_kolor_dane=ograniczenia($rups9_2_I_L3_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups9_2_U_L1_IN_kolor_dane=ograniczenia($rups9_2_U_L1_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups9_2_U_L2_IN_kolor_dane=ograniczenia($rups9_2_U_L2_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups9_2_U_L3_IN_kolor_dane=ograniczenia($rups9_2_U_L3_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups9_2_U_L1_OUT_kolor_dane=ograniczenia($rups9_2_U_L1_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups9_2_U_L2_OUT_kolor_dane=ograniczenia($rups9_2_U_L2_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups9_2_U_L3_OUT_kolor_dane=ograniczenia($rups9_2_U_L3_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups9_2_f_L1_IN_kolor_dane=ograniczenia($rups9_2_f_L1_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups9_2_f_L2_IN_kolor_dane=ograniczenia($rups9_2_f_L2_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups9_2_f_L3_IN_kolor_dane=ograniczenia($rups9_2_f_L3_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups9_2_f_OUT_kolor_dane=ograniczenia($rups9_2_f_OUT,$limity['RUPS9']['f-out']['min-f-out'],$limity['RUPS9']['f-out']['max-f-out'],$limity['RUPS9']['f-out']['kolor-awaria'],$limity['RUPS9']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups9_2_bateria_charge_kolor_dane=ograniczenia($rups9_2_charge_bateria,$limity['RUPS9']['bateria-charge']['min-charge'],$limity['RUPS9']['bateria-charge']['max-charge'],$limity['RUPS9']['bateria-charge']['kolor-awaria'],$limity['RUPS9']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups9_2_U_bateria_kolor_dane=ograniczenia($rups9_2_U_bateria,$limity['RUPS9']['U-bateria']['min-U-bateria'],$limity['RUPS9']['U-bateria']['max-U-bateria'],$limity['RUPS9']['U-bateria']['kolor-awaria'],$limity['RUPS9']['U-bateria']['kolor-normal']);


//=================================RUPS9-3=======================================
// kolor danej dla - przekroczenia wartości mocy czynnej - OUT
$rups9_3_P_OUT_kolor_dane=ograniczenia($rups9_3_P_OUT,$limity['RUPS9']['P-OUT']['min-P-OUT'],$limity['RUPS9']['P-OUT']['max-P-OUT'],$limity['RUPS9']['P-OUT']['kolor-awaria'],$limity['RUPS9']['P-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości prądu wejściowego L1
$rups9_3_I_L1_IN_kolor_dane=ograniczenia($rups9_3_I_L1_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L2
$rups9_3_I_L2_IN_kolor_dane=ograniczenia($rups9_3_I_L2_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wejściowego L3
$rups9_3_I_L3_IN_kolor_dane=ograniczenia($rups9_3_I_L3_IN,$limity['RUPS9']['I-IN']['min-I-IN'],$limity['RUPS9']['I-IN']['max-I-IN'],$limity['RUPS9']['I-IN']['kolor-awaria'],$limity['RUPS9']['I-IN']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości prądu wyjściowego L1
$rups9_3_I_L1_OUT_kolor_dane=ograniczenia($rups9_3_I_L1_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L2
$rups9_3_I_L2_OUT_kolor_dane=ograniczenia($rups9_3_I_L2_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości prądu wyjściowego L3
$rups9_3_I_L3_OUT_kolor_dane=ograniczenia($rups9_3_I_L3_OUT,$limity['RUPS9']['I-OUT']['min-I-OUT'],$limity['RUPS9']['I-OUT']['max-I-OUT'],$limity['RUPS9']['I-OUT']['kolor-awaria'],$limity['RUPS9']['I-OUT']['kolor-normal']);
		
// kolor danej dla - przekroczenia wartości napięcia - IN - L1
$rups9_3_U_L1_IN_kolor_dane=ograniczenia($rups9_3_U_L1_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L2
$rups9_3_U_L2_IN_kolor_dane=ograniczenia($rups9_3_U_L2_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - IN - L3
$rups9_3_U_L3_IN_kolor_dane=ograniczenia($rups9_3_U_L3_IN,$limity['RUPS9']['U-IN']['min-U-IN'],$limity['RUPS9']['U-IN']['max-U-IN'],$limity['RUPS9']['U-IN']['kolor-awaria'],$limity['RUPS9']['U-IN']['kolor-normal']);

// kolor danej dla - przekroczenia wartości napięcia - OUT - L1
$rups9_3_U_L1_OUT_kolor_dane=ograniczenia($rups9_3_U_L1_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L2
$rups9_3_U_L2_OUT_kolor_dane=ograniczenia($rups9_3_U_L2_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);
// kolor danej dla - przekroczenia wartości napięcia - OUT - L3
$rups9_3_U_L3_OUT_kolor_dane=ograniczenia($rups9_3_U_L3_OUT,$limity['RUPS9']['U-OUT']['min-U-OUT'],$limity['RUPS9']['U-OUT']['max-U-OUT'],$limity['RUPS9']['U-OUT']['kolor-awaria'],$limity['RUPS9']['U-OUT']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - IN - L1
$rups9_3_f_L1_IN_kolor_dane=ograniczenia($rups9_3_f_L1_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L2
$rups9_3_f_L2_IN_kolor_dane=ograniczenia($rups9_3_f_L2_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);
// kolor danej dla - przekroczenia wartości częstotliwości - IN - L3
$rups9_3_f_L3_IN_kolor_dane=ograniczenia($rups9_3_f_L3_IN,$limity['RUPS9']['f-in']['min-f-in'],$limity['RUPS9']['f-in']['max-f-in'],$limity['RUPS9']['f-in']['kolor-awaria'],$limity['RUPS9']['f-in']['kolor-normal']);

// kolor danej dla - przekroczenia wartości częstotliwości - OUT 
$rups9_3_f_OUT_kolor_dane=ograniczenia($rups9_3_f_OUT,$limity['RUPS9']['f-out']['min-f-out'],$limity['RUPS9']['f-out']['max-f-out'],$limity['RUPS9']['f-out']['kolor-awaria'],$limity['RUPS9']['f-out']['kolor-normal']);

// poziom naładowania baterii - kolor zależny od stanu
$rups9_3_bateria_charge_kolor_dane=ograniczenia($rups9_3_charge_bateria,$limity['RUPS9']['bateria-charge']['min-charge'],$limity['RUPS9']['bateria-charge']['max-charge'],$limity['RUPS9']['bateria-charge']['kolor-awaria'],$limity['RUPS9']['bateria-charge']['kolor-normal']);

// napięcie baterii - kolor zależny od stanu
$rups9_3_U_bateria_kolor_dane=ograniczenia($rups9_3_U_bateria,$limity['RUPS9']['U-bateria']['min-U-bateria'],$limity['RUPS9']['U-bateria']['max-U-bateria'],$limity['RUPS9']['U-bateria']['kolor-awaria'],$limity['RUPS9']['U-bateria']['kolor-normal']);

//=================================podsumowanie całości RUPS9=====================================================
// moc czynna suma z 3 urzadzen - warunek na kolor wyswietlonej danej
	if($rups9_1_P_OUT_kolor_dane==$limity['RUPS9']['P-OUT']['kolor-normal'] &&
		$rups9_2_P_OUT_kolor_dane==$limity['RUPS9']['P-OUT']['kolor-normal'] &&
		$rups9_3_P_OUT_kolor_dane==$limity['RUPS9']['P-OUT']['kolor-normal'] )
		{
			$rups9_P_OUT_kolor_dane=$limity['RUPS9']['P-OUT']['kolor-normal']; 
		}
		else
		{
			$rups9_P_OUT_kolor_dane=$limity['RUPS9']['P-OUT']['kolor-awaria']; 
		}

// ustalenie koloru napisu 'I-L1' (-IN) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_I_L1_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] && 
		$rups9_2_I_L1_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] &&
		$rups9_3_I_L1_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] )
		{
			$rups9_I_L1_IN_kolor_dane=$limity['RUPS9']['I-IN']['kolor-normal'];						
		}
		else
		{
			$rups9_I_L1_IN_kolor_dane=$limity['RUPS9']['I-IN']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'I-L2' (-IN) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_I_L2_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] && 
		$rups9_2_I_L2_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] &&
		$rups9_3_I_L2_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] )
		{
			$rups9_I_L2_IN_kolor_dane=$limity['RUPS9']['I-IN']['kolor-normal'];						
		}
		else
		{
			$rups9_I_L2_IN_kolor_dane=$limity['RUPS9']['I-IN']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'I-L3' (-IN) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_I_L3_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] && 
		$rups9_2_I_L3_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] &&
		$rups9_3_I_L3_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] )
		{
			$rups9_I_L3_IN_kolor_dane=$limity['RUPS9']['I-IN']['kolor-normal'];						
		}
		else
		{
			$rups9_I_L3_IN_kolor_dane=$limity['RUPS9']['I-IN']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'U-L1' (-IN) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_U_L1_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] && 
		$rups9_2_U_L1_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] &&
		$rups9_3_U_L1_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] )
		{
			$rups9_U_L1_IN_kolor_dane=$limity['RUPS9']['U-IN']['kolor-normal'];						
		}
		else
		{
			$rups9_U_L1_IN_kolor_dane=$limity['RUPS9']['U-IN']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'U-L2' (-IN) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_U_L2_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] && 
		$rups9_2_U_L2_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] &&
		$rups9_3_U_L2_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] )
		{
			$rups9_U_L2_IN_kolor_dane=$limity['RUPS9']['U-IN']['kolor-normal'];						
		}
		else
		{
			$rups9_U_L2_IN_kolor_dane=$limity['RUPS9']['U-IN']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'U-L3' (-IN) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_U_L3_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] && 
		$rups9_2_U_L3_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] &&
		$rups9_3_U_L3_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] )
		{
			$rups9_U_L3_IN_kolor_dane=$limity['RUPS9']['U-IN']['kolor-normal'];						
		}
		else
		{
			$rups9_U_L3_IN_kolor_dane=$limity['RUPS9']['U-IN']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'I-L1' (-OUT) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_I_L1_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] && 
		$rups9_2_I_L1_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] &&
		$rups9_3_I_L1_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] )
		{
			$rups9_I_L1_OUT_kolor_dane=$limity['RUPS9']['I-OUT']['kolor-normal'];						
		}
		else
		{
			$rups9_I_L1_OUT_kolor_dane=$limity['RUPS9']['I-OUT']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'I-L2' (-OUT) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_I_L2_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] && 
		$rups9_2_I_L2_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] &&
		$rups9_3_I_L2_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] )
		{
			$rups9_I_L2_OUT_kolor_dane=$limity['RUPS9']['I-OUT']['kolor-normal'];						
		}
		else
		{
			$rups9_I_L2_OUT_kolor_dane=$limity['RUPS9']['I-OUT']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'I-L3' (-OUT) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_I_L3_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] && 
		$rups9_2_I_L3_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] &&
		$rups9_3_I_L3_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] )
		{
			$rups9_I_L3_OUT_kolor_dane=$limity['RUPS9']['I-OUT']['kolor-normal'];						
		}
		else
		{
			$rups9_I_L3_OUT_kolor_dane=$limity['RUPS9']['I-OUT']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'U-L1' (-OUT) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_U_L1_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] && 
		$rups9_2_U_L1_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] &&
		$rups9_3_U_L1_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] )
		{
			$rups9_U_L1_OUT_kolor_dane=$limity['RUPS9']['U-OUT']['kolor-normal'];						
		}
		else
		{
			$rups9_U_L1_OUT_kolor_dane=$limity['RUPS9']['U-OUT']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'U-L2' (-OUT) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_U_L2_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] && 
		$rups9_2_U_L2_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] &&
		$rups9_3_U_L2_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] )
		{
			$rups9_U_L2_OUT_kolor_dane=$limity['RUPS9']['U-OUT']['kolor-normal'];						
		}
		else
		{
			$rups9_U_L2_OUT_kolor_dane=$limity['RUPS9']['U-OUT']['kolor-awaria'];			
		}
// ustalenie koloru napisu 'U-L3' (-OUT) w zaleznosci od wartosci z UPS9_1 , UPS9_2 i UPS9_3
	if($rups9_1_U_L3_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] && 
		$rups9_2_U_L3_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] &&
		$rups9_3_U_L3_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] )
		{
			$rups9_U_L3_OUT_kolor_dane=$limity['RUPS9']['U-OUT']['kolor-normal'];						
		}
		else
		{
			$rups9_U_L3_OUT_kolor_dane=$limity['RUPS9']['U-OUT']['kolor-awaria'];			
		}

//------------ kolor obramowania RUPS9------------------
	if($rups9_1_IN==1 && $rups9_1_BYPASS==0 && $rups9_1_M_BYPASS==0 && $rups9_1_OUT==1 &&
	    $rups9_2_IN==1 && $rups9_2_BYPASS==0 && $rups9_2_M_BYPASS==0 && $rups9_2_OUT==1 &&
		$rups9_3_IN==1 && $rups9_3_BYPASS==0 && $rups9_3_M_BYPASS==0 && $rups9_3_OUT==1 &&		
		$rups9_1_f_L1_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_1_f_L2_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_1_f_L3_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_2_f_L1_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_2_f_L2_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_2_f_L3_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_3_f_L1_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_3_f_L2_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_3_f_L3_IN_kolor_dane==$limity['RUPS9']['f-in']['kolor-normal'] &&
		$rups9_1_f_OUT_kolor_dane==$limity['RUPS9']['f-out']['kolor-normal'] &&
		$rups9_2_f_OUT_kolor_dane==$limity['RUPS9']['f-out']['kolor-normal'] &&
		$rups9_3_f_OUT_kolor_dane==$limity['RUPS9']['f-out']['kolor-normal'] &&
		$rups9_1_bateria_charge_kolor_dane==$limity['RUPS9']['bateria-charge']['kolor-normal'] &&
		$rups9_2_bateria_charge_kolor_dane==$limity['RUPS9']['bateria-charge']['kolor-normal'] &&
		$rups9_3_bateria_charge_kolor_dane==$limity['RUPS9']['bateria-charge']['kolor-normal'] &&
		$rups9_1_U_bateria_kolor_dane==$limity['RUPS9']['U-bateria']['kolor-normal'] &&
		$rups9_2_U_bateria_kolor_dane==$limity['RUPS9']['U-bateria']['kolor-normal'] &&
		$rups9_3_U_bateria_kolor_dane==$limity['RUPS9']['U-bateria']['kolor-normal'] &&
		$rups9_P_OUT_kolor_dane==$limity['RUPS9']['P-OUT']['kolor-normal'] &&
		$rups9_I_L1_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] &&
		$rups9_I_L2_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] &&
		$rups9_I_L3_IN_kolor_dane==$limity['RUPS9']['I-IN']['kolor-normal'] &&
		$rups9_U_L1_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] &&
		$rups9_U_L2_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] &&
		$rups9_U_L3_IN_kolor_dane==$limity['RUPS9']['U-IN']['kolor-normal'] &&
		$rups9_I_L1_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] &&
		$rups9_I_L2_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] &&
		$rups9_I_L3_OUT_kolor_dane==$limity['RUPS9']['I-OUT']['kolor-normal'] &&
		$rups9_U_L1_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] &&
		$rups9_U_L2_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal'] &&
		$rups9_U_L3_OUT_kolor_dane==$limity['RUPS9']['U-OUT']['kolor-normal']
		)
		{			
			$rups9_kolor_obramowania=$limity['RUPS']['kolor_RUPS_normal'];
		}
	else
		{
			$rups9_kolor_obramowania=$limity['RUPS']['kolor_RUPS_anomalia'];
		}

?>