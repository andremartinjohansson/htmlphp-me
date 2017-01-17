<!-- Content -->
<h1>PHP</h1>
<p>Skriv ut användarens riktiga IP (även om de använder proxy)</p>
<hr>
<!-- Print raw php code -->
<pre>
    <code>
        &lt;?php
        function getRealIPAddr()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ipadr = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ipadr = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ipadr = $_SERVER['REMOTE_ADDR'];
            }
            return $ipadr;
        }
        echo "Din riktiga IP adress är: " . getRealIPAddr();
        ?&gt;
    </code>
</pre>
<hr>
<!-- Result of php code -->
<?php
/**
* Get user's real IP address
*/
function getRealIPAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipadr = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipadr = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipadr = $_SERVER['REMOTE_ADDR'];
    }
    return $ipadr;
}
// Print the IP
echo "Din riktiga IP adress är: " . getRealIPAddr();
?>
