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

# 100 180 181 182 183
# 200 
# 300 301 301 305 380
# 400 401 402 403 404 405 406 407 408409 410 411 412 413 414
# 415 420 433 480 481 482 483 484 485 486 487 488 491
# 500 501 502 503 504 505 513
# 600 603 604 606

# Graph 1 Lets graph Total Transactions
$ds_name[1]	 = "Reponses Invite In";
$opt[1]  	 = "--vertical-label \"responses / sec\"  --title \"$hostname: Recieved Responses (INV)\" ";

$def[1]  	 = "DEF:100_in=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] 	.= "DEF:180_in=$RRDFILE[3]:$DS[1]:MAX ";
$def[1] 	.= "DEF:181_in=$RRDFILE[5]:$DS[1]:MAX ";
$def[1] 	.= "DEF:183_in=$RRDFILE[9]:$DS[1]:MAX ";
$def[1] 	.= "DEF:200_in=$RRDFILE[11]:$DS[1]:MAX ";
$def[1] 	.= "DEF:302_in=$RRDFILE[17]:$DS[1]:MAX ";
$def[1] 	.= "DEF:400_in=$RRDFILE[23]:$DS[1]:MAX ";
$def[1] 	.= "DEF:403_in=$RRDFILE[29]:$DS[1]:MAX ";
$def[1] 	.= "DEF:404_in=$RRDFILE[31]:$DS[1]:MAX ";
$def[1] 	.= "DEF:408_in=$RRDFILE[39]:$DS[1]:MAX ";
$def[1] 	.= "DEF:420_in=$RRDFILE[55]:$DS[1]:MAX ";
$def[1] 	.= "DEF:480_in=$RRDFILE[57]:$DS[1]:MAX ";
$def[1] 	.= "DEF:481_in=$RRDFILE[59]:$DS[1]:MAX ";
$def[1] 	.= "DEF:482_in=$RRDFILE[61]:$DS[1]:MAX ";
$def[1] 	.= "DEF:483_in=$RRDFILE[63]:$DS[1]:MAX ";
$def[1] 	.= "DEF:484_in=$RRDFILE[65]:$DS[1]:MAX ";
$def[1] 	.= "DEF:486_in=$RRDFILE[69]:$DS[1]:MAX ";
$def[1] 	.= "DEF:487_in=$RRDFILE[71]:$DS[1]:MAX ";
$def[1] 	.= "DEF:488_in=$RRDFILE[73]:$DS[1]:MAX ";
$def[1] 	.= "DEF:491_in=$RRDFILE[75]:$DS[1]:MAX ";
$def[1] 	.= "DEF:500_in=$RRDFILE[77]:$DS[1]:MAX ";
$def[1] 	.= "DEF:501_in=$RRDFILE[79]:$DS[1]:MAX ";
$def[1] 	.= "DEF:502_in=$RRDFILE[81]:$DS[1]:MAX ";
$def[1] 	.= "DEF:503_in=$RRDFILE[83]:$DS[1]:MAX ";
$def[1] 	.= "DEF:600_in=$RRDFILE[91]:$DS[1]:MAX ";
$def[1] 	.= "DEF:603_in=$RRDFILE[93]:$DS[1]:MAX ";
$def[1] 	.= "DEF:604_in=$RRDFILE[95]:$DS[1]:MAX ";
$def[1] 	.= "DEF:606_in=$RRDFILE[97]:$DS[1]:MAX ";

$def[1] 	.= "AREA:100_in$colors[0]:\"100\:\" ";
$def[1] 	.= "GPRINT:100_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:100_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:100_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:180_in$colors[1]:\"180\:\" ";
$def[1] 	.= "GPRINT:180_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:180_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:180_in:AVERAGE:\"avg\:%4.0lf\\n\" ";


