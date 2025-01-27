#!/bin/sh
# tries to kill a running tudo container
/bin/bash $PWD/KILL.sh

# starts a new container
docker build -t insecure .
docker run -d -p 80:80 -t insecure
