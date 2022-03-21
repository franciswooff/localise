# localise

Project to support students at the University of Salford in hosting audio localisation tests online

**INSTRUCTIONS FOR USE**
The project is designed to work with little customisation needed to get an initial usable test. The minimum actions needed to use it are:

1.	Download this repository as a zip file (dropdown from the green “Code” button top right of repository) save it & unzip it to a location suitable for you to continue work with it as you prepare your test. By default the zip file may unzip to a "folder within a folder", it is the inner folder (containing multiple files & 2 other folders, the same layout as seen above these instructions on GitHub) that you will work with. From this point onward in these instructions this folder will be referred to as your test folder.

2.	While you can work on preparing your test in your test folder on a location such as the hard drive of your PC (or Mac, portable hard drive, USB stick or cloud storage) for the test to run it will need to be placed on a machine running PHP - e.g. a web server (you could install or activate PHP on your Windows PC or Mac & the test will run there, but as your your subjects will need access it needs to be on a web server anyway).  
For University of Salford students using this test, this article: https://salfordprod.service-now.com/kb_view.do?sysparm_article=KB0010645 “covers basic use of the University service for hosting web content” (obtaining & using a web server account for your test).  
The test as you have downloaded it in step 1 includes placeholder/example audio files which it is set to work with. So you can, if you wish, simply upload the downloaded test to your webserver account at this point to see an example of it working, even before you set it up with your own files. You don’t need to do this, but it may help if you work through the steps in the guide to access your web server account, so that if you have any issue & need a hand you have more time prior to when you start testing.
Note that as stressed in the guide you need to upload the **contents** of your test folder to the server (rather than the folder itself).  
See step 6 for addresses to use in a web browser to see the uploaded project.

3.	Prepare the audio files you will use in your test. The project is set up to work with .wav audio files. Other file formats are possible, the code downloaded in step 2 can be adapted to accomodate.  
.wav format is chosen for audio as it best matches the requirements of the University of Salford students the project was created for. It is not the best choice in terms of size on the server, connection bandwidth etc. To change the format the test works with to (e.g.) mp3 edit the single occurrence on page.php of the text “wav” to “mp3”

4.	Place your audio files in the “audiofiles” folder inside your test folder (delete or overwrite the placeholder/example files already there). The files must be named according to the following convention:  
  1.wav  
  2.wav  
  3.wav  
  etc.  

5.	Edit the text file EDITME.txt in your test folder. This file “tells” the test the number of test pages in the test (first line of the file) & the e-mail address the test results are to be sent to (second line of the file). Easiest to open the file & see how it looks before editing - instructions are also included in the file itself & should be easy to follow in that context.

6.	Upload your test to the server (see item 2 in these instructions) - or if you already had a “trial run” as recommended in step 2 replace the example audio files with the ones you have added to your folders in step 4 & the EDITME.txt file with the new version from step 5.  
Enter your webserver account address in a browser  (e.g. http://abc123.poseidon.salford.ac.uk) to take you to the start page of the test as used by the test subject.

Congratulations! You should have a working test which you can use with no further steps* Hopefully the format the results arrive in via e-mail is self-explanatory (& easy to bring into e.g. Excel, use the underscore as a separator).
