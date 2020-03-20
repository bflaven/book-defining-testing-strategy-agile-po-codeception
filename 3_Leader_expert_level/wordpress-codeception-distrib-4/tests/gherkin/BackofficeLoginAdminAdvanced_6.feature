# VERSION 7
Feature: the homepage displays a list of the latest posts
@homepage
Scenario: the homepage will show the latest posts
Given I have posts in database:
# | post_title | post_content             | post_type | 
# | Post 1     | We all love WordPress 1. | post      | 
# | Post 2     | We all love WordPress 2. | post      | 
# | Post 3     | We all love WordPress 3. | post      | 

#V1
# | post_title | post_date           | post_date_gmt       | post_modified       | post_modified_gmt   | post_content             |post_excerpt             |to_ping             |pinged             |post_content_filtered             | post_type | 
# | Post 1     | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | We all love WordPress 1. | Fake post_excerpt for Hello world Post!!! | | |  | post      | 

#V2
# | post_title | post_date           | post_date_gmt       | post_modified       | post_modified_gmt   | post_content             | post_excerpt                              | to_ping | pinged | post_content_filtered | 
# | Post 1     | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | We all love WordPress 1. | Fake post_excerpt for Hello world Post!!! |         |        |                       | 

#V3
| post_title | post_date           | post_date_gmt       | post_modified       | post_modified_gmt   | post_content             | post_excerpt                              | to_ping | pinged | post_content_filtered | 
| Post 1     | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | We all love WordPress 1. | Fake post_excerpt for Hello world Post!!! ||||
| Post 2     | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | We all love WordPress 2. | Fake post_excerpt for Hello world Post!!! ||||
| Post 3     | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | We all love WordPress 3. | Fake post_excerpt for Hello world Post!!! ||||
| Post 4     | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | 2019-09-03 04:19:24 | We all love WordPress 4. | Fake post_excerpt for Hello world Post!!! ||||
When I am on page "/"
# caution you must have a post-62 on the HP
Then I see number of elements "#post-515" and expected "1"


# @overriding
# Scenario: I can view the post list
#    When I go to "/wp-admin/"
#     And the admin menu should appear as
#     | NAME       | 
#     | Dashboard  | 
#     | Posts      | 
#     | Media      | 
#     | Pages      | 
#     | Comments   | 
#     | Appearance | 
#     | Plugins    | 
#     | Users      | 
#     | Tools      | 
#     | Settings   | 

# @overriding
#   Scenario: I can view the post list
#      When I go to "/wp-admin/"
#      And the admin menu should appear as
#       | Dashboard  | 
#       | Posts      | 
#       | Media      | 
#       | Pages      | 
#       | Comments   | 
#       | Appearance | 
#       | Plugins    | 
#       | Users      | 
#       | Tools      | 
#       | Settings   | 
#       
#       
#       



