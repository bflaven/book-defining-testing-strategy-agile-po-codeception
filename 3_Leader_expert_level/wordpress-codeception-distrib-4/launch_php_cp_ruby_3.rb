
#!/usr/bin/env ruby
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
# ruby launch_php_cp_ruby_3.rb

# Set the correct values for your path and script
#VALUES
my_path='/Volumes/mi_disco/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/'
my_script='launch_php_cp_good.sh'
my_test='php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature'

# Other commands in comment
# php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest
# php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature





print("\n--- Basic Automation with Ruby for Codeception PHP ---\n")
print("--- Ruby version #{ RUBY_VERSION } p#{ RUBY_PATCHLEVEL} ---\n\n")


#EXECUTE
# system("cd #{my_path}")
# system("sh #{my_script}")
system("#{my_test}")


# puts %x{cd #{my_path}}
#puts %x{sh #{my_script}}
# puts %x{#{my_test}}