<?php
/**
 * Function code to get the machine card physical (MAC) address.
 * Supported Windows/LINUX system.
 *
 * @return string
 *   The MAC address.
 */

function getMacAddress() {
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $output = shell_exec("ipconfig /all");
    $match = preg_match("/(([0-9A-F]{2}[:-]){5}([0-9A-F]{2}))/i", $output, $matches);
    return $match ? $matches[1] : NULL;
  }
  else {
    return shell_exec("/usr/sbin/arp -a | awk 'NR==1 {print $4}'");
  }
}

echo getMacAddress();
?>
