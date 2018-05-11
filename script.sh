#!/bin/bash

#checking file

#file="/home/besh/frontend.v1.tgz"
 file1=$1
if [ -e "backend.$file1.tgz" ]
then echo "Tar fiel already exists"
scp /home/besh/packages/backend.$file1.tgz sam@192.168.5.3:/home/sam/deployment/backend
else
echo "$0: File '{$file1}' can not file"
tar zcvf backend.$file1.tgz /var/www/html
scp /home/besh/packages/backend.$file1.tgz sam@192.168.5.3:/home/sam/deployment/backend
fi
