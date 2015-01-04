#!/bin/bash

/bin/sed -i "/^contact@${name}/d" /etc/postfix/virtual

postmap /etc/postfix/virtual
/usr/bin/service postfix restart
