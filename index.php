<?php
/**
 * testing PHP's built in hash functions
 * beware: the code in here is not particularly nice to look at, but it gets the job done
 */

// define the vars for this test
$texts = array(
	"mini"		=>	"thisIsASecurePasswordString",
	"tiny"		=>	file_get_contents("testFiles/tiny.txt"),
	"small"		=>	file_get_contents("testFiles/small.txt"),
	"mid"		=>	file_get_contents("testFiles/mid.txt"),
	"large"		=>	file_get_contents("testFiles/large.txt"),
	"larger"	=>	file_get_contents("testFiles/larger.txt"),
	//"gigantic"	=>	file_get_contents("testFiles/gigantic.txt"),
);
$hashfuncs = hash_algos();
$results = array();
$runs = 10000;

// run the test (boy, them loops!)
foreach($hashfuncs as $func){
	foreach ($texts as $name => $content) {
		$t = microtime(true);
		for($i = 0; $i < $runs; $i++){
			hash($func,"test");
		}
		// convert to ms
		$deltaT = round((microtime(true)-$t)*1000,4);

		// add zeros to the beginning and end
		$deltaTparts = explode(".", $deltaT);
		$deltaTparts[0] = str_pad($deltaTparts[0],2,"0",STR_PAD_LEFT);
		$deltaTparts[1] = str_pad($deltaTparts[1],4,"0",STR_PAD_RIGHT);
		$deltaT = implode(".", $deltaTparts);
		$results[$func][$name] = $deltaT;
		unset($t,$deltaTparts,$deltaT);
	}
}
?>
<head>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper" id="hashes">
		<div class="clear header">
			<button class="sort name" data-sort="hash">name</button>
			<button class="sort time" data-sort="timemini">27 chars</button>
			<button class="sort time" data-sort="timetiny">1kb</button>
			<button class="sort time" data-sort="timesmall">100kb</button>
			<button class="sort time" data-sort="timemid">3MB</button>
			<button class="sort time" data-sort="timelarge">10MB</button>
			<button class="sort time" data-sort="timelarger">100MB</button>
		</div>

		<ul class="list">
			<!--
				echo everything nicely
				this could have been done in the same loops as the tests,
				but this is nicer
			-->
			<?foreach($results as $hashFunctionName=>$testResults):?>
				<li>
					<h3 class="name"><?=$hashFunctionName?></h3>
					<?foreach($testResults as $testname=>$speed):?>
						<p class="time time<?=$testname?>"><?=$speed?>ms</p>
					<?endforeach?>
				</li>
			<?endforeach?>

		</ul>
	</div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
	<script>
		var hashList = new List('hashes', {valueNames: ["hash","timemini","timetiny","timesmall","timemid","timelarge","timelarger"]});
		hashList.sort("timemini",{order: "asc"})
	</script>

</body>