Stellar Tweetbot README

- INSTRUCTIONS

1. First, sign up for an account on Stellar.io if you don't have one already, follow some people, and see if you like the results. If you do, move on to the next step. If you don't, go outside and have a beer; you're done.

2. Create a zombie Twitter account for your new bot. You can call it whatever you want. I call mine @mike_stellar.

3. In your zombie accounts settings, choose "Protect My Tweets" so that your bot doesn't fill up other people's Connect tabs.

4. While logged into your zombie account, go to https://dev.twitter.com/apps/new and set up a new app. You can put whatever you want into the fields as you're just trying to get your API keys. Do NOT click the blue "Create My Access Token" button yet.

5. Click the "Settings" tab and change your App's access to "Read and Write".

6. Click back to the "Details" tab and click the "Create My Access Token" button.

7. Copy your Consumer Key, Consumer Secret, Access Token, and Access Token Secret for use in Step 11.

8. Create a directory on your server for this, and any other Twitter bots you might want to run. You can call it "twitterbots".

9. Grab the "twitteroauth" folder from http://github.com/abraham/twitteroauth and place it in your "twitterbots" directory. This is a PHP library which allows for easy OAuthing with Twitter.

10. Create a directory on your server for this Twitter bot inside the "twitterbots" folder. You can call it "stellar".

11. Place the "index.php" file from this project inside the "stellar" folder and set its permissions to 755 using either your FTP program or the command line (CHMOD).

12. Fill out the variables at the top of the "index.php" file with your information.

13. Test the script by running it in a browser. E.G. hit http://www.YOURSITE.com/misc/twitterbots/stellar/. If all went well, you should see a bunch of retweets in your new zombie Twitter account.

14. Set up a cronjob on your server to run your Stellar Tweetbot script every five minutes.

15. Follow your zombie account from your real account.

16. You're done!
