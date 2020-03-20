#!/bin/bash
# This file is part of the book package: "Defining a test strategy for a P.O? 
# Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
# (c) Bruno Flaven <info@flaven.fr>
# 
# Intended to test a FRONTOFFICE and BACKOFFICE made with WP
#
# @package Codeception WordPress Testing 
# @subpackage BACKOFFICE
# @since Codeception 3.1.1, WordPress 5.2.3 
#

# #### USAGE
# cd /Volumes/mi_disco/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/
# sh launch_php_cp_good.sh
# chmod +x on a file (your script) only means, that you'll make it executable.
# chmod +x launch_php_cp_good.sh

### CONFIG ####




SCRIPT_VERB="run";
#SCRIPT_FILE="--steps frontoffice CheckWpFrontCest";
SCRIPT_FILE="--steps gherkin BackofficeLoginAdminAdvanced_1.feature";

# Other commands in comment
# php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest
# php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature

### ---  SCRIPT --- ###

### CONFIG ####
echo "\n"
echo "\033[1;33m ### START ### \033[0m"
echo "\n"


#SHOW
# echo "npx codeceptjs run --features  --steps"
echo "php vendor/bin/codecept "$SCRIPT_VERB" "$SCRIPT_FILE""
echo "\n"



### ---  EXECUTE --- ###
php vendor/bin/codecept $SCRIPT_VERB $SCRIPT_FILE



### ---  DONE --- ###
echo "\n\n"
echo "\033[1;33m ### END It is DONE !!! ### \033[0m"
echo "\n\n"
exit 0;
