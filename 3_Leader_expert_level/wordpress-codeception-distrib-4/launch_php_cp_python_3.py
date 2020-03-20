#!/usr/bin/env python3
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


# USAGE
# python launch_php_cp_python_3.py

# Set the correct values for your path and script
#VALUES
my_path='/Volumes/mi_disco/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/'
my_script='launch_php_cp_good.sh'
my_test='php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature'

# Other commands in comment
# php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest
# php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature




print("\n--- Basic Automation with Python for Codeception PHP ---\n")
import sys
print("--- Python version "+sys.version+" ---\n")

#EXECUTE
import os 
os.system("cd " + my_path)
# os.system("sh " + my_script)
os.system("" + my_test)



