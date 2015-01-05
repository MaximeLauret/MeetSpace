#!/bin/bash

/bin/sed -i "/^contact@${name}/d" /etc/postfix/virtual

/usr/sbin/postmap /etc/postfix/virtual
/usr/bin/service postfix restart
