<?php include __DIR__ . "/partials/_header.php"; ?>

<div class="formBox">
    <h2>SIGN UP</h2>
    <form class="registerForm" action="/register" method="POST">
        <div class="formTile">
            <div class="inputField">
                <label for="full-name">Full Name</label>
                <input
                    value="<?php echo escape($oldFormData['fullName'] ?? '')  ?>"
                    type="text" id="full-name" name="fullName" placeholder="ex. Hambuzo Abdel-Samad Fathy">

                <?php if (array_key_exists('fullName', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['fullName'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="inputField">
                <label for="email">Email Address</label>
                <input value="<?php echo escape($oldFormData['email']  ?? '') ?>" type="email" id="email" name="email" placeholder="ex. you@example.com">

                <?php if (array_key_exists('email', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['email'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="inputField">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <?php if (array_key_exists('password', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['password'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="inputField">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword">

                <?php if (array_key_exists('confirmPassword', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['confirmPassword'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <div class="formTile">
            <div class="inputField">
                <label for="phone">Phone Number</label>
                <input value="<?php echo escape($oldFormData['phone'] ?? '')  ?>" type="tel" id="phone" name="phone" placeholder="ex. 01234567890">

                <?php if (array_key_exists('phone', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['phone'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="inputField">
                <label for="dob">Date of Birth</label>
                <input value="<?php echo escape($oldFormData['dob'] ?? '')  ?>" type="date" id="dob" name="dob">

                <?php if (array_key_exists('dob', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['dob'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="inputField">
                <label class="genderTitle">Gender</label>
                <div class="gender">
                    <div class="option">
                        <input <?php echo escape(isset($oldFormData['gender']) && $oldFormData['gender'] === 'male' ? 'checked' : '') ?> type="radio" id="male" name="gender" value="male">
                        <label class="btn-radio" for="male">
                            <div class="pupil"></div>
                        </label>
                        <label for="male">Male</label>
                    </div>

                    <div class="option">
                        <input <?php echo escape(isset($oldFormData['gender']) && $oldFormData['gender'] === 'female' ? 'checked' : '') ?> type="radio" id="female" name="gender" value="female">
                        <label class="btn-radio" for="female">
                            <div class="pupil"></div>
                        </label>
                        <label for="female">Female</label>
                    </div>
                </div>

                <?php if (array_key_exists('gender', $errors)) : ?>
                    <div class="error">
                        <?php
                        echo escape($errors['gender'][0]);
                        ?>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <button class="submit" type="submit">SIGN UP</button>

    </form>
</div>

<?php include __DIR__ . "/partials/_footer.php" ?>