#!/usr/bin/python
# -*- encoding: utf-8; py-indent-offset: 4 -*-
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2016             mk@mathias-kettner.de |
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

# This check will not run on sippy but any other host he service will 
# be piggybacked
#
# Author Trevor Steyn <trevor@webon.co.za>

import os
os.environ["PYTHONHTTPSVERIFY"] = "0"
import xmlrpclib

HOST='somehost'

CFG_API_USER        = 'APIUSER'
CFG_API_PASS        = 'APIPASS'
CFG_API_URL         = 'https://127.0.0.1/xmlapi/xmlapi'

CFG_PERC_LIMIT      = 90


# Fix for http digest auth

class HTTPSDigestTransport(xmlrpclib.SafeTransport):
    """
    Transport that uses urllib2 so that we can do Digest authentication.
    
    Based upon code at http://bytes.com/topic/python/answers/509382-solution-xml-rpc-over-proxy
    """

    def __init__(self, username, pw, realm, verbose = None, use_datetime=0):
        self.__username = username
        self.__pw = pw
        self.__realm = realm
        self.verbose = verbose
        self._use_datetime = use_datetime

    def request(self, host, handler, request_body, verbose):
        import urllib2

        url = 'https://'+host+handler
        if verbose or self.verbose:
            print "ProxyTransport URL: [%s]"%url

        request = urllib2.Request(url)
        request.add_data(request_body)
        # Note: 'Host' and 'Content-Length' are added automatically
        request.add_header("User-Agent", self.user_agent)
        request.add_header("Content-Type", "text/xml") # Important

        # setup digest authentication
        authhandler = urllib2.HTTPDigestAuthHandler()
        authhandler.add_password(self.__realm, url, self.__username, self.__pw)
        opener = urllib2.build_opener(authhandler)

        # proxy_handler = urllib2.ProxyHandler()
        # opener = urllib2.build_opener(proxy_handler)
        f = opener.open(request)
        return(self.parse_response(f))

# Main here

digestTransport = HTTPSDigestTransport(CFG_API_USER, CFG_API_PASS, "XML API")
server_root = xmlrpclib.ServerProxy(CFG_API_URL, transport=digestTransport)

accounts_warning = []

try:
    account_list = server_root.listAccounts()
except xmlrpclib.Fault as err:
    print 'unable to retrieve accounts : %s' %err

try:
    customer_list = server_root.listCustomers()
except xmlrpclib.Fault as err:
    print 'unable to retrieve customers : %s' %err


for accounts in account_list['accounts']:
    if ( accounts['blocked'] is False and int(accounts['balance']) != 0 and accounts['balance'] < 0  ):
        percentage = float(abs(accounts['balance'])/accounts['credit_limit']*100)
        if percentage >= CFG_PERC_LIMIT:
            accounts_warning.append(accounts['username'])

for customers in customer_list['customers']:
    if ( int(customers['balance']) != 0 and customers['balance'] < 0  ):
        percentage = float(abs(customers['balance'])/customers['credit_limit']*100)
        if percentage >= CFG_PERC_LIMIT:
            accounts_warning.append(customers['name'])


print '<<<<' + HOST + '>>>>'
if not accounts_warning:
    print '0 Credit_Limits - OK -  No Accounts Affected'
else:
    print '2 Credit_Limits - Critical - %s Accounts above %s%% threshold' %(accounts_warning, CFG_PERC_LIMIT)
