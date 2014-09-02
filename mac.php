<?php
/**
 * Function code to get the machine card physical (MAC) address.
 * Supported Windows/LINUX system.
 *
 * @return string
 */

function getMacAddress() {
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $output = shell_exec("ipconfig /all");
    $match = preg_match("/(([0-9A-F]{2}[:-]){5}([0-9A-F]{2}))/i", $ifconfig, $output);
    return $match ? $output[1] : NULL;
  }
  else {
    return shell_exec("/usr/sbin/arp -a | awk '{print $4}'");
  }
}
?>
