function generatePasswords() {
    const length = document.getElementById("length").value;
    const uppercase = document.getElementById("uppercase").checked;
    const lowercase = document.getElementById("lowercase").checked;
    const numbers = document.getElementById("numbers").checked;
    const special = document.getElementById("special").checked;

    const characters = (
        (uppercase ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '') +
        (lowercase ? 'abcdefghijklmnopqrstuvwxyz' : '') +
        (numbers ? '0123456789' : '') +
        (special ? '!@#$%^&*()-=_+[]{}|;:,.<>?/' : '')
    );
    
    if (!characters) {
        alert("Please select at least one type of character.");
        return;
    }

    generatePassword(length, characters, "password-container-1");
    generatePassword(length, characters, "password-container-2");
    generatePassword(length, characters, "password-container-3");
    generatePassword(length, characters, "password-container-4");
}
function limitLength() {
    var length = document.getElementById("length").value;
    if (length < 1) {
        document.getElementById("length").value ="1";
    } else if (length > 50) {
        document.getElementById("length").value = "50";
    }
}
function generatePassword(length, characters, containerId) {
    let password = "";
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        password += characters.charAt(randomIndex);
    }

    document.getElementById(containerId).innerHTML =`<strong>Password:</strong> ${password}`;
}

function copyPassword(containerId) {
    const passwordContainer = document.getElementById(containerId);
    const passwordText = passwordContainer.innerText.split(":")[1].trim();

    const textarea = document.createElement("textarea");
    textarea.value = passwordText;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);

    alert("Password copied to clipboard!");
}