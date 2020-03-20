    @echo off
: # This file is part of the book package: "Defining a test strategy for a P.O? 
: # Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
: # (c) Bruno Flaven <info@flaven.fr>
: # 
: # Intended to test a FRONTOFFICE and BACKOFFICE made with WP
: # Codeception - PHP Testing framework
: 
: # @package Codeception WordPress Testing 
: # @subpackage BACKOFFICE
: # @since Codeception 3.1.1, WordPress 5.2.3 
: #
    :::::::::::::::::::::::::::::::::::::::::::::
    ::                                         ::
    ::                                         ::
    ::      Launch Codeception PHP  Windows    ::
    ::                                         ::
    ::                                         ::
    ::                                         ::
    :: ======================================= ::
    ::                                         ::
    ::                                         ::
    ::                                         ::
    :::::::::::::::::::::::::::::::::::::::::::::

    :: copyright
 
    echo        === Run Codeception PHP on Windows ===
    echo        === version 1.0 ===
    echo.

    :: VALUES
 
    :: set your proper path    
    set my_path_cpjs="C:\Users\bflaven\Documents\test_codeception\"

    set dd=%date:~0,2%
    set mm=%date:~3,2%
    set yyyy=%date:~6,4%
 
 
    set hour=%time:~0,2%
    set min=%time:~3,2%
    set sec=%time:~6,2%
    set mmsec=%time:~9,2%

    title  === Run Codeception PHP on Windows ===
    Color 0A
    :: Debug if needed
    :: cd "C:\Users\bflaven\Documents\test_codeception\"
    :: dir  /b /a-d
    :: dir \*
    echo === BEGIN ===
    echo.
    echo.
    cd %my_path_cpjs%
    echo.
    echo === DEBUG %my_path_cpjs% ===
    echo.
    echo.
        
            :: script goes here    
            :: dir /b /a-d
            :: php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest


            :: extra infos if needed
            :: php --version
            :: php vendor/bin/codecept --version

            :: SCRIPTS
             php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest

            :: FEATURES
            :: php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature

    :: ############################################################# // PUT YOUR CODE HERE
 
    pause>nul
