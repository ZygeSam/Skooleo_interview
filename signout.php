<?php
session_unset();
session_destroy();
echo "<script>
			alert(\" You have succesfully signed out\");
		</script>
";
header('Location: index.php');
?>