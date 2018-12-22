<?php

// This is a simplified example, which doesn't cover security of uploaded files. 
// This example just demonstrate the logic behind the process.

copy($_FILES['file']['tmp_name'], '/files/'.$_FILES['file']['name']);
					
echo '<a href="/files/'.$_FILES['file']['name'].'">'.$_FILES['file']['name'].'</a>';		
?>