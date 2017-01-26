# Project 2 - Globitek Input/Output Sanitization

**Globitek CMS** description...

Time spent: **12** hours spent in total

## User Stories

The following **required** functionality is completed:

1. [x] Import the starting database.
2. [x] Set up the starting code.
3. [x] Staff CMS for users:
    * [x] index.php
        * Displays a list of all users in the database. The list includes the first name, last name and username of each user and is sorted by last name then first name.
        * There is a link labeled "Add a User" at the top of the page.
        * Each user row has two links labeled "Show" and "Edit" which link to the appropriate pages.
        * On the page is a link labeled "Back to Menu" which links to the main menu.
    * [x] show.php
        * Displays the user's full name, username, and email address.
        * On the page is a link labeled "Edit" which links to the appropriate page.
        * On the page is a link labeled "Back to List" which links to the list of users.
    * [x] new.php
        * Displays a form for adding a new user.
        * The form includes text inputs for first name, last name, username, and email address.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, the form will display again with current values filled in and errors listed.
        * If validations pass, a new user will be added to the table and redirect to the user's information page.
        * On the page is a link labeled "Back to List" which links to the list of users.
    * [x] edit.php
        * Displays a form for editing an existing user.
        * The form includes inputs for first name, last name, username, and email address.
        * The form is pre-populated with the user's current values.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, the form will display again with current values filled in and errors listed.
        * If validations pass, it will update the user's data in the table and redirect to the user's information page.
        * On the page is a link labeled "Cancel" which links to the user's information page.
4. [x] Staff CMS for salespeople:
    * [x] index.php
        * Displays a list of all salespeople in the database. The list includes the first name and last name of each salesperson and is sorted by last name then first name.
        * There is a link labeled "Add a Salesperson" at the top of the page.
        * Each salesperson row has two links labeled "Show" and "Edit" which link to the appropriate pages.
        * On the page is a link labeled "Back to Menu" which links to the main menu.
    * [x] show.php
        * Displays a salesperson's full name, phone, and email address.
        * On the page is a link labeled "Edit" which links to the appropriate page.
        * On the page is a link labeled "Back to List" which links to the list of salespeople.
    * [x] new.php
        * Displays a form for adding a new salesperson.
        * The form includes text inputs for first name, last name, phone, and email address.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, the form will display again with current values filled in and errors listed.
        * If validations pass, it will add a salesperson to the table and redirect to the salesperson's information page.
        * On the page is a link labeled "Back to List" which links to the list of salespeople.
    * [x] edit.php
        * Displays a form for editing an existing salesperson.
        * The form includes inputs for first name, last name, phone, and email address.
        * The form is pre-populated with the salesperson's current values.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, the form will display again with current values filled in and errors listed.
        * If validations pass, it will update the salesperson's data in the table and redirect to the salesperson's information page.
        * On the page is a link labeled "Cancel" which links to the salesperson's information page.
5. [x] Staff CMS for states:
    * [x] index.php
        * Displays a list of all states in the database. The list includes the name and code of each state and is sorted by name.
        * There is a link labeled "Add a State" at the top of the page.
        * Each state row has two links labeled "Show" and "Edit" which link to the appropriate pages.
        * On the page is a link labeled "Back to Menu" which links to the main menu.
    * [x] show.php
        * Displays a state's name, abbreviation code, and a list of the names of its territories. The territories list includes the territory name and is sorted by position.
        * Each territory name is a link to a page to view more information about the territory.
        * On the page is a link labeled "Edit" which links to the appropriate page.
        * On the page is a link labeled "Back to List" which links to the list of states.
        * Below the territory list is a link labeled "Add a Territory" which is a link to the form for adding a new territory.
    * [x] new.php
        * Displays a form for adding a new state.
        * The form includes text inputs for name and code.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, the form will display again with current values filled in and errors listed.
        * If validations pass, it will add a state to the table and redirect to the state's information page.
        * On the page is a link labeled "Back to List" which links to the list of states.
    * [x] edit.php
        * Displays a form for editing an existing state.
        * The form includes inputs for name and code.
        * The form is pre-populated with the state's current values.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, it will display the form again with errors listed.
        * If validations pass, it will update the state's data in the table and redirect to the state's information page.
        * On the page is a link labeled "Cancel" which links to the state's information page.
