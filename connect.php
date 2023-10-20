<?php
	$colorFill = $_POST['colorFill'];
	$outlineColor = $_POST['outlineColor'];
	$shape = $_POST['shape'];
	$height = $_POST['height'];
	$width = $_POST['width'];
	$animation = $_POST['animation'];

	// Database connection
	$conn = new mysqli('localhost','root','','test'); //username, password, database name
	if($conn->connect_error){ #Returns description of last connection error
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error); #equivalent to exit and we give the error message
	} else {
		$stmt = $conn->prepare("insert into registration(colorFill, outlineColor, shape, height, width, animation) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $colorFill, $outlineColor, $shape, $height, $width, $animation);
		$execval = $stmt->execute();
		
		#Switch to show the right shape
		switch ($shape) {
			case "circle":
			  if ($animation == "static"){
			  echo '<svg width="600" height="600" version="1.1" xmlns="http://www.w3.org/2000/svg">
			  <ellipse cx="300" cy="300" rx="' . htmlspecialchars( $height, ENT_QUOTES ) . '"
			   ry="' . htmlspecialchars( $width, ENT_QUOTES ) . '" 
			   stroke="' . htmlspecialchars( $outlineColor, ENT_QUOTES ) . '" stroke-width="3" 
			   fill="' . htmlspecialchars( $colorFill, ENT_QUOTES ) . '"></circle>
			</svg>'; 
			}
			else echo '<?xml version="1.0" encoding="utf-8"?>
			<svg height="600" width="600">
			<ellipse cx="300" cy="300" rx="' . htmlspecialchars( $height, ENT_QUOTES ) . '"
			 ry="' . htmlspecialchars( $width, ENT_QUOTES ) . '" 
			 stroke="' . htmlspecialchars( $outlineColor, ENT_QUOTES ) . '" stroke-width="3" 
			 fill="' . htmlspecialchars( $colorFill, ENT_QUOTES ) . '"/> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1" /></circle>
		    </svg>'; 
			  break;
			case "rect":
				if ($animation == "static"){
				echo '<?xml version="1.0" encoding="utf-8"?>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="600">
				<rect x="0" y="0" width="' . htmlspecialchars( $width, ENT_QUOTES ) . '" height="' . htmlspecialchars( $height, ENT_QUOTES ) . '" style="fill: ' . htmlspecialchars( $colorFill, ENT_QUOTES ) . ';
				stroke: ' . htmlspecialchars( $outlineColor, ENT_QUOTES ) . ';stroke-width:3"></rect>
				</svg>';
			}
			else echo '<?xml version="1.0" encoding="utf-8"?>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="600">
			<rect x="0" y="0" width="' . htmlspecialchars( $width, ENT_QUOTES ) . '" height="' . htmlspecialchars( $height, ENT_QUOTES ) . '" style="fill: ' . htmlspecialchars( $colorFill, ENT_QUOTES ) . ';
			stroke: ' . htmlspecialchars( $outlineColor, ENT_QUOTES ) . ';stroke-width:3"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1" /></rect>
			</svg>';
			  break;
			case "star":
				if ($animation == "static"){
			  echo '<?xml version="1.0" encoding="utf-8"?>
			  <svg height="600" width="600">
			  <polygon points="100,10 40,198 190,78 10,78 160,198" style="fill:' . htmlspecialchars( $colorFill, ENT_QUOTES ) . ';stroke:' . htmlspecialchars( $outlineColor, ENT_QUOTES ) . ';stroke-width:3;fill-rule:nonzero;" />
			  </svg>';
			  }
			  else echo '<?xml version="1.0" encoding="utf-8"?>
			  <svg height="600" width="600">
			  <polygon points="100,10 40,198 190,78 10,78 160,198" style="fill:' . htmlspecialchars( $colorFill, ENT_QUOTES ) . ';
			  stroke:' . htmlspecialchars( $outlineColor, ENT_QUOTES ) . ';stroke-width:3;fill-rule:nonzero;" ><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1" /></polygon>
			  </svg>';
			  break;
			default:
			echo "tbd";
		  }
		
		$stmt->close();
		$conn->close();
	}
?>


