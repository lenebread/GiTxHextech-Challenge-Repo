We are given a site where we can check the status of websites.

Entering a valid URL such as ``https://google.com`` will return us the HTTP status code as seen in the following screenshot.

![wimg-1](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/2172799693442df396d9857becae25e70e1ca596/challenges/web/Status%20Checker/images/wimg-1.png)

Entering a semi-colon (;) will break the command. We can try to use the payload ``; whoami``  and we are returned ``www-data`` as our user as seen in the following screenshot.

![wimg-2](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-2.png)

We can attempt to use the command ``; sudo -l``. We can see that we are able to run any command as sudo without a password as seen in the followings screenshot.

![wimg-3]()

We can attempt to use the command ``; sudo ls /root/`` to list the root directory. We can see that there is a file called ``flag.txt`` as seen in the following screenshot.

![wimg-4]()

We can read the contents of the file by using the command ``cat /roo/flag.txt``. The flag is: ``HEX{N3tw0rK_ErR_500_W1kS2kKiL}``
