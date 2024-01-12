<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game</title>
</head>

<body>
  <h1>Welcome to Your firSt Swedish course!</h1>
  <form action="" method="POST">
    Your Word: <input type="text" class="answer" name="answer">
    <input type="submit">
    <input type="submit" style="color:red" name="Reset" value="Reset">
  </form>
  <div class="extra">
    <!-- special characters for swedish -->
    <script>
      function createButton(name) {
        let button = document.createElement("button");
        button.innerText = name;
        button.style.padding = "5px";
        button.style.margin = "5px";
        button.style.fontWeight = "700";
        button.style.borderRadius = "7px";
        button.addEventListener("click", () => {
          document.querySelector(".answer").value += name;
          console.log(name, document.querySelector(".answer").textContent);
        })
        return button;
      }
      let div = document.querySelector('.extra');
      div.appendChild(createButton('ö'));
      div.appendChild(createButton('ä'));
      div.appendChild(createButton('å'));
    </script>
  </div>
</body>

</html>