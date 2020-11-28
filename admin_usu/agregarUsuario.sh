#!/bin/bash

useradd -m -p $(openssl passwd -1 $1) -s $2 $3