$def[1] 	.= "STACK:181_in$colors[2]:\"181\:\" ";
$def[1] 	.= "GPRINT:181_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:181_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:181_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:183_in$colors[3]:\"183\:\" ";
$def[1] 	.= "GPRINT:183_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:183_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:183_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:200_in$colors[4]:\"200\:\" ";
$def[1] 	.= "GPRINT:200_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:200_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:200_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:302_in$colors[5]:\"302\:\" ";
$def[1] 	.= "GPRINT:302_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:302_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:302_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:400_in$colors[6]:\"400\:\" ";
$def[1] 	.= "GPRINT:400_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:400_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:400_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:403_in$colors[7]:\"403\:\" ";
$def[1] 	.= "GPRINT:403_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:403_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:403_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:404_in$colors[8]:\"404\:\" ";
$def[1] 	.= "GPRINT:404_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:404_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:404_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:408_in$colors[9]:\"408\:\" ";
$def[1] 	.= "GPRINT:408_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:408_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:408_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:420_in$colors[10]:\"420\:\" ";
$def[1] 	.= "GPRINT:420_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:420_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:420_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:480_in$colors[11]:\"480\:\" ";
$def[1] 	.= "GPRINT:480_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:480_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:480_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:481_in$colors[12]:\"481\:\" ";
$def[1] 	.= "GPRINT:481_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:481_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:481_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:482_in$colors[13]:\"482\:\" ";
$def[1] 	.= "GPRINT:482_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:482_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:482_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:483_in$colors[14]:\"483\:\" ";
$def[1] 	.= "GPRINT:483_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:483_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:483_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:484_in$colors[15]:\"484\:\" ";
$def[1] 	.= "GPRINT:484_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:484_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:484_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:486_in$colors[16]:\"486\:\" ";
$def[1] 	.= "GPRINT:486_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:486_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:486_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:487_in$colors[17]:\"487\:\" ";
$def[1] 	.= "GPRINT:487_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:487_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:487_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:488_in$colors[18]:\"488\:\" ";
$def[1] 	.= "GPRINT:488_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:488_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:488_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:491_in$colors[19]:\"491\:\" ";
$def[1] 	.= "GPRINT:491_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:491_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:491_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:500_in$colors[20]:\"500\:\" ";
$def[1] 	.= "GPRINT:500_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:500_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:500_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:501_in$colors[21]:\"501\:\" ";
$def[1] 	.= "GPRINT:501_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:501_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:501_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:502_in$colors[22]:\"502\:\" ";
$def[1] 	.= "GPRINT:502_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:502_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:502_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:503_in$colors[23]:\"503\:\" ";
$def[1] 	.= "GPRINT:503_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:503_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:503_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:600_in$colors[24]:\"600\:\" ";
$def[1] 	.= "GPRINT:600_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:600_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:600_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:603_in$colors[25]:\"603\:\" ";
$def[1] 	.= "GPRINT:603_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:603_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:603_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[1] 	.= "STACK:604_in$colors[26]:\"604\:\" ";
$def[1] 	.= "GPRINT:604_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:604_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:604_in:AVERAGE:\"avg\:%4.0lf\" ";

$def[1] 	.= "STACK:606_in$colors[27]:\"606\:\" ";
$def[1] 	.= "GPRINT:606_in:LAST:\"last\:%4.0lf\" ";
$def[1] 	.= "GPRINT:606_in:MAX:\"max\:%4.0lf\" ";
$def[1] 	.= "GPRINT:606_in:AVERAGE:\"avg\:%4.0lf\\n\" ";

# Graph 2

$ds_name[2]	 = "Reponses Invite Out";
$opt[2] 	 = "--vertical-label \"responses / sec\"  --title \"$hostname: Sent Responses (INV)\" ";

$def[2]  	 = "DEF:100_out=$RRDFILE[2]:$DS[1]:MAX ";
$def[2]     .= "DEF:180_out=$RRDFILE[4]:$DS[1]:MAX ";
$def[2]     .= "DEF:181_out=$RRDFILE[6]:$DS[1]:MAX ";
$def[2]     .= "DEF:183_out=$RRDFILE[10]:$DS[1]:MAX ";
$def[2]     .= "DEF:200_out=$RRDFILE[12]:$DS[1]:MAX ";
$def[2]     .= "DEF:302_out=$RRDFILE[18]:$DS[1]:MAX ";
$def[2]     .= "DEF:400_out=$RRDFILE[24]:$DS[1]:MAX ";
$def[2]     .= "DEF:403_out=$RRDFILE[30]:$DS[1]:MAX ";
$def[2]     .= "DEF:404_out=$RRDFILE[32]:$DS[1]:MAX ";
$def[2]     .= "DEF:408_out=$RRDFILE[40]:$DS[1]:MAX ";
$def[2]     .= "DEF:420_out=$RRDFILE[56]:$DS[1]:MAX ";
$def[2]     .= "DEF:480_out=$RRDFILE[58]:$DS[1]:MAX ";
$def[2]     .= "DEF:481_out=$RRDFILE[60]:$DS[1]:MAX ";
$def[2]     .= "DEF:482_out=$RRDFILE[62]:$DS[1]:MAX ";
$def[2]     .= "DEF:483_out=$RRDFILE[64]:$DS[1]:MAX ";
$def[2]     .= "DEF:484_out=$RRDFILE[66]:$DS[1]:MAX ";
$def[2]     .= "DEF:486_out=$RRDFILE[70]:$DS[1]:MAX ";
$def[2]     .= "DEF:487_out=$RRDFILE[72]:$DS[1]:MAX ";
$def[2]     .= "DEF:488_out=$RRDFILE[74]:$DS[1]:MAX ";
$def[2]     .= "DEF:491_out=$RRDFILE[76]:$DS[1]:MAX ";
$def[2]     .= "DEF:500_out=$RRDFILE[78]:$DS[1]:MAX ";
$def[2]     .= "DEF:501_out=$RRDFILE[80]:$DS[1]:MAX ";
$def[2]     .= "DEF:502_out=$RRDFILE[82]:$DS[1]:MAX ";
$def[2]     .= "DEF:503_out=$RRDFILE[84]:$DS[1]:MAX ";
$def[2]     .= "DEF:600_out=$RRDFILE[92]:$DS[1]:MAX ";
$def[2]     .= "DEF:603_out=$RRDFILE[94]:$DS[1]:MAX ";
$def[2]     .= "DEF:604_out=$RRDFILE[96]:$DS[1]:MAX ";
$def[2]     .= "DEF:606_out=$RRDFILE[98]:$DS[1]:MAX ";

