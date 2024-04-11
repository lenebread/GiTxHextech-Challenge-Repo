We are given a password protected zip file for the challenge Chef.

To crack the password, we can attempt to guess it. However, that can take a long time. Instead, we can use a tool called **John The Ripper**. John The Ripper is a tool that can be used to crack passwords. We will be using ``john`` and sub module called ``zip2john``.

First, we will run the command ``zip2john TopSecret.zip > myzip`` as seen in the following screenshot. Running this command will covert it into a format that can be cracked using John The Ripper.

![[images/cimg-1]]

Once done, we can use any wordlist. In this example, we will be using ``rockyou.txt`` which can be found in the ``/usr/share/wordlists/rockyou.txt`` if you are using Kali Linux. You may choose your own wordlist for this challenge. The command will be:

```
john --wordlist=/usr/share/wordlists/rockyou.txt myzip
```

Command breakdown:
- ``--wordlist=/usr/share/wordlists/rockyou.txt`` - Specifies the wordlist that John The Ripper will use.
- ``myzip`` - Specifies the file that contains the hash that we want to crack.

After running the command, we can see that the password is ``secret``. We can unzip the file by using the command ``unzip TopSecret.zip`` or right click the file in the File Explorer > 
