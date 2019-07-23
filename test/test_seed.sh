#!/bin/bash

length=$1
seed_name=$2
content=$3

for (( i=0; i<=$length; i++))
do
    echo "$content" > "./seeds/${seed_name}_${i}.txt";
done;
