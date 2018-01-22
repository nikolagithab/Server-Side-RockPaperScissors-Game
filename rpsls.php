<!DOCTYPE html>
<html>
<!-- 
	Name: Nikola Petrovski
	Version: 1
	Date created: 24 VII 2017
	Date updated: 29 VII 2017
	Description: Web page Rock-Paper-Scissors-Lizard-Spock appropriately 
	organized using hybrid PHP. This is popular five-weapon expansion of
	"rock-paper-scissors" game which adds "Spock" and "lizard" to standard
	three choices. "Spock" is signified with Star Trek Vulcan salute, while
	"lizard" is shown by forming the hand into a sock-puppet-like mouth. 
	Spock smashes scissors and vaporizes rock; he is poisoned by lizard and
	disproven by paper. Lizard poisons Spock and eats paper; it is crushed 
	by rock and decapitated by scissors.
	[Source code: classnotes]
-->
<head>
	<title>Rock-Paper-Scissors-Lizard-Spock</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<meta charset="utf-8">
</head>
<body class="flex-container">
	<header class="headerBox">
		<h1>Rock-Paper-Scissors-Lizard-Spock</h1>
	</header>
	
	<main class="mainBox">
		<?php
		// Reports runtime errors 
		error_reporting(E_ERROR | E_PARSE);
		// Variables for input and output (elements)
		// e.g., array, an empty string, associative array, superglobal.
		$moves = array("rock", "paper", "scissors", "lizard", "spock");
		$computer = "question";
		$output = "";
		$winner = array( 
		"rock" => "paper, spock", 
		"paper" => "scissors, lizard", 
		"scissors" => "rock, spock", 
		"lizard" => "scissors, rock", 
		"spock" => "paper, lizard");
		$human = $_GET['move'];
		// initial state question mark image.
		if (empty($_GET['move'])) {	
			$human = "question"; 
		}
		// The array_rand() function returns a random key from an array
		if ($human !== "question") {
			$computer = $moves[array_rand($moves)];
		}
		$hImg = "<img src='images/$human.png' alt='$human' />";
		$mImg = "<img src='images/$computer.png' alt='$computer' />";
		// represents selected moves by both players
		$output = "$hImg vs. $mImg";
		// Evaluates destruction powers of both selections.
		// The strpos() function finds the position of 
		// the first occurrence of a string inside another string.
		if ($computer == "question") { 
			$output == "";
		} elseif ($computer == $human) {
			$output .= "<p>IT'S A TIE.</p>";
		} elseif (strpos($winner[$computer], $human) == true) { //!== false
			$output .= "<p> YOU WON!</p>";
		} else {
			$output .= "<p> COMPUTER WON. </p>";
		}
		echo $output;
		?>
		<!-- uses form to capture data from user.
		The onchange attribute fires the moment when 
		the value of the element is changed.
		The submit() method submits the form.
		Disabled attribute specifies that an option should be disabled.
		-->
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<select name="move" onchange="this.form.submit()" size="5">
				<option value="rock">rock</option>
				<option value="paper">paper</option>
				<option value="scissors">scissors</option>
				<option value="lizard">lizard</option>
				<option value="spock">spock</option>
			</select>
			<button class="reset" onclick="window.reload()">NEW GAME
			</button>
		</form>
		
	</main>
	<nav class="navigationBox">			
		<button>stats</button>
		<button>help</button>
		<button>close</button>
	</nav>
	<footer class="footerBox">
		<address>Web Programming @ Sheridan College &copy; Nikola Petrovski
		</address>
	</footer>
</body>
</html>