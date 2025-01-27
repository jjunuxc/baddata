#!/bin/sh
docker kill $(docker ps|grep baddata|awk '{split($0,a," "); print a[1]}')
