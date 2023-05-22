<?php

	/////////
	// GET //
	/////////

	$image = $_GET["image"];

	if ($image != null && $image != "")

	{

		//////////////
		// CHECKING //
		//////////////

		$image_decoded = urldecode($image);

		$pattern = "/<svg\b[^>]*>.*?<\/svg>/is";

		if (preg_match($pattern, $image_decoded))

		{

			////////////
			// UPLOAD //
			////////////

			$filetype = "image/svg+xml";

			$fileraw = base64_encode($image_decoded);

			$filename = hash('md5', time());

			$filesize = strlen($image_decoded);

			$filebody = "data:" . $filetype . ";base64," . $fileraw;

			//////////////
			// DOWNLOAD //
			//////////////

			header("Content-Description: File Transfer");

			header("Content-Type: $filetype");

			header("Content-Disposition: attachment; filename=$filename");

			header("Expires: 0");

			header("Cache-Control: no-store, no-cache, must-revalidate");

			header("Pragma: public");

			header("Content-Length: $filesize");

			header("Content-Transfer-Encoding: binary");

			readfile($filebody);

		};

	};

	////////////
	// ENDING //
	////////////

	exit();

?>
