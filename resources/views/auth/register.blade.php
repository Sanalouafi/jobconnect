<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registration</title>

</head>

<body>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        #signUpForm {
            max-width: 500px;
        }

        #signUpForm .form-header .stepIndicator.active {
            font-weight: 600;
        }

        #signUpForm .form-header .stepIndicator.finish {
            font-weight: 600;
            color: #5a67d8;
        }

        #signUpForm .form-header .stepIndicator::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            z-index: 9;
            width: 20px;
            height: 20px;
            background-color: #c3dafe;
            border-radius: 50%;
            border: 3px solid #ebf4ff;
        }

        #signUpForm .form-header .stepIndicator.active::before {
            background-color: #a3bffa;
            border: 3px solid #c3dafe;
        }

        #signUpForm .form-header .stepIndicator.finish::before {
            background-color: #5a67d8;
            border: 3px solid #c3dafe;
        }

        #signUpForm .form-header .stepIndicator::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 8px;
            width: 100%;
            height: 3px;
            background-color: #f3f3f3;
        }

        #signUpForm .form-header .stepIndicator.active::after {
            background-color: #a3bffa;
        }

        #signUpForm .form-header .stepIndicator.finish::after {
            background-color: #5a67d8;
        }

        #signUpForm .form-header .stepIndicator:last-child:after {
            display: none;
        }

        #signUpForm input.invalid {
            border: 2px solid #ffaba5;
        }

        #signUpForm .step {
            display: none;
        }
    </style>
    <h1 class="text-lg font-bold text-gray-700 leading-tight text-center mt-12 mb-5">Create your acoount now!</h1>
    <form id="signUpForm" class="p-12 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100 mb-8"
        method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <!-- start step indicators -->
        <div class="form-header flex gap-3 mb-4 text-xs text-center">
            <span class="stepIndicator flex-1 pb-8 relative">AccountSetup</span>
            <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
        </div>
        <!-- end step indicators -->
        <!-- step one -->
        <div class="step">
            <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                <label for="image-input" class="cursor-pointer">
                    <img id="preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                        src="{{ URL::asset('img/user.png') }}" alt="user image">
                </label>
                <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)"
                    required>
            </div>
            <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create your account</p>
            <div class="mb-6">
                <input type="text" placeholder="Full name" name="fullname"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    required />
            </div>
            <div class="mb-6">
                <input type="email" placeholder="Email Address" name="email" id="email"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    required>
                <div id="email_error" class="text-red-500"></div>
            </div>

            <div class="mb-6">
                <input type="password" placeholder="Password" name="password" id="password"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    required>
            </div>
            <div class="mb-6">
                <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" />
                <div id="password_error" class="text-red-500"></div>
            </div>
        </div>
        <!-- step two -->
        <div class="step">
            <div class="mb-6"> <input type="text" placeholder="Address" name="address"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
            </div>
            <div class="mb-6"> <input type="text" placeholder="phone number" name="phone"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Role</label>
                <div class="flex items-center">
                    <input type="radio" id="role_candidate" name="role_id" value="2" class="mr-2">
                    <label for="role_candidate" class="mr-4">Candidate</label>

                    <input type="radio" id="role_recruiter" name="role_id" value="3" class="mr-2">
                    <label for="role_recruiter">Entrepreneur</label>
                    <input type="radio" id="role_representative" name="role_id" value="4" class="mr-2">
                    <label for="role_representative" class="mr-4">Representative</label>

                </div>
            </div>

            <div class="mb-6" id="companySelect" style="display: none;">
                <label class="block text-gray-700 font-medium mb-2">Select Your Company</label>
                <select name="company_id"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                    @foreach ($companies as $company)
                        <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6" id="companyDetails" style="display: none;">
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your company details</p>
                <div class="mb-6"> <input type="text" placeholder="company name" name="name"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                </div>
                <div class="mb-6"> <input type="text" placeholder="company localisation" name="localisation"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                </div>
                <div class="mb-6"> <input type="text" placeholder="company description" name="description"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                </div>
            </div>
        </div>

        <div class="form-footer flex gap-3">
            <button type="button" id="prevBtn"
                class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg"
                onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn"
                class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-indigo-600 hover:bg-indigo-700 text-lg"
                onclick="nextPrev(1)">Next</button>
        </div>
    </form>
    <script>
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("step");
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("signUpForm").submit();
                return false;
            }
            showTab(currentTab);
        }


        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
    </script>
    <script>
        ///////Representative
        document.addEventListener('DOMContentLoaded', function() {
            var roleRadios = document.querySelectorAll('input[name="role_id"]');
            var companyDetails = document.getElementById('companyDetails');

            function toggleCompanyDetails() {
                if (document.getElementById('role_representative').checked) {
                    companyDetails.style.display = 'block';
                } else {
                    companyDetails.style.display = 'none';
                }
            }

            toggleCompanyDetails(); // Initial state

            roleRadios.forEach(function(radio) {
                radio.addEventListener('change', toggleCompanyDetails);
            });
        });
        ///////// recuiter
        document.addEventListener('DOMContentLoaded', function() {
            var roleRadios = document.querySelectorAll('input[name="role_id"]');
            var companySelect = document.getElementById('companySelect');

            function toggleCompanySelect() {
                if (document.getElementById('role_recruiter').checked) {
                    companySelect.style.display = 'block';
                } else {
                    companySelect.style.display = 'none';
                }
            }

            toggleCompanySelect();

            roleRadios.forEach(function(radio) {
                radio.addEventListener('change', toggleCompanySelect);
            });
        });

        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordError = document.getElementById('password_error');

        passwordInput.addEventListener('input', validatePassword);
        confirmPasswordInput.addEventListener('input', validatePassword);

        function validatePassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password.length < 8) {
                passwordError.textContent = 'Password must be at least 8 characters long.';
            } else if (password !== confirmPassword) {
                passwordError.textContent = 'Passwords do not match.';
            } else {
                passwordError.textContent = '';
            }
        }
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email_error');

        emailInput.addEventListener('input', validateEmail);

        function validateEmail() {
            const email = emailInput.value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                emailError.textContent = 'Please enter a valid email address.';
            } else {
                emailError.textContent = '';
            }
        }
    </script>
</body>
</html>

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" /><!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
