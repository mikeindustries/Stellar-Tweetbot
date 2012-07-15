Stellar Tweetbot README

- WHAT DOES THIS THING DO?

Jason Kottke runs a service called Stellar (http://stellar.io) which allows you to follow a bunch of interesting people and then see all of the tweets, Flickr photos, YouTube videos, etc. they fave. It's a great way to discover content that interesting people find interesting. It does, however, require you to visit Stellar.io every time you want to see new stuff. This is quite reasonable. However, since tweets are so fleeting (and many people already have their Twitter clients up all day), I created a script which takes all of the tweets from your Stellar flow and retweets them from your own zombie Twitter account (http://twitter.com/mike_stellar is mine). You can then follow that account and get the tweets in your own Twitter stream. It's a great way to supplement your Twitter stream with interesting content from people you don't follow on Twitter.

- WHAT YOU'LL NEED

A Stellar.io account, your current Twitter account, a new zombie Twitter account, and a server on which to run this PHP script.


- INSTRUCTIONS

1.  First, sign up for an account on Stellar.io if you don't have one already, follow some people, and see if you like the results. If you do, follow on to the next step. If you don't, go outside and have a beer; you're done here.

2.  Create a zombie Twitter account for your new bot. You can call it whatever you want.

3.  While logged into your zombie account, go to https://dev.twitter.com/apps/new and set up a new app. You can put whatever you want into the fields as you're just trying to get your API keys.

4.  Click the "Settings" tab and change your App's access to "Read and Write".

5.  Click back to the "Details" tab and click the "Create My Access Token" button.

6.  Copy your Consumer Key, Consumer Secret, Access Token, and Access Token Secret for use in Step 11.

7.  Create a directory on your server for this, and and other Twitter bots you might want to run. You can call it "twitterbots".

8.  Grab the "twitteroauth" folder from http://github.com/abraham/twitteroauth and place it in your "twitterbots" directory. This is a PHP library which allows for easy OAuthing with Twitter.

9.  Create a directory on your server for this Twitter bot inside the "twitterbots" folder. You can call it "stellar".

10. Place the "index.php" file from this project inside the "stellar" folder and set its permissions to 755 using either your FTP program or the command line (CHMOD).

11. Fill out the variables at the top of the "index.php" file with your information.

12. Test the script by running it in a browser. E.G. hit http://www.YOURSITE.com/misc/twitterbots/stellar/. If all went well, you should see a bunch of retweets in your new zombie Twitter account.

13. Set up a cronjob on your server to run your Stellar Tweetbot script every five minutes.

14. Follow your zombie account from your real account.

15. You're done!