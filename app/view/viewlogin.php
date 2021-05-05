<div class="canvas" id="canvaslogin">
    <div class="canvas--wraith"></div>
    <div class="canvas--background"></div>
    <div class="canvas--opacityfix"></div>
</div>
<div class="logwrap">
    <section class="loglogo">
        <img class="linguistfavicon" src="assets/images/favicon/linguist.png">
        <h1>Linguist</h1>
    </section>
    <div class="logincontent">
        <section class="logintab">
            <section class="logintop">
                <h1>Sign in</h1>
                <p>New user? <a class="loginlink" href="?action=register">Create an account</a></p>
                <?php echo $alert ?>
            </section>
            <section class="loginform">
                <form method="post" action="./?action=loginAction" id="logform">
                    <div class="mailfield">
                        <input class="mailinput" name="email" required>
                        <label class="maillabel" for="logmail">Email adress</label>
                    </div>

                    <div class="passwrdfield">
                        <input class="passwrdinput" type="password" name="passwrd" required>
                        <label class="passwrdlabel" for="logpass">Password</label>
                    </div>

                    <button type="submit" form="logform" value="submit">Submit</button>
                </form>
            </section>
        </section>
    </div>
</div>
</body>
</html>