$def[2]     .= "AREA:100_out$colors[0]:\"100\:\" ";
$def[2]     .= "GPRINT:100_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:100_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:100_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:180_out$colors[1]:\"180\:\" ";
$def[2]     .= "GPRINT:180_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:180_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:180_out:AVERAGE:\"avg\:%4.0lf\\n\" ";


$def[2]     .= "STACK:181_out$colors[2]:\"181\:\" ";
$def[2]     .= "GPRINT:181_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:181_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:181_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:183_out$colors[3]:\"183\:\" ";
$def[2]     .= "GPRINT:183_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:183_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:183_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:200_out$colors[4]:\"200\:\" ";
$def[2]     .= "GPRINT:200_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:200_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:200_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:302_out$colors[5]:\"302\:\" ";
$def[2]     .= "GPRINT:302_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:302_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:302_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:400_out$colors[6]:\"400\:\" ";
$def[2]     .= "GPRINT:400_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:400_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:400_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:403_out$colors[7]:\"403\:\" ";
$def[2]     .= "GPRINT:403_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:403_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:403_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:404_out$colors[8]:\"404\:\" ";
$def[2]     .= "GPRINT:404_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:404_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:404_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:408_out$colors[9]:\"408\:\" ";
$def[2]     .= "GPRINT:408_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:408_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:408_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:420_out$colors[10]:\"420\:\" ";
$def[2]     .= "GPRINT:420_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:420_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:420_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:480_out$colors[11]:\"480\:\" ";
$def[2]     .= "GPRINT:480_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:480_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:480_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:481_out$colors[12]:\"481\:\" ";
$def[2]     .= "GPRINT:481_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:481_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:481_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:482_out$colors[13]:\"482\:\" ";
$def[2]     .= "GPRINT:482_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:482_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:482_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:483_out$colors[14]:\"483\:\" ";
$def[2]     .= "GPRINT:483_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:483_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:483_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:484_out$colors[15]:\"484\:\" ";
$def[2]     .= "GPRINT:484_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:484_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:484_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:486_out$colors[16]:\"486\:\" ";
$def[2]     .= "GPRINT:486_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:486_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:486_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:487_out$colors[17]:\"487\:\" ";
$def[2]     .= "GPRINT:487_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:487_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:487_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:488_out$colors[18]:\"488\:\" ";
$def[2]     .= "GPRINT:488_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:488_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:488_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:491_out$colors[19]:\"491\:\" ";
$def[2]     .= "GPRINT:491_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:491_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:491_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:500_out$colors[20]:\"500\:\" ";
$def[2]     .= "GPRINT:500_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:500_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:500_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:501_out$colors[21]:\"501\:\" ";
$def[2]     .= "GPRINT:501_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:501_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:501_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:502_out$colors[22]:\"502\:\" ";
$def[2]     .= "GPRINT:502_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:502_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:502_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:503_out$colors[23]:\"503\:\" ";
$def[2]     .= "GPRINT:503_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:503_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:503_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:600_out$colors[24]:\"600\:\" ";
$def[2]     .= "GPRINT:600_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:600_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:600_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:603_out$colors[25]:\"603\:\" ";
$def[2]     .= "GPRINT:603_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:603_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:603_out:AVERAGE:\"avg\:%4.0lf\\n\" ";

$def[2]     .= "STACK:604_out$colors[26]:\"604\:\" ";
$def[2]     .= "GPRINT:604_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:604_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:604_out:AVERAGE:\"avg\:%4.0lf\" ";

$def[2]     .= "STACK:606_out$colors[27]:\"606\:\" ";
$def[2]     .= "GPRINT:606_out:LAST:\"last\:%4.0lf\" ";
$def[2]     .= "GPRINT:606_out:MAX:\"max\:%4.0lf\" ";
$def[2]     .= "GPRINT:606_out:AVERAGE:\"avg\:%4.0lf\\n\" ";
