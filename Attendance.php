<html>
<body>
<?ph

class Attendance
{
public function Rand($temp, $random,$cl)
	{
          $random1 = 0;
          $i = 0;
		for( $j = 0; ($j < 1); )
		{
			$random1 = rand(0,9);

			if( $temp == $random[$random1])
			{
				for( $i = 0; ($i < count($cl));++$i)
				{
					if($random1 == $cl[$i] )
						break;
				}

				if($i == count($cl))
					++$j;
			}
		}
		return $random1;

	}
	public function Main1($t,$n,$d)
		{
		 $LastAbsent1 = array();
		 $LastAbsent = array();

		 $list = array();
		 $clone = array();
		 /*$random2=null;
		 $tem=null;*/
		 for($i=0;($i<$t);++$i)
		 {
		 $list[$i]=0;
		 }

		$random2 = 0;
		$tem = 0;
		for($i = 0; ($i < $n); ++$i)
			{
			$LastAbsent[$i] = -1;
			$LastAbsent1[$i] = -1;
			}

		for( $j = 0; ($j < $d); ++$j)
			{
			for($i = 0; ($i < $n); ++$i)
				{
				if ((($j%2) != 0))
					{
					$random2 = $this->Rand($tem, $list, $LastAbsent);
					$LastAbsent1[$i] = $random2;
					}
				else
					{
					$random2 = $this->Rand($tem, $list, $LastAbsent1);
					$LastAbsent[$i] = $random2;
					}
				$list[$random2]++;

				for($p = 0; ($p < $t); ++$p)
				{
					$clone[$p] = $list[$p];
                    }
				sort($clone);
				$tem = $clone[0];



				}
               return $list;
			/*for($l = 0; ($l < $t); ++$l )
				{
				echo "<br>";
				echo $list[$l];
				}*/

			}
            
		}
}


?>
</body>
</html>
