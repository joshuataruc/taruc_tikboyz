<?php 
 $message = "test";

				// In case any of our lines are larger than 70 characters, we should use wordwrap()
				$message = wordwrap($message, 70, "\r\n");

				// Send
				mail('imtaruc25@gmail.com', 'My Subject', $message);



 ?>