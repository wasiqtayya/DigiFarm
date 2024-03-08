<div class="liginform-wraper d-flex">
    <div class="wrapper-container">
        <div class="title-text-wrapper">
            <h2 class="fw-bolder">
                Sign in
            </h2>
            <p class="discription link">
                Don't have an account? <a href="index.php?p=register">Create now</a>
            </p>
        </div>
        <form class="signinForm" id = "signinForm" method="post" action="process.php?action=signin">
            <div class="form-field-wrapper position-relative">
                <label class="form-label">E-mail</label>
                <input name="email" type="email" class="form-control" placeholder="example@gmail.com"
                    required autocomplete="email">
            </div>
            <div class="form-field-wrapper position-relative">
                <label class="form-label">Password</label>
                <input id="password" type="password" name = "password" class="form-control input-password-type"
                    placeholder="@#*%" required autocomplete="new-password" minlength="6">
                <span id="show-password" class="material-symbols-outlined eye-showpasword">
                    <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.28125 12C9.28125 12.6962 9.55781 13.3639 10.0501 13.8562C10.5424 14.3484 11.2101 14.625 11.9062 14.625C12.6024 14.625 13.2701 14.3484 13.7624 13.8562C14.2547 13.3639 14.5312 12.6962 14.5312 12C14.5312 11.3038 14.2547 10.6361 13.7624 10.1438C13.2701 9.65156 12.6024 9.375 11.9062 9.375C11.2101 9.375 10.5424 9.65156 10.0501 10.1438C9.55781 10.6361 9.28125 11.3038 9.28125 12ZM22.0828 11.3953C19.8609 6.71484 16.5023 4.35938 12 4.35938C7.49531 4.35938 4.13906 6.71484 1.91719 11.3977C1.82807 11.5864 1.78185 11.7925 1.78185 12.0012C1.78185 12.2099 1.82807 12.416 1.91719 12.6047C4.13906 17.2852 7.49765 19.6406 12 19.6406C16.5047 19.6406 19.8609 17.2852 22.0828 12.6023C22.2633 12.2227 22.2633 11.782 22.0828 11.3953ZM11.9062 16.125C9.62812 16.125 7.78125 14.2781 7.78125 12C7.78125 9.72188 9.62812 7.875 11.9062 7.875C14.1844 7.875 16.0312 9.72188 16.0312 12C16.0312 14.2781 14.1844 16.125 11.9062 16.125Z"
                            fill="#718096" />
                    </svg>
                    <svg class="d-none" xmlns="http://www.w3.org/2000/svg" height="48"
                        viewBox="0 -960 960 960" width="48"
                        style="width: 54px;height: 20px;fill: #718096;">
                        <path
                            d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z">
                        </path>
                    </svg>
                </span>
            </div>
            <div class="button-wrapper-login d-flex justify-content-center align-items-center">
                <button type="submit" name="submit" class="text-white btn w-100">Sign In </button>
            </div>
        </form>
        <p class="discription mobile">
            Don't have an account? <a href="registerPage.php">Create now</a>
        </p>
    </div>
</div>