$(document).ready(function() {
    $("#registerForm").on("submit", function(event) {
        event.preventDefault();

        const username = $("input[name='username']").val().trim();
        const email = $("input[name='email']").val().trim();
        const password = $("input[name='password']").val();
        const confirmPassword = $("input[name='confirmPassword']").val();

        $("#registerMessage").text("");

        if (!username || !email || !password || !confirmPassword) {
            $("#registerMessage").text("Будь ласка, заповніть усі поля.");
            return;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $("#registerMessage").text("Введіть коректну електронну пошту.");
            return;
        }

        if (password.length < 6) {
            $("#registerMessage").text("Пароль повинен містити щонайменше 6 символів.");
            return;
        }

        if (password !== confirmPassword) {
            $("#registerMessage").text("Паролі не співпадають.");
            return;
        }

        $.ajax({
            url: "server_register.php",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    window.location.href = "login.html";
                } else {
                    $("#registerMessage").text(response.message);
                }
            },
            dataType: "json"
        });
    });

    $("#loginForm").on("submit", function(event) {
        event.preventDefault();

        const email = $("input[name='email']").val().trim();
        const password = $("input[name='password']").val();

        $("#loginMessage").text("");

        if (!email || !password) {
            $("#loginMessage").text("Будь ласка, заповніть усі поля.");
            return;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $("#loginMessage").text("Введіть коректну електронну пошту.");
            return;
        }

        $.ajax({
            url: "server_login.php",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    window.location.href = "profile.html";
                } else {
                    $("#loginMessage").text(response.message);
                }
            },
            dataType: "json"
        });
    });
});

function logout() {
    $.get("logout.php", function() {
        window.location.href = "index.html";
    });
}