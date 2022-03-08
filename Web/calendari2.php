
<?php

$maya = MayanTikalCalendar(time(),0);

print_r($maya);

                 $poffset = '2012-12-21 8:24 PM';
                 $pweight = '-1872000.22222222223';
                 $defiency='nonedeficient';
                 $timeset= array("hours" => 24,
                                 "minutes" => 60,
                                 "seconds" => 60)
{
// Code Segment 1 – Calculate Floating Point
$tme = $unix_time;
if ($gmt>0){ $gmt=-$gmt; } else { $gmt=abs($gmt); }

$ptime = strtotime($poffset)+(60*60*gmt);
$maya_xa = ($tme)/(24*60*60);
$maya_ya = $ptime/(24*60*60);
$maya = (($maya_xa -$maya_ya) - $pweight)+(microtime/999999);

// Code Segment 2 – Set month day arrays
$nonedeficient = array(
"seq1" => array(20,20,20,20,20,20,20,20,20,
                20,20,20,20,20,20,20,20,20,5));

$monthnames = array("seq1" => array(
'Pop', 'Uo', 'Zip', 'Zot\'z', 'Tzec', 'Xul',
'Yaxkin', 'Mol', 'Ch\'en', 'Yax', 'Zac', 'Ceh',
'Mac', 'Kankin', 'Muan', 'Pax', 'Kayab',
'Cumku', 'Uayeb'));
$daynames = array("seq1" => array(
'Imix', 'Ik', 'Akbal', 'Kan', 'Chicchan',
'Cimi','Manik', 'Lamat', 'Muluc', 'Oc',
'Chuen', 'Eb', 'Ben', 'Ix', 'Men',
'Cib', 'Caban', 'Etz\'nab', 'Cauac', 'Ahau'));
$monthusage = isset($defiency) ? ${$defiency} : $deficient;

// Code Segment 3 – Calculate month number, day numbers etc
foreach($monthusage as $key => $item){
    $i++;
    foreach($item as $numdays){
        $ttl_num=$ttl_num+$numdays;
        $ttl_num_months++;
    }
}

$revolutionsperyear = $ttl_num / $i;
$numyears = (round((floor($maya) / $revolutionsperyear),0));
$avg_num_month = $ttl_num_months/$i;
$jtl = abs(abs($maya) -
       ceil($revolutionsperyear*($numyears+1)));

while($month==0){
    $day=0;
    $u=0;
    foreach($monthusage as $key => $item){
        $t=0;
        foreach($item as $numdays){
            $t++;
            $tt=0;
            for($sh=1;$sh<=$numdays;$sh++){
                $ii=$ii+1;
                $tt++;
                if ($ii==floor($jtl)){
                    if ($maya>0){
                        $daynum = $tt;
                        $month = $t;
                    } else {
                        $daynum = $numdays-$tt;
                        $month = $avg_num_month-$t;
                    }
                    $sequence = $key;
                    $nodaycount=true;
                }
            }
            if ($nodaycount==false)
                $day++;
        }
        $u++;
    }
}

$timer = substr($maya, strpos($maya,'.')+1,
         strlen($maya)-strpos($maya,'.')-1);
$maya_out= $numyears.'/'.$month.'/'.$daynum.' '.$day.'.'.
  floor(intval(substr($timer,0,2))/100*$timeset['hours']).':'.
  floor(intval(substr($timer,2,2))/100*$timeset['minutes']).':'.
  floor(intval(substr($timer,4,2))/100*$timeset['seconds']).'.'.
  substr($timer,6,strlen($timer)-6);

$maya_obj = array(
  'longcount'=>MayanLongCount($tme),'year'=>abs($numyears),
  'month'=>$month, 'mname' => $monthnames[$sequence][$month-1],
  'day'=>$daynum, 'dayname'=>$daynames[$sequence][$daynum-1],
  'day'=>$daynum, 'jtl'=>$jtl, 'day_count'=>$day,
  'hours'=>     floor(intval(substr($timer,0,2))/100
             *$timeset['hours']),
  'minute'=> floor(intval(substr($timer,2,2))/100
             *$timeset['minutes']),
  'seconds'=>floor(intval(substr($timer,4,2))/100
             *$timeset['seconds']),
  'microtime'=>substr($timer,6,strlen($timer)-6),
  'strout'=>$maya_out);

return $maya_obj;
}

?>
