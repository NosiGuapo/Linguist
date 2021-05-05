<div class="canvas" id="canvasregister">
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
                <h1>Create an account</h1>
                <p>Already have an account? <a class="loginlink" href="?action=login">Sign in</a></p>

            </section>
            <section class="loginform">
                <form action="./?action=registerAction" method="post" id="logform">
                    <h2 class="alert"></h2>
                    <div class="mailfield">
                        <input class="mailinput" name="email" required>
                        <label class="maillabel" for="email">Email adress</label>
                    </div>

                    <div class="fnamefield">
                        <input class="fnameinput" name="firstName" required>
                        <label class="fnamelabel" for="firstName">First name</label>
                    </div>

                    <div class="namefield">
                        <input class="nameinput" name="lastName" required>
                        <label class="namelabel" for="lastName">Last name</label>
                    </div>

                    <div class="usernamefield">
                        <input class="usernameinput" name="userName" required>
                        <label class="usernamelabel" for="userName">Username</label>
                    </div>

                    <div class="passwrdfield">
                        <input class="passwrdinput" type="password" name="password" required>
                        <label class="passwrdlabel" for="password">Password</label>
                    </div>

                    <div class="countryfield">
                        <select class="country_selectbox" name="country">
                            <?php foreach ($countries as $k => $v) { ?>
                                <option><?= $v->getCountryName(); ?></option>
                            <?php } ?>
                        </select>
                        <label class="countryprgph">Country/Region</label>
                    </div>
                    <button type="submit" form="logform" name="registerButton" value="submit">Create account</button>
                </form>
            </section>
        </section>
    </div>
</div>
</body>
</html>
