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
                '#FF0009',
                '#5600FF',
                '#00FF99',
                '#BF0000',
                '#0000FF',
                '#00FFFF',
                '#9EEA34',
                '#B300FF',
                '#FF3B3B',
                '#00CCFF',
                '#FF00CC',
                '#00FF34',
                '#005689',
                '#FF895D',
                '#FF3300',
                '#57D1C9',
                '#ED5485',
                '#007CB9',
                '#FFFBCB',
                '#D5EEFF',
                '#B1F1B2',
                '#F23557',
                '#22B2DA',
                '#FFE869',
                '#1E757B',
                '#1E757B',
                '#1E757B');

# Graph 1 Lets graph Total Transactions
$ds_name[1]	 = "Media Server Ports";
$opt[1]  	 = "--vertical-label \"responses / sec\"  --title \"$hostname: Media Port Usage\" ";

$def[1]  	 = "DEF:total_port_usage=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] 	.= "DEF:g729_port_usage=$RRDFILE[2]:$DS[1]:MAX ";
$def[1] 	.= "DEF:g729_port_limit=$RRDFILE[3]:$DS[1]:MAX ";

$def[1] 	.= "AREA:total_port_usage$colors[5]:\"Total Port Usage\:\" ";
$def[1] 	.= "GPRINT:total_port_usage:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:total_port_usage:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:total_port_usage:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1]     .= "AREA:g729_port_usage$colors[7]:\"G729 Port Usage \:\" ";
$def[1]     .= "GPRINT:g729_port_usage:LAST:\"last\:%4.0lf\" ";
$def[1]     .= "GPRINT:g729_port_usage:MAX:\"max\:%4.0lf\" ";
$def[1]     .= "GPRINT:g729_port_usage:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1]     .= "LINE:g729_port_limit$colors[0]:\"G729 Lic Limit  \:\" ";
$def[1]     .= "GPRINT:g729_port_limit:LAST:\"last\:%4.0lf\" ";
$def[1]     .= "GPRINT:g729_port_limit:MAX:\"max\:%4.0lf\" ";
$def[1]     .= "GPRINT:g729_port_limit:AVERAGE:\"avg\:%4.0lf\\n\" ";
