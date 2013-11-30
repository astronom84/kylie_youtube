#!/bin/sh

WORKPATH="$HOME/YOUTUBE/"
URLLIST=$WORKPATH"v.txt"
BADURL=$WORKPATH'v_error.txt'
LASTURL=$WORKPATH'v_last_url.txt'
SAVEPATH=$WORKPATH"1-1500"

cd $SAVEPATH

cat $URLLIST | while read url
do
	echo $url > $LASTURL
	youtube-dl -l "$url"
	exitcode=$?
	if [ $exitcode -ne 0 ]; then
			echo "# $url" >> $BADURL

    fi
	echo "exitcode= $exitcode"
done
exit 0;
