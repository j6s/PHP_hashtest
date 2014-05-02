#!/bin/bash

echo "\n\n lean back, this will take some time (about 2minutes)";
echo "-----------------------\n";
rm -v *.txt

#tiny file (1kb)
dd if=/dev/urandom of=tiny.txt bs=1k count=1

#small file (100kb)
dd if=/dev/urandom of=small.txt bs=1k count=100

#mid files (3mb)
dd if=/dev/urandom of=mid.txt bs=1m count=3

# larger files (10mb)
dd if=/dev/urandom of=large.txt bs=1m count=10

# pretty large file (100mb)
dd if=/dev/urandom of=larger.txt bs=1m count=100

# well, i guess you know by now
#dd if=/dev/urandom of=gigantic.txt bs=1g count=1