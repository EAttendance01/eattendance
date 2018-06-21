<html>
<body>
<?php
class Time {
			public Function TimeInterval($n, $WindowSize, $d)
			{
				$a = array();
				$r = 0;
				$IndexEntry = 0;
		        $i = 0;

			for($i = 0; ($i < $n); ++$i)
			{
				$a[$i] = 0;
			}

			for($indexEntry = 0; ($IndexEntry<$n); )
			{
				$r = rand(0,$WindowSize);
				$diff = null;
				$Duplicate = null;
				$Duplicate = FALSE;
			for($j = 0; ($j < $IndexEntry); ++$j)
				{

       				if(($r > $a[$j]))
					{
					$diff = ($r - $a[$j]);
					}

					else
					{
					$diff = ($a[$j] - $r);
					}

					if(($diff < $d))
					{
					$Duplicate = TRUE;
					break;
					}
				}

			if(!$Duplicate)
			{
				$a[$IndexEntry] = $r;
				++$IndexEntry;
			}
			else
			{
				++$i;
				if(($i > ($n * 4)))
			{
			echo "error in generating TIME ";
			exit(0);
			}
			}
		}
			return $a;
		}
	public function main($H,$M,$S)
		{
			$m = 0;
			$s = 0;
			$h = 0;
			$total = 10;
		
			$b= $this -> TimeInterval($total,600,4);

		for($i = 0; ($i < $total); ++$i)
		{
			$h = ($H + ($b[$i] / 3600));
			$m =($M + ((($b[$i] % 3600)) / 60));
			$s = ($S + ($b[$i] % 60));

			if($s > 59)
			{
				$s = ($s % 60);
				++$m;
			}

			if($m > 59)
			{
				$m = ($m % 60);
				++$h;
			}
			
		echo sprintf("%02s", intval($h)).":".sprintf("%02s", intval($m)).":".sprintf("%02s", intval($s))."<br>";
		echo date('c',mktime($h,$m,$s,1,2,2008));
		}
	}
		}
	$obj = new Time();
	$obj -> main(7,0,0);
 ?>
</body>
</html>
