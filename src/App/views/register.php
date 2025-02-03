<?php include __DIR__ . "/partials/_header.php"; ?>

<div class="formBox">
    <h2>SIGN UP</h2>
    <form class="registerForm" action="/register" method="POST">
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" name="fullName" placeholder="ex. Hambuzo Abdel-Samad Fathy">

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="ex. you@example.com">

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="ex. +0123456789">

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob">

        <label>Gender</label>
        <div class="gender">
            <div class="option">
                <input type="radio" id="male" name="gender" value="male">
                <label class="btn-radio" for="male">
                    <div class="pupil"></div>
                </label>
                <label for="male">Male</label>
            </div>

            <div class="option">
                <input type="radio" id="female" name="gender" value="female">
                <label class="btn-radio" for="female">
                    <div class="pupil"></div>
                </label>
                <label for="female">Female</label>
            </div>
        </div>

        <button class="submit" type="submit">SIGN UP</button>

    </form>
</div>

<?php include __DIR__ . "/partials/_footer.php" ?>