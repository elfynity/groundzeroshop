
<?php
if (in_category('articles')) {include (TEMPLATEPATH . '/single-articles.php');
} 
else { include ('single-default.php');
}
?>