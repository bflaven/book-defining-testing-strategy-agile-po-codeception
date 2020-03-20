# BackofficeLoginAdminWritePost.feature
Feature: You can write and read blogs
In order to write and read blogs
As a valid user of the platform
I need to manage all my blog posts

  Background: 
    Given I have a vanilla wordpress installation
      | blogname            | email             | username | password | 
      | codecept_test_site | admin@test.com | admin    | admin    | 
      And there are users
      | user_login | user_pass | user_nicename | user_email        | role          | 
      | admin      | admin     | admin         | admin@test.com | administrator | 
      And I am on "/wp-login.php"
      And I fill in "#user_login" with "admin"
      And I fill in "#user_pass" with "admin"
      And I press "#wp-submit"
      And I am on "/wp-admin/"
      # And I am logged in as "admin" with password "admin"


  # NOPE
  Scenario: I can publish a new blog post
     When I am on "/wp-admin/post-new.php"
      And I fill in "post_title" with "A blog post"
      And I fill in "content" with "The post content"
      And I press "Publish"
      # mean click on #wp-admin-bar-view-site > a
      And I follow "Visit Site"
     Then I should see "A blog post" 
  
  
