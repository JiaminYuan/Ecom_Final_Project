Feature: login and logout
  In order to access the bakery
  As a user and a seller
  I need an account and using valid info to log in

  Scenario: try login with "incorrect info"
    Given I am on Login Page
    When I enter "incorrect info" in input
    And I click login
    Then I should see "alert box" on Login warning "I can not log in with incorrect info"

  Scenario: try login with "correct info"
    Given I am on Login Page
    When I enter "correct info" in input
    And I click login
    Then I should redirect to Shop All with a message "I have log in succesfully"