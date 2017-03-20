# Project 7 - WordPress Pentesting

Time spent: **12** hours spent in total

> Objective: Find, analyze, recreate, and document **five vulnerabilities** affecting an old version of WordPress

## Pentesting Report

1. (Required) WordPress <= 4.3 - Authenticated Shortcode Tags Cross-Site Scripting (XSS)
  - [x] Summary: A stored, or persistent, cross-site scripting vulnerablilty which allows remote attackers to inject arbitrary web script or HTML by abusing the way unclosed HTML elements during the processing of shortcode tags are mishandled.
    - Vulnerability types: Stored cross-site scripting (XSS)
    - Tested in version: 4.1.1
    - Fixed in version: 4.3
  - [x] GIF Walkthrough:

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week7/Images/week7_demo1.gif' title='Demo 1' alt='Demo 1' /> 

  - [x] Steps to recreate: Create a new page or a post and place the following line in the body:

    ```
    [caption width="1" caption='<a href="' ">]</a><a href="http://onmouseover='alert(1)'">Over here!</a>
    ```

    When another user hovers over the text, the injected code is executed.

  - [x] Affected source code: [branches/4.1/src/wp-includes/post.php](https://core.trac.wordpress.org/browser/branches/4.1/src/wp-includes/post.php)

2. (Required) WordPress 2.5-4.6 - Authenticated Stored Cross-Site Scripting via Image Filename
  - [x] Summary: A vulnerability which allows remote attackers to create a specially crafted image file name that will inject arbitrary web script or HTML.  This abuses the insufficient validation of the file names of uploaded images.  For the attack to succeed, an administrator must upload the image, typically requested by a user.
    - Vulnerability types: Stored cross-site scripting (XSS)
    - Tested in version: 4.2.2
    - Fixed in version: 4.6.1
  - [x] GIF Walkthrough: 

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week7/Images/week7_demo2.gif' title='Demo 2' alt='Demo 2' /> 

  - [x] Steps to recreate: Create a new media post and upload an image with the following filename:

    ```
    filename<img src=a onerror=alert(1)>.png
    ```

    When the attachment page is viewed, the injected code is executed.

  - [x] Affected source code: [branches/4.2/src/wp-admin/includes/media.php](https://core.trac.wordpress.org/browser/branches/4.2/src/wp-admin/includes/media.php)

3. (Required) WordPress  4.0-4.7.2 - Authenticated Stored Cross-Site Scripting (XSS) in YouTube URL Embeds
  - [x] Summary: A vulnerablity which allows remote attackers to inject arbitrary web script or HTML via video URL in YouTube emebeds.
    - Vulnerability types: Stored cross-site scripting (XSS)
    - Tested in version: 4.1.1
    - Fixed in version: 4.7.3
  - [x] GIF Walkthrough: 

<img src='https://github.com/brandonmchin/CodePath/blob/master/Week7/Images/week7_demo3.gif' title='Demo 3' alt='Demo 3' /> 

  - [x] Steps to recreate: Create a new page or post and place the following line in the body:

    ```
    [embed src='https://youtube.com/embed/12345\x3csvg onload=alert(1)\x3e'][/embed]
    ```

    When the page is viewed, the injected code is executed.

  - [x] Affected source code: [branches/4.1/src/wp-includes/media.php](https://core.trac.wordpress.org/browser/branches/4.1/src/wp-includes/media.php) 

## Assets

No additional assets, such as scripts or files, were used.

## Resources

- [WordPress Source Browser](https://core.trac.wordpress.org/browser/)
- [WordPress Developer Reference](https://developer.wordpress.org/reference/)

GIF created with [SimpleScreenRecorder](http://www.maartenbaert.be/simplescreenrecorder/).

## Notes

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
