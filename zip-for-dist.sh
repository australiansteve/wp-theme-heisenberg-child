#!/bin/bash

echo "Enter version number"
read version

npm run build

zip heisenberg-child-$version.zip acf-json/* dist/* fonts/* page-templates/**/* page-templates/* src/* *.php *.css *.png