<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div>
        <h1>Password Generator</h1>
        <div class="password-container" id="password-container-1" name="pass1"></div>
        <button class="copy-button" onclick="copyPassword('password-container-1')">Copy Password</button>

        <div class="password-container" id="password-container-2" name="pass1"></div>
        <button class="copy-button" onclick="copyPassword('password-container-2')">Copy Password</button>

        <div class="password-container" id="password-container-3" name="pass1"></div>
        <button class="copy-button" onclick="copyPassword('password-container-3')">Copy Password</button>

        <div class="password-container" id="password-container-4" name="pass1"></div>
        <button class="copy-button" onclick="copyPassword('password-container-4')">Copy Password</button>
        <div class="form-control">
            <label for="len">Password Length</label>
            <input id="length" value="15" type="number" min="1" max="50" oninput="limitLength()" />
          </div>
          <div class="form-control">
            <label for="upper">Contain Uppercase Letters</label>
            <input id="uppercase" type="Checkbox"/>
          </div>
          <div class="form-control">
              <label for="lower">Contain Lowercase Letters</label>
              <input id="lowercase" type="Checkbox"/>
              </div>
          <div class="form-control">
              <label for="number">Contain Numbers</label>
              <input id="numbers" type="Checkbox"/>
              </div>
          <div class="form-control">
            <label for="symbol">Contain Symbols</label>
            <input id="special" type="checkbox"/>
          </div>
          
         <button onclick="generatePasswords()" class="generate" id="generate">Generate Passwords</button>
          </button>
          <p><span style="color: red; font-size: 20px;"> Choose any one password <br> Click on Copy Password Button  </span></p>
          <form action="encryption.php" method="post">
            <p><span style="color: Black; font-size: 20px;">The generated password gets encrypted,because of increase your password security <br>Click on Encrypt Password Button</span></p>
            <input type="submit" class="generate" value="Encrypt Password"  >
          </form>
    </div>
   

    <script src="script.js"></script>
</body>
</html>
