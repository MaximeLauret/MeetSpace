#!/bin/bash

projet=$1

sed -i "/^${projet}/d" /etc/postfix/virtual

postmap /etc/postfix/virtual
service postfix restart