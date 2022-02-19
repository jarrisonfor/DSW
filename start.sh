#! /bin/bash

cd /workspace/DSW/UT5.1/
pm2 start server.js --name "UT5.1"

cd /workspace/DSW/UT5.2/
pm2 start index.js --name "UT5.2"