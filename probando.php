<scritp>
 $(document).ready(function () {
 
            //Demo code
            $('.password-container').pschecker({ onPasswordValidate: validatePassword, onPasswordMatch: matchPassword });

</scritp>
<div class="password-container">
<p>
<label>
Enter Password:</label>
<input class="strong-password" type="password" />
</p>
<p>
<label>
Confirm Password:</label>
<input class="strong-password" type="password" />
</p>
<p>
<a class="submit-button locked" href="#">Submit</a>
</p>
<div class="strength-indicator">
<div class="meter">
</div>
Strong passwords contain 8-16 characters, do not include common words or names,
and combine uppercase letters, lowercase letters, numbers, and symbols.
</div>
</div>