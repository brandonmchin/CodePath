# Pre-work - *Tip Calculator*

**Tip Calculator** is a tip calculator PHP page.

Submitted by: **Brandon Chin**

Time spent: **12** hours spent in total

## User Stories

The following **required** functionality is complete:
* [x] User can enter a bill amount, choose a tip percentage, and submit the form to see the tip and total values.
* [ ] Tip percentage choices use a PHP loop to output three radio buttons.
* [x] PHP code sets reasonable default values for the form.
* [x] PHP code confirms the presence and correct format of submitted values.
* [x] Page indicates any form errors which need to be fixed.
* [x] Submitted form values are retained when errors or results are shown.

The following **optional** features are implemented:
* [ ] Add support for custom tip percentage
* [ ] Add support for splitting the tip and total

<!--
The following **additional** features are implemented:

* [ ] List anything else that you can get done to improve the functionality!
-->

## Video Walkthrough

Here's a walkthrough of implemented user stories:

![video walkthrough](https://github.com/brandonmchin/CodePath/blob/master/tip_calculator_demo.gif "Video Walkthrough")

 <!-- 
 <img src='' title='Video Walkthrough' width='' alt='Video Walkthrough' />
 -->

GIF created with [SimpleScreenRecorder](http://www.maartenbaert.be/simplescreenrecorder/).

## Notes

I learned a few things working on this application and ran into some occasional challenges. 

Some of which include retaining the submitted values when returning to the page after the form has been submitted.  I handled this by using PHP to populate the values with session variables if they were set.  That way, when the user submits a value to the form, the value is stored in a session variable, which is then assigned to the inputs.

Another challenge I encountered was indicating the appropriate form errors.  I did this by using a type of error flagging, which involves having a session variable for the error and using an integer value to indicate the type of error that was found.  For example, the error variable is iniitally set to 0, meaning no error, and if the form is submitted without a value in the subtotal textbox, error is set to -1.  Now, when we return to the page, the value of error is checked, and the appropriate responses are performed. 

## License

    Copyright [yyyy] [name of copyright owner]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
