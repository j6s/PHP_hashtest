PHP_hashtest
============

PHP has a bunch of built in hash functions. for many md5 is the go to function.

However, for non-cryptographic uses there are hashes faster than md5. With this repository you can test them yourself.

## Se results

Here is a static HTML page of what a result may look like: [http://link.thephpjo.de/hash/](http://link.thephpjo.de/hash/)

## How to test them

1. Download the repository
2. go into testFiles and execute ./creatFiles.sh (sorry windowsuser _[not really]_)
3. Be sure, that your memory limit in your php.ini is high enough
4. Execute

## Results you may have

Of course the results vary from run to run, but it comes down to this:

For most cases you will be fine using crc32, it is the fastest.

If you have larger files (we are talking 10-100MB) you may consider using crc32b (also you may consider not hashing that big files in PHP)
