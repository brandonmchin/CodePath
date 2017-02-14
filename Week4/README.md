# Project 4 - Globitek Authentication and Login Throttling

**This project is designed to demonstrate implementing defenses against cross-site scripting (XSS) attacks, SQL injection (SQLI), cross-site request forgery (CSRF), session hijacking, and session fixation attacks.**

Time spent: **7** hours spent in total

## User Stories

The following **required** functionality is completed:

1. [x] Required: Test for initial vulnerabilities

2. [x] Required: Configure sessions

    * [x] Required: Only allow session IDs to come from cookies
    * [x] Required: Expire after one day
    * [x] Required: Use cookies which are marked as HttpOnly

3. [x] Required: Complete Login page.

    * [x] Required: Show an error message when username is not found.
    * [x] Required: Show an error message when username is found but password does not match.
    * [x] Required: After login, store user ID in session data.
    * [x] Required: After login, store user last login time in session data.
    * [x] Required: Regenerate the session ID at the appropriate point.

4. [x] Required: Require login to access staff area pages.

    * [x] Required: Add a login requirement to almost all staff area pages.
    * [x] Required: Write code for last_login_is_recent().

5. [x] Required: Complete Logout page.

    * [x] Required: Add code to destroy the user's session file after logging out.

6. [x] Required: Add CSRF protections to the state forms.

    * [x] Required: Create a CSRF token.
    * [x] Required: Add CSRF tokens to forms.
    * [x] Required: Compare tokens against the stored version of the token.
    * [x] Required: Only process forms data sent by POST requests.
    * [x] Required: Confirm request referer is from the same domain as the host.
    * [x] Required: Store the CSRF token in the user's session.
    * [x] Required: Add the same CSRF token to the login form as a hidden input.
    * [x] Required: When submitted, confirm that session and form tokens match.
    * [x] Required: If tokens do not match, show an error message.
    * [x] Required: Make sure that a logged-in user can use pages as expected.

7. [x] Required: Ensure the application is not vulnerable to XSS attacks.

8. [x] Required: Ensure the application is not vulnerable to SQL Injection attacks.

9. [x] Required: Run all tests from Objective 1 again and confirm that your application is no longer vulnerable to any test.

The following advanced user stories are **optional**:

10. [x] Bonus Objective 1: Identify security flaw in Objective #4 (requiring login on staff pages)
        * [x] Identify the security principal not being followed.
        * [x] Write a short description of how the code could be modified to be more secure.

11. [x] Bonus Objective 2: Add CSRF protections to all forms in the staff directory

12. [x] Bonus Objective 3: CSRF tokens only valid for 10 minutes.

13. [x] Bonus Objective 4: Sessions are valid only if user-agent string matches previous value.

14. [x] Advanced Objective: Set/Get Signed-Encrypted Cookie
        * [x] Create "public/set_secret_cookie.php".
        * [x] Create "public/get_secret_cookie.php".
        * [x] Encrypt and sign cookie before storing.
        * [x] Verify cookie is signed correctly or show error message.
        * [x] Decrypt cookie.

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week4/Images/week4_demo.gif' title='Video Walkthrough' alt='Video Walkthrough' />

GIF created with [SimpleScreenRecorder](http://www.maartenbaert.be/simplescreenrecorder/).

## Notes

In testing initial vulnerabilities, the CSRF and SQLI attacks consisted of a loop that would prevent the code from completing.  This was fixed by adding an onlick statement in the hidden forms where the variable "updated" is set to true after the form is submitted.  By doing this, the loop was eliminated.

The principle of security through obscurity is applied in the error messages of the login page.  If the username is correct, but the password is incorrect, the page returns an error stating either fields are incorrect and does not give away that the username was actually correct.

In order to ensure the application is not vulnerable to XSS attacks, I first needed to decode the base64 encoded string inside the xss.php pen testing file.  This allowed me to see that the code was inserting a script into the username field of the login form and obtaining the document's cookie data.  The prevention method I implemented was to sanitize the forms inputs using PHP's htmlspecialchars().  This function encodes the HTML special characters such as those used in script tags.

In order to ensure the application is not vulnerable to SQL injection attacks, I noticed the sqli.php pen testing file inserted an escape key and a SQL statement which always returns true into the username field of the login form.  This time, I needed to sanitize the SQL query which retreives the user by username.  This was achieved with PHP's mysqli_real_escape_string() function, which contains several methods for escaping strings.  Additionally, I could also whitelist and validate user input since the username is expected to have a certain format.

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

