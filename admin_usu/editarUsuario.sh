#!/bin/bash

usermod -l $1 $2 -p $(openssl passwd -1 $3) -d /home/$1 -m
