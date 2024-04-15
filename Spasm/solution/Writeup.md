Any fps players? Valorant, CSGO? I love stretched resolution. Stretch resolution makes me brain go monke, monke brain spasm aim + schizophrenia. My favorite stretched resolution is 1440x1080 and I am slowly losing my s4n___.

---

You are first presented with this file goodluck.png
![[goodluck.png]]

This image is basically a polyglot, so it is basically a zip file in disguise. To extract the zip file out of this image, change the file extension to a .cmd 

Tool used to make this polyglot : pdvzip - A simple command-line tool used to embed a ZIP file within a PNG image,

After changing the file into a .cmd and executing it, you will get this screen to appear 
![[Pasted image 20240415225214.png]]
You realise that it is asking for a passphrase. 
To get this passphrase, you need to analyze the file even further by using strings 
Since we know that the creator is slowly losing something with the word s4n, we can search for s4n within the strings output. 

![[Pasted image 20240415230008.png]]

It seems there is a word that we now know and we filled in the blank in the original question. Let's try that as the password! 

It seems to have extracted successfully. 
![[Pasted image 20240415230205.png]]

There is a New folder as well. 
After looking inside it, you can see a flag.jpg

![[Pasted image 20240415230346.png]]

It seems that the flag is edging literally, which suggests a change in the widths and height of the image. Sounds familiar, didn't the creator mention his favorite resolution? 

After inspecting the image height and width, it is currently at 1446x540, which suggest a massive change in the height. 

To change the height of the image, you can go to a hex editor such as hexed.it, upload the file, and start modifying values 

To change the height, simply look for the first FF C0 that appears in the file (Indicator of SOF) and start reading it till you find 02 1C which is the hexadecimal values that represent the height. Change it back to 1080 in hexadecimal which is 04 38

Save the file and you would get the flag 
![[Pasted image 20240415231038.png]]



More details can be found at this post talking about the anatomy of a JPEG file 
https://www.ccoderun.ca/programming/2017-01-31_jpeg/#:~:text=The%202-byte%20image%20height,65535%20x%2065535%20in%20size