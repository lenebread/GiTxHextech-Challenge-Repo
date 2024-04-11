We are given a password protected zip file for the challenge Chef.

To crack the password, we can attempt to guess it. However, that can take a long time. Instead, we can use a tool called **John The Ripper**. John The Ripper is a tool that can be used to crack passwords. We will be using ``john`` and sub module called ``zip2john``.

First, we will run the command ``zip2john TopSecret.zip > myzip`` as seen in the following screenshot. Running this command will covert it into a format that can be cracked using John The Ripper.

![[challenges/misc/Chef/images/cimg-1.png]]

Once done, we can use any wordlist. In this example, we will be using ``rockyou.txt`` which can be found in the ``/usr/share/wordlists/rockyou.txt`` if you are using Kali Linux. You may choose your own wordlist for this challenge. The command will be:

```
john --wordlist=/usr/share/wordlists/rockyou.txt myzip
```

Command breakdown:
- ``--wordlist=/usr/share/wordlists/rockyou.txt`` - Specifies the wordlist that John The Ripper will use.
- ``myzip`` - Specifies the file that contains the hash that we want to crack.

![[cimg-2]]

After running the command, we can see that the password is ``secret``. We can unzip the file by using the command ``unzip TopSecret.zip`` or right click the file in the File Explorer > Extract Here > Enter the password as seen in the following screenshots.

Extracting the file:
![[cimg-3]]

Entering the password:
![[cimg-4]]

Upon extracting the folder, we can see a file called ``flag.txt``. Opening the text file presents us with the following contents:

```
There once lived a chef in the cyber realm. The chef owned 64 bases around the world. One day, a guy named Caesar came to visit the chef's 64 bases. Little did the chef know, Caesar had jumbled up his top secret recipe and had turned his 13 prized fruits rotten in his top secret base!

The chef is sad that his once world renowned recipe became: VVJLe0d1M19GM2NyRV9GM3BlM2dfRXJQdmMzfQ==
```

![[cimg-5]]

We can see that the flag is most likely the recipe. Reading the lines, we can see that there are some clues as to how we can decrypt the recipe.

From the word "64 bases" we can assume that base64 is at play. We can confirm this as a base64 string will have a double equal sign ``==`` at the end of the string which, is present in the recipe. We can also see that there is a person called "Caesar". Doing a quick search on the name within the cyber topic, we can see that it is refering to a cipher called "Caesar Cipher". We can see that Caesar had encrypted the recipe and "turned his 13 prized fruits rotten". We can guess that it might be using ROT13, a type of Caesar Cipher.

To decrypt the recipe, we can use a tool called CyberChef (https://gchq.github.io/CyberChef/). Inputting the base64 string on the right and selecting the "From Base64" recipe reveals a part of the flag. 

![[cimg-6]]

To further decrypt this, we can use the "ROT13" operator. As we can see in the following screenshot, we managed to obtain the flag in the output. The flag is ``HEX{Th3_S3peR_S3cr3t_ReCip3}``

![[cimg-7]]
