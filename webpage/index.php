<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	
	<body style="margin: 1em auto;">
    <?php
        $name = '';
        $email = '';
        $username = '';
        $password = '';
        $confirmPassword = '';
        $date = '';
        $gender = '';
        $status = '';
        $address = '';
        $city = '';
        $postalCode = '';
        $homePhone = '';
        $mobilePhone = '';
        $creditCardNumber = '';
        $creditCardExpiryDate = '';
        $monthlySalary = '';
        $site = '';
        $gpa = '';

        $isNameValid = true;
        $isEmailValid = true;
        $isUsernameValid = true;
        $isPasswordValid = true;
        $isConfirmPasswordValid = false;
        $isDateValid = true;
        $isGenderValid = true;
        $isStatusValid = true;
        $isAddressValid = true;
        $isCityValid = true;
        $isPostalCodeValid = true;
        $isHomePhoneValid = true;
        $isMobilePhoneValid = true;
        $isCreditCardNumberValid = true;
        $isCreditCardExpiryDateValid = true;
        $isMonthlySalaryValid = true;
        $isSiteValid = true;
        $isGpaValid = true;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $confirmPassword = $_REQUEST['confirmPassword'];
            $date = $_REQUEST['date'];
            $gender = $_REQUEST['gender'];
            $status = $_REQUEST['status'];
            $address = $_REQUEST['address'];
            $city = $_REQUEST['city'];
            $postalCode = $_REQUEST['postalCode'];
            $homePhone = $_REQUEST['homePhone'];
            $mobilePhone = $_REQUEST['mobilePhone'];
            $creditCardNumber = $_REQUEST['creditCardNumber'];
            $creditCardExpiryDate = $_REQUEST['creditCardExpiryDate'];
            $monthlySalary = $_REQUEST['monthlySalary'];
            $site = $_REQUEST['site'];
            $gpa = $_REQUEST['gpa'];

            $isNameValid = preg_match('/^[a-z]{2,}$/i', $name);
            $isEmailValid = preg_match('/^\w+@\w+\.\w+$/', $email);
            $isUsernameValid = preg_match('/^[a-z]{5,}$/', $username);
            $isPasswordValid = preg_match('/\A(?=\w{6,10}\z)(?=[^a-z]*[a-z])(?=(?:[^A-Z]*[A-Z]){3})(?=\D*\d)/', $password);
            if ($confirmPassword == $password) {
                $isConfirmPasswordValid = true;
            }
            $isDateValid = preg_match('/^(([0-2][0-9])|(3[0-1])\.[0-1][0-2].\d{4})*$/', $date);
            $isGenderValid = preg_match('/(^Male|Female)*$/i', $gender);
            $isStatusValid = preg_match('/^(Single|Married|Divorced|Widowed)*$/i', $status);
            $isAddressValid = preg_match('/^\w+$/', $address);
            $isCityValid = preg_match('/^\w+$/', $city);
            $isPostalCodeValid = preg_match('/^\d{6}$/', $postalCode);
            $isHomePhoneValid = preg_match('/^\d{9}$/', $homePhone);
            $isMobilePhoneValid = preg_match('/^\d{9}$/', $mobilePhone);
            $isCreditCardNumberValid = preg_match('/^\d{16}$/', $creditCardNumber);
            $isCreditCardExpiryDateValid = preg_match('/^(([0-2][0-9])|(3[0-1])\.[0-1][0-2].\d{4})*$/', $creditCardExpiryDate);
            $isMonthlySalaryValid = preg_match('/^\d+,\d+\.\d+$/', $monthlySalary);
            $isSiteValid = preg_match('/^http:\/\/\w+\.\w+$/', $site);
            $isGpaValid = preg_match('/^([0-3]\.\d{1,2})|(4\.[0-4]\d)|(4.5)$/i', $gpa);

            $isValid = $isNameValid && $isEmailValid && $isUsernameValid && $isPasswordValid && $isConfirmPasswordValid && $isAddressValid &&
                $isCityValid && $isPostalCodeValid && $isHomePhoneValid && $isMobilePhoneValid && $isCreditCardNumberValid &&
                $isCreditCardExpiryDateValid && $isMonthlySalaryValid && $isSiteValid && $isGpaValid;

            if ($isValid) {
                header('Location: thanks.php', TRUE);
            }
        }
    ?>


		<h1>Registration Form</h1>

		<p>
			Fields with <span class="required">*</span> are required to be filled in
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
        <form action="index.php" method="post">
            <dl>
                <dt>Name<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isNameValid?'':'is-invalid' ?>" name="name" placeholder="at least 2 characters" value="<?= $name ?>"/>
                    <div class="invalid-feedback">
                        Your name must be at least 2 characters
                    </div>
                </dd>

                <dt>Email<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isEmailValid?'':'is-invalid' ?>" name="email" placeholder="yarkinovulugbek@gmail.com" value="<?= $email ?>"/>
                    <div class="invalid-feedback">
                        Your email must be in appropriate form
                    </div>
                </dd>

                <dt>Username<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isUsernameValid?'':'is-invalid' ?>" name="username" placeholder="at least 5 characters" value="<?= $username ?>"/>
                    <div class="invalid-feedback">
                        Your username must be at least 5 characters
                    </div>
                </dd>

                <dt>Password<span class="required">*</span></dt>
                <dd>
                    <input type="password" class="form-control <?= $isPasswordValid?'':'is-invalid' ?>" name="password" placeholder="at least 8 characters" value="<?= $password ?>"/>
                    <div class="invalid-feedback">
                        Your password must:<br>
                        <ul>
                            <li>be 6-10 characters long</li>
                            <li>include at least one lowercase character</li>
                            <li>include at least three uppercase characters</li>
                            <li>include at least one digit</li>
                        </ul>
                    </div>
                </dd>

                <dt>Confirm your Password<span class="required">*</span></dt>
                <dd>
                    <input type="password" class="form-control <?= $isConfirmPasswordValid?'':'is-invalid' ?>" name="confirmPassword" placeholder="at least 5 characters" value="<?= $confirmPassword ?>"/>
                    <div class="invalid-feedback">
                        Your password doesn't match
                    </div>
                </dd>

                <dt>Date of Birth</dt>
                <dd>
                    <input type="text" class="form-control <?= $isDateValid?'':'is-invalid' ?>" name="date" placeholder="dd.mm.yyyy" value="<?= $date ?>"/>
                    <div class="invalid-feedback">
                        Your date must be in appropriate form
                    </div>
                </dd>

                <dt>Gender</dt>
                <dd>
                    <input type="text" class="form-control <?= $isGenderValid?'':'is-invalid' ?>" name="gender" placeholder="Male/Female" value="<?= $gender ?>"/>
                    <div class="invalid-feedback">
                        Write Male or Female
                    </div>
                </dd>

                <dt>Marital Status</dt>
                <dd>
                    <input type="text" class="form-control <?= $isStatusValid?'':'is-invalid' ?>" name="status" placeholder="Single, Married, Divorced, Widowed" value="<?= $status ?>"/>
                    <div class="invalid-feedback">
                        Write marital status as Single, Married, Divorced or Widowed
                    </div>
                </dd>

                <dt>Address<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isAddressValid?'':'is-invalid' ?>" name="address" placeholder="any type" value="<?= $address ?>"/>
                    <div class="invalid-feedback">
                        Write your address
                    </div>
                </dd>

                <dt>City<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isCityValid?'':'is-invalid' ?>" name="city" placeholder="any type" value="<?= $city ?>"/>
                    <div class="invalid-feedback">
                        Write your city
                    </div>
                </dd>

                <dt>Postal Code<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isPostalCodeValid?'':'is-invalid' ?>" name="postalCode" placeholder="6 digits" value="<?= $postalCode ?>"/>
                    <div class="invalid-feedback">
                        Your postal code must be 6 digits
                    </div>
                </dd>

                <dt>Home Phone<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isHomePhoneValid?'':'is-invalid' ?>" name="homePhone" placeholder="9 digits" value="<?= $homePhone ?>"/>
                    <div class="invalid-feedback">
                        Your phone number must be 9 digits
                    </div>
                </dd>

                <dt>Mobile Phone<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isMobilePhoneValid?'':'is-invalid' ?>" name="mobilePhone" placeholder="9 digits" value="<?= $mobilePhone ?>"/>
                    <div class="invalid-feedback">
                        Your phone number must be 9 digits
                    </div>
                </dd>

                <dt>Credit Card Number<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isCreditCardNumberValid?'':'is-invalid' ?>" name="creditCardNumber" placeholder="16 digits" value="<?= $creditCardNumber ?>"/>
                    <div class="invalid-feedback">
                        Your credit card number must be 16 digits
                    </div>
                </dd>

                <dt>Credit Card Expiry Date<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isCreditCardExpiryDateValid?'':'is-invalid' ?>" name="creditCardExpiryDate" placeholder="dd.mm.yyyy" value="<?= $creditCardExpiryDate ?>"/>
                    <div class="invalid-feedback">
                        Your expiry date must be in appropriate form
                    </div>
                </dd>

                <dt>Monthly Salary<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isMonthlySalaryValid?'':'is-invalid' ?>" name="monthlySalary" placeholder="UZS 200,000.00" value="<?= $monthlySalary ?>"/>
                    <div class="invalid-feedback">
                        Your salary format is not appropriate. Write all dots and commas
                    </div>
                </dd>

                <dt>Web Site URL<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isSiteValid?'':'is-invalid' ?>" name="site" placeholder="http://yoursite.com" value="<?= $site ?>"/>
                    <div class="invalid-feedback">
                        Your URL format is not appropriate. Write http:// too
                    </div>
                </dd>

                <dt>Overall GPA<span class="required">*</span></dt>
                <dd>
                    <input type="text" class="form-control <?= $isGpaValid?'':'is-invalid' ?>" name="gpa" placeholder="less than or equal 4.5" value="<?= $gpa ?>"/>
                    <div class="invalid-feedback">
                        Your GPA must be from 0.0 to 4.5 (floating point)
                    </div>
                </dd>
            </dl>

            <div>
                <input type="submit" value="Register">
            </div>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>