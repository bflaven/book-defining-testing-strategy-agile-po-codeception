# VERSION 8
# 
# 

Feature: codeception is installed
@codeception_install
Scenario: check the codeception
Given I have installed codeception:
Then I should see in file "codeception.yml"
"""
#actor: Tester
paths:
    tests: tests
    log: tests/_output
    data: tests/_data
    support: tests/_support
    envs: tests/_envs
actor_suffix: Tester
settings:
    colors: true
    memory_limit: 1024M
extensions:
    enabled:
        - Codeception\Extension\RunFailed
        - Codeception\Extension\GherkinParam
coverage:
    enabled: true
# codecept run --coverage --coverage-xml --coverage-html

# version 1
# load parameters from .env files (Laravel)
params:
    # load params from environment vars
    #- .env
    - .env.codeception.distrib 
# version 2
# load parameters from YAML file (Symfony)
# params:
  # load params from environment vars
    # - app/config/parameters.yml
"""

 
# Then i see in file "codeception.yml"
# """
# paths:
#     tests: tests
#     log: tests/_output
#     data: tests/_data
#     helpers: tests/_support
#     envs: tests/_envs
# """