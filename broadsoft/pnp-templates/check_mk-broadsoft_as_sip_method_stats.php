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

#    <NAME>bwSipSummaryTotalTransactions</NAME>
#    <NAME>bwSipStatsInviteIns</NAME>
#    <NAME>bwSipStatsInviteOuts</NAME>
#    <NAME>bwSipStatsAckIns</NAME>
#    <NAME>bwSipStatsAckOuts</NAME>
#    <NAME>bwSipStatsByeIns</NAME>
#    <NAME>bwSipStatsByeOuts</NAME>
#    <NAME>bwSipStatsCancelIns</NAME>
#    <NAME>bwSipStatsCancelOuts</NAME>
#    <NAME>bwSipStatsOptionsIns</NAME>
#    <NAME>bwSipStatsOptionsOuts</NAME>
#    <NAME>bwSipStatsRegisterIns</NAME>
#    <NAME>bwSipStatsRegisterOuts</NAME>
#    <NAME>bwSipStatsInfoIns</NAME>
#    <NAME>bwSipStatsInfoOuts</NAME>
#    <NAME>bwSipStatsNotifyIns</NAME>
#    <NAME>bwSipStatsNotifyOuts</NAME>
#    <NAME>bwSipStatsPrackIns</NAME>
#    <NAME>bwSipStatsPrackOuts</NAME>
#    <NAME>bwSipStatsOtherIns</NAME>
#    <NAME>bwSipStatsOtherOuts</NAME>

# Graph 1 

$ds_name[1]  = "Total Transactions";
$opt[1] 	 = "--vertical-label \"transactions / sec\"  --title \"$hostname: Total Transactions\" ";

$def[1]  	 = "DEF:total_transactions=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] 	.= "AREA:total_transactions#ff004d:\"execution time \" ";
$def[1]     .= "LINE1:total_transactions#00ccff: ";
$def[1]     .= "GPRINT:total_transactions:LAST:\"last\:%8.0lf\" ";
$def[1]     .= "GPRINT:total_transactions:MAX:\"max\:%8.0lf\" ";
$def[1]     .= "GPRINT:total_transactions:AVERAGE:\"avg\:%8.0lf\" ";

# Graph 2

$ds_name[2]  = "Outgoing SIP Methods";
$opt[2]      = "--vertical-label \"methods / sec\"  --title \"$hostname: Outgoing SIP Methods\" ";

$def[2]      = "DEF:invite_out=$RRDFILE[3]:$DS[1]:MAX ";
$def[2]     .= "DEF:ack_out=$RRDFILE[5]:$DS[1]:MAX ";
$def[2]     .= "DEF:bye_out=$RRDFILE[7]:$DS[1]:MAX ";
$def[2]     .= "DEF:cancel_out=$RRDFILE[9]:$DS[1]:MAX ";
$def[2]     .= "DEF:options_out=$RRDFILE[11]:$DS[1]:MAX ";
$def[2]     .= "DEF:register_out=$RRDFILE[13]:$DS[1]:MAX ";
$def[2]     .= "DEF:info_out=$RRDFILE[15]:$DS[1]:MAX ";
$def[2]     .= "DEF:notify_out=$RRDFILE[17]:$DS[1]:MAX ";
$def[2]     .= "DEF:prack_out=$RRDFILE[19]:$DS[1]:MAX ";
$def[2]     .= "DEF:other_out=$RRDFILE[21]:$DS[1]:MAX ";

