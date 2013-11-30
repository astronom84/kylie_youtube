#!/bin/bash

INPUTFILE=$1
OUTPUTFILE=$2
NSTR=0;

DIALOG=${DIALOG=dialog}

cat $INPUTFILE | while read line
do
  NSTR=`expr $NSTR + 1`



$DIALOG --title "Строка № $NSTR" --clear \
        --yesno "$line" 50 200

case $? in
    0)
        echo $line >> $OUTPUTFILE;;
    1)   continue;;
    255) exit;;
        
esac
sed -i -e  '1d' $INPUTFILE 
done

