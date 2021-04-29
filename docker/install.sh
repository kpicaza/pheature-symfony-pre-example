#!/bin/bash

mkdir -p app
docker-compose build
docker-compose run php composer create-project antidot-fw/antidot-framework-starter app --prefer-dist  --no-interaction
sudo chown -R $USER:docker app
docker-compose up