$def[2]     .= "AREA:other_out#9EEA34:\"OTHER\:    \" ";
$def[2]     .= "GPRINT:other_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:other_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:other_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:prack_out#00000F:\"PRACK\:    \" ";
$def[2]     .= "GPRINT:prack_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:prack_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:prack_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:notify_out#B300FF:\"NOTIFY\:   \" ";
$def[2]     .= "GPRINT:notify_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:notify_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:notify_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:info_out#FF3B3B:\"INFO\:     \" ";
$def[2]     .= "GPRINT:info_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:info_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:info_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:cancel_out#00CCFF:\"CANCEL\:   \" ";
$def[2]     .= "GPRINT:cancel_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:cancel_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:cancel_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:options_out#CCFF00:\"OPTIONS\:  \" ";
$def[2]     .= "GPRINT:options_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:options_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:options_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:bye_out#FF00CC:\"BYE\:      \" ";
$def[2]     .= "GPRINT:bye_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:bye_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:bye_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:ack_out#3400FF:\"ACK\:      \" ";
$def[2]     .= "GPRINT:ack_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:ack_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:ack_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:invite_out#00FF34:\"INVITE\:   \" ";
$def[2]     .= "GPRINT:invite_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:invite_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:invite_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[2]     .= "STACK:register_out#FF3300:\"REGISTER\: \" ";
$def[2]     .= "GPRINT:register_out:LAST:\"last\:%8.0lf\" ";
$def[2]     .= "GPRINT:register_out:MAX:\"max\:%8.0lf\" ";
$def[2]     .= "GPRINT:register_out:AVERAGE:\"avg\:%8.0lf\\n\" ";

# Graph 3

$ds_name[3]  = "Incoming SIP Methods";
$opt[3]      = "--vertical-label \"methods / sec\"  --title \"$hostname: Incoming SIP Methods\" ";

$def[3]      = "DEF:invite_in=$RRDFILE[1]:$DS[1]:MAX ";
$def[3]     .= "DEF:ack_in=$RRDFILE[4]:$DS[1]:MAX ";
$def[3]     .= "DEF:bye_in=$RRDFILE[6]:$DS[1]:MAX ";
$def[3]     .= "DEF:cancel_in=$RRDFILE[8]:$DS[1]:MAX ";
$def[3]     .= "DEF:options_in=$RRDFILE[10]:$DS[1]:MAX ";
$def[3]     .= "DEF:register_in=$RRDFILE[12]:$DS[1]:MAX ";
$def[3]     .= "DEF:info_in=$RRDFILE[14]:$DS[1]:MAX ";
$def[3]     .= "DEF:notify_in=$RRDFILE[16]:$DS[1]:MAX ";
$def[3]     .= "DEF:prack_in=$RRDFILE[18]:$DS[1]:MAX ";
$def[3]     .= "DEF:other_in=$RRDFILE[20]:$DS[1]:MAX ";

$def[3]     .= "AREA:other_in#9EEA34:\"OTHER\:    \" ";
$def[3]     .= "GPRINT:other_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:other_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:other_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:prack_in#00000F:\"PRACK\:    \" ";
$def[3]     .= "GPRINT:prack_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:prack_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:prack_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:notify_in#B300FF:\"NOTIFY\:   \" ";
$def[3]     .= "GPRINT:notify_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:notify_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:notify_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:info_in#FF3B3B:\"INFO\:     \" ";
$def[3]     .= "GPRINT:info_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:info_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:info_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:cancel_in#00CCFF:\"CANCEL\:   \" ";
$def[3]     .= "GPRINT:cancel_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:cancel_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:cancel_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:options_in#CCFF00:\"OPTIONS\:  \" ";
$def[3]     .= "GPRINT:options_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:options_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:options_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:bye_in#FF00CC:\"BYE\:      \" ";
$def[3]     .= "GPRINT:bye_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:bye_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:bye_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:ack_in#3400FF:\"ACK\:      \" ";
$def[3]     .= "GPRINT:ack_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:ack_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:ack_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:invite_in#00FF34:\"INVITE\:   \" ";
$def[3]     .= "GPRINT:invite_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:invite_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:invite_in:AVERAGE:\"avg\:%8.0lf\\n\" ";

$def[3]     .= "STACK:register_in#FF3300:\"REGISTER\: \" ";
$def[3]     .= "GPRINT:register_in:LAST:\"last\:%8.0lf\" ";
$def[3]     .= "GPRINT:register_in:MAX:\"max\:%8.0lf\" ";
$def[3]     .= "GPRINT:register_in:AVERAGE:\"avg\:%8.0lf\\n\" ";
