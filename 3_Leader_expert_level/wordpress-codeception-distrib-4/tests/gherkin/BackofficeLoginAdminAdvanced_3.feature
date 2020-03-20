# BackofficeLoginAdminAdvanced_2.feature
Feature: You can write and read blogs
In order to write and read blogs
As a valid user of the platform
I need to manage all my blog posts

  Background: 
    Given I have a vanilla wordpress installation
      | blogname            | email             | username | password | 
      | codecept_test_site  | admin@test.com    | admin    | admin    | 
      And there are users
      | user_login | user_pass | user_nicename | user_email        | role          | 
      | admin      | admin     | admin         | admin@test.com | administrator | 
      And I am on "/wp-login.php"
      And I fill in "#user_login" with "admin"
      And I fill in "#user_pass" with "admin"
      And I press "#wp-submit"
      And I am on "/wp-admin/"


  Scenario: I can view the post list
    When I go to "/wp-admin/index.php"
    And the admin menu should appear as
      | Dashboard  |
      | Posts      |
      | Media      |
      | Pages      |
      | Comments   |
      | Appearance |
      | Plugins    |
      | Users      |
      | Tools      |
      | Settings   |

