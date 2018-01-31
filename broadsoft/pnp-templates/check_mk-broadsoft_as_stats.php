<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2014             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# tails. You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.
#
# Author Trevor Steyn <trevor@webon.co.za>


setlocale(LC_ALL, 'C');

$colors = array('#FF0066',
				'#00FF00',
				'#FFFF00',
				'#099FFF',
				'#5600FF',
				'#00FF99',
				'#FD1C03');

#    <NAME>users</NAME>
#    <NAME>groups</NAME>
#    <NAME>enterprises</NAME>
#    <NAME>active_calls</NAME>
#    <NAME>calls_per_second</NAME>
#    <NAME>registration_per_minute</NAME>
#    <NAME>migrated_users</NAME>


# Graph 1

$ds_name[1]  = "Active Calls";
$opt[1] 	 = "--vertical-label \"active calls\"  --title \"$hostname: Active Calls\" ";

$def[1]  	 = "DEF:active_calls=$RRDFILE[4]:$DS[1]:MAX ";
$def[1]    	.= "AREA:active_calls$colors[0]:\"active calls\:\" ";
$def[1]    	.= "LINE1:active_calls#000000: ";
$def[1]    	.= "GPRINT:active_calls:LAST:\"last\:%4.0lf\" ";
$def[1]    	.= "GPRINT:active_calls:MAX:\"max\:%4.0lf\" ";
$def[1]    	.= "GPRINT:active_calls:AVERAGE:\"avg\:%4.0lf\" ";

# Graph 2

$ds_name[2]  = "Calls Per Second";
$opt[2]  	 = "--vertical-label \"calls per second\"  --title \"$hostname: Calls Per Second\" ";
$def[2]  	 = "DEF:cps=$RRDFILE[5]:$DS[1]:MAX ";

$def[2] 	.= "AREA:cps$colors[1]:\"cps\:\" ";
$def[2] 	.= "LINE1:cps#000000: ";
$def[2] 	.= "GPRINT:cps:LAST:\"last\:%4.0lf\" ";
$def[2] 	.= "GPRINT:cps:MAX:\"max\:%4.0lf\" ";
$def[2] 	.= "GPRINT:cps:AVERAGE:\"avg\:%4.0lf\" ";

# Graph 3

$ds_name[3]  = "Reg Per Minute";
$opt[3] 	 = "--vertical-label \"reg per minute\"  --title \"$hostname: Registration Per Minute\" ";

$def[3]  	 = "DEF:rpm=$RRDFILE[6]:$DS[1]:MAX ";
$def[3] 	.= "AREA:rpm$colors[2]:\"reg per minute\:\" ";
$def[3] 	.= "LINE1:rpm#000000: ";
$def[3] 	.= "GPRINT:rpm:LAST:\"last\:%4.0lf\" ";
$def[3] 	.= "GPRINT:rpm:MAX:\"max\:%4.0lf\" ";
$def[3] 	.= "GPRINT:rpm:AVERAGE:\"avg\:%4.0lf\" ";

# Graph 4

$ds_name[4]  = "Migrated Users";
$opt[4] 	 = "--vertical-label \"users\"  --title \"$hostname: Migrated Users\" ";

$def[4]  	 = "DEF:migrated_users=$RRDFILE[7]:$DS[1]:MAX ";
$def[4] 	.= "AREA:migrated_users$colors[3]:\"Users\:\" ";
$def[4] 	.= "LINE1:migrated_users#000000: ";
$def[4] 	.= "GPRINT:migrated_users:LAST:\"last\:%4.0lf\" ";
$def[4] 	.= "GPRINT:migrated_users:MAX:\"max\:%4.0lf\" ";
$def[4] 	.= "GPRINT:migrated_users:AVERAGE:\"avg\:%4.0lf\" ";

# Graph 5

$ds_name[5]  = "Users";
$opt[5] 	 = "--vertical-label \"users\"  --title \"$hostname: Users\" ";

$def[5]  	 = "DEF:users=$RRDFILE[1]:$DS[1]:MAX ";
$def[5] 	.= "AREA:users$colors[4]:\"users\:\" ";
$def[5] 	.= "LINE1:users#000000: ";
$def[5] 	.= "GPRINT:users:LAST:\"last\:%4.0lf\" ";
$def[5] 	.= "GPRINT:users:MAX:\"max\:%4.0lf\" ";
$def[5] 	.= "GPRINT:users:AVERAGE:\"avg\:%4.0lf\" ";

# Graph 6

$ds_name[6]  = "Groups";
$opt[6] 	 = "--vertical-label \"groups\"  --title \"$hostname: Groups\" ";

$def[6]  	 = "DEF:groups=$RRDFILE[2]:$DS[1]:MAX ";
$def[6] 	.= "AREA:groups$colors[5]:\"groups\:\" ";
$def[6] 	.= "LINE1:groups#000000: ";
$def[6] 	.= "GPRINT:groups:LAST:\"last\:%4.0lf\" ";
$def[6] 	.= "GPRINT:groups:MAX:\"max\:%4.0lf\" ";
$def[6] 	.= "GPRINT:groups:AVERAGE:\"avg\:%4.0lf\" ";

# Graph 7

$ds_name[7]  = "Enterprises";
$opt[7] 	 = "--vertical-label \"enterprises\"  --title \"$hostname: Enterprises\" ";

$def[7]  	 = "DEF:enterprises=$RRDFILE[3]:$DS[1]:MAX ";
$def[7] 	.= "AREA:enterprises$colors[6]:\"enterprises\:\" ";
$def[7] 	.= "LINE1:enterprises#000000: ";
$def[7] 	.= "GPRINT:enterprises:LAST:\"last\:%4.0lf\" ";
$def[7] 	.= "GPRINT:enterprises:MAX:\"max\:%4.0lf\" ";
$def[7] 	.= "GPRINT:enterprises:AVERAGE:\"avg\:%4.0lf\" ";
