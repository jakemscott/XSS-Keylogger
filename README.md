# XSS-Keylogger PoC
This is a simple PoC JavaScript keylogger to attach to a XSS vulnerability disclosure. It is made up of two PHP servers, one acts as the victim and the other acts as the attackers remote server.

In a disclosure, you would just need to copy the code between the script tags in the victims index.php file, remove all comments, minify and inject as you see fit (obviously making some adjustments to the target and remote variables);
## Requirements:
- Docker
## How to Run:
1. Turn on each of the servers separately using the shell scripts.
2. Open two browser tabs, and navigate to each of these addresses:
    - Victim: http://127.0.0.1:8080
    - Attacker: http://127.0.0.1:8081
3. Then from the login page on the victim server, enter the following username and password:
    - **Username**: admin
    - **Password**: c0mpl1c@t3dp4ss
4. Once the form is submitted and you are welcomed by the home.php file open the attacker page.
5. Refresh the attacker page to see the keystrokes and form data entered into the keystrokes field.

## TODO

This was a really dirty weekend project, not at all my cleanest work, but it was a bit of fun to work with PHP for the first time without a framework.
- Add some much nicer CSS to make it feel like a proper website.
- Add a way to perform the XSS attack for learning purposes.
- Just do a lot of cleanup I guess.

Likelihood of all that happening if there isn't any interest in the project... 0.5%.