# Project 1 - Globitek CMS

**Globitek CMS** contains a user table which stores the information of all registered users. PHP is used to process and validate the values submitted by each user through an HTML form.

Submitted by: **Brandon Chin**

Time spent: **4** hours spent in total

## User Stories

The following **required** functionality is completed:

1. [x] Create a Users table.
  * Use the command line to connect to the database "globitek".
  * Define a table "users" with columns for:
    * id, first_name, last_name, email, username, created_at
  * Do not forget to use AUTO_INCREMENT.
  * Column users.created_at will be of type DATETIME.
2. [x] Create a page with an HTML form.
  * In the project "globitek", locate the "public/register.php" page.
  * Add an HTML form
    * with text inputs: first_name, last_name, email, username
    * submits to itself ("public/register.php")
3. [x] Detect when the form is submitted.
  * If "public/register.php" is loaded directly, it should display the form.
  * If thew form was submitted, it should retrieve the form data.
4. [x] Validate form data.
  * Use the file "private/validation_functions.php" as a library for the validation functions you use.
  * Validate the presence of all form values.
  * Validate that no values are longer than 255 characters.
  * Validate that first_name and last_name have at least 2 characters.
  * Validate that username has at least 8 characters.
  * Validate that email contains a "@".
5. [x] Display form errors if any validations fail.
  * Do not submit the data to the database.
  * Redisplay the form with the submitted values filled in.
  * Report all errors as a list above the form.
  * Test each field to ensure you get the expected errors.
6. [x] Submit successfully-validated form values to the database.
  * Write an SQL statement which will insert a new record into the globitek.users table using the submitted form values.
  * Do not forget to add the current date and time to "created_at".
  * Follow best practices regarding the query result and database connection.
  * Use the command line to connect to the database and check the records.
7. [x] Redirect the user to a confirmation page.
  * Locate the page "public/registration_success.php".
  * Redirect the user to the new page.
8. [x] Sanitize all dynamic output for HTML.
  * Remember how to encode for HTML in PHP.

The following advanced user stories are **optional**:

9. [x] **Bonus 1:** Validate that form values contain only whitelisted characters.
  * first_name, last_name: letters, spaces, symbols: - , . '
  * username: letters, numbers, symbols: _
  * email: letters, numbers, symbols: _ @ .
10. [x] **Bonus 2:** Validate the uniqueness of the username.

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week1/Images/register_demo.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week1/Images/screenshot_users_table.png' title='Screenshot' width='' alt='Screenshot' />

GIF created with [SimpleScreenRecorder](http://www.maartenbaert.be/simplescreenrecorder/).

## Notes

Validating the form errors and displaying them appropriately was a bit tricky for me, however, fortunately the starter code provided and the readings in Resources really helped out.  Additionally, I learned about the code organization of web applications and its importance.  Separating public files from private files is very important and being able to call functions and variables from one file to another makes this process much more convinient.  In regards to the bonus user stories, using regular expressions to whitelist the acceptable user inputs was interesting to me.  Finally, validating the uniqueness of a submitted username was also a bit tricky, however, I managed to achieve this through a SQL command execution and prevent writing to the database if the username already exists. 

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
