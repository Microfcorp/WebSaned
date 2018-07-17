#!/bin/bash
cd $1;
count1=$(ls | xargs -n1 | grep ".jpeg$" | wc -l);
cd $2;
count2=$(ls | xargs -n1 | grep ".jpeg$" | wc -l);
res=$((count1 + count2 - 1))
echo $res;