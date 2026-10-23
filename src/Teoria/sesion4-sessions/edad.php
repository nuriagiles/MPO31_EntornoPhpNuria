<?php
session_start();
echo $_SESSION['edad'];

// $_SESSION['name'] = 'Alejandro';
$_SESSION['alumnes'] =['joan', 'miguel', 'pedro', 'david'];


?>

<pre>
    <? var_dump($_SESSION['alumnes']);?>
</pre>

<?php

array_push($_SESSION['alumnes'], 'jonathan');
?>

<pre>
    <? var_dump($_SESSION['alumnes']);?>
</pre>