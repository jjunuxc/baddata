#!/bin/sh
docker kill $(docker ps|grep insecure|awk '{split($0,a," "); print a[1]}')
