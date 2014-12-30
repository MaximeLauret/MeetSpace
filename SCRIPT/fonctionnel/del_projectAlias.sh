#!/bin/bash

	sed -i "/^contact@${name}/d" /etc/postfix/virtual

	postmap /etc/postfix/virtual
	service postfix restart
