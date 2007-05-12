#!/bin/bash
cat itids.list | while read line;
    do links2 -dump "http://172.16.1.20/register/singleForm.php?id=${line}" | lpr;
    done