6. [x] Staff CMS for territories:
    * [x] index.php
        * Redirects all requests to the main menu.
    * [x] show.php
        * Displays a territory's name, state_id, position.
        * On the page is a link labeled "Edit" which links to the appropriate page.
        * On the page is a link labeled "Back to State Details" which links to the state's information page.
    * [x] new.php
        * Displays a form for adding a new territory to this state.
        * The form includes text inputs for name and position.
        * It does not have a state or state_id input. (The state ID should be present in form action URL and not in a form value.)
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, it will display the form again with errors listed.
        * If validations pass, it will add a territory to the table and redirect to the territory's information page. Important note: it should automatically assign the new territory to the current state.
        * On the page is a link labeled "Back to State Details" which links to the state's information page.
    * [x] edit.php
        * Displays a form for editing an existing territory.
        * The form includes inputs for name and position.
        * The form is pre-populated with the territory's current values.
        * It does not have an input for changing the territory's state assignment.
        * Submitting the form will validate the data. (See validation details below.)
        * If validations fail, it will display the form again with errors listed.
        * If validations pass, it will update the territory's data in the table and redirect to the territory's information page.
        * On the page is a link labeled "Cancel" which links to the territory's information page.
7. [x] Validations:
    * [x] Validate that no values are left blank.
    * [x] Validate that all string values are less than 255 characters long (because that is the maximum size for our SQL columns).
    * [x] Validate that usernames contain only the whitelisted characters: A-Z, a-z, 0-9, and _.
    * [x] Validate that phone numbers contain only the whitelisted characters: 0-9, spaces, and ()-.
    * [x] Validate that email addresses contain only whitelisted characters: A-Z, a-z, 0-9, and @._-.
    * [x] Add at least 5 other validations of your choosing:
        1. 
        2.
        3.
        4.
        5. 
8. [x] Sanitization:
    * [x] All input and dynamic output should be sanitized.
        * URLs
        * HTML
        * SQL
9. [x] Penetration Testing:
    * [x] Verify that all form text inputs are not vulnerable to SQLI attacks.
    * [x] Verify that all URL query strings are not vulnerable to SQLI attacks.
    * [x] Verify that all form text inputs are not vulnerable to XSS attacks.
    * [x] Verify that all URL query strings are not vulnerable to XSS attacks.

The following advanced user stories are optional:

10. [ ] **Bonus:** On "public/staff/territories/show.php", instead of displaying an integer value for territories.state_id, display the name of the state.
11. [ ] **Bonus:** Validate the uniqueness of users.username, both when a user is created and when a user is updated.
12. [ ] **Bonus:** Add a page for "public/staff/users/delete.php". Add a link to it from the user details page. The delete page will display the text: "Are you sure you want to permanently delete the user: ". If the user confirms it, delete the user record and redirect back to the users list.
13. [ ] **Bonus:** Add a Staff CMS for countries. Add pages for "list", "show", "new", and "edit", similar to the pages in the CMS area for states.
14. [ ] **Advanced:** Nest the CMS for states inside of the Staff CMS for countries. It should be nested in the same way in which territories are nested inside of states.

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/link/to/your/gif/file.gif' title='Video Walkthrough' alt='Video Walkthrough' />

GIF created with [SimpleScreenRecorder](http://www.maartenbaert.be/simplescreenrecorder/).

## Notes

In the starter code, there was an extra comma towards the end of a SQL statement for the function insert_user().  The comma was causing a SQL statement error and needed to be removed before continuing with the project.

In GET requests of show and edit pages, a condition needed to be added to check whether the value of id is present in the URL.  This was resolved by adding the condition to redirect to the index page if $_GET['id'] is blank or if $_GET['id'] is not set.

## License

    Copyright 2017 Brandon Chin

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
